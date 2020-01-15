<?php 
	session_start();
	if(isset($_POST['name'] )&& isset($_POST['size']) && isset($_POST['team']))
	{
		if(strlen($_POST['name'])<1)
		{
			$_SESSION['error'] = "Name should not be empty";
			header("Location: registerinfoquiz.php");
			return;
		}
		if(strlen($_POST['size'])<1)
		{
			$_SESSION['error'] = "Enter team size";
			header("Location: registerinfoquiz.php");
			return;
		}
	}	
		// if(strlen($_POST['member1'])<1)
		// {
		// 	$_SESSION['error'] = "Atleast one member required";
		// 	header("Location: Registertechweek.hackathon.php");
		// 	return;
		// }
		if(isset($_POST['submit2']))
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
				header("Location: registerinfoquiz.php");
				return;
			}
		}
	if(isset($_POST['memberid1'])){
		$host = "ec2-107-21-97-5.compute-1.amazonaws.com";
		$user = "gkvlhoyrdlrvgl";
		$pass = "678246517d80ae2358cb9e29cf351e4244805f23a5ab8b9ad69ecbc44abb59f9";
		$dbname = "db2jj1e9e0ghq6";
		$port = 5432; 
		$con = "pgsql:host=".$host.";port=".$port.";dbname=".$dbname;
		$pdo = new PDO($con,$user,$pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo->prepare("SELECT * FROM techweek.participant WHERE id = :i ");
		$stmt->execute(array(':i' => $_POST['memberid1']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row===false)
		{
			$_SESSION['error'] = "Invalid member id";
			header("Location:registerinfoquiz.php");
			return;
		}
		$stmt = $pdo->prepare("SELECT * FROM techweek.informalquiz WHERE id = :i ");
		$stmt->execute(array(':i' => $_POST['memberid1']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row!==false)
		{
			$_SESSION['error'] = "Already registered";
			header("Location:registerinfoquiz.php");
			return;
		}

        $stmt = $pdo->query("SELECT * FROM techweek.informalquiz ORDER BY infoquiz_team_id DESC LIMIT 1");
		$user = $stmt->fetch();
		$id = $user['infoquiz_team_id'] +1;
		$stmt = $pdo->prepare("INSERT INTO techweek.informalquiz (team_name,id1,leader_name,infoquiz_team_id) VALUES(:nam,:m1,:lead,:id)");
		$stmt->execute(array(
			':nam' => $_POST['name'],
			':m1' => $_POST['memberid1'],
            ':lead' => $_POST['team'],
            ':id' => $id
		));
		if(strlen($_POST['memberid2'])>1)
		{
			$stmt->execute(array(':i' => $_POST['memberid2']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row===false)
		{
			$_SESSION['error'] = "Invalid member id";
			header("Location:registerinfoquiz.php");
			return;
		}
		$stmt = $pdo->prepare("SELECT * FROM techweek.informalquiz WHERE id = :i ");
		$stmt->execute(array(':i' => $_POST['memberid2']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row!==false)
		{
			$_SESSION['error'] = "Already registered";
			header("Location:registerinfoquiz.php");
			return;
		}

			$stmt = $pdo->prepare("UPDATE techweek.informalquiz set id2 = :m2 where team_name = :nam AND id1 = :m1");
			$stmt->execute(array(':m2' => $_POST['memberid2'],
								':nam' =>$_POST['name'],
								':m1' => $_POST['memberid1']
		));
		}
		if(strlen($_POST['memberid3'])>1)
		{
			$stmt->execute(array(':i' => $_POST['memberid3']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row===false)
		{
			$_SESSION['error'] = "Invalid member id";
			header("Location:registerinfoquiz.php");
			return;
		}
		$stmt = $pdo->prepare("SELECT * FROM techweek.informalquiz WHERE id = :i ");
		$stmt->execute(array(':i' => $_POST['memberid3']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row!==false)
		{
			$_SESSION['error'] = "Already registered";
			header("Location:registerinfoquiz.php");
			return;
		}

			$stmt = $pdo->prepare("UPDATE techweek.informalquiz set id3 = :m3 where team_name = :nam AND id1 = :m1");
			$stmt->execute(array(':m3' => $_POST['memberid3'],
								 ':nam' =>$_POST['name'],
								':m1' => $_POST['memberid1']));
		}
        $_SESSION['success'] = "Registration successful";
        $_SESSION['teamid'] = $id;
		header("Location: done2.php");
		return;
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register </title>
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<link rel="stylesheet" type="text/css" href="login.css">
    <link href="https://fonts.googleapis.com/css?family=Sulphur+Point&display=swap" rel="stylesheet">
</head>
<body style="background-color:rgb(35, 41, 53);text-align:center">
<p>
	<div class="login">
	<form method="post" action="teaminfoquiz.php">
		<label>Team name</label> <input type="text" name="name" value= <?= htmlentities($_POST['name']) ?>disabled ><br>
		<label> Leader name</label><input type="text" name="team" value= <?= htmlentities($_POST['team']) ?> disabled><br>
		<label>Team size</label> <input type="number" name="size" min="1" max="4" value=<?= htmlentities($_POST['size']) ?> disabled><br>
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
</p>
</body>
</html>