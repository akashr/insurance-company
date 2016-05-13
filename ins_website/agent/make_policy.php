<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 
include_once("includes/form_functions.php");
$agent_id=$_SESSION['agent_id'];
	if(isset($_POST['submit_policy']))
	{
		$errors = array();

		// perform validations on the form data
		$required_fields = array('premium', 'birthday_year', 'birthday_month', 'birthday_day');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));
		if(empty($errors)){
			
		$policy_updated="";
		$premium=$_POST['premium'];
		$polino=$_GET['polino'];	
			
		$date=$_POST['birthday_year']."-".$_POST['birthday_month']."-".$_POST['birthday_day'];
		$query_payment="INSERT INTO payment VALUES ('{$polino}', {$premium}, '{$date}')  ";
		$result_set_pol = mysql_query($query_payment);
		confirm_query($result_set_pol);
		if($result_set_pol)
		{
			$policy_updated="the policy has been revised";	
		}
		else
			$policy_updated="there was an error revising the policy";
		}
				else
	{
	if (count($errors) == 1) {
				$message = "There was 1 missing field in the form.";
			} else {
				$message = "There were " . count($errors) . " missing fields in the form.";
			}
	}
			 
	}

	
		$query =  "select distinct po.policy_no, po.type,  cust.name from policy po,customer cust ";
		$query .= "where cust.cust_id=po.cust_id and po.agent_id='{$agent_id}' and po.policy_no not in  ";
		$query .= "(select c1.policy_no from payment c1 )";
		$result_set = mysql_query($query);
		confirm_query($result_set);
	
	

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="your description goes here" />
<meta name="keywords" content="your,keywords,goes,here" />

<link rel="stylesheet" type="text/css" href="variant.css" media="screen,projection" title="Variant Portal" />


<title>Make Policy</title>

<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php require_once("topbar.php"); ?>

<div id="main">

<p align="left">&nbsp;</p>

<h4 class="block" align="left">
<a href="make_policy/dispatch_policy.php"> Dispatch Policy      </a><a href="make_policy/update_status.php">Update Status </a><a href="make_policy/extend_policy.php">Extend Policy  </a></h4>

<p align="left">&nbsp;</p>

</div>


<?php require_once("sidebar.php"); ?>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>