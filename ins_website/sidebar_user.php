
<div id="sidebar">
 <div>
  <ul id="navitab">
<li><a href="cust.php">User</a></li>
<li><a class="current" href="agent.php">Agent</a></li>
</ul>

<form id="form1" name="form1" method="post" action="cust.php">

<table width="280" height="128" border="0"  class="block">
          <tr>
            <td width="20"></td>
            <td width="76"><label class="fontu">Name: </label></td>
            <td width="150"><input type="text" name="cu_id" /></td>
          </tr>
          <tr>
            <td width="20"></td>
            <td class="fontp">Password: </td>
            <td><input type="password" name="passwd" /></td>
          </tr>
          <tr>
            <td width="20"></td>
            <td><label></label></td>
            <td><input type="submit" name="Submit" value="Submit" /></td>
          </tr>
        </table>
        <p>
  <?php if (!empty($message)) {echo "<p class=\"message\">" . $message . "</p>";} ?>
</p>
<p>
  <?php if (!empty($errors)) { display_errors($errors); } ?>
</p>
</form>
</div>

<p>

</p>

<div class="splitleft">
<h2>Sample links</h2>
<ul>

<li><a href="#"> Govt. of India Guidelines </a></li>
<li><a href="#"> POC </a></li>
<li><a href="#"> Trade rate </a></li>
<li><a href="#"> Article 51 : Insurance Co </a></li>
<li><a href="#"> Wiki page </a></li>

</ul>
</div>

<div class="splitright">

<h2>Recent News</h2>
<ul>
<li>Jun 29: <a href="#"> New FDI policy </a></li>
<li>Jun 26: <a href="#"> New Office at Indore </a></li>
<li>Jun 24: <a href="#"> Try our New Policy for elderly</a></li>
</ul>

</div>

<hr />
</div>
</div>