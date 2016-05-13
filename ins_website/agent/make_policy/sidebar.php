<style type="text/css">
#logged_in {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size:1.2em;
	color:red;
}
</style>
<div id="sidebar">
<p>Agent <span id="logged_in"><strong><?php echo $_SESSION['name']; ?></strong></span> is Logged in</hp>
<p>

</p>

<div>

  <ul id="MenuBar1" class="MenuBarVertical">
    <li><a href="../home.php">Home</a></li>
 	<li><a class="MenuBarItemSubmenu" href="../customers.php">Customers</a>
    <ul>
      <li><a href="#">Customers Details</a></li>
      <li><a href="../inti_cust.php">Intimate Customers </a></li>
      
    </ul>
    </li>
  <li><a class="MenuBarItemSubmenu" href="#">Policy</a>
    <ul>
    <li><a class="MenuBarItemSubmenu" href="../make_policy.php">Make Policy</a>
    <ul>
          <li><a href="dispatch_policy.php">Dispatch Policy</a></li>
          <li><a href="update_status.php">Update Status</a></li>
          <li><a href="extend_policy.php">Extend Policy</a></li>
    </ul>
    </li>
      
    </ul>
  </li>
  <li><a href="../due_policies.php">Due Policies</a></li>
  <li><a href="../logout.php">Logout</a></li>
  </ul>
</div>
<!--
<div id="footer">
<p>Copyright &copy; 2010 Your Name &middot; Template design by <a href="http://andreasviklund.com/">Andreas Viklund</a></p>
</div>
-->
</div>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>