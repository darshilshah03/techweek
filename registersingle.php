
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="login.css">
    <link href="https://fonts.googleapis.com/css?family=Sulphur+Point&display=swap" rel="stylesheet">
<title>Register</title>
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body style="background-color:rgb(35, 41, 53);text-align:center">
	<div class="section">
<h1> Register </h1>
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
<p>
	<div class="login">
	<form method="post" action="single.php">
		<label>Name</label> <br><input type="text" name="name"><br>
		<label>Outstation</label> <br> <input type="radio" name="outst" value="1">Yes<br>
						<input type="radio" name="outst" value="0" checked>No<br>
		<label>Email</label> <br><input type="email" name="email"><br>
		<label>Phone </label><br><input type="number" name="phone" ><br><br>
		<div class="g-recaptcha" data-sitekey="6LcUks4UAAAAAIL-fzoauiSN0H59bTa6vrmzENm8"></div><br><br>
		<input type="submit" value = "Submit" name="submit" >
	
	</form>
	</div>
</p>
	</div>
	<?php
	
    ?>
</body>
</html>