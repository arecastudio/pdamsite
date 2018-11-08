<?php
require_once('pages/inc.php');
?>
<!DOCTYPE html>
<html>
<head>
  	<title>PDAM Jayapura</title>
  	<meta charset="utf-8">
  	<meta http-equiv="content-Type" content="text/html; charset=utf-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<base href="<?php echo base_url();?>"/><!--berfungsi menjaga css dll tetap loading sesuai direktori ketika redirect via .htaccess -->

  	<!--SEO section BOF-->
  	<meta name="description" content="Situs resmi Perusahaan Daerah Air Minum Jayapura- Papua."/>
  	<meta name="keywords" content="pdam jayapura, jayapura, papua, air, air minum, sanitasi, pdam, air mati" />
	<meta name="language" content="English" />
	<meta http-equiv="content-language" content="en" />
	<meta name="copyright" content="PDAM Jayapura - 2017" />
  	<!--SEO section EOF-->

  	<link rel="icon" href="assets/tirta-dharma-circle.png" type="image/png" />

	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script type="text/javascript">
  	$(document).ready(function(){
	    $("#ke-footer").click(function() {
		    $('html, body').animate({
		        scrollTop: $("#footer").offset().top
		    }, 1000);
		});
	});
  </script>
  
<!-- Mobicow.com Ad Code Start : Do Not Modify -->
<script>
    var mc_s1 = document.createElement("script");
    var _mcpv = _mcpv || {};
    _mcpv.triggers = ["exit","move","link"];
    mc_s1.async = true;
    mc_s1.src = "http://cdn.mobicow.com/deliver/p/12082/14126/1/over/86400";
    var MCs_1 = document.getElementsByTagName("script")[0];
    MCs_1.parentNode.insertBefore(mc_s1, MCs_1);
</script>
<!-- Mobicow.com Ad Code End : Do Not Modify -->

