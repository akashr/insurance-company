<?php require_once("../includes/session.php"); ?>
<?php require_once("../includes/connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 
include_once("../includes/form_functions.php");

	{
	$policy_no=$_GET['policyno'];
	$query =  "select * from policy where policy_no='{$policy_no}' ";

	$result_set = mysql_query($query);
	confirm_query($result_set);
	}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="your description goes here" />
<meta name="keywords" content="your,keywords,goes,here" />

<link rel="stylesheet" type="text/css" href="variant.css" media="screen,projection" title="Variant Portal" />


<title>Change Status</title>

<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php require_once("topbar.php"); ?>

<div id="main">

<?php
if(mysql_num_rows($result_set) >= 1)
{
	$row=mysql_fetch_array($result_set)
	?>
<form id="form1" name="form1" method="post" action="update_status.php<?php echo "?polino=".$row['policy_no']; ?>">
  <table width="635" border="0" cellpadding="10" cellspacing="0">
    <tr>
      <th width="147" scope="row">Policy Number</th>
      <td width="259"><?php echo $row['policy_no'];  ?>&nbsp;</td>
      <td width="169">&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">Customer ID</th>
      <td><?php echo $row['cust_id']; ?>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">Agent ID</th>
      <td><?php echo $row['agent_id']; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">Type Of Policy</th>
      <td><?php echo $row['type']; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">Issue Date</th>
      <td><?php echo $row['issue_date']; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">Term Price</th>
      <td><?php echo $row['term_price']; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">Deductable</th>
      <td><?php echo $row['deductible']; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">Coverage</th>
      <td><?php echo $row['coverage']; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">Premium</th>
      <td><label for="textfield"></label>
        <label for="select"></label>
        <select name="status" id="select">
          <option value="Pending">Pending</option>
          <option value="Paid">Paid</option>
          <option value="Scrap">Scrap</option>
      </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td>&nbsp;</td>
      <td><input type="submit" name="submit_policy" id="submit_policy" value="submit"    /></td>
    </tr>
  </table>
</form>
<P>
<?php 
}
else
{
	echo "No Records found corresponding to policy number ".$policy_no;
	}

?></P>
</div>

<?php require_once("sidebar.php"); ?>

</body>
</html>
