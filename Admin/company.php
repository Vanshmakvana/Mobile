<?php 
	session_start();
	if(!(isset($_SESSION['status']) && $_SESSION['unm'] == "admin"))
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
            	<h2>Company</h2>
            </div>
            <div class="section_w500">
   		         <form action="process_add_company.php" method="post">
					<font size="2.5" color="green"><b> Add company : </b></font><br />
                    <input type="text" name="cnm" style="width:150px" />
                    <input type="submit" value="add" />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
						if(isset($_GET['error']))
						{
							echo '<br><font color="red" size="3">'.$_GET['error'];
						}
						
						if(isset($_GET['ok']))
						{
							echo '<br><font color="red" size="3">'.$_GET['ok'];
						}
					?>
				</form>
                <br />
                <hr width="45%" align="left" style="border:dotted;color:#33CCFF" />
                <form action="process_delete_company.php" method="post">
                <br />
                	<font size="2.5" color="green"><b> Delete Company : </b></font><br />
                    <select name="cnm" style="width:150px">
                    	<?php
							include("connect.php");
							$q="select * from company";
							$res=mysqli_query($con,$q);
							while($row=mysqli_fetch_assoc($res))
							{
								echo "<option>".$row['company'];
							}
						?>
					</select>
                    
                    <input type="submit" value="delete" />
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    <?php
						if(isset($_GET['del']))
						{
							echo '<br><font color="red" size="3">'.$_GET['del'];
						}
						if(isset($_GET['delok']))
						{
							echo '<br><font color="blue" size="3">'.$_GET['delok'];
						}
					?>
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
<center><img src="../images/footer.jpg" /></center>
</body>
</html>                        