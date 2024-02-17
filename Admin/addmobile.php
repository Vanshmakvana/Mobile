<?php
	session_start();
	
	if($_SESSION['unm']!="")
	{
	
	if(!(isset($_SESSION['status']) && $_SESSION['unm']=="admin"))
	{
		header("location:check.php");
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Mobile shop</title>
<meta name="" />
<meta name="" />
<link href="../style/style.css" rel="stylesheet" type="text/css" />
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
            	<h2>Add mobile</h2>
            </div>
            <div class="section_w500">
   		         <form action="add_detail.php" method="post" enctype="multipart/form-data">
					<font size="2.5" color="green">
					<table border="0" width="100%">
                    	<tr>
                        	<td><b>Company Id : </b></td>
                            <td>
                            <?php
								include("connect.php");
								$q="select * from company";
								$res=mysqli_query($con,$q);
							?>
                            <select name="id" style="width:146px">
                            <option value="0">Select Company</option>
                            <?php
								while($row=mysqli_fetch_assoc($res))
								{
									$id=$row['id'];
									$company=$row['company'];
									echo '<option value='.$id.'>'.$company.'</option>';
								}
							?>
                            </select>
                            </td>
                        </tr>
                        <tr><td>&nbsp;</td>
                        <?php
							if(isset($_SESSION['error']['id']))
							{
								echo '<td><font color="red">'.$_SESSION['error']['id'].'</font><br>&nbsp;';
							}
						?>
                        </tr>
                        <tr>
                        	<td><b>Model Name : </b></td>
                            <td><input type="text" name="model"  /></td>
                        </tr>
                        <tr><td>&nbsp;</td>
                        <?php
							if(isset($_SESSION['error']['model']))
							{
								echo '<td><font color="red">'.$_SESSION['error']['model'].'</font><br>&nbsp;';			
							}
						?>
                        </tr>
                        <tr>
                        	<td><b>Description : </b></td>
                            <td><textarea name="desc" style="height:100px;"></textarea></td>
                        </tr>
                        <tr><td>&nbsp;</td>
                        <?php
							if(isset($_SESSION['error']['desc']))
							{
								echo '<td><font color="red">'.$_SESSION['error']['desc'].'</font><br>&nbsp;';			
							}
						?>
                        </tr>
                        <tr>
                        	<td><b>Display : </b></td>
                            <td><input type="text" name="disp" /></td>
                        </tr>
                        <tr><td>&nbsp;</td>
                        <?php
							if(isset($_SESSION['error']['disp']))
							{
								echo '<td><font color="red">'.$_SESSION['error']['disp'].'</font><br>&nbsp;';			
							}
						?>
                        </tr>
                        <tr>
                        	<td><b>Color : </b></td>
                            <td><input type="text" name="color" /></td>
                        </tr>
                        <tr><td>&nbsp;</td>
                        <?php
							if(isset($_SESSION['error']['color']))
							{
								echo '<td><font color="red">'.$_SESSION['error']['color'].'</font><br>&nbsp;';			
							}
						?>
                        </tr>
                        <tr>
                        	<td><b>Price : </b></td>
                            <td><input type="text" name="price" /></td>
                        </tr>
                        <tr><td>&nbsp;</td>
                        <?php
							if(isset($_SESSION['error']['price']))
							{
								echo '<td><font color="red">'.$_SESSION['error']['price'].'</font><br>&nbsp;';			
							}
						?>
                        </tr>
                        <tr>
                        	<td><b>Image : </b></td>
                            <td><input type="file" name="file1" /></td>
                        </tr>
                        <tr><td>&nbsp;</td>
                        <?php
							if(isset($_SESSION['error']['name']))
							{
								echo '<td><font color="red">'.$_SESSION['error']['name'].'</font><br>&nbsp;';			
							}
							else if(isset($_SESSION['error']['type']))
							{
								echo '<td><font color="red">'.$_SESSION['error']['type'].'</font><br>&nbsp;';			
							}
							else if(isset($_SESSION['error']['exits']))
							{
								echo '<td><font color="red">'.$_SESSION['error']['exits'].'</font><br>&nbsp;';			
							}
						?>
                        </tr>
                        <tr>
                        	<?php
                        	    if(isset($_REQUEST['msg']))
                        	    {
								    echo '<td colspan="2" align="center"><center><h4><font color="blue">'.$_REQUEST['msg'].'</font></h4></center><br></td>';
                        	    }
							?>
                        </tr>
                        <tr>
                        	<td></td>
                            <td align="left">
                            	<input type="submit" value="Add Detail" name="ok" />&nbsp;
                                <input type="reset" />
                            </td>
                        </tr>
                    </table>
                    </font>
                </form>
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
                       
</body>
</html>
