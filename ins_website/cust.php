<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
	include_once("includes/form_functions.php");
	if(isset($_SESSION['cust_id'])) {
		redirect_to('cust/home.php');
	}
	// START FORM PROCESSING
	if (isset($_POST['Submit'])) { // Form has been submitted.
		$errors = array();

		// perform validations on the form data
		$required_fields = array('cu_id', 'passwd');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('cu_id' => 30, 'passwd' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$username = trim(mysql_prep($_POST['cu_id']));
		$password = trim(mysql_prep($_POST['passwd']));
		$hashed_password=sha1($password);

		
		if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT cust_id, name ";
			$query .= "FROM customer ";
			$query .= "WHERE cust_id = '{$username}' ";
			$query .= "AND hashed_password = '{$hashed_password}' ";
			$query .= "LIMIT 1";
			$result_set = mysql_query($query);
			confirm_query($result_set);
			if (mysql_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysql_fetch_array($result_set);
				$_SESSION['cust_id'] = $found_user['cust_id'];
				$_SESSION['name'] = $found_user['name'];
				redirect_to("cust/home.php");
			} else {
				// username/password combo was not found in the database
				$message = "Username/password combination incorrect.<br />
					Please make sure your caps lock key is off and try again.";
			}
		} else {
			if (count($errors) == 1) {
				$message = "There was 1 error in the form.";
			} else {
				$message = "There were " . count($errors) . " errors in the form.";
			}
		}
		
	} else { // Form has not been submitted.
		if (isset($_GET['logout']) && $_GET['logout'] == 1) {
			//$message = "You are now logged out.";
		} 
		$username = "";
		$password = "";
	}
?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="your description goes here" />
<meta name="keywords" content="your,keywords,goes,here" />

<link rel="stylesheet" type="text/css" href="variant.css" media="screen,projection" title="Variant Portal" />


<title>Insurance Corp</title>
</head>

<body>

<?php require_once("topbarcust.php"); ?>


<div id="main">

<h2>The idea behind the Insurance:</h2>
<p>In law and economics, insurance is a form of risk management primarily used to hedge against the risk of a contingent, uncertain loss. Insurance is defined as the equitable transfer of the risk of a loss, from one entity to another, in exchange for payment. An insurer is a company selling the insurance; an insured or policyholder is the person or entity buying the insurance policy. The insurance rate is a factor used to determine the amount to be charged for a certain amount of insurance coverage, called the premium. Risk management, the practice of appraising and controlling risk, has evolved as a discrete field of study and practice.</p>

<p class="block"><strong>Please note:</strong> Any risk that can be quantified can potentially be insured. Specific kinds of risk that may give rise to claims are known as "perils". An insurance policy will set out in detail which perils are covered by the policy and which are not. Below are (non-exhaustive) lists of the many different types of insurance that exist. A single policy may cover risks in one or more of the categories set out below. For example, auto insurance would typically cover both property risk (covering the risk of theft or damage to the car) and liability risk (covering legal claims from causing an accident). A homeowner's insurance policy in the U.S. typically includes property insurance covering damage to the home and the owner's belongings, liability insurance covering certain legal claims against the owner, and even a small amount of coverage for medical expenses of guests who are injured on the owner's property.</p>
    
<h3>Claims</h3>
<p>Claims and loss handling is the materialized utility of insurance; it is the actual "product" paid for. Claims may be filed by insureds directly with the insurer or through brokers or agents. The insurer may require that the claim be filed on its own proprietary forms, or may accept claims on a standard industry form such as those produced by ACORD.

Insurance company claims departments employ a large number of claims adjusters supported by a staff of records management and data entry clerks. Incoming claims are classified based on severity and are assigned to adjusters whose settlement authority varies with their knowledge and experience. The adjuster undertakes an investigation of each claim, usually in close cooperation with the insured, determines if coverage is available under the terms of the insurance contract, and if so, the reasonable monetary value of the claim, and authorizes payment.</p>

<p>Version: 1.0 (June 26, 2010)</p>
</div>

<?php require_once("sidebar_user.php"); ?>

<?php require_once("footer.php"); ?>


</body>
</html>

