<div class="tengah">
	<h2>Pengaduan Pelanggan</h2>
</div>

<fieldset>

<!--div class="alert alert-info" role="alert">
	Fitur ini masih dalam tahap pengembangan. Akan segera diaktifkan ketika sudah rampung.
</div-->
<!--div>
    Untuk memudahkan interaksi pelanggan dengan PDAM Jayapura, terkait permasalahan dan keluhan yang dialami. Dapat langsung menghubungi penanggung jawab masing-masing wilayah pelayanan / Kepala cabang melalui nomor kontak yang tertera di bawah ini.
</div>
<br/>
<br/>
<div>
    <ol class="list-ka-upp">
        <li>Kepala Cabang Jayapura Selatan - Sulistiono, HP. 0852 4437 1327, 0823 2148 0554</li>
        <li>Kepala Cabang Jayapura Utara - Daniel KH Manufandu, HP. 0812 4764 6713</li>
        <li>Kepala Cabang Abepura - Yan Nasadit, Amd. T, HP. 0852 4431 2778</li>
        <li>Kepala Cabang Waena - Abdullah, SE, HP. 0851 9753 6776</li>
        <li>Kepala Cabang Sentani/ Genyem - George Ondi, SE, HP. 0823 9857 5813</li>
    </ol>
</div-->
<script src='https://www.google.com/recaptcha/api.js'></script>
<div style="">
<form method="post" action="" autocomplete="off">
	<div><input type="text" name="text_nomor" placeholder="Nomor Pelanggan" required /> <i><small>* Isikan sesuai nomor yang tertera di lembar rekening</small></i></div>
	<div><input type="text" name="text_nama" placeholder="Nama" required /></div>
	<div><input type="text" name="text_alamat" placeholder="Alamat" required /></div>
	<div><input type="text" name="text_telepon" placeholder="Nomor Handphone" required /></div>
	<div>
		<select name="opt_cabang">
			<option>--Pilih Wilayah--</option>
			<option value="JPR">Jayapura Selatan</option>
			<option value="UJU">Jayapura Utara</option>
			<option value="ABE">Abepura</option>
			<option value="WNA">Waena</option>
			<option value="STN">Sentani</option>
			<option value="GYM">Genyem</option>
		</select>
	</div>
	<div>
		<textarea name="text_keluhan" placeholder="Keluhan" required style="width: 90%;height:150px;"></textarea>
	</div>
	<div class="g-recaptcha margin-1" data-sitekey="6LedYhoUAAAAABA2WTAmZWCnUuH4PvicfJIouDsP" data-theme="dark" ></div>
	<div>
		<input type="submit" name="submit" value="Sampaikan" class="btn btn-primary" />
		&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;
		<input type="reset" name="reset" value="Reset" class="btn btn-warning" />
	</div>
</form>
</div>

<div>
	<?php
if (isset($_POST['submit']) && $_POST['g-recaptcha-response']!='') {
    $nomor=$_POST['text_nomor'];
	$nama=$_POST['text_nama'];
	$alamat=$_POST['text_alamat'];
	$telepon=$_POST['text_telepon'];
	$keluhan=$_POST['text_keluhan'];
	$cabang=$_POST['opt_cabang'];
	if (strlen(trim($nomor))>0 && strlen(trim($nama))>0 && strlen(trim($alamat))>0 && strlen(trim($keluhan))>0 && strlen(trim($cabang))>0 && strlen(trim($telepon))>0) {
		$conn=new mysqli(HOST,USER,PASS,DB_BILLING);
		if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
		
		$nomor=$conn->escape_string($_POST['text_nomor']);
		$nama=$conn->escape_string($_POST['text_nama']);
		$alamat=$conn->escape_string($_POST['text_alamat']);
		$telepon=$conn->escape_string($_POST['text_telepon']);
		$keluhan=$conn->escape_string($_POST['text_keluhan']);
		$cabang=$conn->escape_string($_POST['opt_cabang']);
		
		$sql="INSERT IGNORE INTO pengaduan(nomor,nama,alamat,telepon,cabang,keluhan)VALUES(?,?,?,?,?,?);";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('ssssss',$nomor,$nama,$alamat,$telepon,$cabang,$keluhan);		
		$stmt->execute();
		echo "<i style='color:blue;'>Keluhan anda telah tersampaikan, akan segera dihubungi oleh petugas melalu nomor HP yang sudah dimasukkan</i>";
		$stmt->close();
		$conn->close();
	}
}
	?>
</div>

<hr/>
<div>
<center>
<h4>List Pengaduan Pelanggan PDAM Jayapura</h4>
</center>
<?php
$conn=new mysqli(HOST,USER,PASS,DB_BILLING);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$i=0;
$sql="SELECT tgl,nomor,nama,alamat,telepon,cabang,keluhan FROM pengaduan ORDER BY tgl DESC;";
$stmt=$conn->prepare($sql);
#$stmt->bind_param('ssssss',$nomor,$nama,$alamat,$telepon,$cabang,$keluhan);		
$stmt->execute();

$rs=$stmt->get_result();
while ($row=$rs->fetch_row()) {
	$i++;
	echo "
	<div style=''>
		$row[0] - <strong>$row[2]</strong>
		<br/>	
		$row[6]
	</div>
	<hr/>
	";
}

$stmt->close();
$conn->close();
?>
</div>

</fieldset>
