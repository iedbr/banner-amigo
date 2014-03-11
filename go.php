<?php
require_once('recaptchalib.php');
  $privatekey = "*************************************";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);

  if (!$resp->is_valid) {
    die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
         "(reCAPTCHA said: " . $resp->error . ")");
  } else {
		$username="*********************";
		$password="*********************";
		$database="**********************";
		mysql_connect(localhost,$username,$password);
		@mysql_select_db($database) or die("Unable to connect");

		$courses = $_POST['check_list'];
		$length = count($courses);
		for($i=0; $i<count($courses); $i++) {
			$email = $_POST['email'];
			if(trim($email)=="")
				$email = "no_email";
			$phone = "";
			
			//TESTING AGAINST SQL INJECTIONS
			//...
			//YEP, I CAN DELETE AN ENTIRE TABLE
			$db = new PDO("mysql:host=localhost;dbname=$database", $username, $password);
			$data = array( '****************' => $email, '***************' => $phone, '*****************' => $courses[$i] );
			$query = $db->prepare("INSERT INTO ************* (********************) VALUES (*************************);");
			$query->execute($data);
		}

		echo "Your course(s) ";
		for($i=0; $i<count($courses)-1; $i++) {
			echo $courses[$i] . ", ";
		}
		echo "and " . $courses[count($courses)-1]; 
		echo " have been saved.";
	}

?>