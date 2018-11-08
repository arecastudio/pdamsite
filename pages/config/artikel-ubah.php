<script type="text/javascript">document.getElementById('artikel').className='active'</script>
<script type="text/javascript">
tinymce.init({ 
	selector:'textarea'
});
tinymce.init({
    setup : function(ed) {
        ed.onBeforeSetContent.add(function(ed, o) {
            if (o.initial) {
                o.content = o.content.replace(/\r?\n/g, '<br />');
            }
        });
    }
});
</script>

<div class="lokasi">
	<ol class="breadcrumb">
	  	<li><a href="<?php echo base_url_cfg2();?>artikel">Artikel</a></li>
	  	<li class="active">Ubah Artikel</li>
	</ol>
</div>
<?php if(isset($_GET['id'])){
	$conn=new mysqli(HOST,USER,PASS,DB);
	if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
	$id=$conn->escape_string($_GET['id']);
	$sql="
	SELECT 
		tag_id,
		judul,
		isi,
		foto,
		users_id,
		users_id_ubah,
		tgl,
		tgl_ubah,
		is_publish,
		hit,
		url_friendly 
	FROM 
		artikel
	WHERE 
		id=?
	LIMIT 1
	;";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('s',$id);
	$stmt->execute();
	$artikel=$stmt->get_result();
	if($row=$artikel->fetch_row()) {
		$tag_id=$row[0];
		$judul=$row[1];
		$isi=$row[2];
		$foto=$row[3];
		$users_id=$row[4];
		$users_id_ubah=$row[5];
		$tgl=$row[6];
		$tgl_ubah=$row[7];
		$is_publish=$row[8];
		$hit=$row[9];
		$url_friendly=$row[10];
?>
<div class="div-info">
	<span id="info-danger" class="info-danger"></span>
	<span id="info-success" class="info-success"></span>
</div>

<div class="form-artikel-tambah">
	<form id="fr1" method="post" action="" enctype="multipart/form-data">
		<input type="radio" name="rtag" value="Berita" id="rtag1" <?php if($tag_id=='Berita') echo "checked";?> /> Berita &nbsp;&nbsp;&nbsp;		
		<input type="radio" name="rtag" value="Pengumuman" id="rtag2" <?php if($tag_id=='Pengumuman') echo "checked";?> /> Pengumuman
		<div class="spasi"></div>
		<input type="text" name="tjudul" id="tjudul" class="form-control666" size="25" placeholder="Judul artikel..." required value="<?php echo $judul;?>" />
		<div class="spasi"></div>

		<div class="input-group">
			<span class="input-group-addon" id="basic-addon1">Foto artikel (maksimal 400 KB)</span>
			<input type="file" name="bfoto" id="bfoto" aria-describedby="basic-addon1" accept="image/*" />
		</div>

	    <div class="spasi"></div>
	    <textarea name="tisi" id="tisi" class="tarea" ><?php echo $isi;?></textarea>
	    
	    <div class="spasi"></div>
	    <input type="submit" name="submit" value="Ubah" class="btn btn-primary btn-satu" />
	    &nbsp;&nbsp;&nbsp;
	    &nbsp;&nbsp;&nbsp;
	    <input type="reset" name="reset" class="btn btn-warning btn-satu" />
	</form>
</div>
<?php 
	}
	$stmt->close();
	$conn->close();
}
?>
<!--script type="text/javascript">document.getElementById('info').textContent="selamat malam";</script-->
<!--################################################################################################################-->
<?php
#echo get_slug("Regular expression function that replaces spaces between words with hyphens. jangan/ juga-juga");

