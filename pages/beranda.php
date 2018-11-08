	  	<?php require_once('pages/slider.php');?>

	  	<div class="artikel">
			<div class="tengah">
				<h2>Berita & Pengumuman Terbaru</h2>
			</div>
			<fieldset>
			<?php
			/*if ($artikel=$con->query("SELECT id, tag_id, judul, SUBSTR(isi,1,200), foto, users_id, tgl FROM artikel WHERE is_publish=1 ORDER BY tgl DESC LIMIT 5;")) {
				while ($row=$artikel->fetch_row()) {
					$icon="glyphicon glyphicon-exclamation-sign";
					if ($row[1]=='Berita') $icon="glyphicon glyphicon-info-sign";
					echo "
					<div style=\"border:none;border-bottom:1px dotted #ccc;margin-top:10px;padding:2px;border-radius:5px; min-height:150px;\">

						<div style=\"text-align:center;\">
							<img width=\"300px\" height=\"150px\" src=\"$row[4]\" alt=\"$row[2]\" title=\"$row[2]\" />
						</div>

						<div style=\"padding:5px;background:#fff;\">
							<b style=\"font-size:150%;\"><span class=\"$icon\"></span> $row[2]</b>
							<br/>
							<i>Jayapura, $row[6] - $row[1] - $row[5]</i>
							<br/>
							$row[3]
							...
							<br/>
							<i><a style=\"text-decoration:none;\" href=\"#\" onMouseOver=\"this.style.color='#500'\" onMouseOut=\"this.style.color='#036'\" >Baca selengkapnya <span class=\"glyphicon glyphicon-circle-arrow-right\"></span></a></i>
						</div>
					</div>
					";
				}
			}*/
			$d_foto=base_url()."assets/";$foto="";
			$conn=new mysqli(HOST,USER,PASS,DB);
			if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
			$is_publish=1;
			$sql="SELECT id, tag_id, judul, SUBSTR(isi,1,200), foto, users_id, tgl, url_friendly FROM artikel WHERE is_publish=? ORDER BY tgl DESC LIMIT 7;";
			$stmt=$conn->prepare($sql);
			$stmt->bind_param('i',$is_publish);
			$stmt->execute();
			$artikels=$stmt->get_result();

			while ($row=$artikels->fetch_row()) {
					$icon="glyphicon glyphicon-exclamation-sign";
					if ($row[1]=='Berita') $icon="glyphicon glyphicon-info-sign";

					if(file_exists(dir_foto_srv().$row[4])==1){
						$foto=base_url()."foto/artikel/".$row[4];
					}else{
						$foto=base_url()."assets/no-photo.jpg";
					}
					#echo "$foto";
					echo "
					<div style=\"border:none;border-bottom:1px dotted #ccc;margin-top:10px;padding:2px;border-radius:5px; min-height:150px;\">

						<div style=\"text-align:center;\">
							<img width=\"300px\" height=\"150px\" src=\"$foto\" alt=\"$row[2]\" title=\"$row[2]\" />
						</div>

						<div style=\"padding:5px;background:#fff;\">
							<b style=\"font-size:150%;\"><span class=\"$icon\"></span> $row[2]</b>
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

			$artikels->close();
			$conn->close();
			?>

			</fieldset>

	  	</div>

<!--nav aria-label="Page navigation" class="tengah">
  <ul class="pagination">
    <li class="disabled">
      <a href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li><a href="#">5</a></li>
    <li>
      <a href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav-->



<!--warning-box-->
	  	<!--div id="warning-box" class="alert alert-warning alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<span class="">
			Pembayaran tagihan bulan berjalan dan tunggakan (maksimal 3 bulan) dapat dilakukan melalui loket online mitra PDAM Jayapura, yakni: <strong>PT. POS Indonesia</strong>, <strong>Bank PAPUA</strong>, dan <strong>BNI 46</strong>.<hr/> Pastikan anda membayar tepat waktu sebelum jatuh tempo <strong>tanggal 20</strong> pada bulan berjalan - untuk menghindari penambahan biaya denda.
			</span>
		</div-->
<!--warning-box-->
