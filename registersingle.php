
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="registersingle.css">
        <link href="https://fonts.googleapis.com/css?family=Sulphur+Point&display=swap" rel="stylesheet">
<title>Register</title>
<script src='https://www.google.com/recaptcha/api.js'></script>

<?php
		session_start();
		if(isset($_SESSION['error']))
		{
			echo ('<p style="color:red">'.$_SESSION['error'].'</p>');
			unset($_SESSION['error']);
		}
		if(isset($_SESSION['success']))
		{
			echo('<p style="color:green">'.$_SESSION['success'].'</p>');
			unset($_SESSION['success']);
		}
	?>
	</head>
	<body style="background-color:rgb(35, 41, 53);text-align:center" id="mbody">
	   <div class="section">
           <div class="login">
	           <form method="post" action="single.php" class="sgnupform" style="text-align:center">
                    <h2 id="register"><center>Register</center></h2><br>
                    <p id="para">Name</p>
                    <input type="text" name="name" id="name"><br><br>
                    <p id="para">Email</p>
                    <input type="email" name="email" id="email"><br><br>
                    <p id="para">Phone no.</p>
                    <input type="number" name="phone" id="phone"><br><br>
		            <p id="para">Outstation</p>
                    <input type="radio" name="outst" value="1"><p id="para">Yes</p>
			        <input type="radio" name="outst" value="0" checked><p id="para">No</p><br>
                    <div class="text-center">
		              <div class="g-recaptcha" data-sitekey="6LcUks4UAAAAAIL-fzoauiSN0H59bTa6vrmzENm8"></div><br><br>
                    </div>
		              <input type="submit" value = "Submit" name="submit">
	           </form>
         </div>
         <?php
         ?>
        </div>
	       <script src="js/bootstrap.js"></script>
  </body>
</html>