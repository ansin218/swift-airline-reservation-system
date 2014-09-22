<?php 
        $title = 'Swift Airlines | Recovery Process';
	include $_SERVER["DOCUMENT_ROOT"].'/swift/core/init.php';
	f_logged_in_redirect();
	include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/header.php';
?>
            
<h4>Recovery</h4>
            
<?php
	if(isset($_GET['success']) === true && empty($_GET['success']) === true) {
?>

	<p>We have sent you the recovery details! Please check your email!</p>

<?php
	
	}
	else
	{
		$mode_allowed = array('f_uname','f_password');
		if(isset($_GET['mode']) === true && in_array($_GET['mode'], $mode_allowed) === true) {
			if(isset($_POST['f_mailid']) === true && empty($_POST['f_mailid']) === false) {
				if(f_email_exists($_POST['f_mailid']) === true) {
					f_recover($_GET['mode'],$_POST['f_mailid']);
					header('Location: http://localhost/swift/recover.php?success');
					exit();
				}
				else {
					echo 'Sorry, we could not find that email address!';
				}
			}
?>

	<form action="" method="POST">
		<br/>
		Please enter your email address:<br/>
		<input type="text" name="f_mailid" /><br/><br/>
		<input type="submit" class="btn btn" value="Recover" />	
	</form>

<?php
		}
		else {
			header('Location: http://localhost/swift/index.php');
			exit();
		}
	}

?>
            
<?php include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/footer.php'; ?>