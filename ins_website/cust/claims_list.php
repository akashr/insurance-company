<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 
	$message = "";
	$query =  "SELECT DISTINCT cl.policy_no , cl.claim_no,  a.name,  a.agent_id, cl.claim_status ";
	$query .= "FROM  policy po, claim cl, agent a ";
	$query .= "WHERE a.agent_id=po.agent_id AND  po.cust_id='{$_SESSION['cust_id']}' AND po.policy_no=cl.policy_no";
	$result_set = mysql_query($query);
	confirm_query($result_set);
	if(mysql_num_rows($result_set)) {
		
		
	}
	else
		$message = "Currently you dont have any policies which you can claim ";
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
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php require_once("topbarcust.php"); ?>


<div id="main">
<?php require_once("menu.php"); ?>
      <h3 align="center">&nbsp;</h3>
      <h3 align="center">&nbsp;</h3>
      <h3 align="center">&nbsp;</h3>
      <h3 align="center">List of Claims: </h3>
      <p align="left">&nbsp;</p>
      <p align="left">&nbsp;</p>
     
      <form id="form1" name="form1" method="post" action="">
        <p align="center"></p>
  <?php
  if(mysql_num_rows($result_set) >=1)
  {
  ?>
<div align="center">
        <table width="778" border="1" cellspacing="0" class="tablebody">
          <tr class="tablehead">
            <td width="97" height="30"><div align="center">Sr No </div></td>
            <td width="238"><div align="center">Agent Name </div></td>
            <td width="171"><div align="center">Policy Number </div></td>
            <td width="171"><div align="center">Claim Status </div></td>
            <td width="109"><div align="center">Claim Number</div></td>
          </tr>
		  <?php
		  $count=1; 
		  	while($row = mysql_fetch_array($result_set)){
				echo "<tr>";
					echo "<td height="."30"."width=\"84\"><div align=\"left\">".$count++. "</div></td>";
					echo "<td width=\"84\"><div align=\"left\"><a href=\"agent_details.php?agentid=".$row['agent_id']." \"target=\"_blank\">".$row['name']. "</a></div></td>";
					echo "<td width=\"84\"><div align=\"left\"><a href=\"policy_details.php?policyno=".$row['policy_no']. " \"target=\"_blank\">".$row['policy_no']. "</a></div></td>";
					echo "<td width=\"84\"><div align=\"left\">".$row['claim_status']. "</div></td>";
					echo "<td width=\"84\"><div align=\"left\">".$row['claim_no']. "</div></td>";
				  echo "</tr>";
			}		  
		  ?>
        </table>
        <p>&nbsp;</p>
      </form>     
      
<?php }
else
	        echo $message
            ?>

</div>


</body>
</html>