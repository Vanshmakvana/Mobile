<?php
	session_start();
	if(!isset($_SESSION['status']))
	{
		header("location:check.php");
	}
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
            	<?php
					include("connect.php");
					$q="select * from product where id=".$_POST['id'];
					$res=mysqli_query($con,$q);
					$row=mysqli_fetch_assoc($res);
				?>
                <h2><?php echo $row['model']; ?></h2>
            </div>
            <div class="section_w500">
            	<table border="0" width="100%">
                <tr>
                	<td align="center" width="250" valign="top"><img src="images/<?php echo $row['img']; ?>" width="190" height="300" /><br />
                    
                    <center><div class="button_01"><br /><a href="addtocart.php?company=<?php echo $row['company']; ?>&model=<?php echo $row['model']; ?>&price=<?php echo $row['price']; ?>">Add to Cart</a></center></div></td>
                    
                    <td valign="top">
                    <font size="2">
                    
                    <font size="2.5" color="#008000"><li><u><b>Model</u> :</b></li></font><?php echo $row['model']; ?><br /><br />
                    
                    <font size="2.5" color="#008000"><li><u><b>Discription</u> :</font></b>
                    <?php echo $row['description']; ?><br /><br />
                    
                    <font size="2.5" color="#008000"><li><u><b>Display</u> :</font></b>
                    <?php echo $row['display']; ?><br /><br />
                    
                    <font size="2.5" color="#008000"><li><u><b>Color</u> :</font></b>
                    <?php echo $row['color']; ?><br /><br />
                    
                    <font size="2.5" color="#008000"><li><u><b>Price</u> :</font></b>
                    <?php echo $row['price']; ?><br /><br />
                    </td>
                </tr>
                </table>
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