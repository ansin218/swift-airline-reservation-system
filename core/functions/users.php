<?php


	function f_recover($mode, $f_mailid) {
		$mode = sanitize($mode);
		$f_mailid = sanitize($f_mailid);
		$f_data = f_data(f_id_from_email($f_mailid),'f_id','f_fname','f_uname');
		if ($mode == 'f_uname') {
			recovery_user_pass($f_mailid, 'Recovery: Your username', "Hello " . $f_data['f_fname'] . ",\n\nYour username is: " . $f_data['f_uname'] . "\n\n-Swift Airlines");
		}
		else if($mode == 'f_password') {
			$generated_password = substr(md5(rand(999, 999999)), 0, 8);
			f_change_password($f_data['f_id'], $generated_password);
			
			update_f($f_data['f_id'], array('f_passrec' => '1'));
			
			recovery_user_pass($f_mailid, 'Recovery: Your password', "Hello " . $f_data['f_fname'] . ",\n\nYour new password is: " . $generated_password . "\n\n-TOFSIS");
		}
	}

	function f_activate($f_mailid, $f_mailcode) {
		$f_mailid = mysql_real_escape_string($f_mailid);
		$f_mailcode = mysql_real_escape_string($f_mailcode);
		if(mysql_result(mysql_query("SELECT COUNT(`f_id`) FROM `flight_users` WHERE `f_mailid` = '$f_mailid' AND `f_mailcode` = '$f_mailcode' AND `f_active` = 0"), 0) == 1) {
			mysql_query("UPDATE `flight_users` SET `f_active` = 1 WHERE `f_mailid` = '$f_mailid' ");
			return true;
		}
		else {
			return false;
		}
	}
	
	function update_f($f_id, $update_data) {
		$update = array();
		array_walk($update_data, 'array_sanitize');
		foreach ($update_data as $field => $data) {
			$update[] = '`' . $field . '` = \'' . $data . '\'';
		}		
		mysql_query("UPDATE `flight_users` SET " . implode(', ',$update) . "WHERE `f_id` = $f_id") or die(mysql_error());
	}

	function f_change_password($f_id, $f_password) {
		$f_id = (int)$f_id;
		$f_password = md5($f_password);
		mysql_query("UPDATE `flight_users` SET `f_password` = '$f_password', `f_passrec` = 0 WHERE `f_id` = $f_id");
	}

	function register_f($register_data) {
		array_walk($register_data, 'array_sanitize');
		$register_data['f_fname'] = ucwords(strtolower($register_data['f_fname']));
		$register_data['f_lname'] = ucwords(strtolower($register_data['f_lname']));
		$register_data['f_password'] = md5($register_data['f_password']);
		$register_data['f_uname'] = strtolower($register_data['f_uname']);
		$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
		$data = '\'' . implode('\', \'', $register_data) . '\'';
		
		mysql_query("INSERT INTO `flight_users` ($fields, `f_regdate`) VALUES ($data, NOW())");
		activation($register_data['f_mailid'], 'Swift Airlines: Activate your account', "Hello " . $register_data['f_fname'] . ", \n\nYou need to activate your account in order to use the features of Swift Airlines. Please click the link below: \n\nhttp://srikanthnatarajan.com/swift/activate.php?f_mailid=" . $register_data['f_mailid'] . "&f_mailcode=" . $register_data['f_mailcode'] . " \n\n-Swift Airlines");
	}

	function f_data($f_id){
		$data = array();
		$f_id = (int)$f_id;
		$func_num_args = func_num_args();
		$func_get_args = func_get_args();
		if($func_num_args > 1) {
			unset($func_get_args[0]);
			$fields = '`'. implode('`, `', $func_get_args) . '`'; 
			$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `flight_users` WHERE `f_id` = $f_id"));			
			return $data;
		}
 	}
 	
	function f_logged_in() {
		return (isset($_SESSION['f_id'])) ? true : false;
	}

	function f_exists($f_uname) {
		$f_uname = sanitize($f_uname);
		$query = mysql_query("SELECT COUNT(`f_id`) FROM `flight_users` WHERE `f_uname`= '$f_uname'");
		return (mysql_result($query, 0) == 1) ? true : false; 
	}

	function f_email_exists($f_mailid) {
		$f_mailid = sanitize($f_mailid);
		$query = mysql_query("SELECT COUNT(`f_id`) FROM `flight_users` WHERE `f_mailid`= '$f_mailid'");
		return (mysql_result($query, 0) == 1) ? true : false; 
	}
	
	function f_regid_exists($f_regid) {
		$f_regid = sanitize($f_regid);
		$query = mysql_query("SELECT COUNT(`f_id`) FROM `flight_users` WHERE `f_regid`= '$f_regid'");
		return (mysql_result($query, 0) == 1) ? true : false; 
	}

	function f_active($f_uname) {
		$f_uname = sanitize($f_uname);
		$query = mysql_query("SELECT COUNT(`f_id`) FROM `flight_users` WHERE `f_uname`= '$f_uname' AND `f_active` = 1");
		return (mysql_result($query, 0) == 1) ? true : false; 
	}

	function f_id_from_username($f_uname) {
		$f_uname = sanitize($f_uname);
		$query = mysql_query("SELECT `f_id` FROM `flight_users` WHERE `f_uname` = '$f_uname'");
		return mysql_result($query, 0, 'f_id');
	} 
	
	function f_id_from_email($f_mailid) {
		$f_mailid = sanitize($f_mailid);
		$query = mysql_query("SELECT `f_id` FROM `flight_users` WHERE `f_mailid` = '$f_mailid'");
		return mysql_result($query, 0, 'f_id');
	} 
	
	function f_login($f_uname, $f_password) {
		$f_id = f_id_from_username($f_uname);
		$f_uname = sanitize($f_uname);
		$f_password = md5($f_password);
		$query = mysql_query("SELECT COUNT(`f_id`) FROM `flight_users` WHERE `f_uname`= '$f_uname' AND `f_password` = '$f_password'");
		return (mysql_result($query, 0) == 1) ? $f_id : false;
	}

?>