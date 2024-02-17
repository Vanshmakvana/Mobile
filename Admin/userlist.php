<?php
	session_start();
	if(!(isset($_SESSION['status']) && $_SESSION['unm']=="admin"))
	{
		header("location:check.php");
	}	
	
	include("connect.php");
	$q="select * from user order by id desc";
	$res=mysqli_query($con,$q);
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
            	<h2>user list</h2>
            </div>
            <div class="section_w500">
            	<font color="green" size="2">
                	<table border="0" width="100%">
                    	<tr align="center">
                        	<td width="30%" align="center"><b>No</b></td>
                            
                            <td width="30%" align="center"><b>user name</b></td>
                            
                            <td width="40%"><b>E-mail</b></td>
                            
                            <td width="20%" align="center"><b>city</b></td>
                        </tr>
                </font>
                <tr><td colspan="4"><hr style="border:1px dashed;color:#993300" /></td></tr>
                <?php
					$count=1;
					$cou=0;
					
					while($row=mysqli_fetch_assoc($res))
					{
						if($cou==0)
						{
							echo '
							<tr bgcolor="#f1f1f1" align="center">
								<td align="center"><font color="black" size="2">'.$count.'</td>
								<td align="center"><font color="black" size="2">'.$row['username'].'</td><td><small><a href="mailto : '.$row['email'].'</a></small></td>
								<td><font color="black" size="2">'.$row['email'].'</td>
								<td align="center"><font color="black" size="2">'.$row['city'].'</td>
							</tr>';
						}
						
						if($cou==1)
						{
							echo '
							<tr bgcolor="#d1d1d1" align="center">
								<td align="center"><font color="black" size="2">'.$count.'</td>
								<td align="center"><font color="black" size="2">'.$row['username'].'</td><td><small><a href="mailto : '.$row['email'].'</a></small></td>
								<td><font color="black" size="2">'.$row['email'].'</td>
								<td align="center"><font color="black" size="2">'.$row['city'].'</td>
							</tr>';
							$cou=-1;
						}
						$count++;
						$cou++;
					}
				?>
	                <tr><td colspan="4"><hr style="border:1px dashed;color:#993300" /></td></tr>
    	           
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
                
	</div>
<center><img src="../images/footer.jpg" /></center>
</body>
</html>









