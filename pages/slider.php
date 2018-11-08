<?php
#slider.php
?>
<div class="sudut-bulat-border">

<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <center><img class="sudut-bulat" src="foto/slider/1.png" alt="Chania" width="100%" height="300px"/></center>
    </div>

    <div class="item">
      <center><img src="foto/slider/2.jpg" alt="Chania" width="100%" height="300px"></center>
    </div>

    <div class="item">
      <center><img src="foto/slider/3.jpg" alt="Flower" width="100%" height="300px"></center>
    </div>

    <div class="item">
      <center><img src="foto/slider/5.png" alt="Flower" width="100%" height="300px"></center>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>