<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php 
if(isset($_GET['polino']))
{
	$polino=$_GET['polino'];
	$type=$_GET['type'];
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


<title>Agent's home</title>

<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php require_once("topbar.php"); ?>

<div id="main">
      <p align="left">&nbsp;</p>
      <h3 align="left">Policy Number is <?php echo $polino ?>&nbsp;      </h3>
      <p align="left">&nbsp;</p>
    
    <form id="form1" name="form1" method="post" action="">
	<?php 
	if(isset($_GET['polino'])&&mysql_num_rows($result_set)!=0)
	{
      ?>
        <table width="454" border="1" cellpadding="1" cellspacing="0">
          <tr>
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
      <p>&nbsp;</p>
<p>&nbsp;</p>
      <p>Details of The Asset  <?php echo $type ?></p>
      <p>&nbsp; </p>
      <p>
        <?php 
	  switch($type) {
	  	case "Accident" : 
		{
			?>
      </p>
      <table width="966" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <th width="15" scope="col">Sr. No</th>
          <th width="129" scope="col">Licence Plate</th>
          <th width="119" scope="col">Purchase Date</th>
          <th width="295" scope="col">Description</th>
          <th width="102" scope="col">Value</th>
          <th width="90" scope="col">Model</th>
          <th width="120" scope="col">Manufacturer</th>
        </tr>
        
        <?php 
			$asset_q = "SELECT * FROM car WHERE policy_no= '{$polino}' ";
			$result_asset = mysql_query($asset_q);
			confirm_query($result_asset);
		?>
        <?php
        	  $count=1;
	  	while($row = mysql_fetch_array($result_asset)){

        echo "<tr>";
          echo "<td>".$count++."</td>";
          echo "<td>".$row['licence_plate']."</td>";
          echo "<td>".$row['purchase_date']."</td>";
          echo "<td>".$row['description']."</td>";
          echo "<td>".$row['value']."</td>";
          echo "<td>".$row['model_no']."</td>";
          echo "<td>".$row['make']."</td>";
        echo "</tr>";
		}
		?>
      </table>
      <p>
        <?php break;
		}
	  
	  
	  case "Fire" : 
	  {
		?>
      </p>
      <table width="966" border="1" cellspacing="0" cellpadding="5">
        <tr>
          <th width="24" scope="col">Sr. No</th>
          <th width="110" scope="col">House Number</th>
          <th width="168" scope="col">House Value</th>
          <th width="123" scope="col">Build Date</th>
          <th width="206" scope="col">Address</th>
          <th width="161" scope="col">Description</th>
 
        </tr>
        
        <?php 
			$asset_q = "SELECT * FROM house WHERE policy_no= '{$polino}' ";
			$result_asset = mysql_query($asset_q);
			confirm_query($result_asset);
		?>
        <?php
        	  $count=1;
	  	while($row = mysql_fetch_array($result_asset)){

        echo "<tr>";
          echo "<td>".$count++."</td>";
          echo "<td>".$row['house_no']."</td>";
          echo "<td>".$row['house_value']."</td>";
          echo "<td>".$row['build_date']."</td>";
          echo "<td>".$row['address']."</td>";
          echo "<td>".$row['description']."</td>";

        echo "</tr>";
		}
		?>
      </table>
        
        
        
        <?php  
		
		}break;
	  }
	  ?>
      
      
      </p>
      <p>&nbsp;</p>
      </form>   
      
      
</div>   
<?php require_once("sidebar.php"); ?>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>
