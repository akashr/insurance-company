<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 
include_once("../includes/form_functions.php");
$agent_id=$_SESSION['agent_id'];
	if(isset($_POST['submit_policy']))
	{
		$errors = array();

		// perform validations on the form data
		$required_fields = array('status');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));
		if(empty($errors)){
			
		$policy_updated="";
		$status=$_POST['status'];
		$polino=$_GET['polino'];	
			
		$query_payment="UPDATE payment SET status='{$status}' WHERE policy_no={$polino} AND status='Pending'  ";
		$result_set_pol = mysql_query($query_payment);
		confirm_query($result_set_pol);
		if($result_set_pol)
		{
			$policy_updated="the policy status has been updated";	
		}
		else
			$policy_updated="there was an error updating the policy status";
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
		$query .= "where cust.cust_id=po.cust_id and po.agent_id='{$agent_id}' and po.policy_no in  ";
		$query .= "(select c1.policy_no from payment c1 WHERE status='pending')";
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


<title>Update status</title>

<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php require_once("topbar.php"); ?>

<div id="main">

      <h3 align="left">These are the list of policies to be Updated</h3>
      <p align="left"><?php if(isset($policy_updated)) echo $policy_updated ?>&nbsp;</p>
      <p align="left"><?php if(isset($message))echo $message ?>&nbsp;</p>
   
      <form id="form1" name="form1" method="post" action="">
       
<?php 
	if(mysql_num_rows($result_set) >= 1) {
?> 
       <table width="828" border="1" cellpadding="5" cellspacing="0">
          <tr>
            <th scope="col">Sr. No.</th>
            <th scope="col">Policy Number</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Type</th>
            </tr>
          <?php
		  $count=1;
          while($row=mysql_fetch_array($result_set))
		  {
          echo "<tr>";
            echo "<td>".$count++."</td>";
            echo "<td><a href=\"change_status.php?policyno=".$row['policy_no']."\"target=\"_blank\">".$row['policy_no']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['type']."</td>";
            echo "<td></td>";
          echo "</tr>";
		  }
		  ?>
        </table>
        <p><?php 
	}
	else 
		{
			 echo "There are no policies to be reviewed"; 	
		}
		?></p>
      </form>     </div>

<?php require_once("sidebar.php"); ?>

</body>
</html>
