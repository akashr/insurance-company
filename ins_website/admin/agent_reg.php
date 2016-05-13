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
		$required_fields = array('name', 'p_num', 'address', 'email', 'ag_id');
		$errors = array_merge($errors, check_required_fields($required_fields, $_POST));

		$fields_with_lengths = array('name' => 30, 'p_num' => 30, 'address' => 70, 'email' => 30, 'ag_id' => 20);
		$errors = array_merge($errors, check_max_field_lengths($fields_with_lengths, $_POST));

		$f_name = trim(mysql_prep($_POST['name']));
		$p_num = trim(mysql_prep($_POST['p_num']));
		$address = trim(mysql_prep($_POST['address']));
		$email = trim(mysql_prep($_POST['email']));
		$ag_id = trim(mysql_prep($_POST['ag_id']));
		$hashed_password = sha1("password");

		if ( empty($errors) ) {
			$query = "INSERT INTO agent (
							agent_id, name, phone, address, email, hashed_password
						) VALUES (
							'{$ag_id}', '{$f_name}', '{$p_num}', '{$address}', '{$email}', '{$hashed_password}'
						)";
			$result = mysql_query($query, $connection);
			if ($result) {
				$message = "The Agent was successfully created.";
			} else {
				$message = "The Agent could not be registered.";
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


<title>Agent's Registration</title>


<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarVertical.css" rel="stylesheet" type="text/css" />
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
</head>

<body>

<?php require_once("topbar.php"); ?>
<div id="main">




      
      <p align="left">&nbsp;</p>
      <h3 align="center">Registration Form </h3>
      <p align="left">			<?php if (!empty($message)) {echo "<p class=\"message\">" . $message . "</p>";} ?>
		<?php if (!empty($errors)) { display_errors($errors); } ?>&nbsp;</p>
      <form id="form2" name="form2" method="post" action="agent_reg.php">
        <div align="left">
          <table width="741" border="0">
              <tr>
                <th width="86" scope="row">&nbsp;</th>
                <th width="174" height="48" scope="row"><div align="left"> Name* </div></th>
                <td width="467"><label>
                  <input name="name" type="text" size="40" />
<br />
                </label></td>
                
            </tr>
              <tr>
                <th width="86" scope="row">&nbsp;</th>
                <th width="174" height="48" scope="row"><div align="left">Phone Number*  </div></th>
                <td><label>
                  <input name="p_num" type="text" size="40" />
                </label></td>
                
              </tr>
              <tr>
                <th width="86" scope="row">&nbsp;</th>
                <th width="174" height="48" scope="row"><div align="left">Address*</div></th>
                <td><label>
                  <input name="address" type="text" size="40" />
                </label></td>
                
              </tr>
              <tr>
                <th width="86" scope="row">&nbsp;</th>
                <th width="174" height="48" scope="row"><div align="left">Eamil*</div></th>
                <td><label>
                  <input name="email" type="text" size="40" />
                </label></td>
            </tr>
              <tr>
                <th width="86" scope="row">&nbsp;</th>
                <th width="174" height="48" scope="row"><div align="left">Agent ID </div></th>
                <td><div align="center">
                  <label></label>
                  <div align="left">
                    <input name="ag_id" type="text" size="40" />
                  </div>
                </div></td>
                
              </tr>
              <tr height="48">
                <td>&nbsp;</td>
                <td>&nbsp;  </td>
               <td><div align="left" style="position:relative;
left:+50px">
                   <input type="submit" name="Submit" value="Submit" />
                </div></td>
                
              </tr>
          </table>
          <p>&nbsp;</p>
        </div>
      </form>
      <p align="left">&nbsp;</p>
      <h3 align="left">&nbsp;</h3>
      <p align="left">&nbsp;</p>
      <p align="left">&nbsp;</p>
 
</div>

<?php require_once("sidebar.php"); ?>
</body></html>     