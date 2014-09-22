<?php

        $title = 'Swift Airlines | Login Error';
	include $_SERVER["DOCUMENT_ROOT"].'/swift/core/init.php';
	

	if(empty($_POST) === false) {
		$f_uname = $_POST['f_uname'];
		$f_password = $_POST['f_password'];

		if(empty($f_uname) === true || empty($f_password) === true){
			$errors[] = 'You need to enter both, the username and the password!';
		} 
		else  if (f_exists($f_uname)===false) {
			$errors[] = 'No such user exists! Please register!';
		}
		else if(f_active($f_uname)===false) {
			$errors[] = 'Please activate your account!';
		}
		else {

			if(strlen($f_password)>32) {
				$errors[] = 'Password too long!';
			}

			$f_login = f_login($f_uname, $f_password);
			if($f_login===false) {
				$errors[] = 'Username and Password do not match!';
			}
			else {
				$_SESSION['f_id'] = $f_login;
				header('Location: http://localhost/swift/index.php');
				exit();
			}
		} 		
	}
	else {
			$errors[] = 'No Log In credentials received!';
		}

	include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/header.php';

	if(empty($errors) === false) {
?>
	<br/><h4>We tried to log you in, but : </h4><br/>

<?php
	echo output_errors($errors);
	}

	include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/footer.php';

?>