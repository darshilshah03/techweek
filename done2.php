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
    echo('Your team registration id is '.$_SESSION['teamid']);
    unset($_SESSION['teamid']);
?>
<html>
<head>
<p style="text-align: center;">
<link rel="stylesheet" type="text/css" href="login.css">
    <link href="https://fonts.googleapis.com/css?family=Sulphur+Point&display=swap" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</p>
</head>
<body bgcolor="E8A87C"><center>
    <a href="index.php">Go back</a></center>
</body>
