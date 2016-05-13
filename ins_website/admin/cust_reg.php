<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connection.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>
<?php 
include_once("includes/form_functions.php");
	// START FORM PROCESSING
	if (isset($_POST['Submit'])) { // Form has been submitted.
		$errors = array();

		// perform validations on the form data
		$required_fields = array('name', 'p_num', 'address', 'email', 'cu_id', 'licence_no', 'ssn', 'birthday_month', 'birthday_day', 'birthday_year');
		//'dob');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('name' => 30, 'p_num' => 30, 'address' => 70, 'email' => 30, 'cu_id' => 20, 'licence_no' => 20, 			'ssn' => 20);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$f_name = trim(mysql_prep($_POST['name']));
		$p_num = trim(mysql_prep($_POST['p_num']));
		$address = trim(mysql_prep($_POST['address']));
		$email = trim(mysql_prep($_POST['email']));
		$cu_id = trim(mysql_prep($_POST['cu_id']));
		$hashed_password = sha1("password");
		$licence_no = trim(mysql_prep($_POST['licence_no']));
		$ssn = trim(mysql_prep($_POST['ssn']));
		//$dob = trim(mysql_prep($_POST['dob']));
		$birthday_month = trim(mysql_prep($_POST['birthday_month']));
		$birthday_day = trim(mysql_prep($_POST['birthday_day']));
		$birthday_year = trim(mysql_prep($_POST['birthday_year']));
		$dob=$birthday_year."-".$birthday_month."-".$birthday_day;


		if ( empty($errors) ) {
			$query = "INSERT INTO customer (
							cust_id, name,  phone, address, email, hashed_password, licence_no, ssn, dob, age
						) VALUES (
							'{$cu_id}', '{$f_name}',  '{$p_num}', '{$address}', '{$email}', '{$hashed_password}', '{$licence_no}', '{$ssn}','{$dob}', (YEAR(CURDATE())-YEAR('{$dob}'))
						)";
			$result = mysql_query($query, $connection);
			if ($result) {
				$message = "The user was successfully created.";
			} else {
				$message = "The agent could not be registered.";
				$message .= "<br />" . mysql_error();
			}
		} else {
			if (count($errors) == 1) {
				$message = "There was 1 error in the form.";
			} else {
				$message = "There were " . count($errors) . " errors in the form.";
			}
		}
	} else { // Form has not been submitted.
		$username = "";
		$password = "";
	}
?>





<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="your description goes here" />
<meta name="keywords" content="your,keywords,goes,here" />

<link rel="stylesheet" type="text/css" href="variant.css" media="screen,projection" title="Variant Portal" />


<title>Customer Registration</title>


