<?php 
	session_start();
	if(isset($_POST['name'] )&& isset($_POST['id']) )
	{
		if(strlen($_POST['name'])<1)
		{
			$_SESSION['error'] = "Name should not be empty";
			header("Location: registerblackflag.php");
			return;
		}
	}	
		// if(strlen($_POST['member1'])<1)
		// {
		// 	$_SESSION['error'] = "Atleast one member required";
		// 	header("Location: Registertechweek.hackathon.php");
		// 	return;
		// }
		if(isset($_POST['submit']))
		{
		function CheckCaptcha($userResponse) {
				$fields_string = '';
				$fields = array(
					'secret' => '6Ledks4UAAAAABBkiWHTAUlR60CJsGTB67x0V0CO',
					'response' => $userResponse
				);
				foreach($fields as $key=>$value)
				$fields_string .= $key . '=' . $value . '&';
				$fields_string = rtrim($fields_string, '&');
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, 'https://www.google.com/recaptcha/api/siteverify');
				curl_setopt($ch, CURLOPT_POST, count($fields));
				curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, True);
				$res = curl_exec($ch);
				curl_close($ch);
				return json_decode($res, true);
			}
			// Call the function CheckCaptcha
			$result = CheckCaptcha($_POST['g-recaptcha-response']);
			if ($result['success']) {
				//If the user has checked the Captcha box
				//echo("Verified");
				
			
			} else {
				// If the CAPTCHA box wasn't checked
				header("Location: registerblackflag.php");
				return;
			}
		}
	if(isset($_POST['id'])){
		$host = "ec2-107-21-97-5.compute-1.amazonaws.com";
		$user = "gkvlhoyrdlrvgl";
		$pass = "678246517d80ae2358cb9e29cf351e4244805f23a5ab8b9ad69ecbc44abb59f9";
		$dbname = "db2jj1e9e0ghq6";
		$port = 5432; 
		$con = "pgsql:host=".$host.";port=".$port.";dbname=".$dbname;
		$pdo = new PDO($con,$user,$pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo->prepare("SELECT * FROM techweek.participant WHERE id = :i ");
		$stmt->execute(array(':i' => $_POST['id']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row===false)
		{
			$_SESSION['error'] = "Invalid member id or User not Registered";
			header("Location:registerblackflag.php");
			return;
		}
		$stmt = $pdo->prepare("SELECT * FROM techweek.blackflag WHERE id1 = :i ");
		$stmt->execute(array(':i' => $_POST['id']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row!==false)
		{
			$_SESSION['error'] = "Already registered";
			header("Location:registerblackflag.php");
			return;
		}

        // $stmt = $pdo->query("SELECT * FROM techweek.blackflag ORDER BY blackflag_team_id DESC LIMIT 1");
		// $user = $stmt->fetch();
		// $id = $user['blackflag_team_id'] +1;
		$stmt = $pdo->prepare("INSERT INTO techweek.blackflag (leader_name,id1) VALUES(:nam,:m1)");
		$stmt->execute(array(
			':nam' => $_POST['name'],
<<<<<<< HEAD
			':m1' => $_POST['id']
		));
		
=======
			':m1' => $_POST['memberid1'],
            ':lead' => $_POST['team'],
            ':id' => $id
		));
		if(strlen($_POST['memberid2'])>1)
		{
			$stmt = $pdo->prepare("SELECT * FROM techweek.participant WHERE id = :i ");
		$stmt->execute(array(':i' => $_POST['memberid2']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row===false)
		{
			$_SESSION['error'] = "Invalid member id or User not Registered";
			header("Location:registerblackflag.php");
			return;
		}
		$stmt = $pdo->prepare("SELECT * FROM techweek.blackflag WHERE id1 = :i  or id2=:i or id3 = :i ");
		$stmt->execute(array(':i' => $_POST['memberid2']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row!==false)
		{
			$_SESSION['error'] = "Already registered";
			header("Location:registerblackflag.php");
			return;
		}

			$stmt = $pdo->prepare("UPDATE techweek.blackflag set id2 = :m2 where team_name = :nam AND id1 = :m1");
			$stmt->execute(array(':m2' => $_POST['memberid2'],
								':nam' =>$_POST['name'],
								':m1' => $_POST['memberid1']
		));
		}
		if(strlen($_POST['memberid3'])>1)
		{
			$stmt = $pdo->prepare("SELECT * FROM techweek.participant WHERE id = :i ");
		$stmt->execute(array(':i' => $_POST['memberid3']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row===false)
		{
			$_SESSION['error'] = "Invalid member id or User not Registered";
			header("Location:registerblackflag.php");
			return;
		}
		$stmt = $pdo->prepare("SELECT * FROM techweek.blackflag WHERE id1 = :i or id2=:i or id3 = :i ");
		$stmt->execute(array(':i' => $_POST['memberid3']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row!==false)
		{
			$_SESSION['error'] = "Already registered";
			header("Location:registerblackflag.php");
			return;
		}

			$stmt = $pdo->prepare("UPDATE techweek.blackflag set id3 = :m3 where team_name = :nam AND id1 = :m1");
			$stmt->execute(array(':m3' => $_POST['memberid3'],
								 ':nam' =>$_POST['name'],
								':m1' => $_POST['memberid1']));
		}
>>>>>>> 51033ccf636d84077f02fc20b11de3d0cdbf7a7d
        $_SESSION['success'] = "Registration successful";
        $_SESSION['id'] = $_POST['id'];
		header("Location: done.php");
		return;
	}
?>
<<<<<<< HEAD
=======
<!DOCTYPE html>
<html>
<head>
	<title>Register </title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <script src="js/bootstrap.js"></script>
	<link rel="stylesheet" type="text/css" href="registerteam.css">
    <link href="https://fonts.googleapis.com/css?family=Sulphur+Point&display=swap" rel="stylesheet">
    
</head>
<body style="background-color:rgb(35, 41, 53);text-align:center" id="mbody">
<p>
    <div class="section">
	<div class="login">
	<form method="post" action="teamblackflag.php">
		<p id="para">Team name</p> <input type="text" name="name" id="name" value= <?= htmlentities($_POST['name']) ?> ><br>
		<p id="para">Leader name</p><input type="text" name="team" id="name" value= <?= htmlentities($_POST['team']) ?> ><br>
		<p id="para">Team size</p> <input type="number" name="size" id="name" min="1" max="4" value=<?= htmlentities($_POST['size']) ?> ><br>
		<?php 
		$size = $_POST['size'];
		echo('<p>');
		for($i=1;$i<=$size;$i++){
			echo('Member '.$i.' id : <input type="text" name="memberid'.$i.'" ><br>');
		}
		echo('</p>');
		?><br><br>
		<div class="g-recaptcha" data-sitekey="6Ledks4UAAAAAPzLeTPcEismbJmGTiSng_GUB6Sy"></div>
		<br><br><input type="submit" value = "Submit" name='submit2' >
	</form>
	</div>
    </div>    
</p>
</body>
</html>
>>>>>>> 51033ccf636d84077f02fc20b11de3d0cdbf7a7d
