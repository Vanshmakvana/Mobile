<?php
	session_start();
	if($_SESSION['unm']!="")
	{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mobile shop</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="../style/style.css" rel="stylesheet" type="text/css" />

<script language="javascript" type="text/javascript">

function clearText(field)
{
	if(field.defaultValue == field.value)field.value='';
	else if(field.value == '')field.value=field.defaultValue;
}

</script>

</head>

<body>

<div id="templatemo_site_title_bar_wrapper">
	<div id="templatemo_site_title_bar">
    	<div id="site_title">
        	<img src="../images/logo.png" />
            <marquee width="100%" height="100%">
            	<img src="../images/logo1.png" />
                	<img src="../images/logo2.png" />
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
        </div>
        
        <div id="content_column">
        	<div class="section_w500">
            	<h2></h2>
            </div>
            <div class="section_w500">
            	<marquee><img src="../images/login.png" height="80" /><font color="#FF0000" size="5">please login </font></marquee>
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
<center><img src="../images/footer.jpg" /></center>
</body>
</html>
<?php
}
else
{
	header("location:index.php");
}
?>
