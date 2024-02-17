<?php session_start();

	if(!isset($_SESSION['status']) && $_SESSION['unm']=="admin")
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
            	<h2>Show Mobile</h2>
            </div>
            <div class="section_w500">
            	<form action="" method="post" enctype="multipart/form-data">
                	<font color="green" size="2.5">
                    	<?php
							$id=$_POST['id'];
							
							include("connect.php");
						?>
                        <table border="2" width="100%">
                        <tr>
                        
                        <?php //echo $_GET['msg'];
                            $query="select model from product where id=$id";
                            $model=mysqli_query($con,$query);
                            $res=mysqli_fetch_array($model);
                            echo '<h3>'.$res[0].'</h3><br>';
                        ?>
                        
                        </tr>
                        
                        <th>Model id</th><th>Model name</th><th>Description</th><th>Display</th><th>Color</th><th>Price</th><th>Image</th><th>Edit</th><th>Delete</th>
                        
                        <?php
							$q="select * from product where id=$id";
							$r=mysqli_query($con,$q);
							$res=mysqli_num_rows($r);
							
							if($res>0)
							{
								$row1=mysqli_fetch_object($r);
								$model=$row1->model;
						?>	
							<tr>
                            	<td><?php echo $row1->id; ?></td>
                                <td><?php echo $row1->model; ?></td>
                                <td><?php echo $row1->description; ?></td>
                                <td><?php echo $row1->display; ?></td>
                                <td><?php echo $row1->color; ?></td>
                                <td><?php echo $row1->price; ?></td>
                                <td><img src="../images/<?php echo $row1->img; ?>" height="50" width="50" /></td>
                                <td><a href="update_mobile_detail.php?id=<?php echo $id; ?>" style="color:red;">Edit</a></td>
                                <td><a href="process_delete_mobile.php?id=<?php echo $id; ?>" style="color:red;">Delete</a></td>
                             </tr>
                             <?php
                            }
							?>
                        </table> 
                   </font>
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
