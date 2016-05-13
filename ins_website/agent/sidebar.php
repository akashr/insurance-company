<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />

<style type="text/css">
#logged_in {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size:1.2em;
	color:red;
}
</style>
<div id="sidebar">
<p>Agent <span id="logged_in"><strong><?php echo $_SESSION['name']; ?></strong></span> is Logged in</p>

</br>




<div>

  <ul id="MenuBar1" class="MenuBarVertical">
    <li><a href="home.php">Home</a></li>
 	<li><a class="MenuBarItemSubmenu" href="customers.php">Customers</a>
    <ul>
      <li><a href="#">Customers Details</a></li>
      <li><a href="inti_cust.php">Intimate Customers </a></li>
      
    </ul>
    </li>
  <li><a class="MenuBarItemSubmenu" href="#">Policy</a>
    <ul>
    <li><a class="MenuBarItemSubmenu" href="make_policy.php">Make Policy</a>
    <ul>
          <li><a href="make_policy/dispatch_policy.php">Dispatch Policy</a></li>
          <li><a href="make_policy/update_status.php">Update Status</a></li>
          <li><a href="make_policy/extend_policy.php">Extend Policy</a></li>
    </ul>
    </li>
    </ul>
  	</li>
      <li><a href="due_policies.php">Due Policies</a></li>
  <li><a href="pending_claims.php">Pending Claims</a></li>   
  <li><a href="logout.php">Logout</a></li>
  </ul>
</div>



</div>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});

</script>