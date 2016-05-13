<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php
	include_once("includes/form_functions.php");

	// START FORM PROCESSING
	if (isset($_POST['button'])) { // Form has been submitted.
		$errors = array();

		// perform validations on the form data
		$required_fields = array('policy_no');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('policy_no' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$policy_no = trim(mysql_prep($_POST['policy_no']));


		
		if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT c.cust_id, c.name, c.ssn, c.email, a.agent_id, a.name, a.phone, a.email, pay.policy_no, pay.renewal_date, pay.premium ";
			$query .= "FROM customer c, agent a, payment pay, policy pol ";
			$query .= "WHERE pol.policy_no = '{$policy_no}' AND pol.policy_no=pay.policy_no ";
			$query .= "AND c.cust_id=pol.cust_id AND a.agent_id=pol.agent_id ";
			$query .= "LIMIT 1";
			$result_set = mysql_query($query);
			confirm_query($result_set);
			if (mysql_num_rows($result_set) == 1) {
				ini_set();
				$message = "policy number was found successfully";
				//define the receiver of the email
				$to = 'abrar2002as@gmail.com';
				//define the subject of the email
				$subject = 'fuck off';
				//define the message to be sent. Each line should be separated with \n
				$message = "Hello World!\n\nThis is my first mail.";
				//define the headers we want passed. Note that they are separated with \r\n
				$headers = "From: abrar@example.com\r\nReply-To: webmaster@example.com";
				//send the email
				$mail_sent = mail( $to, $subject, $message, $headers );
				//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
				
			} else {
				// username/password combo was not found in the database
				$message = "Specified policy number was not found in the database, please check the policy number";
			}
		} else {
			if (count($errors) == 1) {
				$message = "There was 1 error in the form.";
			} else {
				$message = "There were " . count($errors) . " errors in the form.";
			}
		}
		
	} else { // Form has not been submitted.

		$policy_int = "";

	}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="your description goes here" />
<meta name="keywords" content="your,keywords,goes,here" />

<link rel="stylesheet" type="text/css" href="variant.css" media="screen,projection" title="Variant Portal" />


<title>Intimate Customers</title>

<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php require_once("topbar.php"); ?>

<div id="main">

    


      
<h3 align="left"><?php if (!empty($message)) {echo "<p class=\"message\">" . $message . "</p>";} ?>
          <?php if (!empty($errors)) { display_errors($errors); } ?>&nbsp;</h3>
      <form id="form1" name="form1" method="post" action="inti_cust.php">
        <h3 align="left">Intimate customer holding policy number 
          <input type="text" name="policy_no" id="textfield" />
          <input type="submit" name="button" id="policy_int" value="Send Intimation Mail" />
      </h3>
<p align="left"></p>
      </form>     
      
</div>


<?php require_once("sidebar.php"); ?>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>

   