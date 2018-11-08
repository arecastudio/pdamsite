<?php
require_once('inc.php');
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="UTF-8" ?>';
?>

<urlset xmlns="http://www.google.com/schemas/sitemap/0.84" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.google.com/schemas/sitemap/0.84 http://www.google.com/schemas/sitemap/0.84/sitemap.xsd">

    <url>
        <loc><?php echo base_url();?></loc>
        <priority>1.00</priority>
    </url>

    <url>
        <loc><?php echo base_url();?>cek-tagihan</loc>
        <changefreq>monthly</changefreq>
        <priority>0.5</priority>
    </url>

    <?php
		$conn=new mysqli(HOST,USER,PASS,DB);
		if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
		$is_publish=1;$url="";
		$sql="SELECT url_friendly FROM artikel WHERE is_publish=? ORDER BY tgl DESC;";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('i',$is_publish);
		$stmt->execute();
		$artikel=$stmt->get_result();

		while ($row=$artikel->fetch_row()) {
			$url=base_url()."baca/".$row[0];
			?>
			<url>
				<loc><?php echo $url;?></loc>
				<changefreq>monthly</changefreq>
				<priority>0.5</priority>
			</url>
			<?php
		}
		$stmt->close();
		$conn->close();
    ?>

</urlset>