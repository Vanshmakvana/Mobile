<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mobile shop</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style/style.css" rel="stylesheet" type="text/css" />
<script language="javascript" type="text/javascript">

function ClearText(field)
{
	if(field.defaultValue == field.value)field.value='';
	else if(field.value == '') field.value=field.defaultValue;
}

function ajax()
{
	xmlobj=give_xmlobj();
	var k;
	k="getdata.php?s="+document.getElementById("nm").value;
	xmlobj.open("GET",k,false);
	xmlobj.send(null);
	document.getElementById("hello").innerHTML=xmlobj.responseText;
}

function give_xmlobj()
{
	//new web browser
	if(window.XMLHttpRequest)
	{
		return new XMLHttpRequest();
	}
	//old web browser
	if(window.ActiveXObject)
	{
		return new ActiveXObject("Microsoft.XMLHTTP");
	}
	return false;
}
</script>
</head>
<body>
<div id="templatemo_site_title_bar_wrapper">
	<div id="templatemo_site_title_bar">
    	<div id="site_title">
        	<img src="images/logo.png" />
            <marquee width="100%" height="100%">
            	<img src="images/logo1.png" />
                	<img src="images/logo2.png" />
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
        	<div class="sidebar_section">
            	<?php
					include("sidebar.php");
				?>
            </div>
            <div class="sidebar_section">
				<?php
					include("search.php");
				?>
            </div>
            <div class="cleaner"></div>
        </div>
        <div id="content_column">
        	<div class="section_w500">
            	<h2>Register</h2>
            </div>
            <div class="section_w500">
				<form action="process_register.php" method="post">
                <?php
					if(isset($_GET['ok']))
					{
						echo '<font color="green" size="3">'.$_GET['ok'].'</font><br><br>';
					}
				?>
                
                <font color="#008000" size="2.5">Full Name</font><br>
                <input type="text" name="fnm" />
                <?php
					if(isset($_SESSION['register']['fnm']))
					{
						echo '&nbsp;&nbsp;&nbsp;<font color="red">'.$_SESSION['register']['fnm'].'</font>';
					}
				?>
                
                <br /><br />
                <font color="#008000" size="2.5">User Name</font><br>
                <input type="text" name="nm"  id="nm" onkeyup="ajax()"/>
                &nbsp;&nbsp;&nbsp;<font id="hello"></font>
                <?php
					if(isset($_SESSION['register']['nm']))
					{
						echo '<font color="red">'.$_SESSION['register']['nm'].'</font>';
					}
					else
					{
						//echo '&nbsp;&nbsp;&nbsp;<font color="red">'.$_SESSION['register']['user'].'</font>';
					}
				?>
                
                <br /><br />
                <font color="#008000" size="2.5">Password</font><br />
                <input type="password" name="pwd" />
                <?php
					if(isset($_SESSION['register']['pwd']))
					{
						echo '&nbsp;&nbsp;&nbsp;<font color="red">'.$_SESSION['register']['pwd'].'</font>';
					}
					else if(isset($_SESSION['register']['pwdmatch']))
					{
						echo '&nbsp;&nbsp;&nbsp;<font color="red">'.$_SESSION['register']['pwdmatch'].'</font>';
					}
					else if(isset($_SESSION['register']['length']))
					{
						echo '&nbsp;&nbsp;&nbsp;<font color="red">'.$_SESSION['register']['length'].'</font>';
					}
				?>
                
                <br /><br />
                <font color="#008000" size="2.5">Confirm Password</font><br />
                <input type="password" name="cpwd" />
                <?php
					if(isset($_SESSION['register']['cpwd']))
					{
						echo '&nbsp;&nbsp;&nbsp;<font color="red">'.$_SESSION['register']['cpwd'].'</font>';
					}
				?>
                
                <br /><br />
                <font color="#008000" size="2.5">E-mail</font><br />
                <input type="text" name="email" />
                <?php
					if(isset($_SESSION['register']['email']))
					{
						echo '&nbsp;&nbsp;&nbsp;<font color="red">'.$_SESSION['register']['email'].'</font>';
					}
					else if(isset($_SESSION['register']['regex']))
					{
						echo '&nbsp;&nbsp;&nbsp;<font color="red">'.$_SESSION['register']['regex'].'</font>';
					}
				?>
                
                <br /><br />
                <font color="#008000" size="2.5">City</font><br />
                <input type="text" name="city" />
                <?php
					if(isset($_SESSION['register']['city']))
					{
						echo '&nbsp;&nbsp;&nbsp;<font color="red">'.$_SESSION['register']['city'].'</font>';
					}
				?>
                
                <br /><br />
                <font color="#008000" size="2.5">Security Question : </font><br />
                <select name="sque">
                	<option>What is your favourite actor?
                    <option>What is your best friend?
                    <option>What is your mobile no.?
                    <option>What is your favourite author?
                    <option>What is your parant's name?
                </select>
                
                <br /><br />
                <font color="green" size="2.5">Answer : </font><br />
                <input type="text" name="ans" />
                <?php
					if(isset($_SESSION['register']['ans']))
					{
						echo '&nbsp;&nbsp;&nbsp;<font color="red">'.$_SESSION['register']['ans'].'</font>';
					}
				?>
                
                <br /><br />
                <input type="submit" value="ok" name="ok" />
                <input type="reset" value="clear" />
                </form>
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
</div>
<center><img src="images/footer.jpg" /></center>
</body>
</html>
