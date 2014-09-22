<?php 
        $title = 'Swift Airlines | Login';
	include $_SERVER["DOCUMENT_ROOT"].'/swift/core/init.php';
	f_logged_in_redirect();
	include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/header.php';
?>
            
            <form class="form-horizontal" action="loginact.php" method="POST">
                  <div class="row">
                  <div class="col-lg-4">
            	<div class="well bs-component">
                  <legend>Passenger Log In</legend>
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Username</label>
                    <div class="col-lg-12">
                      <input type="text" name="f_uname" class="form-control" required placeholder="Username">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-12">
                      <input type="password" name="f_password" class="form-control" required placeholder="Password">
                    </div>
                  </div>
            	<div class="form-group">
                <center><button type="submit" id="submit" value="submit" name="submit" class="btn btn-success">Login</button></center>
              </div>
              </form>
            	<strong><a href="http://localhost/swift/fregister.php" style="color:white">Register Here</a></strong><br/><br/>
            	<strong><a href="http://localhost/swift/recover.php?mode=f_uname" style="color:white">Forgot Username?</a></strong><br/>
            	<strong><a href="http://localhost/swift/recover.php?mode=f_password" style="color:white">Forgot Password?</a></strong><br/>
            </form>
            </div>
            </div></div>

            
<?php include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/footer.php'; ?> 