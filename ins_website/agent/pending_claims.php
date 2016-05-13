<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 
	$query  = "SELECT distinct c.cust_id, c.name, cl.policy_no, cl.claim_no, po.type   ";
	$query .= "FROM customer c, policy po,  claim cl ";
	$query .= "WHERE po.cust_id=c.cust_id AND po.agent_id='{$_SESSION['agent_id']}' AND po.policy_no=cl.policy_no AND cl.claim_status='not_verified'";
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


<title>Customers : </title>

<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<style type="text/css">
#customers
{
font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;
width:100%;
border-collapse:collapse;
}
#customers td, #customers th 
{
font-size:1.2em;
border:1px solid #98bf21;
padding:3px 7px 2px 7px;
}
#customers th 
{
font-size:1.4em;
text-align:left;
padding-top:5px;
padding-bottom:4px;
background-color:#A7C942;
color:#fff;
}
#customers tr.alt td 
{
color:#000;
background-color:#EAF2D3;
}
</style>


<body>

<?php require_once("topbar.php"); ?>

<div id="main">

      <p align="left">&nbsp;</p>
      <h3 align="left">List of your Customers</h3>
      
  <form id="form1" name="form1" method="post" action="">
      </form>  
  
  
    <table width="690" height="48" border="1" cellspacing="0" class="tablebody">

      <tr class="tablehead">
        <th width="110" scope="col">Sr No </th>

        <th width="161" scope="col">Customer Name </th>
        <th width="126" scope="col">Customer ID</th>
                <th width="161" scope="col">Policy Number</th>
        <th width="126" scope="col">Claim Number</th>
        </tr>
	  <?php  
	  $count=1;
	  	while($row = mysql_fetch_array($result_set)){
			echo "<tr>";
			echo" <th scope=\"col\"><div align=\"left\">".$count++ ."</div></th>";
			echo" <th scope=\"col\"><div align=\"left\"><a href=\"customer_details.php?custid=".$row['cust_id']."\">".$row['name']."</a></div></th>";
			echo" <th scope=\"col\"><div align=\"left\">".$row['cust_id']."</div></th>";
			echo" <th scope=\"col\"><div align=\"left\">".$row['policy_no']."</div></th>";
			echo" <th scope=\"col\"><div align=\"left\"><a href=\"update_claim.php?claim_no=".$row['claim_no']."&type=".$row['type']."&policy_no=".$row['policy_no']."\">".$row['claim_no']."</a></div></th>";
			
      		echo "</tr>";
		}
	  ?>
	        
    </table>
      <p align="center">&nbsp;</p>
</div>

<?php require_once("sidebar.php"); ?>


<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
