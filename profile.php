<?php 
        $title = 'Swift Airlines | Profile';
	include $_SERVER["DOCUMENT_ROOT"].'/swift/core/init.php';
	user_protect_page();
	include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/header.php'; 
	
	if(isset($_GET['f_uname']) === true && empty($_GET['f_uname']) === false) {
		$f_uname = $_GET['f_uname'];
		if(f_exists($f_uname) === true ) {	
			$f_id = f_id_from_username($f_uname);
			$profile_data = f_data($f_id, 'f_fname','f_lname','f_mailid','f_sex','f_regdate');
?>

<h4><?php echo $profile_data['f_fname']; ?>&#39;s Profile</h4>

<br/>
<div class="container">
<img src="http://localhost/<?php echo $profile_data['f_dp'] ?>" height="150" width="150" />
</div>
<hr>

<strong>Name:</strong> <?php echo $profile_data['f_fname'].' '.$profile_data['f_lname']; ?><br/><br/>
<strong>Sex:</strong> <?php echo $profile_data['f_sex']; ?><br/><br/>
<strong>Campus:</strong> <?php echo $profile_data['f_campus']; ?><br/><br/>
<strong>Department:</strong> <?php echo $profile_data['f_dept']; ?><br/><br/>
<strong>Email ID:</strong> <?php echo $profile_data['f_mailid']; ?><br/><br/>
<strong>Member Since:</strong> <?php echo $profile_data['f_regdate']; ?><br/><br/>


<?php
		}
		else {
			echo 'Sorry, that user doesn\'t exists!';
		}
	}
	else {
         	header('Location: http://localhost/swift/index.php');
         	exit();
        }
            

	include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/footer.php'; 
?>