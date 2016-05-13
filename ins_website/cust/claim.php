<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in();?>
<?php
$cu_id=$_SESSION['cust_id'];
if(isset($_POST['submit'])) {
	$policy_no=trim(mysql_prep($_POST['policy_no']));
	
	//type of policy
	$policy_typ="SELECT type FROM policy WHERE policy_no='{$policy_no}'";
	$policy_typ_result = mysql_query($policy_typ, $connection);
	$type_fetch=mysql_fetch_array($policy_typ_result);
	//redirect to details page 
	switch($type_fetch['type']) {
	case "Accident" : redirect_to("accident_details.php?policy_no={$policy_no}"); break;
	case "Fire" : redirect_to("house_claim.php?policy_no={$policy_no}"); break;
	case "Mediclaim" : redirect_to("mediclaim.php?policy_no={$policy_no}"); break;
	//case default : ;
	}

}
 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="your description goes here" />
<meta name="keywords" content="your,keywords,goes,here" />

<link rel="stylesheet" type="text/css" href="variant.css" media="screen,projection" title="Variant Portal" />


<title>Claim</title>

<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php require_once("../topbarcust.php"); ?>

<div id="main">



<div id="centerloc">

<form id="form1" name="form1" method="post" action="claim.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p> 
    
    
        			<label for="select">	 Policy Number </label>
			        <select name="policy_no" id="select">
			          <option value="-1">Select Policy</option>
                      <?php 
					  
					  	$policy_q="SELECT DISTINCT pay.policy_no FROM policy po, payment pay WHERE po.cust_id='{$cu_id}' AND po.policy_no=pay.policy_no AND pay.status='pending'";
						$policy_result = mysql_query($policy_q, $connection);
					  	while($policy_row=mysql_fetch_array($policy_result)) {
							echo "<option value=".$policy_row['policy_no'].">".$policy_row['policy_no']."</option>";
						
					
						}
						
						?>
                  </select>
    
    
  </p>
  <p>
    <input type="submit" name="submit" id="button" value="submit" />
  </p>
</form>
</div>
</div>
<?php require_once("sidebar.php"); ?>

</body>
</html>