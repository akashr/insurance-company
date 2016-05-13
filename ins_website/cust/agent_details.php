<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php 
	if(!isset($_GET['agentid']))
	{
		redirect_to("policies.php");
	}
	$id=$_GET['agentid'];
	$query = "SELECT * FROM agent WHERE Agent_id= '{$id}' ";
	$result_set = mysql_query($query);
	confirm_query($result_set);
	if (mysql_num_rows($result_set) == 1) {
				// and only 1 match
				$found_user = mysql_fetch_array($result_set);
				$row=$found_user;
			} else {
				// username/password combo was not found in the database
				$message = "There was an error fetching customer records<br />
					Please try again later.";
			}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="your description goes here" />
<meta name="keywords" content="your,keywords,goes,here" />

<link rel="stylesheet" type="text/css" href="variant.css" media="screen,projection" title="Variant Portal" />


<title>Agent Details</title>

<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php require_once("topbarcust.php"); ?>
<?php require_once("sidebar.php"); ?>

<div id="main">
      <h3 align="center"><?php echo $row['name'] ?>&nbsp;</h3>
      <p align="left">&nbsp;</p>
      <p align="left">&nbsp;</p>
		<div align="center">
      <form id="form1" name="form1" method="post" action="">
        <table width="" border="1" cellspacing="0">
          
          <tr class="tablehead">
            <td width="100" height="50"><div align="center"><strong>Phone Number </strong></div></td>
            <td width="200"><div align="center"><?php echo $row['phone'] ?></div></td>
          </tr>
          <tr>
            <td width="100" height="50" class="tablebody"><div align="center"><strong>Address</strong></div></td>
            <td><div align="center"><?php echo $row['address'] ?></div></td>
          </tr>
          <tr class="tablebody">
            <td width="100" height="50" class="tablebody"><div align="center"><strong>Eamil</strong></div></td>
            <td><div align="center"><?php echo $row['email'] ?></div></td>
          </tr>
        </table>
      </form>     
</div>



<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>