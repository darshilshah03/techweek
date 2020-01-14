<?php 
    session_start();
    echo('Your registration id is '.$_SESSION['id']);
    unset($_SESSION['id']);
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="login.css">
    <link href="https://fonts.googleapis.com/css?family=Sulphur+Point&display=swap" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
    <a href="index.php">Go back</a>
</body>