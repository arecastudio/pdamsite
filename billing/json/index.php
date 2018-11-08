<?php
#inc.php
define('HOST', 'localhost');
define('USER', 'u0090734_v3');
define('PASS', 'pdam!@#');
define('DB', 'u0090734_billing');

error_reporting(E_ALL);
ini_set('display_errors', 1);



date_default_timezone_set('Asia/Jayapura');
$tanggal=date('d-M-Y [H:i:s]',time());

$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if(isset($_POST['kirim_json'])){
	$arr_hasil=array();

	$data=json_decode($_POST['kirim_json']);
	$cbg=$data->cabang;

	//$cbg='04';
	$sql="SELECT nomor,nolama,UCASE(nama),cabang,kode_blok,alamat FROM master WHERE cabang=? ORDER BY kode_blok ASC, nolama ASC;";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('s',$cbg);
	$stmt->execute();
	$pel=$stmt->get_result();
	$num_of_rows = $pel->num_rows;

	while ($row=$pel->fetch_row()) {
		array_push($arr_hasil, array('nomor'=>$row[0],'nolama'=>$row[1],'nama'=>$row[2],'cabang'=>$row[3],'kode_blok'=>$row[4],'alamat'=>$row[5]));
	}

	$stmt->close();
	

	if($num_of_rows>0){
	//echo json_encode($arr_hasil);
		echo json_encode(array("retVal"=>"SUKSES","hasil"=>$arr_hasil));
	}else{
		echo json_encode(array("retVal"=>"GAGAL"));
	}

}

if(isset($_POST['hasil_baca'])){
	//$ar=array();
	$data = $_POST['hasil_baca'];
    $jd = json_decode($data);
    $sql=$jd->sql_simpan;

    $i=0;
    //$sql="INSERT INTO dsmp_new(periode,nomor,angka,status,kondisi_meter,kondisi_pengaliran,keterangan,latitude,longitude)VALUES(?,?,?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE angka=?,status=?,kondisi_meter=?,kondisi_pengaliran=?,keterangan=?,latitude=?,longitude=?";

    $stmt=$conn->prepare($sql);
	//$stmt->bind_param('isiisssiisss',$periode,$nomor,$angka,$status,$kondisi_meter,$kondisi_pengaliran,$keterangan,$angka,$status,$kondisi_meter,$kondisi_pengaliran,$keterangan);
	//$stmt->execute();
    
	//echo json_encode(array("retVal"=>$sql));
	if ($stmt->execute()) {
		echo json_encode(array("retVal"=>"SUKSES"));
	}else{
		echo json_encode(array("retVal"=>"GAGAL"));
	}
	$stmt->close();
}

$conn->close();