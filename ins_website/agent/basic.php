<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>


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
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>


<body>
<?php require_once("topbar.php"); ?>
<div id="main">
<ul id="MenuBar2" class="MenuBarHorizontal">
  <li><a href="home.php">Home</a></li>
 	<li><a class="MenuBarItemSubmenu" href="customers.php">Customers</a>
    <ul>
      <li><a href="#">Customers Details</a></li>
      <li><a href="inti_cust.php">Intimate Customers </a></li>
      <li><a href="#">Item 1.2</a></li>
      <li><a href="#">Item 1.3</a></li>
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
      <li><a href="#">Item 3.2</a></li>
    </ul>
  </li>
  <li><a href="logout.php">Logout</a></li>
</ul>

  
  <h2>&nbsp;</h2>
  <h2>&nbsp;</h2>
  <h2>&nbsp;</h2>
  <h2>Company : </h2>
<p></p>
    
<h3>What is a free website template?</h3>
<p>If you like this layout and would like to use it in any way, you are free to do so. You can make any changes you may want to, and there is no cost involved for using the template for commercial projects. All I ask for is that you leave the "Template design by Andreas Viklund" link in the footer of the site.</p>

<p class="block">Version: 1.0 (June 26, 2010)</p>


</div>

<?php require_once("sidebar.php"); ?>
<script type="text/javascript">
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
</script>
</body>
</html>

