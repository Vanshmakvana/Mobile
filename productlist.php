<?php session_start();
	if(!isset($_SESSION['status']))
	{
		header("location:check.php");
	}
	include("connect.php");
	
	$q="select count(*) as total from product where cid='".$_GET['company']."'";
	
	
	$res2=mysqli_query($con,$q);
	$row2=mysqli_fetch_assoc($res2);
	
	$paging_items_per_page=8;
	$paging_total_records=$row2['total'];
	$paging_total_pages = ceil($paging_total_records/$paging_items_per_page);
	$paging_current_page=(empty($_GET['page']))?1:$_GET['page'];
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
				<h2><?php //echo $_GET['company'];?></h2><br />
                <hr style="border:1px dotted; color:gray" />
                	<table border="0" width="100%">
                    <?php
                        include("connect.php");
						$k=($paging_current_page-1)*$paging_items_per_page;
						$q="select * from product where cid='".$_GET['company']."' LIMIT $k,$paging_items_per_page";
						$res2=mysqli_query($con,$q);
						$count=0;
						
						while($row=mysqli_fetch_array($res2))
						{
							if($count==0)
							{
								echo '<tr>';
							}
					?>
                    		<td width="25%" align="center"><a href="productdetail.php?id=<?php echo $row['id']; ?>"><img src="images/<?php echo $row['img']; ?>" height="100" width="67" /><br /><font size="3" color="green"><?php echo $row['model']; ?></font></a></td>
                           <?php
                    		$count++;
                            if($count==4)
                            {
                            	echo '</tr>';
                                echo '<tr><td colspan="4"><br /></td></tr>';
                            }
                        }
                    ?>
					</table>
                    <br /><br /><br />
                    <center>
                    <?php
						if($paging_current_page > 1)
						{
							echo '<a href="productlist.php?company='.$_GET['company'].'&page='.($paging_current_page - 1).'"><img src="images/previous.png"></a>';
						}
						
						if($paging_current_page < $paging_total_pages)
						{
							echo '<a href="productlist.php?company='.$_GET['company'].'&page='.($paging_current_page + 1).'"><img src="images/next.png"></a>';
						}	
					?>
                   </center>
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
							
                    
								