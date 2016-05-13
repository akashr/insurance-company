<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php 
if(isset($_GET['polino']))
{
	$polino=$_GET['polino'];
	if(isset($_GET['type']))
	{
	$type=$_GET['type'];
	}
	$query = "SELECT * FROM payment WHERE policy_no= '{$polino}' ";
	$result_set = mysql_query($query);
	confirm_query($result_set);
	if (mysql_num_rows($result_set) >= 1) {
				// and v match

			} else {
				// username/password combo was not found in the database
				$message = "There was an error retriving policy informations .";
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
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

<title>Agent's home</title>

<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php require_once("topbar.php"); ?>
<?php require_once("login.php"); ?>

<div id="main">

<?php require_once("menu.php"); ?>

  <p align="left">&nbsp;</p>
      <h3 align="left">&nbsp;</h3>
      <h3 align="left">Policy Number is <?php echo $polino ?>&nbsp;      </h3>
    <p align="left">&nbsp;</p>
    
    <form id="form1" name="form1" method="post" action="">
	<?php 
	if(isset($_GET['polino'])&&mysql_num_rows($result_set)!=0)
	{
      ?>
<table width="454" border="1" cellpadding="1" cellspacing="0" class="tablebody">
          <tr class="tablehead">
            <th width="104" scope="col">Sr. No.</th>
            <th width="202" scope="col">Renewval Date</th>
            <th width="134" scope="col">Status</th>
            </tr>
          
          <?php  
	  $count=1;
	  	while($row = mysql_fetch_array($result_set)){
			echo "<tr>";
			echo" <th scope=\"col\"><div align=\"left\">".$count++ ."</div></th>";
			echo" <th scope=\"col\"><div align=\"left\">".$row['renewal_date']."</a></div></th>";
			echo" <th scope=\"col\"><div align=\"left\">".$row['status']."</div></th>";

      		echo "</tr>";
		}
	  ?>
      </table>
<p>
        <?php } 
	 	else
			{
				if(mysql_num_rows($result_set)==0)
					echo "This policy is not yet dispatched";
					else
			echo "There was an error retriving policy informations .";
			}
	  ?>
      </p>

<?php  if(isset($_GET['type']))
  {
	  ?>
      <p>&nbsp;</p>
<h2 align="center">Details of The Asset  <?php echo $type." :" ?></h2>
    
      
 <?php
 
  switch($type){
	  
	  case "Accident" : {
			
			
			$c_typ="SELECT * FROM car WHERE policy_no= '{$polino}' ";
			$c_result = mysql_query($c_typ, $connection);
			$c_fetch=mysql_fetch_array($c_result);
	?>		
							
						  					  
<h2>&nbsp;</h2>
<table width="687" border="0" class="tablebody">
    <tr>
      <td width="68" height="37">&nbsp;</td>
      <td width="140">Policy Number</td>
      <td width="465"><?php echo $polino; ?></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>License plate</td>
      <td><?php echo $c_fetch['licence_plate']; ?></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>Model</td>
      <td><?php echo $c_fetch['model_no']; ?></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>Make</td>
      <td><?php echo $c_fetch['make']; ?></td>
    </tr>
    <tr>
      <td height="100">&nbsp;</td>
      <td>Description</td>
      <td><?php echo $c_fetch['description']; ?></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>Value</td>
      <td><?php echo $c_fetch['value'];  break; }?></td>
    </tr>

  </table>
  
  <?php
  
  case "Fire" : {
			$q_typ="SELECT * FROM  house WHERE policy_no= '{$polino}' ";
			$q_result = mysql_query($q_typ, $connection);
			$q_fetch=mysql_fetch_array($q_result);
			
	?>		
							
						  					  
  <h2>&nbsp;</h2>
  <h2>&nbsp;</h2>
  <table width="693" border="0" class="tablebody">
    <tr>
      <td width="65" height="37">&nbsp;</td>
      <td width="141">Policy Number</td>
      <td width="473"><?php echo $polino; ?></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>House Number</td>
      <td><?php echo $q_fetch['house_no']; ?></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>Value</td>
      <td><?php echo $q_fetch['house_value']; ?></td>
    </tr>
    <tr>
      <td height="37">&nbsp;</td>
      <td>Date of build</td>
      <td><?php $q_fetch['build_date']; ?></td>
    </tr>
    <tr>
      <td height="100">&nbsp;</td>
      <td>Description</td>
      <td><?php echo $q_fetch['description']; break; }}}?></td>
    </tr>
    

  </table>
  
  <h2>&nbsp;</h2>
</div>

       
      
 
<?php //require_once("sidebar.php"); ?>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
