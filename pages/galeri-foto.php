<div class="tengah">
	<h2>Galeri Foto</h2>
</div>

<fieldset>
<!--div class="row">
  <div class="col-xs-6 col-md-3">
    <a href="assets/tirta-dharma-ori.jpg" class="thumbnail" target="_blank">
      <img src="assets/tirta-dharma-ori.jpg" alt="...">
    </a>
  </div>
</div-->

<?php
$files = glob("foto/galeri/03/*.jpg");

echo "<div class=\"img-group\">";

for ($i=0; $i<count($files); $i++) {
    $image = $files[$i];
    //print $image ."<br />";
    //echo '<img src="'.$image .'" alt="Random image" />'."<br /><br />";
    echo "
  <div class=\"img-frame\">
    <a href=\"$image\" class=\"thumbnailx\" target=\"_blank\">
      <img src=\"$image\" alt=\"$image\" />
      <br />
      ".date('F d Y H:i:s',fileatime($image))."
      <br />
    </a>
  </div>
    ";
}

echo "</div>";

?>

</fieldset>