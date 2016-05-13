<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 
include_once("../agent/includes/form_functions.php");
	if(isset($_GET['policyno']))
	{
	$policy_no=$_GET['policyno'];
	$query =  "select * from policy where policy_no='{$policy_no}' ";

	$result_set = mysql_query($query);
	confirm_query($result_set);
		$query_policies =  "select * from payment where policy_no='{$policy_no}' ";

	$result_set_policies = mysql_query($query_policies);
	confirm_query($result_set_policies);
	}
	else
		echo "error in policy number";
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="your description goes here" />
<meta name="keywords" content="your,keywords,goes,here" />

<link rel="stylesheet" type="text/css" href="variant.css" media="screen,projection" title="Variant Portal" />


<title>Policy details</title>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php require_once("topbarcust.php"); ?>
<?php require_once("login.php"); ?>

<div id="main">

<?php require_once("menu.php"); ?>
<div align="center">
<p>
  <?php
if(mysql_num_rows($result_set) >= 1&&isset($_GET['policyno']))
{
	$row=mysql_fetch_array($result_set)
	?>
</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
<form id="form1" name="form1" method="post" action="make_policy.php<?php echo "?polino=".$row['policy_no']; ?>">
  <table width="635" border="0" cellpadding="10" cellspacing="0" class="tablebody">
    <tr>
      <th width="100" scope="row"><div align="left">Policy Number</div></th>
      <td width="308"><?php echo $row['policy_no'];  ?>&nbsp;</td>
      <td width="167">&nbsp;</td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Customer ID</div></th>
      <td><?php echo $row['cust_id']; ?>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Agent ID</div></th>
      <td><?php echo $row['agent_id']; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Type Of Policy</div></th>
      <td><?php echo $row['type']; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Issue Date</div></th>
      <td><?php echo $row['issue_date']; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Term Price</div></th>
      <td><?php echo $row['term_price']; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Deductable</div></th>
      <td><?php echo $row['deductible']; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row"><div align="left">Coverage</div></th>
      <td><?php echo $row['coverage']; ?></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <th scope="row"><div align="left"></div></th>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<P>
<P>
<P>
<P>
<table width="878" border="1" cellspacing="0" cellpadding="5" class="tablebody">
  
  <tr class="tablehead">
    <th width="78" scope="col" height="30"><div align="center">Sr. No.</div></th>
    <th width="158" scope="col"><div align="center">Renewal Date</div></th>
    <th width="158" scope="col"><div align="center">Premium</div></th>
    <th width="158" scope="col"><div align="center">Date</div></th>
  </tr>
  <?php 
  $count=1;
  while($row = mysql_fetch_array($result_set_policies))
  {
  echo "<tr>";
   echo "<td height="."30"."><div align="."center".">".$count++."</div></td>";
   echo "<td><div align="."center".">".$row['renewal_date']."</div></td>";
   echo "<td><div align="."center".">".$row['premium']."</div></td>";
   echo "<td><div align="."center".">".$row['status']."</div></td>";
  echo "<tr>";
  }
    ?>
</table>

<?php 
}
else
{
	if(isset($_GET['policyno']))
		echo "error in policy number ";
		else
	echo "No Records found corresponding to policy number ".$policy_no;
	}

?></P>


<p>&nbsp;</p>

</div>



</body>
</html>