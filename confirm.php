<?php 
  include $_SERVER["DOCUMENT_ROOT"].'/swift/core/init.php';
  include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/header.php';

  if(f_logged_in()===true) {
  		$uid = $f_data['f_id'];
		if(isset($_POST['cardnum'])===true && isset($_POST['cvvnum'])===true) {
			$cardnum = $_POST['cardnum'];
			$cvvnum = $_POST['cvvnum'];
			$puname = $_POST['puname'];
			$puphno = $_POST['puphno'];
			$puadd = $_POST['puadd'];
			$pumail = $_POST['pumail'];
			if(isset($_POST['chose_to'])===true) {
				if(isset($_POST['chose_fro'])===true) {
					$to = $_POST['chose_to'];
					$fro = $_POST['chose_fro'];
					$counta = $_POST['count_a'];
					$countc = $_POST['count_c'];
					$class = $_POST['class'];
					if($class==='Economy' && $counta==='1' && $countc==='0') {
						$aname1 = $_POST['aname1'];
						$asex1 = $_POST['asex1'];
						$aage1 = $_POST['aage1'];
						$ect1 = $_POST['ect1'];
						$ect2 = $_POST['ect2'];
						$eat1 = $_POST['eat1'];
						$eat2 = $_POST['eat2'];
						$etotr = $_POST['etotr'];
						$totc = $counta + $countc;
						$status = 'Booked';
						$q1 = "SELECT * FROM `flight_search` WHERE `fno`='$to'";
						$r1 = mysql_query($q1);
						while($row1 = mysql_fetch_assoc($r1)) {
							$from_city = $row1['from_city'];
							$to_city = $row1['to_city'];
							$depart_date = $row1['departure_date'];
							$arr_date = $row1['arrival_date'];
							$depart_time = $row1['departure_time'];
							$arr_time = $row1['arrival_time'];
						}
						$q10 = "SELECT `c_balance` FROM `card_details` WHERE `c_cvv`='$cvvnum' AND `c_cnum`='$cardnum'";
						$r10 = mysql_query($q10);
						if($r10) {
							if(mysql_num_rows($r10)>0) {
								while($row10 = mysql_fetch_assoc($r10)) {
									$balance = $row10['c_balance'];
									if($balance>=$etotr) {
										$deduct = $balance - $etotr;
										mysql_query("UPDATE `card_details` SET `c_balance`='$deduct' WHERE `c_cvv`='$cvvnum' AND `c_cnum`='$cardnum'");
										$q11 = "SELECT `e_seats_left` FROM `flight_search` WHERE `fno`='$to'";
										$r11 = mysql_query($q11);
										if($r11) {
											if(mysql_num_rows($r11)>0) {
												while($row11 = mysql_fetch_assoc($r11)) {
													$e_seats_left = $row11['e_seats_left'];
													$dec_seats11 = $e_seats_left - $totc;
													mysql_query("UPDATE `flight_search` SET `e_seats_left`='$dec_seats11' WHERE `fno`='$to'");
												}				
											} 
											date_default_timezone_set('Asia/Kolkata');
											$a1 = date('H:i:s');
											$e1 = str_replace(':', '', $a1);
											$a2 = date('d-m-Y');
											$e2 = str_replace('-', '', $a2);
											$pnr1 = $e1.$e2;
											mysql_query("INSERT INTO `passenger_details` (`p_name`, `p_age`, `p_sex`, `p_pnr`, `p_fno`, `p_from`, `p_to`, `p_dedate`, `p_ardate`, `p_detime`, `p_artime`, `p_class`, `p_status`, `p_passtype`, `p_fid`) VALUES ('$aname1', '$asex1', '$aage1', '$pnr1', '$to', '$from_city', '$to_city', '$depart_date', '$arr_date', '$depart_time', '$arr_time', '$class', '$status', 'A', '$uid')");
											mysql_query("INSERT INTO `booking_details` (`b_name`, `b_phno`, `b_mail`, `b_add`, `b_price`, `b_child`, `b_adults`, `b_total`, `b_status`, `b_pnr`, `b_card`, `b_fid`) VALUES ('$puname', '$puphno', '$pumail', '$puadd', '$etotr', '$countc', '$counta', '$totc', '$status', '$pnr1', '$cardnum', '$uid')");
										}
										$q12 = "SELECT `e_seats_left` FROM `flight_search` WHERE `fno`='$fro'";
										$r12 = mysql_query($q12);
										if($r12) {
											if(mysql_num_rows($r12)>0) {
												while($row12 = mysql_fetch_assoc($r12)) {
													$e_seats_left = $row12['e_seats_left'];
													$dec_seats12 = $e_seats_left - $totc;
													mysql_query("UPDATE `flight_search` SET `e_seats_left`='$dec_seats12' WHERE `fno`='$fro'");
												}				
											} 
											date_default_timezone_set('Asia/Kolkata');
											$a5 = date('H:i:s');
											$e5 = str_replace(':', '', $a5);
											$a6 = date('d-m-Y');
											$e6 = str_replace('-', '', $a6);
											$pnr6 = $e5.$e6+100;
											mysql_query("INSERT INTO `passenger_details` (`p_name`, `p_age`, `p_sex`, `p_pnr`, `p_fno`, `p_from`, `p_to`, `p_dedate`, `p_ardate`, `p_detime`, `p_artime`, `p_class`, `p_status`, `p_passtype`, `p_fid`) VALUES ('$aname1', '$asex1', '$aage1', '$pnr6', '$fro', '$to_city', '$from_city', '$depart_date', '$arr_date', '$depart_time', '$arr_time', '$class', '$status', 'A', '$uid')");
											mysql_query("INSERT INTO `booking_details` (`b_name`, `b_phno`, `b_mail`, `b_add`, `b_price`, `b_child`, `b_adults`, `b_total`, `b_status`, `b_pnr`, `b_card`, `b_fid`) VALUES ('$puname', '$puphno', '$pumail', '$puadd', '$etotr', '$countc', '$counta', '$totc', '$status', '$pnr6', '$cardnum', '$uid')");
										}
										echo 'Tickets Successfully Booked! Please check your bookings page for details!';
										header('refresh: 10, url=index.php');

									}
									else {
										echo 'Insufficient balance, tickets not booked';
										header('refresh: 10, url=index.php');
									}
								}				
							} 
							else {
								echo 'Invalid details provided, tickets not booked';
								header('refresh: 10, url=index.php');
							}
						}
					}
				}
				else {
					echo 'ONE WAY';
				}
			}
		}
	}

?>


<?php include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/footer.php'; ?>