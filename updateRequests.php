<?php
include('dom/simple_html_dom.php');
$username="********************";
$password="********************";
$database="********************";

mysql_connect(localhost,$username,$password);
@mysql_select_db($database) or die("Connection to server failed.");

$query = "SELECT * FROM *********** WHERE ************ <> '';";
$result = mysql_query($query);
$numberOfEntries = mysql_numrows($result);

$string_data = file_get_contents("******************");
$all_courses = explode("\n", $string_data);
for($x=0; $x<$numberOfEntries; $x++) {
	$email 	= mysql_result($result, $x, "**********") or die("Why, Black Dynamite? Whyyyy?");
	$course	= mysql_result($result, $x, "***********");
	$course = trim($course);
	for($i=0; $i<count($all_courses); $i++) {
		if($all_courses[$i] != '' && $all_courses[$i] != '** ** ** ') {
			$single_course = explode("**", $all_courses[$i]);
			if((trim($single_course[0]) == $course) && (trim($single_course[3])=="OPEN")) {
				$to      = $email;
				$subject = "Your Course Is Open!";
				$message = "<html>Course #" . $course . " is now open for registration.<br><a href='http://my.wm.edu'>Register now!</a></html>";
				$headers = 'From: admin@tuxbell.com' . "\r\n" .
					'Reply-To: admin@tuxbell.com' . "\r\n" .
					'X-Mailer: PHP/' . phpversion();
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

				mail($to, $subject, $message, $headers);
				$query = "DELETE FROM **************** WHERE **************** AND *****************;";
				$result = mysql_query($query) or die ("SQL Error.");
			}
		}
	}
}	
?>
	