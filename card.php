<?php 
  include $_SERVER["DOCUMENT_ROOT"].'/swift/core/init.php';
  include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/header.php';
?>

	<div class="row">
		<div class="col-lg-4">
			
		</div>
		<div class="col-lg-4">
			<div class="well bs-component">
				<?php
					if(f_logged_in()===true) {
						$puname = $_GET['puname'];
						$puadd = $_GET['puadd'];
						$puphno = $_GET['puphno'];
						$pumail = $_GET['pumail'];
						if(isset($_GET['chose_to'])===true) {
							$to = $_GET['chose_to'];
							$class = $_GET['class'];
							$counta = $_GET['count_a'];
							$countc = $_GET['count_c'];
							if(isset($_GET['chose_fro'])===true) {
								$fro = $_GET['chose_fro'];
								if($class==='Economy') {
									$eat1 = $_GET['eat1'];
									$eat2 = $_GET['eat2'];
									$ect1 = $_GET['ect1'];
									$ect2 = $_GET['ect2'];
									$etax1 = $etax2 = 500;
									$etot1 = $eat1 + $ect1 + $etax1;
									$etot2 = $eat2 + $ect2 + $etax2;
									$etotr = $etot1 + $etot2;
									if($countc==='0') {
										if($counta==='1') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
										}
										else if($counta==='2') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
											$aname2 = $_GET['aname2'];
											$aage2 = $_GET['aage2'];
											$asex2 = $_GET['asex2'];
										}
									} 
									else if($countc==='1') {
										$cname1 = $_GET['cname1'];
										$csex1 = $_GET['csex1'];
										$cage1 = $_GET['cage1'];
										if($counta==='1') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
										}
										else if($counta==='2') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
											$aname2 = $_GET['aname2'];
											$aage2 = $_GET['aage2'];
											$asex2 = $_GET['asex2'];
										}
									}
									else if($countc==='2') {
										$cname1 = $_GET['cname1'];
										$csex1 = $_GET['csex1'];
										$cage1 = $_GET['cage1'];
										$cname2 = $_GET['cname2'];
										$csex2 = $_GET['csex2'];
										$cage2 = $_GET['cage2'];
										if($counta==='1') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
										}
										else if($counta==='2') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
											$aname2 = $_GET['aname2'];
											$aage2 = $_GET['aage2'];
											$asex2 = $_GET['asex2'];
										}
									}
								}
								else if($class==='Business') {
									$bat1 = $_GET['bat1'];
									$bat2 = $_GET['bat2'];
									$bct1 = $_GET['bct1'];
									$bct2 = $_GET['bct2'];
									$btax1 = $btax2 = 1500;
									$btot1 = $bat1 + $bct1 + $btax1;
									$btot2 = $bat2 + $bct2 + $btax2;
									$btotr = $btot1 + $btot2;
									if($countc==='0') {
										if($counta==='1') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
										}
										else if($counta==='2') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
											$aname2 = $_GET['aname2'];
											$aage2 = $_GET['aage2'];
											$asex2 = $_GET['asex2'];
										}
									} 
									else if($countc==='1') {
										$cname1 = $_GET['cname1'];
										$csex1 = $_GET['csex1'];
										$cage1 = $_GET['cage1'];
										if($counta==='1') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
										}
										else if($counta==='2') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
											$aname2 = $_GET['aname2'];
											$aage2 = $_GET['aage2'];
											$asex2 = $_GET['asex2'];
										}
									}
									else if($countc==='2') {
										$cname1 = $_GET['cname1'];
										$csex1 = $_GET['csex1'];
										$cage1 = $_GET['cage1'];
										$cname2 = $_GET['cname2'];
										$csex2 = $_GET['csex2'];
										$cage2 = $_GET['cage2'];
										if($counta==='1') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
										}
										else if($counta==='2') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
											$aname2 = $_GET['aname2'];
											$aage2 = $_GET['aage2'];
											$asex2 = $_GET['asex2'];
										}
									}
								}
							}
							else {
								if($class==='Economy') {
									$eat1 = $_GET['eat1'];
									$ect1 = $_GET['ect1'];
									$etax1 = 500;
									$etot1 = $eat1 + $ect1 + $etax1;
									if($countc==='0') {
										if($counta==='1') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
										}
										else if($counta==='2') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
											$aname2 = $_GET['aname2'];
											$aage2 = $_GET['aage2'];
											$asex2 = $_GET['asex2'];
										}
									} 
									else if($countc==='1') {
										$cname1 = $_GET['cname1'];
										$csex1 = $_GET['csex1'];
										$cage1 = $_GET['cage1'];
										if($counta==='1') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
										}
										else if($counta==='2') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
											$aname2 = $_GET['aname2'];
											$aage2 = $_GET['aage2'];
											$asex2 = $_GET['asex2'];
										}
									}
									else if($countc==='2') {
										$cname1 = $_GET['cname1'];
										$csex1 = $_GET['csex1'];
										$cage1 = $_GET['cage1'];
										$cname2 = $_GET['cname2'];
										$csex2 = $_GET['csex2'];
										$cage2 = $_GET['cage2'];
										if($counta==='1') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
										}
										else if($counta==='2') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
											$aname2 = $_GET['aname2'];
											$aage2 = $_GET['aage2'];
											$asex2 = $_GET['asex2'];
										}
									}
								}
								else if($class==='Business') {
									$bat1 = $_GET['bat1'];
									$bct1 = $_GET['bct1'];
									$btax1 = 1500;
									$btot1 = $bat1 + $bct1 + $btax1;
									if($countc==='0') {
										if($counta==='1') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
										}
										else if($counta==='2') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
											$aname2 = $_GET['aname2'];
											$aage2 = $_GET['aage2'];
											$asex2 = $_GET['asex2'];
										}
									} 
									else if($countc==='1') {
										$cname1 = $_GET['cname1'];
										$csex1 = $_GET['csex1'];
										$cage1 = $_GET['cage1'];
										if($counta==='1') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
										}
										else if($counta==='2') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
											$aname2 = $_GET['aname2'];
											$aage2 = $_GET['aage2'];
											$asex2 = $_GET['asex2'];
										}
									}
									else if($countc==='2') {
										$cname1 = $_GET['cname1'];
										$csex1 = $_GET['csex1'];
										$cage1 = $_GET['cage1'];
										$cname2 = $_GET['cname2'];
										$csex2 = $_GET['csex2'];
										$cage2 = $_GET['cage2'];
										if($counta==='1') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
										}
										else if($counta==='2') {
											$aname1 = $_GET['aname1'];
											$aage1 = $_GET['aage1'];
											$asex1 = $_GET['asex1'];
											$aname2 = $_GET['aname2'];
											$aage2 = $_GET['aage2'];
											$asex2 = $_GET['asex2'];
										}
									}
								}
							}
						}
					}
				?>
				<legend>Credit/Debit Card Details</legend>
				<form class="form-horizontal" action="confirm.php" method="POST">
					<div class="form-group">
	                    <div class="col-lg-12">
	                      <input type="text" required class="form-control" maxlength="32" name="carduser" id="carduser" placeholder="Card Holder Name">
	                    </div>
	                </div>
	                <div class="form-group">
	                    <div class="col-lg-8">
	                      <input type="text" required maxlength="16" class="form-control" name="cardnum" id="cardnum" placeholder="Card Number">
	                      </div>
	                      <div class="col-lg-4">
	                      <input type="password" required maxlength="3" class="form-control" name="cvvnum" id="cvvnum" placeholder="CVV">
	                    </div>
	                </div>
	                <center>
	                 <?php 
	                 	if(isset($_GET['chose_to'])===true) {
		            		if(isset($_GET['chose_fro'])===true) {
		            			if($class==='Economy' && $counta==='1' && $countc==='0') { 
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
	              		<input type="hidden" name="etotr" value="<?php echo $etotr; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
              		<?php }
              		else if($class==='Business' && $counta==='1' && $countc==='0')  { ?>
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	             		<input type="hidden" name="chose_fro" value="<?php echo $fro; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="bct1" value="<?php echo $bct1; ?>"/>
	              		<input type="hidden" name="bct2" value="<?php echo $bct2; ?>"/>
	              		<input type="hidden" name="bat1" value="<?php echo $bat1; ?>"/>
	              		<input type="hidden" name="bat2" value="<?php echo $bat2; ?>"/>
	              		<input type="hidden" name="btotr" value="<?php echo $btotr; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
              		<?php	}
              		else if($class==='Economy' && $counta==='2' && $countc==='0')  { ?>
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	             		<input type="hidden" name="chose_fro" value="<?php echo $fro; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="ect1" value="<?php echo $ect1; ?>"/>
	              		<input type="hidden" name="ect2" value="<?php echo $ect2; ?>"/>
	              		<input type="hidden" name="eat1" value="<?php echo $eat1; ?>"/>
	              		<input type="hidden" name="eat2" value="<?php echo $eat2; ?>"/>
	              		<input type="hidden" name="etotr" value="<?php echo $etotr; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
						<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
						<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
						<input type="hidden" name="aname2" value="<?php echo $aname2; ?>"/>
						<input type="hidden" name="aage2" value="<?php echo $aage2; ?>"/>
						<input type="hidden" name="asex2" value="<?php echo $asex2; ?>"/>
              		<?php }
              		else if($class==='Business' && $counta==='2' && $countc==='0')  { ?> 
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	             		<input type="hidden" name="chose_fro" value="<?php echo $fro; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="bct1" value="<?php echo $bct1; ?>"/>
	              		<input type="hidden" name="bct2" value="<?php echo $bct2; ?>"/>
	              		<input type="hidden" name="bat1" value="<?php echo $bat1; ?>"/>
	              		<input type="hidden" name="bat2" value="<?php echo $bat2; ?>"/>
	              		<input type="hidden" name="btotr" value="<?php echo $btotr; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
						<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
						<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
						<input type="hidden" name="aname2" value="<?php echo $aname2; ?>"/>
						<input type="hidden" name="aage2" value="<?php echo $aage2; ?>"/>
						<input type="hidden" name="asex2" value="<?php echo $asex2; ?>"/>
              		<?php } 
              			else if($class==='Economy' && $counta==='1' && $countc==='1')  { ?>
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	             		<input type="hidden" name="chose_fro" value="<?php echo $fro; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="ect1" value="<?php echo $ect1; ?>"/>
	              		<input type="hidden" name="ect2" value="<?php echo $ect2; ?>"/>
	              		<input type="hidden" name="eat1" value="<?php echo $eat1; ?>"/>
	              		<input type="hidden" name="eat2" value="<?php echo $eat2; ?>"/>
	              		<input type="hidden" name="etotr" value="<?php echo $etotr; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="cname1" value="<?php echo $cname1; ?>"/>
	              		<input type="hidden" name="cage1" value="<?php echo $cage1; ?>"/>
	              		<input type="hidden" name="csex1" value="<?php echo $csex1; ?>"/>
             		<?php } 
             			else if($class==='Business' && $counta==='1' && $countc==='1')  { ?>
             			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	             		<input type="hidden" name="chose_fro" value="<?php echo $fro; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="bct1" value="<?php echo $bct1; ?>"/>
	              		<input type="hidden" name="bct2" value="<?php echo $bct2; ?>"/>
	              		<input type="hidden" name="bat1" value="<?php echo $bat1; ?>"/>
	              		<input type="hidden" name="bat2" value="<?php echo $bat2; ?>"/>
	              		<input type="hidden" name="btotr" value="<?php echo $btotr; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="cname1" value="<?php echo $cname1; ?>"/>
	              		<input type="hidden" name="cage1" value="<?php echo $cage1; ?>"/>
	              		<input type="hidden" name="csex1" value="<?php echo $csex1; ?>"/>
             		<?php } 
             			else if($class==='Economy' && $counta==='1' && $countc==='2') { ?>
             			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	             		<input type="hidden" name="chose_fro" value="<?php echo $fro; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="ect1" value="<?php echo $ect1; ?>"/>
	              		<input type="hidden" name="ect2" value="<?php echo $ect2; ?>"/>
	              		<input type="hidden" name="eat1" value="<?php echo $eat1; ?>"/>
	              		<input type="hidden" name="eat2" value="<?php echo $eat2; ?>"/>
	              		<input type="hidden" name="etotr" value="<?php echo $etotr; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="cname1" value="<?php echo $cname1; ?>"/>
	              		<input type="hidden" name="cage1" value="<?php echo $cage1; ?>"/>
	              		<input type="hidden" name="csex1" value="<?php echo $csex1; ?>"/>
	              		<input type="hidden" name="cname2" value="<?php echo $cname2; ?>"/>
	              		<input type="hidden" name="cage2" value="<?php echo $cage2; ?>"/>
	              		<input type="hidden" name="csex2" value="<?php echo $csex2; ?>"/>
             		<?php } 
             			else if($class==='Business' && $counta==='1' && $countc==='2') { ?>
             			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	             		<input type="hidden" name="chose_fro" value="<?php echo $fro; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="bct1" value="<?php echo $bct1; ?>"/>
	              		<input type="hidden" name="bct2" value="<?php echo $bct2; ?>"/>
	              		<input type="hidden" name="bat1" value="<?php echo $bat1; ?>"/>
	              		<input type="hidden" name="bat2" value="<?php echo $bat2; ?>"/>
	              		<input type="hidden" name="btotr" value="<?php echo $btotr; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="cname1" value="<?php echo $cname1; ?>"/>
	              		<input type="hidden" name="cage1" value="<?php echo $cage1; ?>"/>
	              		<input type="hidden" name="csex1" value="<?php echo $csex1; ?>"/>
	              		<input type="hidden" name="cname2" value="<?php echo $cname2; ?>"/>
	              		<input type="hidden" name="cage2" value="<?php echo $cage2; ?>"/>
	              		<input type="hidden" name="csex2" value="<?php echo $csex2; ?>"/>
             		<?php } 
             			else if($class==='Economy' && $counta==='2' && $countc==='1') { ?>
             			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	             		<input type="hidden" name="chose_fro" value="<?php echo $fro; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="ect1" value="<?php echo $ect1; ?>"/>
	              		<input type="hidden" name="ect2" value="<?php echo $ect2; ?>"/>
	              		<input type="hidden" name="eat1" value="<?php echo $eat1; ?>"/>
	              		<input type="hidden" name="eat2" value="<?php echo $eat2; ?>"/>
	              		<input type="hidden" name="etotr" value="<?php echo $etotr; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="aname2" value="<?php echo $aname2; ?>"/>
						<input type="hidden" name="aage2" value="<?php echo $aage2; ?>"/>
						<input type="hidden" name="asex2" value="<?php echo $asex2; ?>"/>
	              		<input type="hidden" name="cname1" value="<?php echo $cname1; ?>"/>
	              		<input type="hidden" name="cage1" value="<?php echo $cage1; ?>"/>
	              		<input type="hidden" name="csex1" value="<?php echo $csex1; ?>"/>
             		<?php } 
             			else if($class==='Business' && $counta==='2' && $countc==='1') { ?>
             			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	             		<input type="hidden" name="chose_fro" value="<?php echo $fro; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="bct1" value="<?php echo $bct1; ?>"/>
	              		<input type="hidden" name="bct2" value="<?php echo $bct2; ?>"/>
	              		<input type="hidden" name="bat1" value="<?php echo $bat1; ?>"/>
	              		<input type="hidden" name="bat2" value="<?php echo $bat2; ?>"/>
	              		<input type="hidden" name="btotr" value="<?php echo $btotr; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="aname2" value="<?php echo $aname2; ?>"/>
						<input type="hidden" name="aage2" value="<?php echo $aage2; ?>"/>
						<input type="hidden" name="asex2" value="<?php echo $asex2; ?>"/>
	              		<input type="hidden" name="cname1" value="<?php echo $cname1; ?>"/>
	              		<input type="hidden" name="cage1" value="<?php echo $cage1; ?>"/>
	              		<input type="hidden" name="csex1" value="<?php echo $csex1; ?>"/>
             		<?php } 
             			else if($class==='Economy' && $counta==='2' && $countc==='2') { ?>
             			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	             		<input type="hidden" name="chose_fro" value="<?php echo $fro; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="ect1" value="<?php echo $ect1; ?>"/>
	              		<input type="hidden" name="ect2" value="<?php echo $ect2; ?>"/>
	              		<input type="hidden" name="eat1" value="<?php echo $eat1; ?>"/>
	              		<input type="hidden" name="eat2" value="<?php echo $eat2; ?>"/>
	              		<input type="hidden" name="etotr" value="<?php echo $etotr; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="aname2" value="<?php echo $aname2; ?>"/>
						<input type="hidden" name="aage2" value="<?php echo $aage2; ?>"/>
						<input type="hidden" name="asex2" value="<?php echo $asex2; ?>"/>
	              		<input type="hidden" name="cname1" value="<?php echo $cname1; ?>"/>
	              		<input type="hidden" name="cage1" value="<?php echo $cage1; ?>"/>
	              		<input type="hidden" name="csex1" value="<?php echo $csex1; ?>"/>
	              		<input type="hidden" name="cname2" value="<?php echo $cname2; ?>"/>
	              		<input type="hidden" name="cage2" value="<?php echo $cage2; ?>"/>
	              		<input type="hidden" name="csex2" value="<?php echo $csex2; ?>"/>
             		<?php } 
             			else if($class==='Business' && $counta==='2' && $countc==='2') { ?> 
             			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	             		<input type="hidden" name="chose_fro" value="<?php echo $fro; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="bct1" value="<?php echo $bct1; ?>"/>
	              		<input type="hidden" name="bct2" value="<?php echo $bct2; ?>"/>
	              		<input type="hidden" name="bat1" value="<?php echo $bat1; ?>"/>
	              		<input type="hidden" name="bat2" value="<?php echo $bat2; ?>"/>
	              		<input type="hidden" name="btotr" value="<?php echo $btotr; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="aname2" value="<?php echo $aname2; ?>"/>
						<input type="hidden" name="aage2" value="<?php echo $aage2; ?>"/>
						<input type="hidden" name="asex2" value="<?php echo $asex2; ?>"/>
	              		<input type="hidden" name="cname1" value="<?php echo $cname1; ?>"/>
	              		<input type="hidden" name="cage1" value="<?php echo $cage1; ?>"/>
	              		<input type="hidden" name="csex1" value="<?php echo $csex1; ?>"/>
	              		<input type="hidden" name="cname2" value="<?php echo $cname2; ?>"/>
	              		<input type="hidden" name="cage2" value="<?php echo $cage2; ?>"/>
	              		<input type="hidden" name="csex2" value="<?php echo $csex2; ?>"/>
             		<?php }
             		}
              		else { 
              			if($class==='Economy' && $counta==='1' && $countc==='0') { ?>
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="ect1" value="<?php echo $ect1; ?>"/>
	              		<input type="hidden" name="eat1" value="<?php echo $eat1; ?>"/>
	              		<input type="hidden" name="etot1" value="<?php echo $etot1; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
              		<?php	}
              			else if($class==='Business' && $counta==='1' && $countc==='0') { ?>
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="bct1" value="<?php echo $bct1; ?>"/>
	              		<input type="hidden" name="bat1" value="<?php echo $bat1; ?>"/>
	              		<input type="hidden" name="btot1" value="<?php echo $btot1; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
              		<?php	} 
              			else if($class==='Economy' && $counta==='1' && $countc==='1') { ?>
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="ect1" value="<?php echo $ect1; ?>"/>
	              		<input type="hidden" name="eat1" value="<?php echo $eat1; ?>"/>
	              		<input type="hidden" name="etot1" value="<?php echo $etot1; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="cname1" value="<?php echo $cname1; ?>"/>
	              		<input type="hidden" name="cage1" value="<?php echo $cage1; ?>"/>
	              		<input type="hidden" name="csex1" value="<?php echo $csex1; ?>"/>
              		<?php } 
              			else if($class==='Business' && $counta==='1' && $countc==='1') {  ?>
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="bct1" value="<?php echo $bct1; ?>"/>
	              		<input type="hidden" name="bat1" value="<?php echo $bat1; ?>"/>
	              		<input type="hidden" name="btot1" value="<?php echo $btot1; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="cname1" value="<?php echo $cname1; ?>"/>
	              		<input type="hidden" name="cage1" value="<?php echo $cage1; ?>"/>
	              		<input type="hidden" name="csex1" value="<?php echo $csex1; ?>"/>
              		<?php } 
              			else if($class==='Economy' && $counta==='1' && $countc==='2') { ?>
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="ect1" value="<?php echo $ect1; ?>"/>
	              		<input type="hidden" name="eat1" value="<?php echo $eat1; ?>"/>
	              		<input type="hidden" name="etot1" value="<?php echo $etot1; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="cname1" value="<?php echo $cname1; ?>"/>
	              		<input type="hidden" name="cage1" value="<?php echo $cage1; ?>"/>
	              		<input type="hidden" name="csex1" value="<?php echo $csex1; ?>"/>
	              		<input type="hidden" name="cname2" value="<?php echo $cname2; ?>"/>
	              		<input type="hidden" name="cage2" value="<?php echo $cage2; ?>"/>
	              		<input type="hidden" name="csex2" value="<?php echo $csex2; ?>"/>
              		<?php } 
              			else if($class==='Business' && $counta==='1' && $countc==='2') { ?>
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="bct1" value="<?php echo $bct1; ?>"/>
	              		<input type="hidden" name="bat1" value="<?php echo $bat1; ?>"/>
	              		<input type="hidden" name="btot1" value="<?php echo $btot1; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="cname1" value="<?php echo $cname1; ?>"/>
	              		<input type="hidden" name="cage1" value="<?php echo $cage1; ?>"/>
	              		<input type="hidden" name="csex1" value="<?php echo $csex1; ?>"/>
	              		<input type="hidden" name="cname2" value="<?php echo $cname2; ?>"/>
	              		<input type="hidden" name="cage2" value="<?php echo $cage2; ?>"/>
	              		<input type="hidden" name="csex2" value="<?php echo $csex2; ?>"/>
              		<?php } 
              			else if($class==='Economy' && $counta==='2' && $countc==='0') { ?>
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="ect1" value="<?php echo $ect1; ?>"/>
	              		<input type="hidden" name="eat1" value="<?php echo $eat1; ?>"/>
	              		<input type="hidden" name="etot1" value="<?php echo $etot1; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="aname2" value="<?php echo $aname2; ?>"/>
	              		<input type="hidden" name="aage2" value="<?php echo $aage2; ?>"/>
	              		<input type="hidden" name="asex2" value="<?php echo $asex2; ?>"/>
              		<?php } 
              			else if($class==='Business' && $counta==='2' && $countc==='0') { ?>
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="bct1" value="<?php echo $bct1; ?>"/>
	              		<input type="hidden" name="bat1" value="<?php echo $bat1; ?>"/>
	              		<input type="hidden" name="btot1" value="<?php echo $btot1; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="aname2" value="<?php echo $aname2; ?>"/>
	              		<input type="hidden" name="aage2" value="<?php echo $aage2; ?>"/>
	              		<input type="hidden" name="asex2" value="<?php echo $asex2; ?>"/>
              		<?php } 
              			else if($class==='Economy' && $counta==='2' && $countc==='1') { ?>
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="ect1" value="<?php echo $ect1; ?>"/>
	              		<input type="hidden" name="eat1" value="<?php echo $eat1; ?>"/>
	              		<input type="hidden" name="etot1" value="<?php echo $etot1; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="aname2" value="<?php echo $aname2; ?>"/>
	              		<input type="hidden" name="aage2" value="<?php echo $aage2; ?>"/>
	              		<input type="hidden" name="asex2" value="<?php echo $asex2; ?>"/>
	              		<input type="hidden" name="cname1" value="<?php echo $cname1; ?>"/>
	              		<input type="hidden" name="cage1" value="<?php echo $cage1; ?>"/>
	              		<input type="hidden" name="csex1" value="<?php echo $csex1; ?>"/>
              		<?php } 
              			else if($class==='Business' && $counta==='2' && $countc==='1') { ?>
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="bct1" value="<?php echo $bct1; ?>"/>
	              		<input type="hidden" name="bat1" value="<?php echo $bat1; ?>"/>
	              		<input type="hidden" name="btot1" value="<?php echo $btot1; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="aname2" value="<?php echo $aname2; ?>"/>
	              		<input type="hidden" name="aage2" value="<?php echo $aage2; ?>"/>
	              		<input type="hidden" name="asex2" value="<?php echo $asex2; ?>"/>
	              		<input type="hidden" name="cname1" value="<?php echo $cname1; ?>"/>
	              		<input type="hidden" name="cage1" value="<?php echo $cage1; ?>"/>
	              		<input type="hidden" name="csex1" value="<?php echo $csex1; ?>"/>
              		<?php }
              			else if($class==='Economy' && $counta==='2' && $countc==='2') { ?>
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="ect1" value="<?php echo $ect1; ?>"/>
	              		<input type="hidden" name="eat1" value="<?php echo $eat1; ?>"/>
	              		<input type="hidden" name="etot1" value="<?php echo $etot1; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="aname2" value="<?php echo $aname2; ?>"/>
	              		<input type="hidden" name="aage2" value="<?php echo $aage2; ?>"/>
	              		<input type="hidden" name="asex2" value="<?php echo $asex2; ?>"/>
	              		<input type="hidden" name="cname1" value="<?php echo $cname1; ?>"/>
	              		<input type="hidden" name="cage1" value="<?php echo $cage1; ?>"/>
	              		<input type="hidden" name="csex1" value="<?php echo $csex1; ?>"/>
	              		<input type="hidden" name="cname2" value="<?php echo $cname2; ?>"/>
	              		<input type="hidden" name="cage2" value="<?php echo $cage2; ?>"/>
	              		<input type="hidden" name="csex2" value="<?php echo $csex2; ?>"/>
              		<?php } 
              			else if($class==='Business' && $counta==='2' && $countc==='2') { ?>
              			<input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
	             		<input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
	             		<input type="hidden" name="chose_to" value="<?php echo $to; ?>"/>
	              		<input type="hidden" name="class" value="<?php echo $class; ?>"/>
	              		<input type="hidden" name="bct1" value="<?php echo $bct1; ?>"/>
	              		<input type="hidden" name="bat1" value="<?php echo $bat1; ?>"/>
	              		<input type="hidden" name="btot1" value="<?php echo $btot1; ?>"/>
	              		<input type="hidden" name="aname1" value="<?php echo $aname1; ?>"/>
	              		<input type="hidden" name="aage1" value="<?php echo $aage1; ?>"/>
	              		<input type="hidden" name="asex1" value="<?php echo $asex1; ?>"/>
	              		<input type="hidden" name="aname2" value="<?php echo $aname2; ?>"/>
	              		<input type="hidden" name="aage2" value="<?php echo $aage2; ?>"/>
	              		<input type="hidden" name="asex2" value="<?php echo $asex2; ?>"/>
	              		<input type="hidden" name="cname1" value="<?php echo $cname1; ?>"/>
	              		<input type="hidden" name="cage1" value="<?php echo $cage1; ?>"/>
	              		<input type="hidden" name="csex1" value="<?php echo $csex1; ?>"/>
	              		<input type="hidden" name="cname2" value="<?php echo $cname2; ?>"/>
	              		<input type="hidden" name="cage2" value="<?php echo $cage2; ?>"/>
	              		<input type="hidden" name="csex2" value="<?php echo $csex2; ?>"/>
              		<?php }
              		} 
              		}
              		?>
	                <input type="hidden" name="puname" value="<?php echo $puname; ?>"/>
	                <input type="hidden" name="puadd" value="<?php echo $puadd; ?>"/>
	                <input type="hidden" name="puphno" value="<?php echo $puphno; ?>"/>
	                <input type="hidden" name="pumail" value="<?php echo $pumail; ?>"/>
	                <button type="submit" id="book_f" name="book_f" class="btn btn-primary">Pay</button></center>
				</form>
			</div>
		</div>
		<div class="col-lg-4">
			
		</div>
	</div>

<?php include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/footer.php'; ?>