<?php
 session_start();
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
	//$doc_root = $_SERVER['DOCUMENT_ROOT'];
$allowd_extn = ['jpg','JPG','png','PNG','jpeg'];

	
	if($_SERVER['REQUEST_METHOD'] == 'POST') :
		$img = $_FILES['image'];
	endif;
	$file_name = $_FILES['image']['name'];
	$file_temp = $_FILES['image']['tmp_name'];
	$type = $_FILES['image']['type'];
	$file_ext = explode('/', $type);
	$file_size = $_FILES['image']['size'];
	/* Handling Errors */
	//$errors = [];
	if($file_size > 100000000000000000000) :
		$err[] = '<div> file must be less than 10_MB </div>';
	endif;
	if (!in_array($file_ext[1], $allowd_extn)):
			$err[] = "<div> your file is courrpted";
		endif; // extension
	if(empty($err)) :

		move_uploaded_file($file_temp,'D:\xampp\htdocs\php-random\\ '. $file_name);
		echo "<div>
				Pofile has been created  <br>
				just few seconds to open your profile
			 <div>";
			 $_SESSION['name'] = $user;
			 $_SESSION['mail'] = $mail;
			 $_SESSION['url'] = $url;
			 $_SESSION['password'] = $password;
			 $_SESSION['address'] = $address;
			 header('REFRESH:5;URL=profile.php');
	else:
		foreach($err as $errors):
			echo $errors . "<br>";
	endforeach;
	endif;
?>