<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 
	$message = "";
	$query =  "SELECT DISTINCT po.policy_no, po.type, po.coverage, a.name,  a.agent_id ";
	$query .= "FROM customer c, policy po, payment pre, agent a ";
	$query .= "WHERE a.agent_id=po.agent_id AND  po.cust_id='{$_SESSION['cust_id']}' AND po.policy_no in (SELECT DISTINCT policy_no FROM payment)";
	$result_set = mysql_query($query);
	confirm_query($result_set);
	if(mysql_num_rows($result_set)) {
		
		
	}
	else
		$message = "Currently you dont have any policies dispatched to your account ";
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="your description goes here" />
<meta name="keywords" content="your,keywords,goes,here" />

<link rel="stylesheet" type="text/css" href="variant.css" media="screen,projection" title="Variant Portal" />


<title>Policies</title>

<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php require_once("topbarcust.php"); ?>
<?php require_once("login.php"); ?>

<div id="main">

<?php require_once("menu.php"); ?>

<p>&nbsp;</p>
      <h3>&nbsp;</h3>
      <h3>&nbsp;</h3>
      <h3 align="center">List of Policies Taken: </h3>
      <p align="left">&nbsp;</p>
      <p align="left">&nbsp;</p>
     
      <form id="form1" name="form1" method="post" action="">
        <p align="center"></p>
  <?php
  if(mysql_num_rows($result_set) >=1)
  {
  ?>
<div align="center">  

        <table width="778" border="1" cellspacing="0" align="center">
          <tr class="tablehead">
            <td width="97" height="30"><div align="center">Sr No </div></td>
            <td width="238"><div align="center">Agent Name </div></td>
            <td width="171"><div align="center">Policy Number </div></td>
            <td width="109"><div align="center">Policy Type </div></td>
            <td width="141"><div align="center">Coverage</div></td>
          </tr>
		  <?php
		  $count=1; 
		  	while($row = mysql_fetch_array($result_set)){
				echo "<tr>";
					echo "<td height="."30"."class="."tablebody"." width=\"84\"><div align=\"left\"><div align="."center".">".$count++. "</div></td>";
					echo "<td class="."tablebody"." width=\"84\"><div align=\"left\"><a href=\"agent_details.php?agentid=".$row['agent_id']." \"target=\"_blank\"><div align="."center".">".$row['name']. "</a></div></td>";
					echo "<td class="."tablebody"." width=\"84\"><div align=\"left\"><a href=\"policy_details.php?policyno=".$row['policy_no']. " \"target=\"_blank\"><div align="."center".">".$row['policy_no']. "</a></div></td>";
					echo "<td class="."tablebody"." width=\"84\"><div align=\"left\"><div align="."center".">".$row['type']. "</div></td>";
					echo "<td class="."tablebody"." width=\"84\"><div align=\"left\"><div align="."center".">".$row['coverage']. "</div></td>";
				  echo "</tr>";
			}		  
		  ?>
        </table>
        </div>
        <p>&nbsp;</p>
      </form>     
      
<?php }
else
	        echo $message
            ?>

</div>



<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>