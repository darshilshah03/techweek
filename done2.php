<?php 
    session_start();
    if(isset($_SESSION['error']))
		{
            echo '<body style="background-color:#E3E2DF">';
			echo ('<p style="color:red">'.$_SESSION['error'].'</p>');
			unset($_SESSION['error']);
		}
		if(isset($_SESSION['success']))
		{
            echo '<body style="background-color:#E3E2DF">';
			echo('<p style="color:green">'.$_SESSION['success'].'</p>');
            unset($_SESSION['success']);
        }
    echo('<p align="center"> Your team registration id is '.$_SESSION['teamid']'</p>');
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
<br><br><b><br><br><br><br><br><br><br>
    <a href="index.php">Go back</a></center>
</body>
</html>
