<ul id="MenuBar2" class="MenuBarHorizontal">
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
  
  <script type="text/javascript">
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>