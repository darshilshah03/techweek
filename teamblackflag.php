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
			':m1' => $_POST['id']
		));
		
        $_SESSION['success'] = "Registration successful";
        $_SESSION['id'] = $_POST['id'];
		header("Location: done.php");
		return;
	}
?>