<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php require_once("topbar.php"); ?>
<div id="main">



		<?php if (!empty($message)) {echo "<p class=\"message\">" . $message . "</p>";} ?>
			<?php if (!empty($errors)) { display_errors($errors); } ?>&nbsp;</p>
      <form id="form2" name="form2" method="post" action="cust_reg.php">
        <div align="left">
          <table width="804" border="0">
              <tr>
                <td width="35" height="35" scope="row">&nbsp;</td>
                <td width="189" height="30" scope="row"><div align="left"> Name* </div></td>
                <td width="283"><label>
                  <input name="name" type="text" size="40" />
                </label></td>
                <td width="279">&nbsp;</td>
              </tr>
              <tr>
                <th width="35" height="35" scope="row">&nbsp;</th>
                <td scope="row"><div align="left">Phone Number*  </div></td>
                <td width="283"><label>
                  <input name="p_num" type="text" size="40" />
                </label></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th width="35" height="35" scope="row">&nbsp;</th>
                <td scope="row"><div align="left">Address*</div></td>
                <td width="283"><label>
                  <input name="address" type="text" size="40" />
                </label></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th width="35" height="35" scope="row">&nbsp;</th>
                <td scope="row"><div align="left">Date Of birth* </div></td>
                <!--
                <td width="283"><input name="dob" type="text" size="40" /></td>
                -->
                
                <td class="label"><span class="field_container">
			        <select class="" id="birthday_month" name="birthday_month" onchange='return run_with(this, [&quot;editor&quot;], function() {editor_date_month_change(this, &quot;birthday_day&quot;, &quot;birthday_year&quot;);});'>
			          <option value="-1">Month:</option>
			          <option value="1">Jan</option>
			          <option value="2">Feb</option>
			          <option value="3">Mar</option>
			          <option value="4">Apr</option>
			          <option value="5">May</option>
			          <option value="6">Jun</option>
			          <option value="7">Jul</option>
			          <option value="8">Aug</option>
			          <option value="9">Sep</option>
			          <option value="10">Oct</option>
			          <option value="11">Nov</option>
			          <option value="12">Dec</option>
		          </select>
                    <select name="birthday_day" id="birthday_day" onchange="" autocomplete="off">
                      <option value="-1">Day:</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                    </select>
                    <select name="birthday_year" id="birthday_year" onchange='return run_with(this, [&quot;editor&quot;], function() {editor_date_month_change(&quot;birthday_month&quot;,&quot;birthday_day&quot;,this);});' autocomplete="off">
                      <option value="-1">Year:</option>
                      <option value="2010">2010</option>
                      <option value="2009">2009</option>
                      <option value="2008">2008</option>
                      <option value="2007">2007</option>
                      <option value="2006">2006</option>
                      <option value="2005">2005</option>
                      <option value="2004">2004</option>
                      <option value="2003">2003</option>
                      <option value="2002">2002</option>
                      <option value="2001">2001</option>
                      <option value="2000">2000</option>
                      <option value="1999">1999</option>
                      <option value="1998">1998</option>
                      <option value="1997">1997</option>
                      <option value="1996">1996</option>
                      <option value="1995">1995</option>
                      <option value="1994">1994</option>
                      <option value="1993">1993</option>
                      <option value="1992">1992</option>
                      <option value="1991">1991</option>
                      <option value="1990">1990</option>
                      <option value="1989">1989</option>
                      <option value="1988">1988</option>
                      <option value="1987">1987</option>
                      <option value="1986">1986</option>
                      <option value="1985">1985</option>
                      <option value="1984">1984</option>
                      <option value="1983">1983</option>
                      <option value="1982">1982</option>
                      <option value="1981">1981</option>
                      <option value="1980">1980</option>
                      <option value="1979">1979</option>
                      <option value="1978">1978</option>
                      <option value="1977">1977</option>
                      <option value="1976">1976</option>
                      <option value="1975">1975</option>
                      <option value="1974">1974</option>
                      <option value="1973">1973</option>
                      <option value="1972">1972</option>
                      <option value="1971">1971</option>
                      <option value="1970">1970</option>
                      <option value="1969">1969</option>
                      <option value="1968">1968</option>
                      <option value="1967">1967</option>
                      <option value="1966">1966</option>
                      <option value="1965">1965</option>
                      <option value="1964">1964</option>
                      <option value="1963">1963</option>
                      <option value="1962">1962</option>
                      <option value="1961">1961</option>
                      <option value="1960">1960</option>
                      <option value="1959">1959</option>
                      <option value="1958">1958</option>
                      <option value="1957">1957</option>
                      <option value="1956">1956</option>
                      <option value="1955">1955</option>
                      <option value="1954">1954</option>
                      <option value="1953">1953</option>
                      <option value="1952">1952</option>
                      <option value="1951">1951</option>
                      <option value="1950">1950</option>
                      <option value="1949">1949</option>
                      <option value="1948">1948</option>
                      <option value="1947">1947</option>
                      <option value="1946">1946</option>
                      <option value="1945">1945</option>
                      <option value="1944">1944</option>
                      <option value="1943">1943</option>
                      <option value="1942">1942</option>
                      <option value="1941">1941</option>
                      <option value="1940">1940</option>
                      <option value="1939">1939</option>
                      <option value="1938">1938</option>
                      <option value="1937">1937</option>
                      <option value="1936">1936</option>
                      <option value="1935">1935</option>
                      <option value="1934">1934</option>
                      <option value="1933">1933</option>
                      <option value="1932">1932</option>
                      <option value="1931">1931</option>
                      <option value="1930">1930</option>
                      <option value="1929">1929</option>
                      <option value="1928">1928</option>
                      <option value="1927">1927</option>
                      <option value="1926">1926</option>
                      <option value="1925">1925</option>
                      <option value="1924">1924</option>
                      <option value="1923">1923</option>
                      <option value="1922">1922</option>
                      <option value="1921">1921</option>
                      <option value="1920">1920</option>
                      <option value="1919">1919</option>
                      <option value="1918">1918</option>
                      <option value="1917">1917</option>
                      <option value="1916">1916</option>
                      <option value="1915">1915</option>
                      <option value="1914">1914</option>
                      <option value="1913">1913</option>
                      <option value="1912">1912</option>
                      <option value="1911">1911</option>
                      <option value="1910">1910</option>
                      <option value="1909">1909</option>
                      <option value="1908">1908</option>
                      <option value="1907">1907</option>
                      <option value="1906">1906</option>
                      <option value="1905">1905</option>
                    </select>
			      </span></td>
                <td>
              </tr>
              <tr>
                <th width="35" height="35" scope="row">&nbsp;</th>
                <td scope="row"><div align="left">SSN* </div></td>
                <td width="283"><input name="ssn" type="text" size="40" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th width="35" height="35" scope="row">&nbsp;</th>
                <td scope="row"><div align="left">Driving Licence Number</div></td>
                <td width="283"><input name="licence_no" type="text" size="40" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th width="35" height="35" scope="row">&nbsp;</th>
                <td scope="row"><div align="left">Eamil*</div></td>
                <td width="283"><label>
                  <input name="email" type="text" size="40" />
                </label></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th width="35" height="35" scope="row">&nbsp;</th>
                <td scope="row"><div align="left">Customer ID </div></td>
                <td width="283"><div align="center">
                  <label></label>
                  <div align="left">
                    <input name="cu_id" type="text" size="40" />
                  </div>
                </div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <th width="35" height="35" scope="row">&nbsp;</th>
                <td>&nbsp;</td>
                <td width="283"><div align="center">
                  <input type="submit" name="Submit" value="Submit" />
                </div></td>
                <td>&nbsp;</td>
              </tr>
                    </table>
          <p>&nbsp;</p>
        </div>
      </form>
      <p align="left">&nbsp;</p>
      <h3 align="left">&nbsp;</h3>
      
</div>

<?php require_once("sidebar.php"); ?>
</body></html>