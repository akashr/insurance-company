<style type="text/css">
#logged_in {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size:1.2em;
	color:red;
}
</style>
<div id="sidebar">
<p>User <span id="logged_in"><strong><?php echo $_SESSION['name']; ?></strong></span> is Logged in</hp>
<p>

</p>

<div>

  <ul id="MenuBar1" class="MenuBarVertical">
    <li><a href="home.php">Home</a></li>
 	<li><a class="MenuBarItemSubmenu" href="agent_details.php">Agents</a>
    <ul>
      
    </ul>
    </li>
  <li><a class="MenuBarItemSubmenu" href="policies.php">Policy</a>
    <ul>
    <li><a href="policy_details.php">Policy</a></li>
    </ul>
  </li>
  <li><a href="Claim.php">Claims</a></li>
  <li><a href="claims_list.php">List of Claims</a></li>
  <li><a href="logout.php">Logout</a></li>
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