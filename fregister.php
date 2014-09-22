<?php 
        $title = 'Swift Airlines | User Registration'; 
	include $_SERVER["DOCUMENT_ROOT"].'/swift/core/init.php';
	f_logged_in_redirect();
	include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/header.php';
	
	if(empty($_POST)===false) {
		$required_fields = array('f_uname','f_password','f_password_again','f_fname','f_lname','f_mailid','f_sex','f_address','f_phone');
		foreach($_POST as $key=>$value) {
			if(empty($value) && in_array($key, $required_fields) === true ) {
				$errors[] = 'All the fields are required!';
				break 1;
			}
		}

		if(empty($errors) === true ){
			if(f_exists($_POST['f_uname']) === true) {
				$errors[] = 'Sorry, such a username has already been taken by another user!';
			}
			if(preg_match("/\\s/", $_POST['f_uname']) == true) {
				$errors[] = 'Your username cannot contain any spaces!';
			}
			if(!preg_match('/^[a-z][0-9a-z]{1,31}$/i', $_POST['f_uname'])) {
				$errors[] = 'Your username can contain only alphabets and numbers!';
			}
			if(!preg_match('/^[a-z]{2,30}$/i', $_POST['f_fname'])) {
				$errors[] = 'Your first name can contain only alphabets';
			}
			if(!preg_match('/^[a-z]{2,30}$/i', $_POST['f_lname'])) {
				$errors[] = 'Your last name can contain only alphabets';
			}
			if(strlen($_POST['f_password']) < 6) {
				$errors[] = 'Your password must be atleast 6 characters!';
			}
			if(strlen($_POST['f_uname']) < 6) {
				$errors[] = 'Your username must be atleast 6 characters!';
			}
			if($_POST['f_password'] !== $_POST['f_password_again']) {
				$errors[] = 'Your passwords do no match!';
			}
			/* if(!preg_match('/@gmail\.com$/i', $_POST['faculty_mailid'])) {
				$errors[] = 'You can sign up only with a gmail id';
			} */
			if(filter_var($_POST['f_mailid'], FILTER_VALIDATE_EMAIL) === false ) {
				$errors[] = 'Not a valid email address!';
			}
			if(f_email_exists($_POST['f_mailid']) === true) {
				$errors[] = 'Sorry, such an email id has already been taken by another user!';
			}

		}
	}
	
?>
            
			
			<div class="row">
        <div class="col-lg-4">
          <div class="well bs-component">
			<?php  

				if(isset($_GET['success']) && empty($_GET['success'])) {
					echo 'You have been registered to Swift Airlines successfully! Please check your Email ID for activation link!';
				} 
				else {

				if(empty($_POST)=== false && empty($errors)===true) {
					$register_data = array(
						'f_fname' 	=> $_POST['f_fname'],
						'f_lname' 	=> $_POST['f_lname'],
						'f_sex'		=> $_POST['f_sex'],
						'f_uname' 	=> $_POST['f_uname'],
						'f_password'  	=> $_POST['f_password'],
						'f_mailid' 	=> $_POST['f_mailid'],
						'f_address' 	=> $_POST['f_address'],
						'f_phone' 	=> $_POST['f_phone'],
						'f_mailcode'	=> md5($_POST['f_uname'] + microtime())
						);
					register_f($register_data);
					header('Location: fregister.php?success');
					exit();
				} 
				else if(empty($errors)===false) {
					echo output_errors($errors);
				}
			?>

			<form class="form-horizontal" action="" method="POST">
              <legend>User Registration</legend>

			  <div class="form-group">
                <div class="col-lg-12">
                  <label class="control-label" for="focusedInput">First Name</label>
                  <input class="form-control" name="f_fname" id="f_fname" required type="text">
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-12">
                  <label class="control-label" for="focusedInput">Last Name</label>
                  <input class="form-control" name="f_lname" id="f_lname" required type="text">
                </div>
              </div>

               <div class="form-group">
                <div class="col-lg-10">
                  <div class="radio">
                    <label>
                      <input type="radio" name="f_sex" value="male" required />
                      Male
                    </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="f_sex" value="female" required />
                      Female
                    </label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-12">
                  <label class="control-label" for="focusedInput">Username</label>
                  <input class="form-control" name="f_uname" id="f_uname" required type="text">
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-12">
                  <label class="control-label" for="focusedInput">Password</label>
                  <input class="form-control" name="f_password" id="f_password" required type="password">
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-12">
                  <label class="control-label" for="focusedInput">Confirm Password</label>
                  <input class="form-control" name="f_password_again" id="f_password_again" required type="password">
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-12">
                  <label class="control-label" for="focusedInput">Email ID</label>
                  <input class="form-control" name="f_mailid" id="f_mailid" required type="text">
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-12">
                  <label class="control-label" for="focusedInput">Address</label>
                  <input class="form-control" name="f_address" id="f_address" required type="text">
                </div>
              </div>

              <div class="form-group">
                <div class="col-lg-12">
                  <label class="control-label" for="focusedInput">Phone Number</label>
                  <input class="form-control" name="f_phone" id="f_phone" required type="text">
                </div>
              </div>

              <div class="form-group">
                <center><button type="submit" id="submit" value="submit" name="submit" class="btn btn-primary">Register</button></center>
              </div>

					
			</form>
			</div>
			</div>
			</div>



<?php 
}
include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/footer.php'; ?>  



