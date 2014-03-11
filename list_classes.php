<?php
    $crn = $_POST['CRN'];
?>

<html>
<head>
    <title>Banner Amigo</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        var stringData = $.ajax({
                        url: "***********************",
                        async: false
                     }).responseText;

        var all_courses = stringData.split("\n");
		var match_title = "";
        /* Get key CRN by iterating through all classes */
        for(var i=0; i<all_courses.length; i++) {
          if(all_courses[i] != "" && all_courses[i] != "** ** ** ") {
              var single_course = all_courses[i].split("**");
			  if(single_course[0] == <?php echo $crn; ?>) {
				var match_title_arr = single_course[1].split(" ");
				match_title = match_title_arr[1] + " " + match_title_arr[2];
			  }
          }
        }
        
        
      for(var i=0; i<all_courses.length; i++) {
          if(all_courses[i] != "" && all_courses[i] != "** ** ** ") {
              var single_course = all_courses[i].split("**");
			  var class_title_arr = single_course[1].split(" ");
			  var class_title = class_title_arr[1] + " " + class_title_arr[2];
			  if((class_title == match_title) || (class_title == match_title + "W") || (class_title == match_title + "L")) {
				$("#all").append("<tr><td><input type='checkbox' name='check_list[]' value='"+ single_course[0] +"'></td><td>" + single_course[0] + "</td><td>" + single_course[1] + "</td><td>" + single_course[2] + "</td><td>" + single_course[3] + "</td></tr>");   
			  }
              
          }
      }
    });
    </script>
</head>

<center><br><br><br><br>
	<form action="go.php" method="POST">
	<b>Choose some courses.</b>
    <table id="all" border="1"></table>
	
	<script type="text/javascript"
     src="http://www.google.com/recaptcha/api/challenge?k=6LcUze8SAAAAAHZVkD2Ubqjuzc0kop7kQXD2HEjR">
  </script>
  <noscript>
     <iframe src="http://www.google.com/recaptcha/api/noscript?k=6LcUze8SAAAAAHZVkD2Ubqjuzc0kop7kQXD2HEjR"
         height="300" width="500" frameborder="0"></iframe><br>
     <textarea name="recaptcha_challenge_field" rows="3" cols="40">
     </textarea>
     <input type="hidden" name="recaptcha_response_field"
         value="manual_challenge">
  </noscript>
	
	<input type="text" name="email" placeholder="Email address" required>
	<input type="submit" value="Submit">
	
	</form>
</center>

</html>