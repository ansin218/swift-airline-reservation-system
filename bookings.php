<?php 
  include $_SERVER["DOCUMENT_ROOT"].'/swift/core/init.php';
  include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/header.php';
?>
      
      <legend>My Bookings</legend>

      <?php
        $uid=$f_data['f_id']; //Assigns logged in id to a variable
        $query="SELECT * FROM `passenger_details` WHERE `p_fid` = '$uid'"; //Sorts by date time
        $result=mysql_query($query);
        if($result) {
        while($row=mysql_fetch_assoc($result))
        {
          if($uid===$row['p_fid']) //Checks if the logged in id matches with id in DB
          { 
            $pnr = $row['p_pnr'];
            $fno = $row['p_fno'];
            echo '<form action="cancel.php" method="POST">';
            echo 'Flight No: '.$row['p_fno'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            echo 'From: '.$row['p_from'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            echo 'To: '.$row['p_to'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            echo 'Class: '.$row['p_class'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            echo 'PNR Number: '.$row['p_pnr'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'<br/>';
            echo 'Departure Date: '.$row['p_dedate'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            echo 'Departure Time: '.$row['p_detime'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            echo 'Arrival Date: '.$row['p_ardate'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
            echo 'Arrival Time: '.$row['p_artime'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'<br/>';
            echo 'Passenger Name: '.$row['p_name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'<br>';
            echo 'Passenger Age: '.$row['p_age'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'<br>';
            echo 'Passenger Sex: '.$row['p_sex'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'<br>';
            echo 'Passenger Type: '.$row['p_passtype'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'<br><br>';
            echo "<input type='hidden' value='$pnr' id='p_pnr' name='p_pnr' />";
            echo "<input type='hidden' value='$fno' id='p_fno' name='p_fno' />";
            if($row['p_status']==='Booked') {
            echo '<button type="submit" value="cancel" name="cancel" class="btn btn-primary">Cancel Bookings</button>';
            echo '<br/><hr>';
            echo '</form>';
          } else {
            echo '<br/><hr>';
            echo '</form>';
           }
          }
        }
      }
?>
    
<?php include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/footer.php'; ?>