//if (!isset($_GET['mode']) || $_GET['mode']=='add' ) {
	if (isset($_POST['submit'])) {
		if ( strlen($_POST['rtag'])>0 && strlen($_POST['tjudul'])>0 && strlen($_POST['tisi'])>0 ) {
			$conn=new mysqli(HOST,USER,PASS,DB);
			if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

			$rtag=$conn->escape_string($_POST['rtag']);
			$tjudul=$conn->escape_string($_POST['tjudul']);
			$tjudul=trim($tjudul);
			#$bfoto="foto/artikel/no-photo.jpg";#$conn->escape_string($_POST['bfoto']);
			$tisi=str_replace("\r\n"," ",$_POST['tisi']);
			$tisi=$conn->escape_string($tisi);
			#$tisi=str_replace("\r\n", " ", $tisi);
			#$tisix=preg_replace('/\r\n/', '<br/>', $tisi);
			#$tisi=$_POST['tisi'];

			$users_id="admin";
			$is_publish="1";			
			$next_id="1";

			$sql="SELECT IFNULL(MAX(id),0)+1 FROM artikel;";
			$stmt=$conn->prepare($sql);
			$stmt=$conn->prepare($sql);
			$stmt->execute();
			$artikel=$stmt->get_result();
			if($row=$artikel->fetch_row()) {
				$next_id=$row[0];
			}
			$url_seo=get_slug($next_id." ".$tjudul);			

			$nama_gbr="no-photo.jpg";
			if(strlen($_FILES['bfoto']['name'])>0) {
				$nama_gbr=basename($_FILES["bfoto"]["name"]);			
				$sql="
				UPDATE artikel
				SET
					tag_id=?,
					judul=?,
					foto=?,
					isi=?,
					users_id_ubah=?,
					tgl_ubah=CURRENT_TIMESTAMP,
					is_publish=?
				WHERE
					id=?
				;";
				$stmt=$conn->prepare($sql);
				$stmt->bind_param("sssssss",$rtag,$tjudul,$nama_gbr,$tisi,$users_id,$is_publish,$id);
			}else{
				$sql="
				UPDATE artikel
				SET
					tag_id=?,
					judul=?,					
					isi=?,
					users_id_ubah=?,
					tgl_ubah=CURRENT_TIMESTAMP,
					is_publish=?
				WHERE
					id=?
				;";
				$stmt=$conn->prepare($sql);
				$stmt->bind_param("ssssss",$rtag,$tjudul,$tisi,$users_id,$is_publish,$id);
			}			
			$stmt->execute();

			$stmt->close();
			$conn->close();

			if (isset($_FILES['bfoto']['name'])) {				
				/*$tmp_name=$_FILES['bfoto']['tmp_name'];
				move_uploaded_file($tmp_name, dir_foto_srv().$nama_gbr);*/
				$target_dir = dir_foto_srv();
				#$target_file = $target_dir . basename($_FILES["bfoto"]["name"]);
				$target_file = $target_dir . basename($_FILES["bfoto"]["name"]);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

				echo "<h2>".basename($_FILES["bfoto"]["name"])."</h2>";

				// Check if image file is a actual image or fake image
			    $check = getimagesize($_FILES["bfoto"]["tmp_name"]);
			    if($check !== false) {
			        //echo "File is an image - " . $check["mime"] . ".";
			        $uploadOk = 1;
			    } else {
			        echo "File is not an image.<br/>";
			        $uploadOk = 0;
			    }

				// Check if file already exists
				if (file_exists($target_file)) {
				    echo "Sorry, file already exists.<br/>";
				    $uploadOk = 0;
				}

				// Check file size
				if ($_FILES["bfoto"]["size"] > 500000) {
				    echo "Sorry, your file is too large.<br/>";
				    $uploadOk = 0;
				}

				// Allow certain file formats
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
				&& $imageFileType != "gif" ) {
				    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br/>";
				    $uploadOk = 0;
				}

				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				    echo "Sorry, your file was not uploaded.<br/>";
				// if everything is ok, try to upload file
				} else {
				    if (move_uploaded_file($_FILES["bfoto"]["tmp_name"], $target_file)) {
				        echo "The file ". basename( $_FILES["bfoto"]["name"]). " has been uploaded.";
				    } else {
				        echo "Sorry, there was an error uploading your file.";
				    }
				}
			}
			#$nama=$_FILES['bfoto']['name'];
			#echo "gambar berhasil diupload ke ".$_SERVER["DOCUMENT_ROOT"]."/projects/pdamjayapura/foto/artikel/".$nama_gbr."<br/>".$nama;
			header('Location: '.base_url_cfg2()."artikel");
			echo "<script type=\"text/javascript\">document.getElementById('info-success').textContent=\"Sukses !\";</script>";
		}else{
			echo "<script type=\"text/javascript\">document.getElementById('info-danger').textContent=\"Batal tersimpan karena data tidak lengkap !\";</script>";
		}
	}
//}else{}


?>