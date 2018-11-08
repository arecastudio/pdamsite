<?php
#inc.php
define('HOST', 'localhost');
define('USER', 'rail');
define('PASS', '');
define('DB', 'u0090734_v3');
define('DB_BILLING', 'billing');

error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set('Asia/Jayapura');
$tanggal=date('d-M-Y [H:i:s]',time());


$con=mysqli_connect(HOST,USER,PASS,DB);


if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: ".mysqli_connect_error();
}

function base_url(){
	#return "http://pdamjayapura.com/";
	return "http://localhost/pdamjayapura/";
}

function base_url_cfg(){
	$val=base_url() ."xeon/default.php";
	return $val;
}

function base_url_cfg2(){
	$val=base_url() ."gandapura/";
	return $val;
}

function dir_foto(){
	$val=base_url() ."foto/artikel/";
	return $val;
}

function dir_foto_srv(){
	$val=$_SERVER["DOCUMENT_ROOT"]."/foto/artikel/";
	return $val;
}

function get_slug($str){
	$string=strtolower($str);
   	$slug=preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
   	return $slug;
}


function aplot_foto($fileToUpload){
	$target_dir = dir_foto_srv();
	$target_file = $target_dir . basename($_FILES["$fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["$fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["$fileToUpload"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["$fileToUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["$fileToUpload"]["name"]). " has been uploaded.";
	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}
}
