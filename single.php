<?php
	session_start();
	if(isset($_POST['submit']))
{
function CheckCaptcha($userResponse) {
        $fields_string = '';
        $fields = array(
            'secret' => '6LcUks4UAAAAAAQsuZYj79jbYVgikiyRNU4Dv3Sf',
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
		header("Location: registersingle.php");
		return;
    }
}
	if(isset($_POST['email'])&&isset($_POST['name'])&&isset($_POST['phone'])&&isset($_POST['outst']) &&isset($_POST['college']))
	{
		if(strlen($_POST['name'])<1)
		{
			$_SESSION['error'] = "Name should not be empty";
			header("Location: registersingle.php");
			return;
		}
		if(strlen($_POST['phone'])!=10)
		{
			$_SESSION['error'] = "Invalid phone number";
			header("Location: registersingle.php");
			return;
		}
		// $events = "";
		// foreach ($_POST['event'] as $e) {
		// 	$events.= $e." ";
		// }
		$host = "ec2-107-21-97-5.compute-1.amazonaws.com";
		$user = "gkvlhoyrdlrvgl";
		$pass = "678246517d80ae2358cb9e29cf351e4244805f23a5ab8b9ad69ecbc44abb59f9";
		$dbname = "db2jj1e9e0ghq6";
		$port = 5432; 
		$con = "pgsql:host=".$host.";port=".$port.";dbname=".$dbname;
		$pdo = new PDO($con,$user,$pass);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $pdo->prepare("SELECT * FROM techweek.participant WHERE email = :em ");
		$stmt->execute(array(':em' => $_POST['email']));
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		if($row!==false)
		{
			$_SESSION['error'] = "Already registered";
			header("Location:registersingle.php");
			return;
		}
		$stmt = $pdo->query("SELECT * FROM techweek.participant ORDER BY id DESC LIMIT 1");
		$user = $stmt->fetch();
		$id = $user['id'] +1;
		$stmt = $pdo->prepare("INSERT INTO techweek.participant (name,email,phone,outstation,id,collegename) VALUES (:nam,:em,:ph,:ou,:id,:cl)");
		$stmt->execute(array(
			':nam' => $_POST['name'],
			':em' => $_POST['email'],
			':ph' => $_POST['phone'],
			':ou' => $_POST['outst'],
			':id' => $id,
			':cl' => $_POST['college']
		));
		$_SESSION['id'] = $id;
		$_SESSION['success'] = "Registration Successful";
		header("Location:done.php");
		;
	}
	else{
		$_SESSION['error'] = "Enter all the fields";
		header("Location: registersingle.php");
		return;
	}
?>
