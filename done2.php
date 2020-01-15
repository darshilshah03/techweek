<?php 
    session_start();
    if(isset($_SESSION['error']))
		{
			echo ('<p style="color:red">'.$_SESSION['error'].'</p>');
			unset($_SESSION['error']);
		}
		if(isset($_SESSION['success']))
		{
			echo('<p style="color:green"><center>'.$_SESSION['success'].'</center></p>');
            unset($_SESSION['success']);
        }
    echo(<center>'Your team registration id is '.$_SESSION['teamid']</center>);
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
<body><center>
    <a href="index.php">Go back</a></center>
</body>
