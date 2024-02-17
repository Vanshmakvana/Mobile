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
            <div class="cleaner"></div>
        </div>
        
        <div id="content_column">
        	<div class="section_w500">
            	<h2>Select Mobile</h2>
            </div>
            <div class="section_w500">
				<form action="" method="post">
                	<font color="green" size="3"><b>Select Company</b><br /></font>
                    	<select name="cmp" style="width:150px">
                        	<option value="0">Select Company</option>
                            	<?php
									include("connect.php");
									$q="select * from company";
									$res=mysqli_query($con,$q);
									
									while($row=mysqli_fetch_assoc($res))
									{
									    
										if($row['company']==$_POST['cmp'])
										{
											echo '<option value='.$row['id'].'>'.$row['company'].'</option>';
										}
										else
										{
											echo '<option value='.$row['id'].'>'.$row['company'].'</option>';
										}
									}
								?>
                        </select>
                
                        <input type="submit" name="submit" value="Go" />
                </form>
                
                <?php
                    
					if(isset($_POST['submit']) && $_POST['cmp']!=0)
					{
						echo '
						<form action="show_mobile_detail.php" method="post"><br><hr style="border:2px dotted #993300"><br>
						<font color="green" size="3"><b>Select Model</b><br>
						<select name="id" style="width:150px">
						<option value="0">Select Model</option>';
							include("connect.php");
							$q="select * from product where cid='".$_POST['cmp']."'";
							$res=mysqli_query($con,$q);
							
							while($row=mysqli_fetch_assoc($res))
							{
								echo '<option value='.$row['id'].'>'.$row['model'].'</option>';
								
							}
						echo '
						</select>
						</font>
						
						<input type="submit" name="ok" value="Ok">
						</form>';
					}
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
</div>
<center><img src="../images/footer.jpg" /></center>
</body>
</html>