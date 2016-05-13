<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
	include_once("includes/form_functions.php");
	if(isset($_SESSION['id'])) {
		redirect_to('admin/home.php');
	}
	// START FORM PROCESSING
	if (isset($_POST['Submit'])) { // Form has been submitted.
		$errors = array();

		// perform validations on the form data
		$required_fields = array('uid', 'passwd');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('uid' => 30, 'passwd' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$username = trim(mysql_prep($_POST['uid']));
		$password = trim(mysql_prep($_POST['passwd']));

		
		if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT admin_id, username ";
			$query .= "FROM admin ";
			$query .= "WHERE username = '{$username}' ";
			$query .= "AND password = '{$password}' ";
			$query .= "LIMIT 1";
			$result_set = mysql_query($query);
			confirm_query($result_set);
			if (mysql_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysql_fetch_array($result_set);
				$_SESSION['id'] = $found_user['admin_id'];
				$_SESSION['username'] = $found_user['username'];
				redirect_to("admin/home.php");
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

<div id="container">

<div id="toplinks">
<p><a href="#">Link 1</a> &middot; <a href="#">Link 2</a> &middot; <a href="#">Link 3</a> &middot; <a href="#">Link 4</a></p>
</div>

<div id="logo">
<h1><a href="index.php">Insurance Corp</a></h1>
<p>A trustworthy investment...</p>

</div>


<h2 class="hide">Site menu:</h2>
<ul id="navitab">
<li><a class="current" href="agent.php">Home</a></li>
<li><a href="#">About Us</a></li>
<li><a href="#">Policies</a></li>
<li><a href="#">Contacts</a></li>
<li><a href="#">News</a></li>
<li><a href="#">Partners</a></li>
</ul>


<div id="sidebar">

<ul id="navitab">
<li><a href="admin.php">Officier login:</a></li>
<li><a class="current" href="cust.php">User</a></li>
<li><a class="current" href="agent.php">Agent</a></li>
</ul>

<form id="form1" name="form1" method="post" action="admin.php">
<?php if (!empty($message)) {echo "<p class=\"message\">" . $message . "</p>";} ?>
        <?php if (!empty($errors)) { display_errors($errors); } ?>
<table width="280" height="128" border="0" class="block">
          <tr>
            <td width="10"></td>
            <td width="89"><label class="fontu">Officier Name: </label></td>
            <td width="166"><input type="text" name="uid" /></td>
          </tr>
          <tr>
            <td width="10"></td>
            <td class="fontu">Password: </td>
            <td><input type="password" name="passwd" /></td>
          </tr>
          <tr>
            <td width="10"></td>
            <td><label></label></td>
            <td><input type="submit" name="Submit" value="Submit" /></td>
          </tr>
        </table>
</form>





<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

</div>
</div>
<?php require_once("footer.php"); ?>
</body>
</html>

