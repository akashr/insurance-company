<?php
	session_start();
	
	function logged_in() {
		return isset($_SESSION['cust_id']);
	}
	
	function confirm_logged_in() {
		if (!logged_in()) {
			redirect_to("../cust.php");
		}
	}
?>
