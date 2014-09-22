<?php
        $title = 'Swift Airlines | Account Activation';
	include $_SERVER["DOCUMENT_ROOT"].'/swift/core/init.php';
	f_logged_in_redirect();
	include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/header.php';

	if(isset($_GET['success']) === true && empty($_GET['success']) === true) {
?>
	<h4>You have successfully activated your account!</h4>	
<?php
	}
	else if(isset($_GET['f_mailid'], $_GET['f_mailcode']) === true) {
		$f_mailid = trim($_GET['f_mailid']);
		$f_mailcode = trim($_GET['f_mailcode']);
		if(f_email_exists($f_mailid) === false) {
			$errors[] = 'Sorry, we couldn\'t find that Email Address';
		}
		else if (f_activate($f_mailid, $f_mailcode) === false){
			$errors[] = 'Sorry, there was some problem activating that account';
		}
		if(empty($errors) === false) {
?>
		<h4>Ooops...</h4>
<?php

	echo output_errors($errors);
	}
	else {
		header('Location: http://srikanthnatarajan.com/swift/activate.php?success');
		exit();
	}	
	}
	else {
		header('Location: index.php');
		exit();
	}
	
	include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/footer.php';
?>