<?php 
  include $_SERVER["DOCUMENT_ROOT"].'/swift/core/init.php';
  include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/header.php';
?>

      <div class="row">
        <div class="col-lg-4">
          <div class="well bs-component">
            <form class="form-horizontal" action="" method="GET">
              <legend>Search Flights</legend>
              <div class="form-group">
                <div class="col-lg-10">
                  <div class="radio">
                    <label>
                      <input type="radio" name="path" value="oneway" onclick="setReadOnly(this)">
                      One Way
                    </label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>
                      <input type="radio" name="path" value="return" checked onclick="setReadOnly(this)">
                      Return
                    </label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <label class="control-label" for="focusedInput">From</label>
                  <input class="form-control" name="from_city" id="from_city" value="<?php if(isset($_GET['from_city'])) { echo htmlentities ($_GET['from_city']); } else echo '';?>" required type="text">
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <label class="control-label" for="focusedInput">To</label>
                  <input class="form-control" name="to_city" id="to_city" value="<?php if(isset($_GET['to_city'])) { echo htmlentities ($_GET['to_city']); } else echo '';?>" required type="text">
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <label class="control-label" for="focusedInput">Departure Date</label>
                  <input class="form-control" name="departure_date" id="departure_date" value="<?php if(isset($_GET['departure_date'])) { echo htmlentities ($_GET['departure_date']); } else echo '';?>" required type="text">
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <label class="control-label" for="focusedInput">Arrival Date</label>
                  <input class="form-control" name="return_date" id="return_date" value="<?php if(isset($_GET['return_date'])) { echo htmlentities ($_GET['return_date']); } else echo '';?>" required type="text">
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                <label for="select" class="control-label">Number of Adults</label>
                  <select class="form-control" name="count_a" id="select">
                    <option value="1">1</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                <label for="select" class="control-label">Number of Children</label>
                  <select class="form-control" name="count_c" id="select">
                    <option value="0">0</option>
                    <option value="1">1</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-12">
                  <label for="select" class="control-label">Class</label>
                  <select class="form-control" name="class" id="select">
                    <option name="economy" value="Economy">Economy</option>
                    <option name="business" value="Business">Business</option>
                  </select>
                  <br>
                </div>
              </div>
              <div class="form-group">
                <center><button type="submit" id="submit" value="submit" name="submit" class="btn btn-primary">Submit</button></center>
              </div>
            </form>
          </div>
        </div>

        <div class="col-lg-8">
          <div class="well bs-component">
            <form class="form-horizontal" action="book.php" method="GET">
            <?php 
            
            if(isset($_GET['path'])===true 
              && isset($_GET['from_city'])===true && isset($_GET['to_city'])===true
              && isset($_GET['departure_date'])===true
              && isset($_GET['count_a'])===true && isset($_GET['count_c'])===true && isset($_GET['class'])===true) {
              
              $from = $_GET['from_city'];
              $to = $_GET['to_city'];
              $departdate = $_GET['departure_date'];
              $class = $_GET['class'];
              $path = $_GET['path'];
              $counta = $_GET['count_a'];
              $countc = $_GET['count_c'];

              if($path==='oneway') {
              echo '<legend>Flights from '.$from.' to '.$to.'</legend>';
              $query = "SELECT * FROM `flight_search` WHERE `from_city`= '$from' AND `to_city` = '$to' AND `departure_date` = '$departdate'";
              $result = mysql_query($query);
              if($result) {
              if(mysql_num_rows($result) > 0) {
              while($row = mysql_fetch_assoc($result)) {
                ?>
                <table class="table">
                  <thead>
                  <tr>
                    <th>Flight No</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Seats Left</th>
                    <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php if($class==='Economy') {  ?>
                   <td><input type="radio" name="chose_to" value="<?php echo $row['fno']; ?>"/><?php echo $row['fno']; ?></td>
                   <td><?php echo $row['departure_time']; ?></td>
                   <td><?php echo $row['arrival_time']; ?></td>
                   <td><?php echo $row['e_seats_left']; ?></td>
                   <td><?php echo $row['e_price']; ?></td>
                   <?php } else if($class==='Business') { ?> 
                   <td><input type="radio" name="chose_to" value="<?php echo $row['fno']; ?>"/><?php echo $row['fno']; ?></td>
                   <td><?php echo $row['departure_time']; ?></td>
                   <td><?php echo $row['arrival_time']; ?></td>
                   <td><?php echo $row['b_seats_left']; ?></td>
                   <td><?php echo $row['b_price']; ?></td>
                <?php } else { 'Not enough seats left, please search again!'; }
              }?>
              </tr>
              </tbody>
              </table>
              <input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
              <input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
              <center><button type="submit" id="class" name="class" value="<?php echo $class; ?>" class="btn btn-primary">Choose Flights</button></center>
              <?php
            } else { echo 'No flights found';}
          }
              else {  die(mysql_error()); }
          } 
          else if($path==='return') {
            echo '<legend>Flights from '.$from.' to '.$to.'</legend>';
              $query1 = "SELECT * FROM `flight_search` WHERE `from_city`= '$from' AND `to_city` = '$to' AND `departure_date` = '$departdate'";
              $result1 = mysql_query($query1);
              if($result1) {
              if(mysql_num_rows($result1) > 0) {
              while($row1 = mysql_fetch_assoc($result1)) {
                ?>
                <table class="table">
                  <thead>
                  <tr>
                    <th>Flight No</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Seats Left</th>
                    <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php if($class==='Economy') {  ?>

                   <td><input type="radio" required name="chose_to" value="<?php echo $row1['fno']; ?>"/><?php echo $row1['fno']; ?></td>
                   <td><?php echo $row1['departure_time']; ?></td>
                   <td><?php echo $row1['arrival_time']; ?></td>
                   <td><?php echo $row1['e_seats_left']; ?></td>
                   <td><?php echo $row1['e_price']; ?></td>
                  </tr>
                </tbody>
                </table> <?php } else { ?>  
                    <td><input type="radio" required name="chose_fro" value="<?php echo $row2['fno']; ?>"/><?php echo $row2['fno']; ?></td>
                   <td><?php echo $row2['departure_time']; ?></td>
                   <td><?php echo $row2['arrival_time']; ?></td>
                   <td><?php echo $row2['b_seats_left']; ?></td>
                   <td><?php echo $row2['b_price']; ?></td>
                <?php }
              }
            } else { echo 'No flights found';}
          }
              else {  die(mysql_error()); }
              echo '<legend>Flights from '.$to.' to '.$from.'</legend>';
              if(isset($_GET['return_date'])===true) {
                $returndate = $_GET['return_date'];
              $query2 = "SELECT * FROM `flight_search` WHERE `from_city`= '$to' AND `to_city` = '$from' AND `departure_date` = '$returndate'";
              $result2 = mysql_query($query2);
              if($result2) {
              if(mysql_num_rows($result2) > 0) {
              while($row2 = mysql_fetch_assoc($result2)) {
                ?>
                <table class="table">
                  <thead>
                  <tr>
                    <th>Flight No</th>
                    <th>Departure Time</th>
                    <th>Arrival Time</th>
                    <th>Seats Left</th>
                    <th>Price</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <?php if($class==='Economy') {  ?>
                   <td><input type="radio" required name="chose_fro" value="<?php echo $row2['fno']; ?>"/><?php echo $row2['fno']; ?></td>
                   <td><?php echo $row2['departure_time']; ?></td>
                   <td><?php echo $row2['arrival_time']; ?></td>
                   <td><?php echo $row2['e_seats_left']; ?></td>
                   <td><?php echo $row2['e_price']; ?></td>
                  </tr>
                </tbody>
                </table> <?php } else { ?>  
                   <td><input type="radio" required name="chose_fro" value="<?php echo $row2['fno']; ?>"/><?php echo $row2['fno']; ?></td>
                   <td><?php echo $row2['departure_time']; ?></td>
                   <td><?php echo $row2['arrival_time']; ?></td>
                   <td><?php echo $row2['b_seats_left']; ?></td>
                   <td><?php echo $row2['b_price']; ?></td>
                <?php }
              }?>
              <input type="hidden" name="count_a" value="<?php echo $counta; ?>"/>
              <input type="hidden" name="count_c" value="<?php echo $countc; ?>"/>
              <center><button type="submit" id="class" value="<?php echo $class; ?>" name="class" class="btn btn-primary">Choose Flights</button></center>
              <?php
            } else { echo 'No flights found';}
          }
              else {  die(mysql_error()); }
          } 
         }
         }
          else { ?>
              <img src="img/airhostess.jpg" width="100%">
              <h3>Services offered by Swift Airlines</h3>
              <h5>Travel across any 4 metro cities in India</h5>
              <h5>Free 3 course meals for every passenger</h5>
              <h5>Free Wi-Fi services offered during your flight</h5>
              <h5>Upto 25 Kg Baggage limit for every passenger</h5>
              <h5>Unlimited Food and Alcohol in Business Class</h5>
              <h5>Book hotels via Swift Airlines and avail 10% discount per room</h5>
              <h5>Discounted travel coupons for every city</h5>
              <h5>Hire cabs or bus via Swift Airlines and avail 10% discount per ticket</h5>
              <h5>Avail wheelchairs and emergency services for disabled at free of cost</h5>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
    
<?php include $_SERVER["DOCUMENT_ROOT"].'/swift/includes/overall/footer.php'; ?>