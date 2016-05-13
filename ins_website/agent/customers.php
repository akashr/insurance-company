<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 
	$query  = "SELECT distinct c.cust_id, c.name, COUNT(DISTINCT po.policy_no) AS no_of_poilicies   ";
	$query .= "FROM customer c, policy po,  agent a ";
	$query .= "WHERE po.cust_id=c.cust_id AND po.agent_id='{$_SESSION['agent_id']}' GROUP BY c.name ASC";
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
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
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
<?php require_once("login.php"); ?>

<div id="main">

<?php require_once("menu.php"); ?>

      <p align="left">&nbsp;</p>
      <h3 align="left">&nbsp;</h3>
  <h3 align="left">&nbsp;</h3>
      <h3 align="center">List of your Customers</h3>
      <p align="center">&nbsp;</p>
      <div align="center">
  <form id="form1" name="form1" method="post" action="">
  </form>  
  
  
    <table width="551" height="48" border="1" cellspacing="0" id="" class="tablebody">

      <tr class="tablehead">
        <th width="110" scope="col">Sr No </th>
        <th width="161" scope="col"><div align="center">Customer Name </div></th>
        <th width="126" scope="col">Customer ID</th>
        <th width="110" scope="col">No of Policies</th>
      </tr>
	  <?php  
	  $count=1;
	  	while($row = mysql_fetch_array($result_set)){
			echo "<tr>";
			echo" <th scope=\"col\"><div align=\"left\">".$count++ ."</div></th>";
			echo" <th scope=\"col\"><div align=\"left\"><a href=\"customer_details.php?custid=".$row['cust_id']."\">".$row['name']."</a></div></th>";
			echo" <th scope=\"col\"><div align=\"left\">".$row['cust_id']."</div></th>";
			echo" <th scope=\"col\"><div align=\"left\">".$row['no_of_poilicies']."</div></th>";
			
      		echo "</tr>";
		}
	  ?>
	        
    </table>
      <p align="center">&nbsp;</p>
</div>


</body>
</html>
