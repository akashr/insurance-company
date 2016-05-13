<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 

	if(isset($_POST['days_submit'])){

			$days=$_POST['no_days'];
				$query  = "SELECT distinct c.cust_id, pay.policy_no, c.name, pay.renewal_date, pay.premium, DATEDIFF(pay.renewal_date,CURDATE()) AS rem_days     ";
		$query .= "FROM customer c, policy po, payment pay,  agent a ";
		$query .= "WHERE po.cust_id=c.cust_id AND po.policy_no=pay.policy_no AND po.agent_id='{$_SESSION['agent_id']}'  AND pay.status='pending' ORDER BY pay.renewal_date ";
		$result_set = mysql_query($query);
		confirm_query($result_set);
		if(mysql_num_rows($result_set) >=1) {
		
		}
		else {
			$message="There are no customers who can be intimated";
		}

	}
	else {
		

		
		$query  = "SELECT distinct c.cust_id, pay.policy_no, po.type, c.name, pay.renewal_date, pay.premium, DATEDIFF(pay.renewal_date,CURDATE()) AS rem_days     ";
		$query .= "FROM customer c, policy po, payment pay,  agent a ";
		$query .= "WHERE po.cust_id=c.cust_id AND po.policy_no=pay.policy_no AND po.agent_id='{$_SESSION['agent_id']}' AND pay.status='pending' ORDER BY pay.renewal_date ";
		$result_set = mysql_query($query);
		confirm_query($result_set);
		if(mysql_num_rows($result_set) >=1) {
		
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


<title>Due Policies</title>


<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>


<body>
<?php require_once("topbar.php"); ?>
<?php require_once("login.php"); ?>

<div id="main">

<?php require_once("menu.php"); ?>
      <h3 align="left">&nbsp;</h3>
      <h3 align="left">&nbsp;</h3>
      <h3 align="left">&nbsp;</h3>
      <h3 align="left">&nbsp;</h3>
      <h3 align="center">List Of Policies with their Due Dates</h3>
      <p align="left">&nbsp;</p>
      <div align="center">
<form id="form2" name="form2" method="post" action="due_policies.php">
        <div align="left">
          <p>&nbsp;</p>
          <p>Enter number of days 
            <label for="textfield"></label>
          <input type="text" name="no_days" id="textfield" />
          <input type="submit" name="days_submit" id="button2" value="Search" />
          </p>
        </div>
      </form>
      <p align="left">&nbsp;</p>
      <form id="form1" name="form1" method="post" action="test_check.php">
        <p>
          <?php 

		if(mysql_num_rows($result_set) >=1 )
		{
			?>
        </p>
        <table width="961" border="1" cellpadding="5" cellspacing="0" class="tablebody">
          <tr class="tablehead">
            <th scope="col">Sr No</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Policy Number</th>
            <th scope="col">Premium</th>
            <th scope="col">Renewal Date</th>
            <th scope="col">Days Remaining</th>
            <th scope="col">Intimate</th>
          </tr>
          <?php 
		  $count=0;
		  while($row=mysql_fetch_array($result_set))
		  {
			  if(isset($_POST['days_submit']))	
			  if(!(isset($_POST['days_submit'])&&$row['rem_days']<=$days)&&isset($row['rem_days']))
			  	continue;
          echo "<tr>";
            echo "<td>".$count++."</td>";
            echo "<td><a href=\"customer_details.php?custid=".$row['cust_id']."\">".$row['name']."</a></td>";
            echo "<td><a href=\"policy_details.php?polino=".$row['policy_no']."&type=".$row['type']."\">".$row['policy_no']."</a></td>";
			echo "<td>".$row['premium']."</td>";
            echo "<td>".$row['renewal_date']."</td>";
            
            echo "<td>".$row['rem_days']."</td>";
            echo "<td><div align=\"center\">";
              echo "<input type=\"checkbox\" name=".$row['policy_no']." id=\"checkbox\" />";
              
            echo "</div></td>";
         echo "</tr>";
		  }
		  ?>
    </table>
        
        
        <p align="center">
          <input type="submit" name="submit" id="button" value="submit" />
        </p>
        <?php 
		}
		else {
			echo $message;
		}

		?>
        
      </form>    
      </div>  
</div>


</body>
</html>