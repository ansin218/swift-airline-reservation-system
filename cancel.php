<?php 
  include $_SERVER["DOCUMENT_ROOT"].'/swift/core/init.php';
  include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/header.php';

        if(f_logged_in()===true) {
          if(isset($_POST['p_pnr'])===true && isset($_POST['p_fno'])===true) {
            $uid=$f_data['f_id'];
            $pnr = $_POST['p_pnr'];
            $fno = $_POST['p_fno'];
            $query1="DELETE FROM `passenger_details` WHERE `p_pnr`='$pnr' AND `p_fid`='$uid'";
            $result1=mysql_query($query1);
            $query2=mysql_query("UPDATE `booking_details` SET `b_status`='CANCELLED' WHERE `b_pnr`='$pnr' AND `b_fid`='$uid'");
            $result2=mysql_query($query2);
            $q1 = "SELECT * FROM `booking_details` WHERE `p_pnr`='$pnr' AND `p_fid`='$uid'";
            $r1 = mysql_query($q1);
            if($r1) {
              if(mysql_num_rows($r1)>0) {
                while($row1 = mysql_fetch_assoc($r1)) {
                  $btot = $row1['b_total'];
                  $bprice = $row1['b_price'];
                }       
              } 
            }

            $fname = $f_data['f_fname'];
            $lname = $f_data['f_lname'];
            $name = $fname.' '.$lname;
            $q2 = "SELECT * FROM `card_details` WHERE `c_name`='$name'";
            $r2 = mysql_query($q2);
            if($r2) {
              if(mysql_num_rows($r2)>0) {
                while($row2 = mysql_fetch_assoc($r2)) {
                  $balance = $row2['c_balance'];
                }       
              } 
            }

            $q3 = "SELECT `e_seats_left` FROM `flight_search` WHERE `f_id`='$uid'";
            $r3 = mysql_query($q3);
            if($r3) {
              if(mysql_num_rows($r3)>0) {
                while($row3 = mysql_fetch_assoc($r3)) {
                  $e_seats_left = $row3['e_seats_left'];
                }       
              } 
            mysql_query("UPDATE `card_details` SET `c_balance`='$balance+$bprice' WHERE `c_name`='$name'");
            mysql_query("UPDATE `flight_Search` SET `e_seats_left`='$e_seats_left+btot' WHERE `fno`='$fno'");
          }
        }
      }
      echo 'Tickets Cancelled. You will  be redirected to your bookings page in 5 seconds!';
            header('refresh: 5, url=bookings.php');
 include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/footer.php'; 
 ?>