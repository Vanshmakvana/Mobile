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
            	<h2>compare</h2>
            </div>
            <div class="section_w500">
            	<table border="0" width="100%">
                <tr align="center">
                	<form action="" method="post">
                    	<td width="48%"><font color="#008000">company</font><br />
                        <select name="cmp1" style="width:150px">
                        <?php
							include("connect.php");
							$q="select * from company";
							$res=mysqli_query($con,$q);
							while($row=mysqli_fetch_assoc($res))
							{
								if($row['company']==$_POST['cmp1'])
								{
									echo '<option selected value='.$row['id'].'>'.$row['company'].'</option>';
								}
								else
								{
									echo '<option value='.$row['id'].'>'.$row['company'].'</option>';
								}
							}
						?>
                        </select>
                        </td>
                        <td width="48%"><font color="#008000">company</font><br />
                        <select name="cmp2" style="width:150px">
                        <?php
							include("connect.php");
							$q="select * from company";
							$res=mysqli_query($con,$q);
							while($row=mysqli_fetch_assoc($res))
							{
								if($row['company']==$_POST['cmp1'])
								{
									echo '<option selected value='.$row['id'].'>'.$row['company'].'</option>';
								}
								else
								{
									echo '<option value='.$row['id'].'>'.$row['company'].'</option>';
								}
							}
						?>
                        </select>
                        </td>
                        <td><input type="submit" value="ok" />
                    </form>
                    <tr>
                    <?php
						if(isset($_POST['cmp1'])&& isset($_POST['cmp1']))
						{
					?>
                    <tr>
                    	<td colspan="3"><hr style="border:2px dotted #993300" /></td>
                    </tr>
                    <tr align="center">
                    	<form action="" method="post">
                        	<td width="48%"><font color="#008000">Model</font><br />	
							<select name="pro1" style="width:150px">
                            <?php
								include("connect.php");
								$q="select * from product where cid='".$_POST['cmp1']."'";
								$res=mysqli_query($con,$q);
								while($row=mysqli_fetch_assoc($res))
								{
									if($row['model']==$_POST['pro1'])
									{
										echo '<option selected value='.$row['id'].'>'.$row['model'].'</option>';
									}
									else
									{
										echo '<option value='.$row['id'].'>'.$row['model'].'</option>';
									}
								}
							?>
                            </select>
                            </td>
                            <td width="48%"><font color="#008000">Model</font><br />	
							<select name="pro2" style="width:150px">
                            <?php
								include("connect.php");
								$q="select * from product where cid='".$_POST['cmp2']."'";
								$res=mysqli_query($con,$q);
								while($row=mysqli_fetch_assoc($res))
								{
									if($row['model']==$_POST['pro2'])
									{
										echo '<option selected value='.$row['id'].'>'.$row['model'].'</option>';
									}
									else
									{
										echo '<option value='.$row['id'].'>'.$row['model'].'</option>';
									}
								}
							?>
                            </select>
                            </td>
                            <input type="hidden" name="cmp1" value="<?php echo $_POST['cmp1']?>" />
                            <input type="hidden" name="cmp2" value="<?php echo $_POST['cmp2']?>" />
                            <td><input type="submit" value="ok" /></td>
                    </tr>
                    <?php
						}
					?>
                        
					</form>
                    </tr>
                    <?php
						if(isset($_POST['pro1'])&& isset($_POST['pro1']))
						{
					?>
                    <tr>
                    	<td colspan="3"><hr style="border:2px dotted #993300" /></td>
                    </tr>
                    <tr>
                    	<?php
							include("connect.php");
							$q="select * from product where id='".$_POST['pro1']."'";
							$res=mysqli_query($con,$q);
							$row=mysqli_fetch_assoc($res);
							
							echo '
							<td><center><img src="images/'.$row['img'].'" height="250" width="150"></center><br>
							<font size="2.5" color="green"><u><b>Model</u> : </b><br></font>'.$row['model'].'<br><br>
							<font size="2.5" color="green"><u><b>Description</u> : </b><br></font>'.$row['description'].'<br><br>
							<font size="2.5" color="green"><u><b>Display</u> : </b><br></font>'.$row['display'].'<br><br>
							<font size="2.5" color="green"><u><b>Color</u> : </b><br></font>'.$row['color'].'<br><br>
							<font size="2.5" color="green"><u><b>Price</u> : </b><br></font>'.$row['price'].'<br></font>';
							
							include("connect.php");
							$q="select * from product where id='".$_POST['pro2']."'";
							$res=mysqli_query($con,$q);
							$row=mysqli_fetch_assoc($res);
							
							echo '
							<td style="border:2px dotted #993300;border-top:hidden;border-right:hidden;border-bottom:hidden;"><center><img src="images/'.$row['img'].'" height="250" width="150"></center><br>
							&nbsp;&nbsp;<font size="2.5" color="green"><u><b>Model</u> : </b><br></font>&nbsp;'.$row['model'].'<br><br>
							&nbsp;<font size="2.5" color="green"><u><b>Description</u> : </b><br></font>&nbsp;'.$row['description'].'<br><br>
							&nbsp;<font size="2.5" color="green"><u><b>Display</u> : </b><br></font>&nbsp;'.$row['display'].'<br><br>
							&nbsp;<font size="2.5" color="green"><u><b>Color</u> : </b><br></font>&nbsp;'.$row['color'].'<br><br>
							&nbsp;<font size="2.5" color="green"><u><b>Price</u> : </b><br></font>&nbsp;'.$row['price'].'<br></font>';
						}
					?>
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
