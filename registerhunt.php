
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<meta charset="utf-8">   
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	        <link rel="stylesheet" type="text/css" href="registerteam.css">    <link href="https://fonts.googleapis.com/css?family=Sulphur+Point&display=swap" rel="stylesheet">
</head>
<body style="background-color:rgb(35, 41, 53);text-align:center" id="mbody">

<div class= "section">
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
	<form method="post" action="teamhunt.php" name="regform">
	<h1 id="register">Register</h1><br>
		<p id="para">Team name </p><input type="text" name="team" id="name" ><br><br>
		<p id="para"> Leader name</p><input type="text" name="team" id="name"><br><br>
		<p id ="para">Team size</p><input type="number" name="size" min="1" max="5" id ="name"><br><br>
		<input type="submit" value = "Submit" name="submit">
	</div>
</p>

</form>
</div>
</body>
<script src="js/bootstrap.js"></script>
</html>