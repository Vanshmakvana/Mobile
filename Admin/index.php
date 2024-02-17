<?php session_start();
	//print_r($_SESSION['admin'])
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 TRANSITIONAL//EN"
"http://www.w3.org/TR/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>Mobile shop</title>

<link href="../style/style.css" rel="stylesheet" type="text/css"/>
<script language="javascript"type="text/javascript">

function clearText(field)
{
	if(field.defaultvalue==field.value)field.value='';
	else if(field.value=='')field.value=field.defaultvalue;
} 
</script>
</head>
<body>

<div id="templatemo_site_title_bar_wrapper">
	<div id="templatemo_site_title_bar">

	<div id="site_title">
		<img src="../images/logo.png">
	<marquee width="100%" height="100%" behavior="slide">
		<img src="../images/logo1.png">
    			<img src="../images/logo2.png">
   	</marquee>
	</div>

<div id="templatemo_menu_wrapper">
	<div id="templatemo_menu">
    	<?php
			include("menu.php");
		?>
</div>
</div>
<div id="templatemo_content_outter_wrapper">
<div id="templatemo_content_inner_wrapper">
		<div id="templatemo_content_wrapper">
		<div id="templatemo_content">

	<div id="sidebar">
	<?php

		include("sidebar.php");
	?>

	<div class="cleaner"></div>
	</div>

	<div id="content_column">
		<div class="section_w500">

		<h2></h2>
		</div>
	<div class="section_w500">
	<?php
	?>	

	<form action="login.php" method="post">
	<table border="00" width="60%" align="center">
		<tr>
			<td align="center"><font color="green" size="3"><img src="../images/user.png" height="40" ><b>Admin Login</b></font></td>
    
   	 	</tr>
    	</table>
    
    	<table border="10" width="60%" align="center" style="border:dotted; color:black" bgcolor="#CCCCCC"><tr><td>
    	<table border="0" width="100%" align="center">
    <tr align="center">
    <td colspan="2" align="center">
    
    <?php //echo '<font size="3"><center>'.$_GET['msg'].'</center></font>';?>
    
    </tr>
    <tr><td colspan="2"><br></td></tr>
    
    <tr valign="top">
    <td><font color="#993300" size="2"><b>user name:</b></font></td>
    <td><input type="text" name="unm"/>
    <?php
	?>
    </td>
    </tr>
	<tr><td colspan="2"></td></tr>
    <tr valign="top">
    	<td><font color="#993300"size="2"><b>Password</b></font></td>
        <td><input type="password" name="pwd"/>
    <?php
	?>
    </td>
    </tr>
    <tr><td colspan="2"></td></tr>
    <tr>
    <td colspan="2" align="center">
    <input type="submit" name="ok" value="log in"/>
    </td>
    </tr>
    </table>
    </td></tr>
    </table>
    </form>
    <?php
	?>
	</div>
    <div class="cleaner"></div>
    </div>
    <div class="cleaner"></div>
    </div>
    </div>
    </div>
    </div>
    
    <div class="cleaner"></div>
    <div id="templatemo_footer_wrapper">
    <div id="templatemo_footer">

    </div>
<center><img src="../images/footer.jpg" /></center>
</body>
</html>