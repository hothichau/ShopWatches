<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none;}
</style>
</head>

<body>

<div class="w3-content w3-section" style="max-width:500px; padding-top: 5px;">
  <img class="mySlides" src="https://www.w3schools.com/w3css/img_la.jpg" style="width:100%">
  <img class="mySlides" src="https://www.w3schools.com/w3css/img_ny.jpg" style="width:100%">
  <img class="mySlides" src="https://www.w3schools.com/w3css/img_la.jpg" style="width:100%">
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

</body>
</html>
