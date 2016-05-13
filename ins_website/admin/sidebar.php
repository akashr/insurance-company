<script src="../agent/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="../agent/SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />

<style type="text/css">
#logged_in {
	font-family: Trebuchet MS, Arial, Helvetica, sans-serif;
	font-size:1.2em;
	color:red;
}
</style>
<div id="sidebar">
<p>Officier <span id="logged_in"><strong><?php echo  $_SESSION['username']; ?></strong></span> is Logged in</p>

</br>




<div>

  <ul id="MenuBar1" class="MenuBarVertical">
    <li><a href="agent_reg.php">Agent Registration</a></li>
  <li><a href="cust_reg.php">Customer Registration</a>
    </li>
      <li> <a href="new_policy.php">New Policy  (agent)</a></li>
      <li> <a href="new_policy_cust.php">New Policy  (cust)</a></li>
  <li><a href="logout.php">Logout</a></li>
  </ul>
</div>



</div>

<script type="text/javascript">
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});

</script>