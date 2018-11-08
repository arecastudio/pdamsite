<div class="tengah">
	<h2>Berita Kegiatan PDAM Jayapura</h2>
</div>
<div class="gambar-atas">
	<img src="<?php echo base_url();?>assets/news-banner.jpg"/>
</div>

<fieldset>

<div class="artikel-group">
	<?php
	$is_publish="1";
	$tag_id="Berita";
	$conn=new mysqli(HOST,USER,PASS,DB);
	if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
	$sql="SELECT id, tag_id, judul, SUBSTR(isi,1,200), foto, users_id, tgl, url_friendly FROM artikel WHERE is_publish=? AND tag_id=? ORDER BY tgl DESC;";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('ss',$is_publish,$tag_id);
	$stmt->execute();
	$artikel=$stmt->get_result();
	while ($row=$artikel->fetch_row()) {
		echo "
		<div style=\"border:none;border-bottom:1px dotted #ccc;margin-top:10px;padding:2px;border-radius:5px; min-height:150px;\">

			<div style=\"padding:5px;background:#fff;\">
				<b style=\"font-size:150%;\"><span class=\"glyphicon glyphicon-info-sign\"></span> $row[2]</b>
				<br/>
				<i>Jayapura, $row[6] - $row[1] - ".ucwords($row[5])."</i>
				<br/>
				".preg_replace( "/\n\s+/", "\n", rtrim(html_entity_decode(strip_tags($row[3]))) )."
				...
				<br/>
				<i><a style=\"text-decoration:none;\" href=\"".base_url()."baca/".$row[7]."\" onMouseOver=\"this.style.color='#500'\" onMouseOut=\"this.style.color='#036'\" >Baca selengkapnya <span class=\"glyphicon glyphicon-circle-arrow-right\"></span></a></i>
			</div>
		</div>
		";
	}
	?>
</div>

</fieldset>