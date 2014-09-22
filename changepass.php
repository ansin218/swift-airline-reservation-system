<?php 
        $title = 'Swift Airlines | Change Password';
	include $_SERVER["DOCUMENT_ROOT"].'/swift/core/init.php';
	f_protect_page();

	if(empty($_POST)===false) {
		$required_fields = array('current_password','password','password_again');
		foreach($_POST as $key=>$value) {
			if(empty($value) && in_array($key, $required_fields) === true ) {
				$errors[] = 'Fields marked with * are required!';
				break 1;
			}
		}

		if(md5($_POST['current_password']) === $f_data['f_password']) {
			if(trim($_POST['password']) !== trim($_POST['password_again'])) {
				$errors[] = 'Your new passwords do not match';
			}
			else if(strlen($_POST['password']) < 6 ) {
				$errors[] = 'Your passwords must be atleast 6 characters!';
			}
		}
		else {
			$errors[] ='Your current password is incorrect!';
		}
	}

	include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/header.php';
?>
            
            <h3>Change Password</h3>
<?php 

if(isset($_GET['success']) === true && empty($_GET['success']) === true ) {
	echo 'Your password has been changed successfully!';
}  

else {

	if(isset($_GET['force']) === true && empty($_GET['force']) === true ) {
?>
	<p>You must change your password to continue using the site!</p>
	
<?php
	}
	
	if(empty($_POST)===false && empty($errors)===true) {
		f_change_password($session_f_id, $_POST['password']);
		header('Location: http://localhost/swift/changepass.php?success');
	}
	else if(empty($errors) === false) {
		echo output_errors($errors);
}

?>

            <form action="" method="POST">
            	Current Password: <br/>
            	<input type="password" name="current_password" /><br/><br/>
            	New Password: <br/>
            	<input type="password" name="password" /><br/><br/>
            	New Password Again: <br/>
            	<input type="password" name="password_again" /><br/><br/>
            	<input type="submit" class="btn btn" value="Update" /><br/><br/>
            </form>
            

<?php 
}
      include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/footer.php';
?>