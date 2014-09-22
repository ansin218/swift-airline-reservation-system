<?php 
        $title = 'Swift Airlines | Settings';
	include $_SERVER["DOCUMENT_ROOT"].'/swift/core/init.php';
	f_protect_page();
	include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/header.php';

	if(empty($_POST)===false) {
		$required_fields = array('f_fname','f_lname','f_mailid');
		foreach($_POST as $key=>$value) {
			if(empty($value) && in_array($key, $required_fields) === true ) {
				$errors[] = 'All the fields are required';
				break 1;
			}
		}

		if(empty($errors) === true ) {
			if(filter_var($_POST['f_mailid'], FILTER_VALIDATE_EMAIL) === false) {
				$errors[] = 'Please enter a valid email address';
			}
			if(f_email_exists($_POST['f_mailid']) === true && $f_data['f_mailid'] !== $_POST['f_mailid']){
				$errors[] ='Sorry, the email is already in use';
			}
			if(!preg_match('/^[a-z]{2,30}$/i', $_POST['f_fname'])) {
				$errors[] = 'Your first name can contain only alphabets';
			}
			if(!preg_match('/^[a-z]{2,30}$/i', $_POST['f_lname'])) {
				$errors[] = 'Your last name can contain only alphabets';
			}
		}
	}
?>

	<h3>Settings</h3>

<?php

	if(isset($_GET['success']) ===true && empty($_GET['success'])===true) {
		echo 'Updated!';
	}
	else 
	{
	if(empty($_POST) ===false && empty($errors)===true) {
		$update_data = array(
			'f_fname' 	=> $_POST['f_fname'],
			'f_lname' 	=> $_POST['f_lname'],
			'f_mailid'	=> $_POST['f_mailid'],
			);
		update_f($session_f_id, $update_data);
		header('Location: settings.php?success');
		exit();
	}
	else if(empty($errors) === false ) {
		echo output_errors($errors);
	}

?>

<form action="" method="POST">
	<br/>
	First Name: <br/>
	<input type="text" name="f_fname" value="<?php echo $f_data['f_fname']; ?>"/><br/><br/>
	Last Name: <br/>
	<input type="text" name="f_lname" value="<?php echo $f_data['f_lname']; ?>"/><br/><br/>
	Email ID: <br/>
	<input type="text" name="f_mailid" value="<?php echo $f_data['f_mailid']; ?>"/><br/><br/>
	<input type="submit" class="btn btn" value="Update" /><br/><br/>

</form>

<?php
}

	include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/footer.php';

?>