<?php


	function activation($to, $subject, $body) {
		mail($to, $subject, $body, 'From: activation@tofsis.com');
	}
	
	function recovery_user_pass($to, $subject, $body) {
		mail($to, $subject, $body, 'From: recovery@tofsis.com');
	}

	function f_protect_page() {
		if(f_logged_in() === false) {
			header('Location: http://localhost/swift/flogin.php');
			exit();		
		} 
	}
	
	function user_protect_page() {
		if(f_logged_in() === false) {
			header('Location: http://localhost/swift/fprotect.php');
			exit();		
		} 
	}
	
	function use_protect_page() {
		if(f_logged_in() === true) {
			header('Location: http://localhost/swift/fprotect.php');
			exit();		
		} 
	}

	function f_logged_in_redirect() {
		if(f_logged_in() === true) {
			header('Location: http://localhost/swift/index.php');
			exit();
		}
	}

	function array_sanitize(&$item) {
		$item = htmlentities(strip_tags(mysql_real_escape_string($item)));
	}

	function sanitize($data) {
		return htmlentities(strip_tags(mysql_real_escape_string($data)));
	}

	function output_errors($errors) {
		return '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>';
	}

?>