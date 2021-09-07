<?php
	if (isset($_POST['submit'])) {
		$user = $_POST['user'];
		$password = $_POST['pwd'];
		$mail = $_POST['mail'];
		$url = $_POST['url'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
	}else{
		exit();
	}
	$err = [];  
// Name Validation
	if (!preg_match ("/^[a-zA-z]*$/", $user) ) {  
    $ErrMsg = "Only alphabets  are Allowed. <br>";  
             echo $ErrMsg;
	} else {  
    	echo  "welcome " . $user . "<br> ";  
	}  
// Mail Validation
	if (isset($mail)) {
		if(filter_var($mail,FILTER_VALIDATE_EMAIL)){
			echo "your Email is : " . $mail . "<br>";
		}else{
		$err['mail'] = 'unvalid email' . "<br>";
		}
	}
// Linkedin Validation
	if (isset($url) &&  strlen($url) > 20) {
		htmlspecialchars(filter_var($mail,FILTER_VALIDATE_URL));
		echo "your linkedin account is : " . $url . "<br>";
	}else{
		$err['url'] = 'unvalid url';
	}
//password Validation
	if (isset($password)) {
		if (strlen($password) < 6) {
			$err['password'] = 'password is too short';
		}else{
			echo "your password is : " . htmlspecialchars($password) . "<br>";
		}
	}
//address validation

	if (gettype($address) !== 'string') {  
    $ErrMessage = "UNVALID ADDRESS.";  
             echo $ErrMessage;  
	} else {  
    	echo  "You live in " . $address . "<br> ";  
	}  
// check errors
	if (count($err) > 0) {
		foreach ($err as $error => $value) {
		echo $error . " : " . $value;
		}
	}else{
		echo "validation compeleted, welcome to the club";
	}
?>