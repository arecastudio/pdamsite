<script type="text/javascript">document.getElementById('artikel').className='active'</script>
<script type="text/javascript">tinymce.init({ selector:'textarea' });</script>

<div class="lokasi">
	<ol class="breadcrumb">
	  	<li><a href="<?php echo base_url_cfg2();?>artikel">Artikel</a></li>
	  	<li class="active">Hapus Artikel</li>
	</ol>
</div>

<?php

if (isset($_GET['id']) && $_GET['id']!='') {
	$id=$_GET['id'];
	?>

	<fieldset id="fld-hapus-artikel-tanya">
		<center>
		<h3>Yakin untuk hapus artikel ini?</h3><hr/>
		<form method="post" action="">
			<input type="hidden" name="h_id" value="<?php echo $id;?>" />
			<input type="submit" name="submit" value="Ya" class="btn btn-danger btn-satu" />
			<a href="<?php echo base_url_cfg2();?>artikel" class="btn btn-default btn-satu">Tidak</a>
		</form>
		</center>
	</fieldset>

	<?php
}


if (isset($_POST['submit']) && $_POST['h_id']!='') {	
	$conn=new mysqli(HOST,USER,PASS,DB);
	if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
	$h_id=$conn->escape_string($_POST['h_id']);
	$scs=0;

	$sql="DELETE FROM artikel WHERE id=?;";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('s',$h_id);
	$stmt->execute();
	$stmt->close();
	$conn->close();

	?>

	<script type="text/javascript">document.getElementById('fld-hapus-artikel-tanya').style.display="none"</script>

	<fieldset>
		<center>
			<h3><span class="glyphicon glyphicon-ok-circle"></span> Artikel telah berhasil dihapus !</h3><hr/>			
			<a href="<?php echo base_url_cfg2();?>artikel" class="btn btn-default btn-satu"><span class="glyphicon glyphicon-circle-arrow-left"></span> Kembali ke list Artikel</a>
		</center>
	</fieldset>

	<?php
}

?>