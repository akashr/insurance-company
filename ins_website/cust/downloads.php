<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="your description goes here" />
<meta name="keywords" content="your,keywords,goes,here" />

<link rel="stylesheet" type="text/css" href="variant.css" media="screen,projection" title="Variant Portal" />
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<title>Downloads</title>
</head>

<body>


<div id="container">

<div id="toplinks">
<p><a href="#">Link 1</a> &middot; <a href="#">Link 2</a> &middot; <a href="#">Link 3</a> &middot; <a href="#">Link 4</a></p>
</div>

<div id="logo">
<h1><a href="../index.php">Insurance Corp</a></h1>
<p>A trustworthy investment...</p>

</div>


<h2 class="hide">Site menu:</h2>
<ul id="navitab">
<li><a  href="home.php">Home</a></li>
<li><a href="#">About Us</a></li>
<li><a href="products.php" >Policies</a></li>
<li><a href="contact_us.php">Contacts</a></li>
<li><a href="downloads.php" class="current">Downloads</a></li>
<li><a href="#">News</a></li>

</ul>



<div id="desc">

<div class="splitleft">

<p>

<h1>Claims</h1>

Claims and loss handling is the materialized utility of insurance; it is the actual "product" paid for. Claims may be filed by insureds directly with the insurer or through brokers or agents. The insurer may require that the claim be filed on its own proprietary forms, or may accept claims on a standard industry form such as those produced by ACORD.

Insurance company claims departments employ a large number of claims adjusters supported by a staff of records management and data entry clerks. Incoming claims are classified based on severity and are assigned to adjusters whose settlement authority varies with their knowledge and experience. The adjuster undertakes an investigation of each claim, usually in close cooperation with the insured, determines if coverage is available under the terms of the insurance contract, and if so, the reasonable monetary value of the claim, and authorizes payment.

</p>
<p class="right"></p>
</div>

<div class="splitright">
<h2>Sample links:</h2>
<ul>
<li><a href="http://google.com">Google Profile</a></li>
<li><a href="http://facebook.com">Facebook page</a></li>
<li><a href="http://twitter.com/">Twitter Page</a></li>
</ul>
<p class="right"><a href="#">Read more &raquo;</a></p>
</div>
<hr />
</div>


<div id="main">
  
  <p>&nbsp;</p>
  <div align="center">
    <a href="images/claim.pdf"><img src="images/1.ico" align="middle" /></a></br>
    <p>&nbsp;</p>
    <h3 align="center"> Claim Form</h3>
    
   </div>
</div>

<?php require_once("sidebar.php"); ?>




</body>
</html>

