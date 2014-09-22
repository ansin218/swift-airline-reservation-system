<?php 
  include $_SERVER["DOCUMENT_ROOT"].'/swift/core/init.php';
  error_reporting(0);
  f_protect_page();
  include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/header.php';

?>

	<div class="row">
		<div class="col-lg-6">
			<div class="well bs-component">
				<?php 
					if(f_logged_in()===true) {
						if(isset($_GET['class'])===true && isset($_GET['count_a'])===true && isset($_GET['count_c'])===true) {
						$to = $_GET['chose_to'];
						$fro = $_GET['chose_fro'];
						$qu1 = "SELECT * FROM `flight_search` WHERE `fno`='$to'";
						$ru1 = mysql_query($qu1);
						while($ro1 = mysql_fetch_assoc($ru1)) {
							$arr1 = $ro1['arrival_time'];
						}
						$qu2 = "SELECT * FROM `flight_search` WHERE `fno`='$fro'";
						$ru2 = mysql_query($qu2);
						while($ro2 = mysql_fetch_assoc($ru2)) {
							$dep2 = $ro2['departure_time'];
						}
						if($dep2 > $arr1) {
							if(isset($_GET['chose_to'])===true) {
								if(isset($_GET['chose_fro'])===true) {
									$to = $_GET['chose_to'];
									$fro = $_GET['chose_fro'];
									
										$counta = $_GET['count_a'];
										$countc = $_GET['count_c'];
										$class = $_GET['class'];
										$q1 = "SELECT * FROM `flight_search` WHERE `fno`='$to'";
										$r1 = mysql_query($q1);
										while($row1 = mysql_fetch_assoc($r1)) {
											echo '<legend>Your flight from '.$row1['from_city'].' to '.$row1['to_city'].'</legend>';
											echo 'Flight Number: '.$row1['fno'].'<br>';
											if($class==='Economy') {
												if(($counta+$countc)<=$row1['e_seats_left']) {
													echo 'Departure Time: '.$row1['departure_time'].'<br>';
													echo 'Arrival Time: '.$row1['arrival_time'].'<br>';
													echo 'Number of Adults: '.$counta.'<br>';
													echo 'Number of Children: '.$countc.'<br><br>';
													$eat1 = $counta * $row1['e_price'];
													echo 'Cost of '.$counta.' adult(s): '.$counta.' * Rs. '.$row1['e_price'].' =  Rs. '.$eat1.'<br>';
													$ect1 = ($countc * $row1['e_price']) * 0.75;
													echo 'Cost of '.$countc.' child: 75% of '.$countc.' * Rs. '.$row1['e_price'].' = Rs. '.$ect1.'<br>';
													$etax1 = 500;
													echo 'Airport Tax: Rs. 100 <br>';
													echo 'Fuel Tax: Rs. 100 <br>';
													echo 'Service Tax: Rs. 300 <br>';
													echo 'Total Tax: Rs. '.$etax1.'<br><br>';
													$etot1 = $eat1 + $ect1 + $etax1;
													echo '<legend>Cost of one trip is Rs. '.$etot1.'</legend><hr>';
												}
												else {
													echo 'Not enough available seats. Sorry, please check some other flight!';
													header("refresh:10; url=index.php");
												}
											}
											else if($class==='Business') {
												if(($counta+$countc)<=$row1['b_seats_left']) {
													echo 'Departure Time: '.$row1['departure_time'].'<br>';
													echo 'Arrival Time: '.$row1['arrival_time'].'<br>';
													echo 'Number of Adults: '.$counta.'<br>';
													echo 'Number of Children: '.$countc.'<br><br>';
													$bat1 = $counta * $row1['b_price'];
													echo 'Cost of '.$counta.' adult(s): '.$counta.' * Rs. '.$row1['b_price'].' =  Rs. '.$bat1.'<br>';
													$bct1 = ($countc * $row1['b_price']) * 0.75;
													echo 'Cost of '.$countc.' child: 75% of '.$countc.' * Rs. '.$row1['b_price'].' = Rs. '.$bct1.'<br>';
													$btax1 = 1500;
													echo 'Airport Tax: Rs. 200 <br>';
													echo 'Fuel Tax: Rs. 200 <br>';
													echo 'Service Tax: Rs. 1100 <br>';
													echo 'Total Tax: Rs. '.$btax1.'<br><br>';
													$btot1 = $bat1 + $bct1 + $btax1;
													echo '<legend>Cost of one trip is Rs. '.$btot1.'</legend><hr>';
												}
												else {
													echo 'Not enough available seats. Sorry, please check some other flight!';
													header("refresh:10; url=index.php");
												}
											}
										}
										$q2 = "SELECT * FROM `flight_search` WHERE `fno`='$fro'";
										$r2 = mysql_query($q2);
										while($row2 = mysql_fetch_assoc($r2)) {
											echo '<legend>Your flight from '.$row2['from_city'].' to '.$row2['to_city'].'</legend>';
											echo 'Flight Number: '.$row2['fno'].'<br>';
											if($class==='Economy') {
												if(($counta+$countc)<=$row2['e_seats_left']) {
													echo 'Departure Time: '.$row2['departure_time'].'<br>';
													echo 'Arrival Time: '.$row2['arrival_time'].'<br>';
													echo 'Number of Adults: '.$counta.'<br>';
													echo 'Number of Children: '.$countc.'<br><br>';
													$eat2 = $counta * $row2['e_price'];
													echo 'Cost of '.$counta.' adult(s): '.$counta.' * Rs. '.$row2['e_price'].' =  Rs. '.$eat2.'<br>';
													$ect2 = ($countc * $row2['e_price']) * 0.75;
													echo 'Cost of '.$countc.' child: 75% of '.$countc.' * Rs. '.$row2['e_price'].' = Rs. '.$ect2.'<br>';
													$etax2 = 500;
													echo 'Airport Tax: Rs. 100 <br>';
													echo 'Fuel Tax: Rs. 100 <br>';
													echo 'Service Tax: Rs. 300 <br>';
													echo 'Total Tax: Rs. '.$etax2.'<br><br>';
													$etot2 = $eat2 + $ect2 + $etax2;
													echo '<legend>Cost of return trip is Rs. '.$etot2.'</legend><hr>';
												}
												else {
													echo 'Not enough available seats. Sorry, please check some other flight!';
													header("refresh:10; url=index.php");
												}
											}
											else if($class==='Business') {
												if(($counta+$countc)<=$row2['b_seats_left']) {
													echo 'Departure Time: '.$row2['departure_time'].'<br>';
													echo 'Arrival Time: '.$row2['arrival_time'].'<br>';
													echo 'Number of Adults: '.$counta.'<br>';
													echo 'Number of Children: '.$countc.'<br><br>';
													$bat2 = $counta * $row2['b_price'];
													echo 'Cost of '.$counta.' adult(s): '.$counta.' * Rs. '.$row2['b_price'].' =  Rs. '.$bat2.'<br>';
													$bct2 = ($countc * $row2['b_price']) * 0.75;
													echo 'Cost of '.$countc.' child: 75% of '.$countc.' * Rs. '.$row2['b_price'].' = Rs. '.$bct2.'<br>';
													$btax2 = 1500;
													echo 'Airport Tax: Rs. 200 <br>';
													echo 'Fuel Tax: Rs. 200 <br>';
													echo 'Service Tax: Rs. 1100 <br>';
													echo 'Total Tax: Rs. '.$btax2.'<br><br>';
													$btot2 = $bat2 + $bct2 + $btax2;
													echo '<legend>Cost of return trip is Rs. '.$btot2.'</legend><hr>';
												}
												else {
													echo 'Not enough available seats. Sorry, please check some other flight!';
													header("refresh:10; url=index.php");
												}
											}
										}
										if($class==='Economy') {
											$etotr = $etot1 + $etot2;
											echo '<legend>Total cost of both the trips is Rs. '.$etotr.'</legend>';
										}
										else if($class==='Business') {
											$btotr = $btot1 + $btot2;
											echo '<legend>Total cost of both the trips is Rs. '.$btotr.'</legend>';
										}
									} 
								
								else {
									$to = $_GET['chose_to'];
									$counta = $_GET['count_a'];
									$countc = $_GET['count_c'];
									$class = $_GET['class'];
									$q1 = "SELECT * FROM `flight_search` WHERE `fno`='$to'";
									$r1 = mysql_query($q1);
									while($row1 = mysql_fetch_assoc($r1)) {
										echo '<legend>Your flight from '.$row1['from_city'].' to '.$row1['to_city'].'</legend>';
										echo 'Flight Number: '.$row1['fno'].'<br>';
										if($class==='Economy') {
											if(($counta+$countc)<=$row1['e_seats_left']) {
												echo 'Departure Time: '.$row1['departure_time'].'<br>';
												echo 'Arrival Time: '.$row1['arrival_time'].'<br>';
												echo 'Number of Adults: '.$counta.'<br>';
												echo 'Number of Children: '.$countc.'<br><br>';
												$eat1 = $counta * $row1['e_price'];
												echo 'Cost of '.$counta.' adult(s): '.$counta.' * Rs. '.$row1['e_price'].' =  Rs. '.$eat1.'<br>';
												$ect1 = ($countc * $row1['e_price']) * 0.75;
												echo 'Cost of '.$countc.' child: 75% of '.$countc.' * Rs. '.$row1['e_price'].' = Rs. '.$ect1.'<br>';
												$etax1 = 500;
												echo 'Airport Tax: Rs. 100 <br>';
												echo 'Fuel Tax: Rs. 100 <br>';
												echo 'Service Tax: Rs. 300 <br>';
												echo 'Total Tax: Rs. '.$etax1.'<br><br>';
												$etot1 = $eat1 + $ect1 + $etax1;
												echo '<legend>Total cost of trip is Rs. '.$etot1.'</legend>';
											}
											else {
												echo 'Not enough available seats. Sorry, please check some other flight!';
												header("refresh:10; url=index.php");
											}
										}
										else if($class==='Business') {
											if(($counta+$countc)<=$row1['b_seats_left']) {
												echo 'Departure Time: '.$row1['departure_time'].'<br>';
												echo 'Arrival Time: '.$row1['arrival_time'].'<br>';
												echo 'Number of Adults: '.$counta.'<br>';
												echo 'Number of Children: '.$countc.'<br><br>';
												$bat1 = $counta * $row1['b_price'];
												echo 'Cost of '.$counta.' adult(s): '.$counta.' * Rs. '.$row1['b_price'].' =  Rs. '.$bat1.'<br>';
												$bct1 = ($countc * $row1['b_price']) * 0.75;
												echo 'Cost of '.$countc.' child: 75% of '.$countc.' * Rs. '.$row1['b_price'].' = Rs. '.$bct1.'<br>';
												$btax1 = 1500;
												echo 'Airport Tax: Rs. 200 <br>';
												echo 'Fuel Tax: Rs. 200 <br>';
												echo 'Service Tax: Rs. 1100 <br>';
												echo 'Total Tax: Rs. '.$btax1.'<br><br>';
												$btot1 = $bat1 + $bct1 + $btax1;
												echo '<legend>Cost of one trip is Rs. '.$btot1.'</legend>';
											}
											else {
												echo 'Not enough available seats. Sorry, please check some other flight!';
												header("refresh:10; url=index.php");
											}
										}
									}
								}
							} 
						} else { echo 'Sorry, but it appears your return flight takes off before you land at your destination! Please select another flight!';
						  header("refresh: 5; url=index.php");
						}
					} 
				}
				?>
			</div>
		</div>

		<div class="col-lg-6">
			<div class="well bs-component">
				<form class="form-horizontal" action="card.php" method="GET">
					<h4>Adult Passenger Details</h4>
					<div class="form-group">
	                    <div class="col-lg-6">
	                      <input type="text" class="form-control" <?php  if($counta==='1' || $counta==='2') echo 'required'; ?> name="aname1" id="inputEmail" placeholder="Name">
	                    </div>
	                    <div class="col-lg-3">
	                      <input type="text" class="form-control" <?php  if($counta==='1' || $counta==='2') echo 'required'; ?> name="aage1" id="inputEmail" placeholder="Age">
	                    </div>
	                    <div class="col-lg-3">
	                      <select class="form-control" name="asex1" <?php  if($counta==='1' || $counta==='2') echo 'required'; ?> id="select">
		                    <option value="M">Male</option>
		                    <option value="F">Female</option>
		                  </select>
	                    </div>
	                </div>
	                <hr>
	                <h4>Child Passenger Details</h4>
	                <div class="form-group">
	                    <div class="col-lg-6">
	                      <input type="text" class="form-control" name="cname1" <?php  if($countc==='1' || $countc==='2') echo 'required'; ?> id="inputEmail" placeholder="Name">
	                    </div>
	                    <div class="col-lg-3">
	                      <input type="text" class="form-control" name="cage1" <?php  if($countc==='1' || $countc==='2') echo 'required'; ?> id="inputEmail" placeholder="Age">
	                    </div>
	                    <div class="col-lg-3">
	                      <select class="form-control" name="csex1" <?php  if($countc==='1' || $countc==='2') echo 'required'; ?> id="select">
		                    <option value="M">Male</option>
		                    <option value="F">Female</option>
		                  </select>
	                    </div>
	                </div>
	                <hr>
	                <h4>User Contact Details</h4>
	                <div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">Name</label>
		                  <input class="form-control" name="puname" id="puname" value="<?php echo $f_data['f_fname'].' '.$f_data['f_lname']; ?>" required type="text">
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">Phone Number</label>
		                  <input class="form-control" name="puphno" id="puphno" value="<?php echo $f_data['f_phone']; ?>" required type="text">
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">Address</label>
		                  <input class="form-control" name="puadd" id="puadd" value="<?php echo $f_data['f_address']; ?>" required type="text">
		                </div>
		            </div>
		            <div class="form-group">
		                <div class="col-lg-12">
		                  <label class="control-label" for="focusedInput">Email ID</label>
		                  <input class="form-control" name="pumail" id="pumail" value="<?php echo $f_data['f_mailid']; ?>" required type="text">
		                </div>
		            </div>
		            <?php if(isset($_GET['chose_to'])===true) {
		            	if(isset($_GET['chose_fro'])===true) {
		            	if($class==='Economy') {
		            ?>
		            <input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	             		<input type="hidden" name="chose_fro" value="<?php echo $fro; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="ect1" value="<?php echo $ect1; ?>"/>
	              		<input type="hidden" name="ect2" value="<?php echo $ect2; ?>"/>
	              		<input type="hidden" name="eat1" value="<?php echo $eat1; ?>"/>
	              		<input type="hidden" name="eat2" value="<?php echo $eat2; ?>"/>
              		<?php }
              		else if($class==='Business') { ?>
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	             		<input type="hidden" name="chose_fro" value="<?php echo $fro; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="bct1" value="<?php echo $bct1; ?>"/>
	              		<input type="hidden" name="bct2" value="<?php echo $bct2; ?>"/>
	              		<input type="hidden" name="bat1" value="<?php echo $bat1; ?>"/>
	              		<input type="hidden" name="bat2" value="<?php echo $bat2; ?>"/>
              		<?php	}
              		}
              		else { 
              			if($class==='Economy') { ?>
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="ect1" value="<?php echo $ect1; ?>"/>
	              		<input type="hidden" name="eat1" value="<?php echo $eat1; ?>"/>
	              		<input type="hidden" name="etot1" value="<?php echo $etot1; ?>"/>
              		<?php	}
              			else if($class==='Business') { ?>
              				<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="bct1" value="<?php echo $bct1; ?>"/>
	              		<input type="hidden" name="bat1" value="<?php echo $bat1; ?>"/>
	              		<input type="hidden" name="btot1" value="<?php echo $btot1; ?>"/>
              		<?php	}
              		} 
              		}
              		?>
		            <center><button type="submit" id="book_f" name="book_f" class="btn btn-primary">Book Flight</button></center>
				</form>
			</div>
		</div>

	</div>

<?php

  include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/footer.php';

?>