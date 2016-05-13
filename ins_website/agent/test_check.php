<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("gmailer/gm.php"); ?>
<?php confirm_logged_in(); ?>
<?php 
	if(isset($_POST['submit']))
	{
	$query  = "SELECT distinct c.cust_id, c.email , pay.policy_no, c.name, pay.renewal_date, pay.premium, DATEDIFF(pay.renewal_date,CURDATE()) AS rem_days     ";
	$query .= "FROM customer c, policy po, payment pay,  agent a ";
	$query .= "WHERE po.cust_id=c.cust_id AND po.policy_no=pay.policy_no AND po.agent_id='{$_SESSION['agent_id']}' AND pay.status='pending'";
	$result_set = mysql_query($query);
	confirm_query($result_set);
	if(mysql_num_rows($result_set) >=1) {
	
	}
	else {
		$message="There are no customers who can be intimated";
	}
	}
	else
	{
		
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php 
		if(mysql_num_rows($result_set) >=1 )
		{
			?>
<table width="961" border="1">
  <tr>
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
          echo "<tr>";
            echo "<td>".$count++."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['policy_no']."</td>";
			echo "<td>".$row['premium']."</td>";
            echo "<td>".$row['renewal_date']."</td>";
            
            echo "<td>".$row['rem_days']."</td>";
			echo "<td><div align=\"center\">";
            if(isset($_POST[$row['policy_no']]))  {
				echo "checked";
				$agent_email_id=$_SESSION['agent_id']."@"."insurance.com";
				$agent_name=$_SESSION['name'];
				$subject="initimation mail for renuewal of policy";
				$cust_email=$row['email'];
				$body="Dear customer,\n
						\t\t Cust ID : ".$row['cust_id']."\n".
						"\t\t Cust name : ".$row['name']."\n".
						"\t\t Policy Number : ".$row['policy_no']."\n".
						"\n\n".
						"\t\tthis policy will expire on ".$row['renewal_date']." kindly renew your policy with in ".$row['rem_days']." days".
						"\n\t\tyou are due with a premium of Rs. ".$row['premium'].
						"\n\n\n\t\tThanging You\n\n\t\tAgnet ID : ".$_SESSION['agent_id'].
						"\n\t\tAgnet Name : ".$_SESSION['name']
						
						;
				send_init($agent_email_id, $agent_name, $subject, $cust_email,$body);
			}
			else
				echo "not checked";
            echo "</div></td>";
         echo "</tr>";
		  }
		  ?>
  </table>
        
        
<p>&nbsp;</p>
        
        <p>
          <?php 
		}
		else {
			echo $message;
		}
		?>
        </p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>