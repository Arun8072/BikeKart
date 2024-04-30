<!DOCTYPE html><!--½ sun¹ mon¹½ Tue²½¹¹ wed½-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Bike collection</title>
 <link rel="icon" type="image/png" href="favicon.ico">
    <!-- Bootstrap CDN commands -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  
      <!-- Compiled and minified materialize CSS CDN commands -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!--materialize CSS icons-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  

<style>
/*enable for testing purpose
*{
box-shadow:1px 0px 3px orange;
}*/
@font-face {
 font-family:Montserrat-Regular;
  src: url('Montserrat-Regular.ttf');
}
@font-face {
 font-family:Montserrat-Bold;
  src: url('Montserrat-Bold.ttf');
}
.card-reveal,p{
 font-family:Montserrat-Regular;
}
.card-title{
 font-family:Montserrat-Bold;
}
video{
width:100%;
}
.flex-container {
  display:flex;
  flex-wrap: no-wrap;
  justify-content: space-evenly | space-around;
  align-items: flex-start;
  align-content: space-around;
  flex-flow: row wrap;
  flex-direction: column;
 }
.rows > .column {
  padding: 0 8px;
}
.rows:after {
  content: "";
  display: table;
  clear: both;
}
/* Create four equal columns that floats next to eachother */
.column {
  float: left;
  width: 25%;
}
/* The Modal (background) */
.modals {
  display: none;
  position: fixed;
  z-index: 3;
  padding-top: 100px;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color:grey;
}
/* Modal Content */
.modals-content {
  position: relative;
  background-color:  #fefefe;
  margin: auto;
  padding: 0;
  width: 95%;
  max-width: 1200px;
}
/* The Close Button */
.close {
  color: white;
  position: absolute;
  top: 10px;
  right: 25px;
  font-size: 35px;
  font-weight: bold;
}
.close:hover,
.close:focus {
  color: #999;
  text-decoration:  none;
  cursor: pointer;
}
/* Hide the slides by default */
.mySlides {
  display: none;
}
/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select:  none;
}
/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}
/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0,0,0,0.1);
}
/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}
/* Caption text */
.caption-container {
  text-align: center;
  background-color: black;
  color: white;
  opacity: 0.6;
}
img.demo {
  opacity: 0.5;
  
}
.active,
.demo:hover {
  opacity: 1;
}
img.hover-shadow {
  transition: 0.3s;
}
.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.rtg{
width:5%;
height:2%;
color:deepskyblue;
border-radius:2px;
}
footer {
  bottom: 0;
  height:10px;
  z-index: -1;
 text-align:center;
 font-size:7px;
line-height:1px;}
</style>
</head>
<body>
<nav class="nav-extended purple">
    <div class="nav-wrapper">
      <a class="brand-logo" style="text-decoration:none; font-size:16px;" > <i class="material-icons">motorcycle</i>Bike Freak'z</a>
      <a href="#menu" data-target="mobile-sidenav" class="sidenav-trigger" style="text-decoration:none;" ><i class="material-icons">menu</i></a>
     </nav>

<!--  -->
<br><video  poster="logo.jpg"  src="video.mp4" loop autoplay>
</video>
<br> <div id="content" class="container flex-container">
<?php 
$c = new  mysqli("localhost", "root","","Bike");

if(isset($_GET['company'])){
$g=$_GET['company'];
$l="where Company like '%$g%' ";
}else{ $l=""; }

$s="Select * from Bikes {$l}";
$t=$c->query($s);

if ($t->num_rows > 0){
  while($r = $t->fetch_assoc()) {
  
echo '<!--flex child--> <div>
  <div class="card card-small">
    <div class="card-image waves-effect waves-block waves-light">
      <img class="mimg img-thumbnail" fld="'.$r["Company"].'" fle="'.$r["Modal"].'" src="'.$r["Company"].'/'.$r["Modal"].'.jpg" onclick="openModal();currentSlide(1);"  class="hover-shadow" >
    </div>
    <div class="card-content">
      <span class="card-title activator grey-text text-darken-4">'.$r["Modal"].'<i class="material-icons right">more_vert</i></span>
 <p> <a href="#">Product Details</a> <span class="rtg">'.$r["Rating"].'<i class="material-icons tiny">star</i> </span> </p>
    </div>
    <div class="card-reveal">
      <span class="card-title grey-text text-darken-4">'.$r["Modal"].'<i class="material-icons right">close</i></span>
      <p>'.$r["Review"].'</p>
      <section>Company: '.$r["Company"].'</section>
       <section>Price: ₹ '.$r["Price"].'</section>
    </div> </div>
   </div> <!--flex child-->';
}}
?>
    
</div><!--container-->

    <!-- The Modal/Lightbox -->
