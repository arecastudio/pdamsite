<?php
ob_start();
require_once('../pages/inc.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Config Page - PDAM Jayapura</title>
  	<meta charset="utf-8">
  	<meta http-equiv="content-Type" content="text/html; charset=utf-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1">

  	<base href="<?php echo base_url();?>xeon"/><!--berfungsi menjaga css dll tetap loading sesuai direktori ketika redirect via .htaccess -->

  	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	<script src="//cloud.tinymce.com/stable/tinymce.min.js?apiKey=t0x3c5wirr6k0xp9rqzn19b8f2g98929c87tnq7959sjr8o9"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  	<link rel="stylesheet" type="text/css" href="css/style2.css">

  	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<?php
if(!isset($_SESSION['user_name']) || $_SESSION['user_name']==''){
?>
<div class="wrapper-lg">
	<div>
		<form method="post" action="" autocomplete="off">
			<div class="lg-head">Masuk Config</div>
			<div><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp;<input type="text" name="user_text" placeholder="Nama user" class="jarak-2" /></div>				
			<div><span class="glyphicon glyphicon-eye-close"></span>&nbsp;&nbsp;&nbsp;<input type="password" name="pass_text" placeholder="Password" class="jarak-2" /></div>		
			<div class="g-recaptcha margin-1 jarak-2" data-sitekey="6LedYhoUAAAAABA2WTAmZWCnUuH4PvicfJIouDsP" data-theme="dark" ></div>
			<div>
				<input type="submit" name="submit_config" value="Masuk" class="btn btn-primary jarak-2" />
				<a href="<?php echo base_url();?>" class="btn btn-warning">Batal</a>
				<br/>
				<br/>
			</div>			
		</form>
	</div>	
</div>
<?php

if (isset($_POST['submit_config']) && $_POST['g-recaptcha-response']!='') {	
	/*$secret = '6LedYhoUAAAAAPNCSaiEPWgwD7YOlmSwkpZTGyw_';
	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
	$responseData = json_decode($verifyResponse);*/
	#if($responseData->success){
	if(1>0){
		$conn=new mysqli(HOST,USER,PASS,DB);
		if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
		$cu=$conn->escape_string($_POST['user_text']);
		$cp=$conn->escape_string($_POST['pass_text']);
		$cp=md5($cp);
		#echo $cu."<br/>".$cp."<br/>";
		$sql1="SELECT nama, email, role, tgl FROM users WHERE id=? AND pass=? ORDER BY tgl ASC LIMIT 1;";
		$stmt=$conn->prepare($sql1);
		$stmt->bind_param('ss',$cu,$cp);
		$stmt->execute();
		$logs=$stmt->get_result();
		if($row=$logs->fetch_row()) {
			$_SESSION['user_name']=$cu;
          	header('location: '.base_url_cfg2());
		}else{
			#passowrd dan user tra valid
			echo "
	  	<div id=\"warning-box\" class=\"alert alert-danger alert-dismissible\" role=\"alert\">
			<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
			<span class=\"\">
			Bah, lupa password kah?
			</span>
		</div>
		";
			#passowrd dan user tra valid
		}
		$stmt->close();
		$conn->close();
	}

}

}else{
?>
<div class="wrapper">
	<div class="header">
		<nav class="navbar navbar-inverse">
			<div class="container-fluid">
				
				<!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="<?php echo base_url_cfg2();?>">Config Page</a>
			    </div>

				<!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li id="beranda"><a href="<?php echo base_url_cfg2();?>"><span class="glyphicon glyphicon-home"></span> Beranda</a></li>
			        <li id="artikel"><a href="<?php echo base_url_cfg2();?>artikel"><span class="glyphicon glyphicon-file"></span> Artikel</a></li>
			        <li id="galeri"><a href="<?php echo base_url_cfg2();?>galeri"><span class="glyphicon glyphicon-picture"></span> Galeri</a></li>
			        <li id="video"><a href="<?php echo base_url_cfg2();?>video"><span class="glyphicon glyphicon-film"></span> Video</a></li>
			        <li id="warning"><a href="<?php echo base_url_cfg2();?>warning"><span class="glyphicon glyphicon-exclamation-sign"></span> Warning Box</a></li>
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			        <li><a href="<?php echo base_url();?>" target="_blank"><span class="glyphicon glyphicon-new-window"></span> Lihat Situs</a></li>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> Admin <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <li><a href="<?php echo base_url_cfg2();?>keluar"><span class=" glyphicon glyphicon-off"></span> Keluar</a></li>
			            <!--li><a href="#">Another action</a></li>
			            <li><a href="#">Something else here</a></li>
			            <li role="separator" class="divider"></li>
			            <li><a href="#">Separated link</a></li-->
			          </ul>
			        </li>
			      </ul>
			    </div><!-- /.navbar-collapse -->

			</div>
		</nav>
	</div>
	<div class="content">

		<div class="content-side">
			
		</div>

		<div class="content-main">
			<div class="content-main-sub">
				<?php
			  	if (!isset($_GET['cfg'])) {
			  		require_once('../pages/config/beranda.php');			  		
			  	}else{
			  		switch ($_GET['cfg']) {
			  			case 'artikel':
			  				require_once('../pages/config/artikel.php');
			  				break;
			  			case 'artikel-tambah':
			  				require_once('../pages/config/artikel-tambah.php');
			  				break;
			  			case 'artikel-del':
			  				require_once('../pages/config/artikel-hapus.php');
			  				break;
			  			case 'artikel-mod':
			  				require_once('../pages/config/artikel-ubah.php');
			  				break;
			  			case 'galeri':
			  				require_once('../pages/config/galeri.php');
			  				break;
			  			case 'video':
			  				require_once('../pages/config/video.php');
			  				break;
			  			case 'warning':
			  				require_once('../pages/config/warning.php');
			  				break;
			  			case 'keluar':
			  				$_SESSION['user_name']='';
							session_destroy();
							header('location: '.base_url_cfg2());
			  				break;
			  			default:
			  				require_once('../pages/config/beranda.php');
			  				break;
			  		}
			  	}
			  	?>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="footer-disclaimer">
		<small>&copy;2017. Hak cipta dilindungi Undang-Undang. <a href="https://arecastudio.github.io/" target="_blank">Areca Studio ~ Papua</a></small>
	</div>
	</div>
</div>
<?php
}
?>
</body>
</html>
<?php
ob_end_flush();
?>
