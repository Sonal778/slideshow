<?php

//extracting json from wp-json api
$url1='https://moodloging.firebaseio.com/newsrush/title.json';
$url2='https://moodloging.firebaseio.com/newsrush/image.json';
// using file() function to get content
$lines_array1=file($url1);
$lines_array2=file($url2);
// turn array into one variable
$lines_string1=implode('',$lines_array1);
$lines_string2=implode('',$lines_array2);
//output, you can also save it locally on the server

// array conversion of json
$someArray1 = json_decode($lines_string1, true);
$someArray2 = json_decode($lines_string2, true);
$newpost = 1;

    foreach ($someArray1 as $key => $value) {
    $title1  = $someArray1['title1'];
    $title2  = $someArray1['title2'];
    $title3  = $someArray1['title3'];
    $title4  = $someArray1['title4'];
    $title5  = $someArray1['title5'];
    $image1  = $someArray2['image1'];
    $image2  = $someArray2['image2'];
    $image3  = $someArray2['image3'];
    $image4  = $someArray2['image4'];
    $image5  = $someArray2['image5'];
    $newpost = $newpost+1;
    } 

?>
<html>
<head>
<script src="https://thunkable.github.io/webviewer-extension/thunkableWebviewerExtension.js" type="text/javascript"></script>
<style>
 * {box-sizing: border-box;}
body {font-family: Verdana, sans-serif;}
.mySlides {display: none;}
img {vertical-align: middle;}

.slideshow-container {
  position: relative;
  margin: auto;
}

.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: left;
}



.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 100%;
  border-radius: 5px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

img {
  border-radius: 5px 5px 5px 5px;
  height: 250px;
  max-height: 250px;
  object-fit:cover;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
  .img  {max-height: 250px}
}
</style>
</head> 
<body>
<div class="slideshow-container"> 
<div class="mySlides fade"> 
<div class="card" onclick="myFunction()">   
<img src=<?php echo $image1;?> style="width:100%">   <div class="text"><?php echo $title1;?></div> 
</div> </div>  
<div class="mySlides fade"> 
<div class="card" onclick="myFunction()">   
<img src=<?php echo $image2;?> style="width:100%" "height:250px">   
<div class="text"><?php echo $title2;?></div> 
</div> </div>  </div> 
<br>  <div style="text-align:center">   
<span class="dot"></span>    
<span class="dot"></span>  
</div> 

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000);

}

function myFunction() {
  document.getElementsByClassName("card");
  ThunkableWebviewerExtension.postMessage("" +slideIndex);
  }
</script>
</body>
</html>