<div id="myModal"  class="modals">
  <span class="close cursor"  onclick="closeModal()">&times;</span>
  
  <div class="modals-content">
   <div  class="mySlides">
      <div  class="numbertext">1 / 4</div>
      <img id="mod1"  src="logo.jpg"  style="width:100%">
    </div>

    <div  class="mySlides">
      <div  class="numbertext">2 / 4</div>
      <img id="mod2" src="logo.jpg"  style="width:100%">
    </div>

    <div  class="mySlides">
      <div  class="numbertext">3 / 4</div>
      <img id="mod3" src="logo.jpg"  style="width:100%">
    </div>

    <div  class="mySlides">
      <div  class="numbertext">4 / 4</div>
      <img id="mod4" src="logo.jpg"  style="width:100%">
    </div>
    

<!-- Thumbnail image controls -->
 <div class="row" style="margin-top:10px;">
    <div class="col">
      <img id="thm1" class="demo" src="logo.jpg"  onclick="currentSlide(1)" alt="Modern" style="width:50px;height:40px;">
    </div>
    <div  class="col">
      <img id="thm2" class="demo"  src="logo.jpg"  onclick="currentSlide(2)" alt="Elegant" style="width:50px; height:40px;">
    </div>
    <div  class="col">
      <img id="thm3" class="demo"  src="logo.jpg"  onclick="currentSlide(3)" alt="Dodger" style="width:50px; height:40px;">
    </div>
    <div class="col">
      <img id="thm4" class="demo"  src="logo.jpg"  onclick="currentSlide(4)" alt="Classic" style="width:50px; height:40px;">
    </div>
 </div> <!--row-->
    <!-- Next/previous controls -->
    <a class="prev text-white"  onclick="plusSlides(-1)">&#10094;</a>
    <a class="next text-white"  onclick="plusSlides(1)">&#10095;</a>

    <!-- Caption text -->
    <div  class="caption-container">
      <p id="caption"></p>
    </div>
       
  </div> <!-- modal-content -->
 
</div><!-- modal -->

    <ul id="nav-mobile" class="right hide-on-med-and-down navbar-fixed">
       <div class="user-view text-white">
      <div class="background">
        <img src="images/imgt.jpg">
      </div>
  <h5>About</h5>
   <h6>The World's Largest Collection</h6><h6>Of Bikes In Single Site</h6><br>
 </div>

 <form action="index.php" method="GET">
<ul class="collection "> <li class="collection-header"><h5>Companies</h5></li>
  <?php
 $s="select distinct Company from Bikes ";
$t=$c->query($s);

if ($t->num_rows > 0){
  while($r = $t->fetch_assoc()) {
  echo '<button name="company" class="collection-item form-control-plaintext waves-effect" type="submit"  value="'.$r['Company'].'"><span class="left">'.$r['Company'].'</span><i class="material-icons secondary-content">send</i></button>';
}}

?>
  </ul></form>
      </ul><!-- navbar-fixed-->
    
<!--  sidenav-->
 <ul class="sidenav" id="mobile-sidenav">
    <div class="user-view text-white">
      <div class="background">
        <img src="logo.jpg">
      </div>
  <h5>About</h5>
   <h6>The World's Largest Collection</h6><h6> Of Bikes In Single Site</h6><br>
 </div>

 <form action="index.php" method="GET">
<ul class="collection "> <li class="collection-header"><h5>Companies</h5></li>
  <?php
 $s="select distinct Company from Bikes ";
$t=$c->query($s);

if ($t->num_rows > 0){
  while($r = $t->fetch_assoc()) {
  echo '<button name="company" class="collection-item form-control-plaintext waves-effect" type="submit"  value="'.$r['Company'].'"><span class="left">'.$r['Company'].'</span><i class="material-icons secondary-content">send</i></button>';
}}

/*$sql = "INSERT INTO Bikes (Modal,Company,Review,Price)VALUES ('Apache 125','Tvs','It is a stylish bike with attractive look on good mileage...','170000') ";
for($i=0;$i<15;$i++){
$c->query($sql);
}*/
  
$c->close();
?>
  </ul></form>
  </ul>

<!--  -->
      
      
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 
<script>
// Open the Modal
function openModal() {
 $("video").hide();
document.getElementById('myModal').style.display = "block";
}

// Close the Modal
function closeModal() {
  $("video").show(); 
document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function  currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display  = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML  = dots[slideIndex-1].alt;
}

$(document).ready(function(){

$(".mimg").click(function(){
var adr= $(this).attr("fld")+"/"+$(this).attr("fle")+" 1"+".jpg";
$("#mod1,#thm1").attr("src",adr);
var adr= $(this).attr("fld")+"/"+$(this).attr("fle")+" 2"+".jpg";
$("#mod2,#thm2").attr("src",adr);
var adr= $(this).attr("fld")+"/"+$(this).attr("fle")+" 3"+".jpg";
$("#mod3,#thm3").attr("src",adr);
var adr= $(this).attr("fld")+"/"+$(this).attr("fle")+" 4"+".jpg";
$("#mod4,#thm4").attr("src",adr);

});//clk
});//doc
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
 <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  
      <script src="js/bootstrap.min.js"></script>
 
  <!--side nav activation-->
 <script> document.addEventListener('DOMContentLoaded', function() {
M.AutoInit();
  });
</script>
 
</body>
<footer><p>developed by</p><p>doetdd yyghhg ghfhf yukkki</p> </footer>
</html>