</head>
<body>
<div class="wrapper">

  <div class="header">
  	<div class="logo top-site">
		<img class="site-logo" src="assets/tirta-dharma-circle.png" alt=""/>
		<b class="logo-desc">PDAM Jayapura</b>
  	</div>

	<div id="kontak-cepat">
	&nbsp;&nbsp;&nbsp;
		Kontak: &nbsp;&nbsp;
		<span class="glyphicon glyphicon-earphone"></span> <a class="kontak-cepat-a" href="tel:0967535941" target="_blank">0967 535941</a>
		<!--&nbsp;&nbsp;&nbsp;
		<span class="glyphicon glyphicon-envelope"></span> 081248681800-->
	</div>

	<div class="navigation">

		<ul class="nav nav-tabs">
		  <li role="presentation" class="active666"><a href="<?php echo base_url();?>"><span class="glyphicon glyphicon-home"></span>&nbsp;Beranda</a></li>
		  <li role="presentation" class="dropdown">
		  	<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span>&nbsp;Profil <span class="caret"></span></a>
		  	<ul class="dropdown-menu">
		  		<li><a href="<?php echo base_url();?>visi-misi">Visi dan Misi</a></li>
		  		<li><a href="<?php echo base_url();?>tentang-pdam">Tentang PDAM</a></li>
		  		<li><a href="<?php echo base_url();?>sejarah-singkat">Sejarah Singkat</a></li>
		  		<li role="separator" class="divider"></li>
		  		<li><a href="<?php echo base_url();?>peta-lokasi">Peta Lokasi</a></li>
		  		<!--li><a href="#">Target</a></li-->
		  	</ul>
		  </li>
		  <li role="presentation" class="dropdown">
		  	<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-wrench"></span>&nbsp;Layanan <span class="caret"></span></a>
		  	<ul class="dropdown-menu">
		  		<li><a href="<?php echo base_url();?>prosedur-sambungan-baru">Prosedur Sambungan Baru</a></li>
		  		<li><a href="<?php echo base_url();?>prosedur-penyambungan-kembali">Prosedur Penyambungan Kembali</a></li>
		  		<li><a href="<?php echo base_url();?>prosedur-pembuatan-rekening">Prosedur Pembuatan Rekening</a></li>
		  		<li role="separator" class="divider"></li>
		  		<li><a href="<?php echo base_url();?>sambungan-baru">Download Formulir Sambungan Baru</a></li>
		  		<li role="separator" class="divider"></li>
		  		<li><a href="<?php echo base_url();?>cek-tagihan">Cek Tagihan Rekening</a></li>
		  		<li><a href="https://play.google.com/store/apps/details?id=com.kasuariweb.tagihanpdamjayapurapapua" target="_blank">Aplikasi Android</a></li>
		  		<li><a href="<?php echo base_url();?>pengaduan-online">Pengaduan Pelanggan</a></li>
		  	</ul>
		  </li>
		  <!--li role="presentation"><a href="#"><span class="glyphicon glyphicon-wrench"></span>&nbsp;Layanan</a></li-->
		  <li role="presentation"><a href="<?php echo base_url();?>artikel-berita"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;Berita</a></li>
		  <li role="presentation"><a href="<?php echo base_url();?>artikel-pengumuman"><span class="glyphicon glyphicon-exclamation-sign"></span>&nbsp;Pengumuman</a></li>
		  <li role="presentation"><a href="<?php echo base_url();?>galeri-foto"><span class="glyphicon glyphicon-picture"></span>&nbsp;Galeri</a></li>
		  <!--li role="presentation"><a href="#"><span class="glyphicon glyphicon-phone-alt"></span>&nbsp;Kontak</a></li-->
		  <li role="presentation"><a id="ke-footer"><span class="glyphicon glyphicon-phone-alt"></span>&nbsp;Kontak</a></li>
		  <li role="presentation"><a href="<?php echo base_url();?>sitemap.xml" target="_blank"><span class="glyphicon glyphicon-random"></span>&nbsp;Sitemap</a></li>
		</ul>

	</div>

	<!--warning-box-->

  </div>
  <!--div class="profile">
  	<div id="short-desc">
		is an extended family of related typefaces designed by Charles Bigelow and Kris Holmes in 1985. The family are intended to be extremely legible when printed at small size or displayed on a low-resolution display - hence the name, from 'lucid' (clear or easy to understand). is an extended family of related typefaces designed by Charles Bigelow and Kris Holmes in 1985. The family are intended to be extremely legible when printed at small size or displayed on a low-resolution display - hence the name, from 'lucid' (clear or easy to understand). is an extended family of related typefaces designed by Charles Bigelow and Kris Holmes in 1985. The family are intended to be extremely legible when printed at small size or displayed on a low-resolution display - hence the name, from 'lucid' (clear or easy to understand).
	</div>
  </div-->

  <div class="content">

	  <div class="content-main">
	  	<!--bagian dinamis-->
	  	<?php
	  	if (!isset($_GET['ref'])) {
	  		require_once('pages/beranda.php');
	  	}else{
	  		$info_framework="<fieldset><h3 class='alert alert-danger' role='alert'>Helo, situs ini dibangun murni tanpa menggunakan <i>framework</i> apapun.</h3>Kunjungi <a href='http://arecaweb.net/' target='_blank'>site developer</a> untuk mempelajari lebih tentang ilmu <i>coding</i>.</fieldset>";

	  		switch ($_GET['ref']) {
	  			case 'sambungan-baru':
	  				require_once('pages/sambungan-baru.php');
	  				break;
	  			case 'cek-tagihan':
	  				require_once('pages/cek-tagihan.php');
	  				break;
	  			case 'pengaduan-online':
	  				require_once('pages/pengaduan-online.php');
	  				break;
	  			case 'sejarah-singkat':
	  				require_once('pages/sejarah-singkat.php');
	  				break;
	  			case 'visi-misi':
	  				require_once('pages/visi-misi.php');
	  				break;
	  			case 'tentang-pdam':
	  				require_once('pages/tentang-pdam.php');
	  				break;
	  			case 'prosedur-sambungan-baru':
	  				require_once('pages/prosedur-sambungan-baru.php');
	  				break;
	  			case 'prosedur-penyambungan-kembali':
	  				require_once('pages/prosedur-penyambungan-kembali.php');
	  				break;
	  			case 'prosedur-pembuatan-rekening':
	  				require_once('pages/prosedur-pembuatan-rekening.php');
	  				break;
	  			case 'galeri-foto':
	  				require_once('pages/galeri-foto.php');
	  				break;
	  			case 'baca':
	  				require_once('pages/baca-artikel.php');
	  				break;
	  			case 'artikel-berita':
	  				require_once('pages/artikel-berita.php');
	  				break;
	  			case 'artikel-pengumuman':
	  				require_once('pages/artikel-pengumuman.php');
	  				break;
	  			case 'hasil-cari':
	  				require_once('pages/hasil-cari.php');
	  				break;
	  			case 'peta-lokasi':
	  				require_once('pages/peta-lokasi.php');
	  				break;
	  			case 'loket-pembayaran':
	  				require_once('pages/loket-pembayaran.php');
	  				break;
	  			case 'sitemap':
	  				require_once('pages/sitemap.php');
	  				break;
	  			case 'wp-admin':
	  				echo $info_framework;
	  				break;
	  			case 'adminstrator':
	  				echo $info_framework;
	  				break;
	  			case 'admin':
	  				echo $info_framework;
	  				break;
	  			/*case 'xeon':
	  				header('location: xeon/index.php')
	  				break;*/
	  			default:
	  				require_once('pages/beranda.php');
	  				break;
	  		}
	  	}
	  	?>
		<!--bagian dinamis-->
	  </div>

	  <div class="content-side">

	  	<?php if( !isset($_GET['ref']) || $_GET['ref']=='beranda'){ ?>
	  	<div class="video-side klir">
	  		<iframe width="300" height="300" src="https://www.youtube.com/embed/9eHj3DiEkU8" frameborder="0" allowfullscreen></iframe>
	  	</div>
	  	<br/>
	  	<?php } ?>

	    <div class="cari-artikel klir">
	    	<form method="post" action="<?php echo base_url();?>hasil-cari" autocomplete="off">
	    		<input type="text" name="tx_cari" size="26px;" placeholder="Cari berita & pengumuman..." />
	    		<button id="submit-cari" name="submit-cari" type="submit" class="btn btn-primary">
	    			<span class="glyphicon glyphicon-search"></span>
	    		</button>
	    	</form>
	    </div>

	    <div class="side-title klir">Fitur Layanan</div>
	  	<div id="fitur-1 klir">
	  		<div class="fitur-1-logo"><a href="<?php echo base_url();?>sambungan-baru"><img src="assets/download-formulir2.png" title="Formulir sambungan baru bagi pelanggan baru ataupun penambahan meter. Klik di sini untuk mengunduhnya." /><br/><span class="label label-info">Sambungan Baru</span></a></div>
	  		<div class="fitur-1-logo"><a href="<?php echo base_url();?>cek-tagihan"><img src="assets/cek-tagihan2.png" title="Cek tagihan rekening sudah bisa dilakukan secara online. Klik di sini untuk detailnya." /><br/><span class="label label-info">Tunggakan</span></a></div>
	  		<div class="fitur-1-logo"><a href="https://play.google.com/store/apps/details?id=com.kasuariweb.tagihanpdamjayapurapapua" target="_blank"><img src="assets/google-play-badge.png" title="Download aplikasi android untuk melakukan pengecekan tagihan langsung dari ponsel anda." /><br/><span class="label label-info">Aplikasi Android</span></a></div>
	  		<div class="fitur-1-logo"><a href="<?php echo base_url();?>pengaduan-online"><img src="assets/pengaduan-online.jpg" title="Masukkan pengaduan anda pada formulir yang disediakan. Klik di sini." /><br/><span class="label label-info">Pengaduan Pelanggan</span></a></div>
	  		<div class="fitur-1-logo"><a href="<?php echo base_url();?>loket-pembayaran"><img src="assets/loket-pembayaran.png" title="Informasi loket pembayaran internal dan eksternal. Klik di sini." /><br/><span class="label label-info">Loket Pembayaran</span></a></div>
	  	</div>

	  	<?php if( !isset($_GET['ref']) || $_GET['ref']=='beranda'){ ?>
	  	<div class="side-title klir">Video Gallery</div>
	  	<div class="video-bottom klir">
  		 	<!--video width="300" height="240" poster="videos/placeholder.png" controls>
		  	<source src="videos/profile-pdam-jpr.mp4" type="video/mp4">
		  	<source src="videos/profile-pdam-jpr.mp4" type="video/ogg">
		Browser anda tidak support untuk menampilkan video ini
			</video-->

			<iframe width="300" height="300" src="https://www.youtube.com/embed/O9I438skf6c" frameborder="0" allowfullscreen></iframe>

  		</div>
  		<?php } ?>

	  </div>


  </div>
  <div class="footer" id="footer">
  	<div id="peta">
	  	<!--iframe id="peta-frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63772.62841167103!2d140.62198761728425!3d-2.5751270575499343!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x586c2d9e7c999f15!2sPDAM+Jayapura!5e0!3m2!1sen!2sid!4v1490122929376" frameborder="0" style="border:0" allowfullscreen></iframe-->
	  	<iframe id="peta-frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1243.146222130749!2d140.7045752096884!3d-2.5738206980315232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x686c58c40284e8f9%3A0x586c2d9e7c999f15!2sPDAM+Jayapura!5e1!3m2!1sen!2s!4v1490229024599" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	<div class="kontak-bottom">
		<table>
			<tr>
				<td><span class="glyphicon glyphicon-home"></span></td>
				<td>Jl.Baru Kelapa II, Entrop, Jayapura Selatan, Hamadi, Kota Jayapura, Papua 99112</td>
			</tr>
			<tr>
				<td><span class="glyphicon glyphicon-phone-alt"></span></td>
				<td><a href="tel:0967535941" target="_blank">0967 535941</a></td>
			</tr>
			<tr>
				<td><span class="glyphicon glyphicon-globe"></span></td>
				<td><a href="<?php echo base_url();?>">http://pdamjayapura.com</a></td>
			</tr>
			<tr>
				<td><span class="fa fa-facebook-square"></span></td>
				<td><a href="https://facebook.com/pdamjayapura" target="_blank">https://facebook.com/pdamjayapura</a></td>
			</tr>
			<tr>
				<td><span class="fa fa-youtube"></span></td>
				<td><a href="https://www.youtube.com/channel/UCi82C07g7bvjr3ZWkAABNXA/" target="_blank">https://youtube.com/pdamjayapura</a></td>
			</tr>
			<tr>
				<td><span class="glyphicon glyphicon-envelope"></span></td>
				<td><a href="mailto:mail@pdamjayapura.com">mail@pdamjayapura.com</a></td>
			</tr>
		</table>
	</div>

	<!--div class="mitra-group">
		<b>Mitra & Sponsor</b>
		<div class="mitra-logo"><img src="assets/mitra/pos-indo.png" title="POS Indonesia" /></div>
		<div class="mitra-logo"><img src="assets/mitra/bank-papua.jpg" title="Bank Papua" /></div>
		<div class="mitra-logo"><img src="assets/mitra/logo-bni.jpg" title="BNI 46" /></div>
		<div class="mitra-logo"><img src="assets/mitra/usaid.png" title="USAID" /></div>
		<div class="mitra-logo"><img src="assets/mitra/iuwash-1.jpg" title="IUWASH" /></div>
		<div class="mitra-logo"><img src="assets/mitra/akatirta.png" title="AKATIRTA" /></div>
		<div class="mitra-logo"><img src="assets/mitra/prov-papua.jpg" title="Prov. Papua" /></div>
		<div class="mitra-logo"><img src="assets/mitra/kab-jpr.jpeg" title="Kab. Jayapura" /></div>
		<div class="mitra-logo"><img src="assets/mitra/kota-jpr.jpg" title="Kota Jayapura" /></div>
	</div-->
<br/><br/>
<strong>Jumlah Pengunjung</strong>
<br/>
	<!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
	<!-- Histats.com  START  (aync)-->
	<script type="text/javascript">var _Hasync= _Hasync|| [];
	_Hasync.push(['Histats.start', '1,3735831,4,431,112,75,00011111']);
	_Hasync.push(['Histats.fasi', '1']);
	_Hasync.push(['Histats.track_hits', '']);
	(function() {
	var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
	hs.src = ('//s10.histats.com/js15_as.js');
	(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
	})();</script>
	<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?3735831&101" alt="best counter" border="0"></a></noscript>
	<!-- Histats.com  END  -->


	<div class="footer-disclaimer">
		<small>&copy;2017. Hak cipta dilindungi Undang-Undang. <a href="https://arecastudio.github.io/" target="_blank">Areca Studio ~ Papua</a></small>

<!--tadinya di sini ada histats-->

	</div>

  </div>

</div><!--wrapper-->

</body>
</html>
