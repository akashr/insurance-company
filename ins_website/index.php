<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta HTTP-EQUIV="REFRESH" content="0; url=cust.php">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>index page</title>
<style type="text/css">
#f {
	font-family: Comic Sans MS, cursive;
}
#f {
	font-family: Tahoma, Geneva, sans-serif;
}
</style>
<script src="SpryAssets/SpryTooltip.js" type="text/javascript"></script>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<script src="SpryAssets/SpryTabbedPanels.js" type="text/javascript"></script>
<script src="SpryAssets/SpryCollapsiblePanel.js" type="text/javascript"></script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="SpryAssets/SpryTooltip.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryCollapsiblePanel.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div align="center"></div>
<div align="center">
  <h1><a href="cust.php" id="f">Click this : </a></h1>
</div>
<form id="form1" name="form1" method="post" action="">
  a
</form>
<div class="tooltipContent" id="sprytooltip1">Click here</div>
<p>&nbsp;</p>
<p>&nbsp;</p>



<div id="Accordion1" class="Accordion" tabindex="0">
  <div class="AccordionPanel">
    <div class="AccordionPanelTab">Label 1</div>
    <div class="AccordionPanelContent">Content 1</div>
  </div>
  <div class="AccordionPanel">
    <div class="AccordionPanelTab">Label 2</div>
    <div class="AccordionPanelContent">Content 2</div>
  </div>
</div>
<ul id="MenuBar2" class="MenuBarVertical">
  <li><a class="MenuBarItemSubmenu" href="#">Item 1</a>
    <ul>
      <li><a href="#">Item 1.1</a></li>
      <li><a href="#">Item 1.2</a></li>
      <li><a href="#">Item 1.3</a></li>
    </ul>
  </li>
  
  <li><a href="#">Item 2</a></li>
  <li><a class="MenuBarItemSubmenu" href="#">Item 3</a>
    <ul>
      <li><a class="MenuBarItemSubmenu" href="#">Item 3.1</a>
        <ul>
          <li><a href="#">Item 3.1.1</a></li>
          <li><a href="#">Item 3.1.2</a></li>
        </ul>
      </li>
      <li><a href="#">Item 3.2</a></li>
      <li><a href="#">Item 3.3</a></li>
    </ul>
  </li>
  <li><a href="#">Item 4</a></li>
</ul>
<ul id="MenuBar1" class="MenuBarHorizontal">
  <li><a class="MenuBarItemSubmenu" href="#">Users</a>
    <ul>
      <li><a href="admin.php">Admin</a></li>
      <li><a href="agent.php">Agent</a></li>
      <li><a href="cust.php">User</a></li>
    </ul>
  </li>
  
  <li><a href="#">Item 2</a></li>
  <li><a class="MenuBarItemSubmenu" href="#">Item 3</a>
    <ul>
      <li><a class="MenuBarItemSubmenu" href="#">Item 3.1</a>
        <ul>
          <li><a href="#">Item 3.1.1</a></li>
          <li><a href="#">Item 3.1.2</a></li>
        </ul>
      </li>
      <li><a href="#">Item 3.2</a></li>
      <li><a href="#">Item 3.3</a></li>
    </ul>
  </li>
</ul>
<p>&nbsp; </p>
<div id="TabbedPanels1" class="TabbedPanels">
  <ul class="TabbedPanelsTabGroup">
    <li class="TabbedPanelsTab" tabindex="0">Tab 1</li>
    <li class="TabbedPanelsTab" tabindex="0">Tab 2</li>
  </ul>
  <div class="TabbedPanelsContentGroup">
    <div class="TabbedPanelsContent">Content 1</div>
    <div class="TabbedPanelsContent">Content 2</div>
  </div>
</div>
<div id="CollapsiblePanel1" class="CollapsiblePanel">
  <div class="CollapsiblePanelTab" tabindex="0">Tab</div>
  <div class="CollapsiblePanelContent">Simple, clean and accessible. Valid code (XHTML 1.0 Strict), small file size and tested to work with all major web browsers and common mobile devices. Variant Portal is a starting point, open for changes and free to download and use. Get your message out to the world without visual distractions or annoying effects</div>
</div>
<p>&nbsp; </p>
<p>&nbsp; </p>
<p>&nbsp; </p>

<script type="text/javascript">
var sprytooltip1 = new Spry.Widget.Tooltip("sprytooltip1", "#form1");
var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
var CollapsiblePanel1 = new Spry.Widget.CollapsiblePanel("CollapsiblePanel1");
var MenuBar2 = new Spry.Widget.MenuBar("MenuBar2", {imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
</script>
</body>
</html>