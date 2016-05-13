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


<title>About Us</title>
</head>

<body>


<div id="container">

<div id="toplinks">
<p><a href="#">Link 1</a> &middot; <a href="#">Link 2</a> &middot; <a href="#">Link 3</a> &middot; <a href="#">Link 4</a></p>
</div>

<div id="logo">
<h1><a href="../index.php">Insurance Corp</a></h1>
<p>A trustworthy investment...</p>

</div>


<h2 class="hide">Site menu:</h2>
<ul id="navitab">
<li><a  href="cust.php">Home</a></li>
<li><a href="about_us.php">About Us</a></li>
<li><a href="products.php" class="current">Policies</a></li>
<li><a href="contact_us.php">Contacts</a></li>
<li><a href="downloads.php">Downloads</a></li>
<li><a href="#">News</a></li>

</ul>




<div id="desc">

<div class="splitleft">
<h2>Welcome to our Company !!</h2>
<p>For trust and more ....</p>
</div>

<div class="splitright">
<h2>Sample links:</h2>
<ul>
<li><a href="http://google.com">Google Profile</a></li>
<li><a href="http://facebook.com">Facebook page</a></li>
<li><a href="http://twitter.com/">Twitter Page</a></li>
</ul>
<p class="right"><a href="#">Read more &raquo;</a></p>
</div>
<hr />
</div>


<div id="main">

<h2>Auto insurance</h2>

<p>
Auto insurance protects you against financial loss if you have an accident.

Auto insurance provides property, liability and medical coverage:

   1. Property coverage pays for damage to or theft of the car.
   2. Liability coverage pays for the legal responsibility to others for bodily injury or property damage.
   3. Medical coverage pays for the cost of treating injuries, rehabilitation and sometimes lost wages and funeral expenses.

Most countries require you to buy some, but not all, of these coverages. When a car is used as collateral for a loan the lender usually requires specific coverage. Most auto policies are for six months to a year.</p>

<h2> Home insurance</h2>
<p>
Home insurance provides compensation for damage or destruction of a home from disasters. In some geographical areas, the standard insurances exclude certain types of disasters, such as flood and earthquakes, that require additional coverage. Maintenance-related problems are the homeowners' responsibility. The policy may include inventory, or this can be bought as a separate policy, especially for people who rent housing. In some countries, insurers offer a package which may include liability and legal responsibility for injuries and property damage caused by members of the household, including pets.
</p>
<h2>Health</h2>
<p>
Health insurance policies by the National Health Service in the United Kingdom (NHS) or other publicly-funded health programs will cover the cost of medical treatments. Dental insurance, like medical insurance, is coverage for individuals to protect them against dental costs. In the U.S. and Canada, dental insurance is often part of an employer's benefits package, along with health insurance.
</p>
</div>

<?php require_once("sidebar_user.php"); ?>

<?php require_once("footer.php"); ?>


</body>
</html>

