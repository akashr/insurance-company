<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php
	include_once("includes/form_functions.php");
	if(isset($_SESSION['agent_id'])) {
		redirect_to('agent/home.php');
	}
	// START FORM PROCESSING
	if (isset($_POST['Submit'])) { // Form has been submitted.
		$errors = array();

		// perform validations on the form data
		$required_fields = array('ag_id', 'passwd');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('ag_id' => 30, 'passwd' => 30);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$Agent_id = trim(mysql_prep($_POST['ag_id']));
		$password = trim(mysql_prep($_POST['passwd']));
		$hashed_password= sha1($password);

		
		if ( empty($errors) ) {
			// Check database to see if username and the hashed password exist there.
			$query = "SELECT agent_id, name ";
			$query .= "FROM agent ";
			$query .= "WHERE agent_id = '{$Agent_id}' ";
			$query .= "AND hashed_password = '{$hashed_password}' ";
			$query .= "LIMIT 1";
			$result_set = mysql_query($query);
			confirm_query($result_set);
			if (mysql_num_rows($result_set) == 1) {
				// username/password authenticated
				// and only 1 match
				$found_user = mysql_fetch_array($result_set);
				$_SESSION['agent_id'] = $found_user['agent_id'];
				$_SESSION['name'] = $found_user['name'];
				redirect_to("agent/home.php");
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


<title>Agent Login</title>

<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php require_once("topbarcust.php"); ?>


<div id="main">

<h2>Company : </h2>
<p></p>
    
<h3>Risk which can be insured by private companies</h3>
<ul>
  <li>
  Large number of similar exposure units. Since insurance operates through pooling resources, the majority of insurance policies are provided for individual members of large classes, allowing insurers to benefit from the law of large numbers in which predicted losses are similar to the actual losses. Exceptions include Lloyd's of London, which is famous for insuring the life or health of actors, actresses and sports figures. However, all exposures will have particular differences, which may lead to different rates.
<li>Definite Loss. The loss takes place at a known time, in a known place, and from a known cause. The classic example is death of an insured person on a life insurance policy. Fire, automobile accidents, and worker injuries may all easily meet this criterion. Other types of losses may only be definite in theory. Occupational disease, for instance, may involve prolonged exposure to injurious conditions where no specific time, place or cause is identifiable. Ideally, the time, place and cause of a loss should be clear enough that a reasonable person, with sufficient information, could objectively verify all three elements.
<li>Accidental Loss. The event that constitutes the trigger of a claim should be fortuitous, or at least outside the control of the beneficiary of the insurance. The loss should be 'pure,' in the sense that it results from an event for which there is only the opportunity for cost. Events that contain speculative elements, such as ordinary business risks, are generally not considered insurable.
<li>Large Loss. The size of the loss must be meaningful from the perspective of the insured. Insurance premiums need to cover both the expected cost of losses, plus the cost of issuing and administering the policy, adjusting losses, and supplying the capital needed to reasonably assure that the insurer will be able to pay claims. For small losses these latter costs may be several times the size of the expected cost of losses. There is hardly any point in paying such costs unless the protection offered has real value to a buyer.
<li>Affordable Premium. If the likelihood of an insured event is so high, or the cost of the event so large, that the resulting premium is large relative to the amount of protection offered, it is not likely that anyone will buy insurance, even if on offer. Further, as the accounting profession formally recognizes in financial accounting standards, the premium cannot be so large that there is not a reasonable chance of a significant loss to the insurer. If there is no such chance of loss, the transaction may have the form of insurance, but not the substance.

</ul>
<p class="block"> Address from Director (June 26, 2010)</p>
</div>

<div id="sidebar">

<ul id="navitab">
<li><a class="current" href="cust.php">User</a></li>
<li><a href="agent.php">Agent</a></li>
</ul>

<form id="form1" name="form1" method="post" action="agent.php">
<?php if (!empty($message)) {echo "<p class=\"message\">" . $message . "</p>";} ?>
        <?php if (!empty($errors)) { display_errors($errors); } ?>
<table width="280" height="128" border="0" class="block">
          <tr>
            <td width="20"></td>
            <td width="76"><label class="fontu">Agent Name: </label></td>
            <td width="150"><input type="text" name="ag_id" /></td>
          </tr>
          <tr>
            <td width="20"></td>
            <td class="fontp">Password: </td>
            <td><input type="password" name="passwd" /></td>
          </tr>
          <tr>
            <td width="20"></td>
            <td><label></label></td>
            <td><input type="submit" name="Submit" value="Submit" /></td>
          </tr>
      </table>
</form>
<h2>&nbsp;</h2>
<h2>&nbsp;</h2>
<p>

</p>

<div class="splitleft">
<h6>Risk which can be insured by private companies</h6>
<ul>
<li>Jun 29: <a href="#"> New FDI policy </a></li>
<li>Jun 26: <a href="#"> New Office at Indore </a></li>
<li>Jun 24: <a href="#"> Try our New Policy for elderly</a></li>
</ul>

</p>
</ul>
</div>


<hr />
</div>



</div>
<?php require_once("footer.php"); ?>
</body>
</html>

