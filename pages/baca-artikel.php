<!--div class="tengah">
	<h2>Baca Artikel:</h2>
</div-->

<!--fieldset-->

<?php
if (isset($_GET['art'])) {
	//echo $_GET['art'];	
	$conn=new mysqli(HOST,USER,PASS,DB);
	if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
	$url_seo=$conn->escape_string($_GET['art']);
	$sql="
	SELECT
		id,
		tag_id,
		judul,
		isi,
		foto,
		users_id,
		tgl,
		hit
	FROM
		artikel
	WHERE
		url_friendly=?
	LIMIT 1
	;";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('s',$url_seo);
	$stmt->execute();
	$artikel=$stmt->get_result();
	if($row=$artikel->fetch_row()) {
		echo"
		<div class=\"tengah\">
			<h3>$row[2]</h3>
		</div>
		<fieldset>
			<div class=\"gambar-artikel\">
				<img class=\"\" width=\"300px\" height=\"250px\" src=\"".dir_foto()."$row[4]\" title=\"$row[2]\" alt=\"$row[2]\" />
			</div>		
			<div>$row[3]</div>
		</fieldset>
		";
	}else{
		echo "
		<div class=\"alert alert-danger\" role=\"alert\">
			<h2><span class=\"glyphicon glyphicon-remove-circle\"></span>
			Artikel yang dimaksud tidak ditemukan. Silahkan melihat tulisan terbaru lainnya di <a href=\"".base_url()."\">beranda</a>.</h2>
		</div>
		";
	}
	$artikel->close();
	$conn->close();
}
?>

<!--/fieldset-->