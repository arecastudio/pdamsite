<div class="tengah">
	<h2>Cek Tagihan Rekening</h2>
</div>
<div class="gambar-atas">
	<img src="<?php echo base_url();?>assets/online-cek-tagihan.png"/>
</div>
<fieldset>

Cek Tagihan PDAM Jayapura - Fitur ini dapat memudahkan pelanggan untuk mengecek total Tagihan sebelum menuju ke Loket Pembayaran terdekat. Cukup dengan memasukkan Nomor/ ID Pelanggan pada isian yang tertera di bawah, kemudaian diproses untuk menampilkan jumlah tagihan ataupun tunggakan saat ini.
<br/>
<br/>

<div class="tengah">
	<!--a href="http://djj.esy.es/" target="_blank"><img src="assets/cek-tagihan2.png" alt="cek tagihan pdam jayapura" width="300" height="101" /></a-->
	<form method="post" action="" autocomplete="off">
	    <input type="text" name="tx_rek" id="tx_rek" size="26px;" placeholder="Nomor Rekening..." />
	    <button id="submit-rek" name="submit-rek" type="submit" class="btn btn-primary">
	    	<span class="glyphicon glyphicon-usd"></span>
	    </button>
	</form>
</div>

<!-- pdamjpr-ads-1 -->
<!--div id="adsense-ads" style="text-align:center;">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-5681172071871715"
     data-ad-slot="7648108594"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div-->

<div style="font-weight: bold;color: #000;padding: 10px;">
	<?php	
	if( isset($_POST['submit-rek'] ) ){
		$tx_rek=trim($_POST['tx_rek']);
		if (strlen($tx_rek)>5) {			
			$conn=new mysqli(HOST,USER,PASS,DB_BILLING);
			if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
			$tx_rek=$conn->escape_string($tx_rek);
			echo"<script type=\"text/javascript\">document.getElementById(\"tx_rek\").value=\"$tx_rek\";</script>";

			$sql="SELECT
				m.nomor
				,m.nolama
				,m.nama
				,m.alamat				
				,FORMAT(IFNULL(SUM(r.uangair+r.adm+r.meterai+r.meter),0),0) AS rtotal
				,IFNULL(COUNT(r.periode),0) AS rjumlah
				,GROUP_CONCAT(r.periode SEPARATOR ', '),
				m.no_hp
				FROM
					master AS m
				LEFT OUTER JOIN
					rekening1 AS r ON r.nomor=m.nomor AND r.status_bayar=0
				WHERE
					m.nomor=? OR m.nolama=?
			;";

			$stmt=$conn->prepare($sql);
			$stmt->bind_param('ss',$tx_rek,$tx_rek);
			$stmt->execute();
			$rek=$stmt->get_result();
			if($row=$rek->fetch_row()) {
			    
				echo "				
				<!--Nomor Pelanggan : <span style=\"color:blue;\">$row[0] / $row[1]</span><br/>
				Nama 			: <span style=\"color:blue;font-size:150%;\">$row[2]</span><br/>
				Alamat 			: <span style=\"color:blue;\">$row[3]</span><br/>
				Jumlah Tagihan 	: <span style=\"color:red;\">Rp. $row[4];-</span><br/>
				Jumlah Bulan 	: <span style=\"color:blue;\">$row[5]</span><br/>
				Rek. Tunggak 	: <span style=\"color:blue;\">$row[6];</span>		
				-->
				<tr>
				  <table width=\"100%\" border=\"0\">
                  <tr>
                    <td width=\"100px\">Nomor Pelanggan</td>
                    <td width=\"400px\">: <span style=\"color:blue;\">$row[0] / $row[1]</span></td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td>: <span style=\"color:blue;font-size:150%;\">$row[2]</span></td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>: <span style=\"color:blue;\">$row[3]</span></td>
                  </tr>
                  <tr>
                    <td>Jumlah Tagihan</td>
                    <td>: <span style=\"color:red;\">Rp. $row[4];-</span></td>
                  </tr>
                  <tr>
                    <td>Jumlah Bulan</td>
                    <td>: <span style=\"color:blue;\">$row[5]</span></td>
                  </tr>
                  <tr>
                    <td align=\"left\"; valign=\"top\">Rek. Tunggak</td>
                    <td>: <span style=\"color:blue;\">$row[6];</span></td>
					
                  </tr>
                </table>
				";
				
				$sql="INSERT IGNORE INTO logs(nomor,nolama,nama,alamat,no_hp1,keterangan)VALUES('".$row[0]."','".$row[1]."','".$row[2]."','".$row[3]."','".$row[7]."','Website');";
			    $stmt=$conn->prepare($sql);
			    $stmt->execute();
			}
			$stmt->close();
			$conn->close();
		}
	}
	?>
</div>
<br/>
Keterangan:<br/>
+ Total Tunggakan belum termasuk denda keterlambatan untuk pembayaran anda<br/>
+ Data Informasi Tagihan ini di-update dalam skala mingguan. Untuk transaksi pembayaran anda minggu ini dapat dicek pada minggu berikutnya
<hr/>
Cek malalui aplikasi Android, silahkan download aplikasinya melalui tombol di bawah ini:

<div class="tengah">
	<a href="https://play.google.com/store/apps/details?id=com.kasuariweb.tagihanpdamjayapurapapua" target="_blank"><img src="assets/google-play-badge.png" alt="cek tagihan pdam jayapura android" width="300" height="101" /></a>
</div>

</fieldset>
