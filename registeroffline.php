
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="login.css">
    <link href="https://fonts.googleapis.com/css?family=Sulphur+Point&display=swap" rel="stylesheet">
</head>
<body style="background-color:rgb(35, 41, 53);text-align:center">

<div class= "section">
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
	<form method="post" action="teamoffline.php">
		<label>Team name </label><input type="text" name="name" ><br>
		<label> Leader name</label><input type="text" name="team"><br>
		<label>Team size</label><input type="number" name="size" min="1" max="2">
		<button name="add" >Enter</button>
	</div>
</p>

</form>
</div>
</body>
</html>