<?php
	session_start();
	include("connect.php");
	$q="select * from product order by id desc";
	$res2=mysqli_query($con,$q);
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
	if(field.defaultValue == field.value) field.value = '';
	else if(field.value == '') field.value=field.defaultValue;
}
</script>
</head>

<body>
	<div id="templatemo_site_title_bar_wrapper">
        <div id="templatemo_site_title_bar">
    	    <div id="site_title">
    	        <center><img src="images/logo.png" /></center>
                <marquee width=100% height=100%>
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
                        	<h2>Welcome to mobile shop</h2>
                            </div>
                            <div class="section_w500">
                        	<ul class="services">
                             	<li>In mobile Shop, you can purchase, watch mobiles & mobile details.</li>
                            </ul>
                            </div>
                                 <div class="">
                                     <h2>Latest products!</h2>
                                </div>
         <div class="section_w500">
        	<table border="0" width="100%">
            <?php
				$count=0;
				$cou=0;
				while($row=mysqli_fetch_array($res2))
				{
					if($cou==8)
					{
						break;
					}
					if($count==0)
					{
						echo '<tr>';
					}
					echo '<td width="25%" align="center"><a href="productdetail.php?id='.$row['id'].'"><img src="images/'.$row['img'].'" height="100" width="67"/><br><font size="3" color="green"><br>'.$row['model'].'</font></a></td>' ;
					
					$count++;
					$cou++;
					
					if($count==4)
					{
						echo '</tr>';
						echo '<tr><td colspan="4"><br></td></tr>';
						$count=0;
					
					}
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
            
            <center><img src="images/footer.jpg" /></center>
        </div>
    </div>
</body>
</html>
