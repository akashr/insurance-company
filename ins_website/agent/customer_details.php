<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>

<?php 
	$id=$_GET['custid'];
	$query = "SELECT * FROM customer WHERE cust_id= '{$id}' ";
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
	$query_policies = "SELECT * FROM policy WHERE Cust_id= '{$id}' AND agent_id='{$_SESSION['agent_id']}' ";
	$result_set_policy = mysql_query($query_policies);
	confirm_query($result_set_policy);
	if (mysql_num_rows($result_set_policy) >= 1) {
				// and n match

			} else {
				// username/password combo was not found in the database
				$message = "There was an error processing customer policies";
			}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="your description goes here" />
<meta name="keywords" content="your,keywords,goes,here" />

<link rel="stylesheet" type="text/css" href="variant.css" media="screen,projection" title="Variant Portal" />


<title>Customer Details</title>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php require_once("topbar.php"); ?>
<?php require_once("login.php"); ?>

<div id="main">

<?php require_once("menu.php"); ?>
<p>&nbsp;</p>
<p>&nbsp;</p>
      <form id="form1" name="form1" method="post" action="">
        <table width="500" border="1" cellpadding="5" cellspacing="0" class="tablebody1">
          <tr>
            <td width="198"><strong>Customer ID </strong></td>
            <td width="286"><?php echo $row['cust_id'] ?>&nbsp;</td>
          </tr>
          <tr>
            <td><strong>
              <label for="checkbox_row_4">Unique Number </label>
            </strong></td>
            <td><?php echo $row['ssn'] ?></td>
          </tr>
          <tr>
            <td><strong>Driving Licience Number </strong></td>
            <td><?php echo $row['licence_no'] ?></td>
          </tr>
          <tr>
            <td><strong>Date of Birth </strong></td>
            <td><?php echo $row['dob'] ?></td>
          </tr>
          <tr>
            <td><strong>Age</strong></td>
            <td><?php echo $row['age'] ?></td>
          </tr>
          <tr>
            <td><strong>Phone Number </strong></td>
            <td><?php echo $row['phone'] ?></td>
          </tr>
          <tr>
            <td><strong>Address</strong></td>
            <td><?php echo $row['address'] ?></td>
          </tr>
          <tr>
            <td><strong>Eamil</strong></td>
            <td><?php echo $row['email'] ?></td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>Policies Owned By <?php echo $row['name'] ?></p>
        <table width="994" border="1" cellpadding="1" cellspacing="0" class="tablebody">
          <tr class="tablehead">
            <th scope="col" height="40">Sr. No.</th>
            <th scope="col">Policy Number</th>
            <th scope="col">Type</th>
            <th scope="col">Issue Date</th>
            <th scope="col">Term Price</th>
            <th scope="col">Deductable</th>
            <th scope="col">Coverage</th>
            <th scope="col">&nbsp;</th>
          </tr>
          
          <?php  
	  $count=1;
	  	while($row = mysql_fetch_array($result_set_policy)){
			echo "<tr>";
			echo" <th height="."30"." scope=\"col\"><div align=\"left\" >".$count++ ."</div></th>";
			echo" <th scope=\"col\"><div align=\"left\"><a href=\"policy_details.php?polino=".$row['policy_no']."&type=".$row['type']."\">".$row['policy_no']."</a></div></th>";
			echo" <th scope=\"col\"><div align=\"left\">".$row['type']."</div></th>";
			echo" <th scope=\"col\"><div align=\"left\">".$row['issue_date']."</div></th>";
			echo" <th scope=\"col\"><div align=\"left\">".$row['term_price']."</div></th>";
			echo" <th scope=\"col\"><div align=\"left\">".$row['deductible']."</div></th>";
			echo" <th scope=\"col\"><div align=\"left\">".$row['coverage']."</div></th>";
      		echo "</tr>";
		}
	  ?>
        </table>
        <p>&nbsp;</p>
      </form>     
      
 </div>     
      

<?php //require_once("sidebar.php"); ?>

</body>
</html>
