<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php

	$policy_no=$_GET['policy_no'];
	$claim_no=$_GET['claim_no'];
	$type=$_GET['type'];
	if (isset($_POST['Submit'])){
		echo $claim_no.$type;
		$amt = trim(mysql_prep($_POST['dispatch']));
		$status = trim(mysql_prep($_POST['status']));
		echo $amt.$status;
		//INSERT INTO claim (status , dispatch_amt ) VALUES('$status',$amt)
		$claim_update_query="UPDATE claim SET claim_status='{$status}', dispatch_amt=$amt WHERE claim_no=$claim_no";
		$claim_update_result = mysql_query($claim_update_query, $connection);
		
		if ($claim_update_result) {
				$message = "The policy  was successfully created.";
				redirect_to("pending_claims.php");
				
			} else {
				$message = "The policy could not be created.";
				$message .= "<br />" . mysql_error();

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


<title>Upadate Claim</title>


<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>


<body>
<?php require_once("topbar.php"); ?>

<div id="main">

  <?php
  
  switch($type){
	  
	  case "Accident" : {
			$q_typ="SELECT * FROM accident_details WHERE claim_no='{$claim_no}'";
			$q_result = mysql_query($q_typ, $connection);
			$q_fetch=mysql_fetch_array($q_result);
			
			$c_typ="SELECT * FROM car WHERE policy_no='$policy_no'";
			$c_result = mysql_query($c_typ, $connection);
			$c_fetch=mysql_fetch_array($c_result);
	?>		
							
						  					  
  <h2>&nbsp;</h2>
  <h2>&nbsp;</h2>
  <table width="800" border="0">
    <tr>
      <td height="37">&nbsp;</td>
      <td>Policy Number</td>
      <td><?php echo $policy_no; ?></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>FIR number</td>
      <td><?php echo $q_fetch['fir_no']; ?></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>Licence Plate</td>
      <td><?php echo $q_fetch['licence_plate']; ?></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>Date of Accident</td>
      <td><?php echo $q_fetch['date']; ?></td>
    </tr>
    <tr>
      <td height="100">&nbsp;</td>
      <td>Accident Description</td>
      <td><?php echo $q_fetch['description']; ?></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>Claim Amount</td>
      <td><?php echo $q_fetch['expense'];  break; }?></td>
    </tr>
    <form id="form2" name="form2" method="post" action="<?php echo "update_claim.php?claim_no=".$claim_no."&type=".$type."&policy_no=".$policy_no; ?>" >
    <tr>
      <td height="37">&nbsp;</td>
      <td>Dispactch Amount</td>
      <td><input name="dispatch" type="text" /></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>Status</td>
      <td><select name="status">
      <option value="-1"></option>
      <option value="verified">Verify</option>
      <option value="suspend">Suspend</option>
      </select></td>
    </tr>
    <tr>
    
      <td height="37">&nbsp;</td>
       <td>&nbsp;</td>
      <td><input name="Submit" id="Submit" type="Submit" value="Submit" /></td>
    </tr>
    </form>
  </table>
  
  <?php
  
  case "Fire" : {
			$q_typ="SELECT * FROM  house_claim WHERE claim_no='{$claim_no}'";
			$q_result = mysql_query($q_typ, $connection);
			$q_fetch=mysql_fetch_array($q_result);
			
	?>		
							
						  					  
  <h2>&nbsp;</h2>
  <h2>&nbsp;</h2>
  <table width="800" border="0" class="tablebody">
    <tr>
      <td height="37">&nbsp;</td>
      <td>Policy Number</td>
      <td><?php echo $policy_no; ?></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>FIR number</td>
      <td><?php echo $q_fetch['fir_no']; ?></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>House Number</td>
      <td><?php echo $q_fetch['house_no']; ?></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>Date of Incident</td>
      <td><?php //echo $q_fetch['date']; ?></td>
    </tr>
    <tr>
      <td height="100">&nbsp;</td>
      <td>Description</td>
      <td><?php echo $q_fetch['description']; ?></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>Claim Amount</td>
      <td><?php echo $q_fetch['expense'];  break; }}?></td>
    </tr>
    <form id="form2" name="form2" method="post" action="<?php echo "update_claim.php?claim_no=".$claim_no."&type=".$type."&policy_no=".$policy_no; ?>" >
    <tr>
      <td height="37">&nbsp;</td>
      <td>Dispactch Amount</td>
      <td><input name="dispatch" type="text" /></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>Status</td>
      <td><select name="status">
      <option value="-1"></option>
      <option value="verified">Verify</option>
      <option value="suspend">Suspend</option>
      </select></td>
    </tr>
    <tr>
    
      <td height="37">&nbsp;</td>
       <td>&nbsp;</td>
      <td><input name="Submit" id="Submit" type="Submit" value="Submit" /></td>
    </tr>
    </form>
  </table>
  
  <h2>&nbsp;</h2>
</div>





<?php require_once("sidebar.php"); ?>

</body>
</html>

