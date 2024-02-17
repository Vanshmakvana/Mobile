<?php
	session_start();
?>

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
				<h2>Contact Us</h2>
            </div>
            <div class="section_w500">
            	<ul>
                	<form action="process_contact.php" method="post">
                    	<font color="green" size="3">
                        	<?php
								if(isset($_SESSION['contact']['ok']))
								{
									echo $_SESSION['contact']['ok'].'<br><br>';
								}
							?>
                            Name : <br /><input type="text" name="nm" style="width:180px" />
                            <?php
								if(isset($_SESSION['contact']['nm']))
								{
									echo '&nbsp;&nbsp;&nbsp;<font color="red" size="2">'.$_SESSION['contact']['nm'].'</font>';
								}
							?>
                            <br /><br />
                            E-mail : <br />
                            <input type="text" name="email" style="width:180px" />
                            <?php
								if(isset($_SESSION['contact']['email']))
								{
									echo '&nbsp;&nbsp;&nbsp;<font color="red" size="2">'.$_SESSION['contact']['email'].'</font>';
								}
								else if(isset($_SESSION['contact']['regex']))
								{
									echo '&nbsp;&nbsp;&nbsp;<font color="red" size="2">'.$_SESSION['contact']['regex'].'</font>';
								}								
							?>
                            <br /><br />
                            Feedback : <br />
                            <textarea name="query" style="width:180px"></textarea>
                            <?php
								if(isset($_SESSION['contact']['query']))
								{
									echo '&nbsp;&nbsp;&nbsp;<font color="red" size="2">'.$_SESSION['contact']['query'].'</font>';
								}
							?>
                            <br /><br />
                        </font>
                        <input type="submit" value="send" /><br /><br />
                    </form>
                    <hr style="border:1px dashed; color:#993300" /><br /><br />
                    	<font color="green" size="3">
                        	<table border="0" width="100%">
                            <tr>
                            	<td width="1%" valign="top"><li></td>
                                <td width="25%">E-mail :- </td>
                                <td width="74%"><u><a href="mailto:hdhamecha3@gmail.com"><font size="3" color="#0000FF">hdhamecha3</font><font color="#0000FF">@gmail.com</font></a>
                                <a href="mailto:gokulkansagara13@gmail.com"><font size="3" color="#0000FF">gokulkansagara13</font><font color="#0000FF">@gmail.com</u></font></a></li></td>
                            </tr>
                            <tr>
                            	<td colspan="3"><hr color="green" /></td>
                            </tr>
                            <tr>
                            	<td width="1%" valign="top"><li></td>
                                <td width="25%" valign="top">Contact :- </td>
                                <td width="74%"><font size="2.5"><b>Himanshu Dhamecha</b></font><br />MO. :- <font color="#008000" size="3">7990693484</font><br /><br />
                                <b>Gokul Kansagara</b></font><br />MO. :- <font color="#008000" size="3">9099978157</font></td>
                            </tr>
                            <tr>
                            	<td colspan="3"><hr color="#008000"></td>
                            </tr>
                            <tr>
                            	<td width="1%" valign="top"><li></td>
                                <td width="25%" valign="top">Address :- </td>
                                <td width="74%"><font color="#008000" size="3">7-Manhar Plot,Rajkot</li></font></td>
                            </tr>
                            <tr>
                            	<td colspan="3"><hr color="#008000" /></td>
                            </tr>
                            <tr>
                            	<td colspan="3" align="center"><div class="button_01"><a>Thanks for visit</a></div></td>
                            </tr>
                       		</table>
                        </font>
                </ul>
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
