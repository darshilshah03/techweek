<?php 
	session_start();
	if(isset($_POST['name'] )&& isset($_POST['size']) && isset($_POST['team']))
	{
		if(strlen($_POST['name'])<1)
		{
			$_SESSION['error'] = "Name should not be empty";
			header("Location: registerhunt.php");
			return;
		}
		if(strlen($_POST['size'])<1)
		{
			$_SESSION['error'] = "Enter team size";
			header("Location: registerhunt.php");
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
				echo("Verified");
				
			
			} else {
				// If the CAPTCHA box wasn't checked
				header("Location: registerhunt.php");
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
			header("Location:registerhunt.php");
			return;
		}$stmt = $pdo->prepare("SELECT * FROM techweek.treasurehunt WHERE id1 = :i  or id2 = :i or id3 = :i or id4 = :i or id5 = :i ");
		$stmt->execute(array(':i' => $_POST['memberid1']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row!==false)
		{
			$_SESSION['error'] = "Already registered";
			header("Location:registerhunt.php");
			return;
		}

		$stmt = $pdo->query("SELECT * FROM techweek.treasurehunt ORDER BY treasurehunt_team_id DESC LIMIT 1");
		$user = $stmt->fetch();
		$id = $user['treasurehunt_team_id'] +1;
		$stmt = $pdo->prepare("INSERT INTO techweek.treasurehunt (team_name,id1,leader_name,treasurehunt_team_id) VALUES(:nam,:m1,:lead,:i)");
		$stmt->execute(array(
			':nam' => $_POST['name'],
			':m1' => $_POST['memberid1'],
			':lead' => $_POST['team'],
			':i'=> $id
		));
		if(strlen($_POST['memberid2'])>1)
		{
			$stmt = $pdo->prepare("SELECT * FROM techweek.participant WHERE id = :i ");
			$stmt->execute(array(':i' => $_POST['memberid12']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row===false)
		{
			$_SESSION['error'] = "Invalid member id";
			header("Location:registerhunt.php");
			return;
		}
		$stmt = $pdo->prepare("SELECT * FROM techweek.treasurehunt WHERE id1 = :i  or id2 = :i or id3 = :i or id4 = :i or id5 = :i ");
		$stmt->execute(array(':i' => $_POST['memberid2']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row!==false)
		{
			$_SESSION['error'] = "Already registered";
			header("Location:registerhunt.php");
			return;
		}

			$stmt = $pdo->prepare("UPDATE techweek.treasurehunt set id2 = :m2 where team_name = :nam AND id1 = :m1");
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
			$_SESSION['error'] = "Invalid member id";
			header("Location:registerhunt.php");
			return;
		}
		$stmt = $pdo->prepare("SELECT * FROM techweek.treasurehunt WHERE id1 = :i  or id2 = :i or id3 = :i or id4 = :i or id5 = :i ");
		$stmt->execute(array(':i' => $_POST['memberid3']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row!==false)
		{
			$_SESSION['error'] = "Already registered";
			header("Location:registerhunt.php");
			return;
		}

			$stmt = $pdo->prepare("UPDATE techweek.treasurehunt set id3 = :m3 where team_name = :nam AND id1 = :m1");
			$stmt->execute(array(':m3' => $_POST['memberid3'],
								 ':nam' =>$_POST['name'],
								':m1' => $_POST['memberid1']));
		}
		if(strlen($_POST['memberid4'])>1)
		{
			$stmt = $pdo->prepare("SELECT * FROM techweek.participant WHERE id = :i ");
			$stmt->execute(array(':i' => $_POST['memberid4']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row===false)
		{
			$_SESSION['error'] = "Invalid member id";
			header("Location:registerhunt.php");
			return;
		}
		$stmt = $pdo->prepare("SELECT * FROM techweek.treasurehunt WHERE id1 = :i  or id2 = :i or id3 = :i or id4 = :i or id5 = :i ");
		$stmt->execute(array(':i' => $_POST['memberid4']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row!==false)
		{
			$_SESSION['error'] = "Already registered";
			header("Location:registerhunt.php");
			return;
		}

			$stmt = $pdo->prepare("UPDATE techweek.treasurehunt set id4 = :m4 where team_name = :nam AND id1 = :m1");
			$stmt->execute(array(':m4' => $_POST['memberid4'],
								':nam' =>$_POST['name'],
								':m1' => $_POST['memberid1']));
        }
        if(strlen($_POST['memberid5'])>1)
		{
			$stmt = $pdo->prepare("SELECT * FROM techweek.participant WHERE id = :i ");
			$stmt->execute(array(':i' => $_POST['memberid5']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row===false)
		{
			$_SESSION['error'] = "Invalid member id";
			header("Location:registerhunt.php");
			return;
		}
		$stmt = $pdo->prepare("SELECT * FROM techweek.treasurehunt WHERE id1 = :i  or id2 = :i or id3 = :i or id4 = :i or id5 = :i ");
		$stmt->execute(array(':i' => $_POST['memberid5']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row!==false)
		{
			$_SESSION['error'] = "Already registered";
			header("Location:registerhunt.php");
			return;
		}

			$stmt = $pdo->prepare("UPDATE techweek.treasurehunt set id5 = :m5 where team_name = :nam AND id1 = :m1");
			$stmt->execute(array(':m5' => $_POST['memberid5'],
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
	<link rel="stylesheet" type="text/css" href="css/registermagna.css">
    <link href="https://fonts.googleapis.com/css?family=Sulphur+Point&display=swap" rel="stylesheet">
</head> 
<body style="background-color:rgb(35, 41, 53);text-align:center" id="mbody">
<p>
    <div class="section">
	<div class="login">
	<form method="post" action="teamhunt.php">
		<p id="para">Team name</p> <input type="text" name="name" id="name" value= <?= htmlentities($_POST['name']) ?> disabled><br>
		<p id="para">Leader name</p><input type="text" name="team" id="name" value= <?= htmlentities($_POST['team']) ?> disabled><br>
		<p id="para">Team size</p> <input type="number" name="size" id="name" min="1" max="5" value=<?= htmlentities($_POST['size']) ?> disabled><br>
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