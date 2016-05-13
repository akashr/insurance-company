<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 

	$query = "SELECT cust_id, name FROM customer";
	$result_set = mysql_query($query);
	confirm_query($result_set);
	if (mysql_num_rows($result_set) >= 1) {
				// and only 1 match

			} else {
				// no agents registered
				$message = "There are no customers";
			}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="your description goes here" />
<meta name="keywords" content="your,keywords,goes,here" />

<link rel="stylesheet" type="text/css" href="variant.css" media="screen,projection" title="Variant Portal" />


<title>Officier's home</title>


<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php require_once("topbar.php"); ?>
<div id="main">

<h3 align="left">Select The Customer for whom Policy is undertaken :</h3>
      <p align="left">
        <?php if(isset($_GET['policyno'])) { ?>
      </p>
      <p align="left">The policy was successfully added with policy number <?php echo $_GET['policyno'] ?></p>
      <?php } ?> 
<p align="left">&nbsp;</p>
    
      <form id="form1" name="form1" method="post" action="">
        <table width="550" border="1" style="border-collapse:collapse" bordercolor="#000000" class="tablebody">
          <tr class="tablehead">
            <td width="252" height="36" scope="col"><div align="center"><strong>Customer Name</strong></div></td>
            <th width="282" height="36" scope="col">ID</th>
          </tr>
<?php 
	while($row = mysql_fetch_array($result_set))
	{
          echo "<tr>";
            echo "<td height="."36"."><a href=\"select_customer.php?custid=".$row['cust_id']."&name=".($row['name'])."\"><div align="."center".">".$row['name']. "</div></a></td>";
            echo "<td><div align="."center".">".$row['cust_id']. "</div></td>";
          echo "</tr>";
	}
?>
        </table>
      </form>      
      
</div>

<?php require_once("sidebar.php"); ?>
</body></html>