<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> N A V I G A R E
    
  </title>
  <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
  <link href="https://fonts.googleapis.com/css?family=Sulphur+Point&display=swap" rel="stylesheet">
  <meta name="author" content="IEEE - SBM" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <link rel="stylesheet" href="temp/assets/css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
      
  <script src="temp/assets/js/randtext.js"></script>

<script>
$(document).ready(function(){
    $(".button1").click(function(){
      $(".button1").fadeOut(1500);
      $("#login").fadeIn(2000);
      $("#register").fadeIn(2000);
      $("#div1").fadeIn(2000);
      randtext(div1,100);
      setInterval(randtext,4000,div1,100);
    });
});
</script>
<style type="/text/css">
  body , #particles-js 
  {
    width: 100%;
    height: 100%;
    color: #fff;
    background: linear-gradient(-45deg, #000000, #3A3B3A, #0D1B5C, #020933);
    background-size: 400% 400%;
    -webkit-animation: Gradient 15s ease infinite;
    -moz-animation: Gradient 15s ease infinite;
    animation: Gradient 15s ease infinite;
    z-index: 10;
  }

  figure 
  {
    vertical-align: bottom;
    align: center
    display: inline;
    text-align: bottom;
    //width: 5px;
    border: 0px dotted gray;
    margin: 0px; /* adjust as needed */
  }
  
  figure img 
  {
    vertical-align: bottom;
  }
  
  figure figcaption 
  {
    vertical-align: middle;
    text-align: center;
    border: 0px dotted blue;
    font-size: 30px;
    font-family: sans-serif;
  }

  footer 
  {
    background: #444444;
    height: 200px;
    font-family: 'Open Sans', sans-serif;
    color: #FFFFFF;
    padding: 200px;
  }

  .pic 
  {
    float: bottom;
  }
  
  .fix
  {
    position:fixed;
    bottom:5px;
    left:29%;
   }

@-webkit-keyframes Gradient {
  0% {
    background-position: 0% 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0% 50%
  }
}

@-moz-keyframes Gradient {
  0% {
    background-position: 0% 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0% 50%
  }
}

@keyframes Gradient {
  0% {
    background-position: 0% 50%
  }
  50% {
    background-position: 100% 50%
  }
  100% {
    background-position: 0% 50%
  }
}
</style>

</head>
<body>

  
<!-- particles.js container -->
<div style="position: relative;" id="particles-js">
  <!-- <figure>
    <a href="http://t.me/Navigarebot" target="_blank">
      <img alt="Naomi" src="temp/Tele_logo.png"
      width="150" height="170" align="bottom" class="fix">
      
   </a>
  </figure> -->
  
  <button class="button button1" id="Enter"></button>
  <script type="text/javascript">
    randtext(Enter,100);
    setInterval(randtext,4000,Enter,100);
  </script>
  <div id="div1">
    
  </div>
<div id="div5">
  <p><br>
    
  </p>
</div>
  
  <a href="https://techweekapp1.herokuapp.com/registersingle.php"><button class="button" id="login">User Registration</button></a>
  
  <a href="https://techweekapp1.herokuapp.com/event.html"><button class="button"  id="register">Event Registration</button></a>

  <div class="footer"  style="position: absolute; left: 50% ; top: 90%; transform: translate(-50%,0);   display: block; color: white; z-index: 1;"><font size="+2"><a href="https://t.me/Navigarebot" target="_blank"><br>Talk to <b>Naomi</b> (Telegram)</a></font><br><center>By IEEE</center></div>

</div>
  



<!-- scripts -->
<script src="temp/assets/js/particles.min.js"></script>
<script src="temp/assets/js/app.js"></script>

</body>
</html>