<?php session_start();

if(!(isset($_SESSION['status']) && $_SESSION['unm']=="admin"))
{
	header("location:check.php");
}

if($_REQUEST['id']=="")
{
	header("location:update_mobile.php");
}

$id=$_REQUEST['id'];
include("connect.php");
$q="select * from product where id='".$_REQUEST['id']."'";
$res=mysqli_query($con,$q) or die ($q);
$row1=mysqli_fetch_assoc($res);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<title>Mobile Shop</title>
<meta name="keywords" content=""/>
<meta name="description" content=""/>

<link href="../style/style.css" rel="stylesheet" type="text/css"/>
<script language="javascript" type="text/javascript">

function Clear()
{
	document.write("hello");
}

//<script language="javascript" type="text/javascript">
function ClearText(field)
{
	if(field.defaultValue==field.value)field.value='';
	else if(field.value=='')field.value=field.defaultValue;
}

</script>
</head>
<body>
<div id="templatemo_site_title_bar_wrapper">
	<div id="templatemo_site_title_bar">
    
    <div id="site_title">
    	<img src="../images/logo.png"/>
    <marquee width="100%" height="100%">
		<img src="../images/logo1.png"/>
		<img src="../images/logo2.png"/>
    </marquee>
</div>

<div id="templatemo_menu_wrapper">
	<div id="templatemo_menu">
    <?php
		//include("menu.php");
	?>
    </div>
   </div>
   
<div id="templatemo_content_outer_wrapper">
<div id="templatemo_content_inner_wrapper">

	<div id="templatemo_content_wrapper">
    <div id="templatemo_content">
    
    <div id="sidebar">
    <?php
		include("sidebar.php");
	?>
    <div id="cleaner"></div>
</div>
<div id="content_column">
<div class="section_w500">
	<h2>Update Mobile</h2>
   </div>
<div class="section_w500">
	<form name="f1" action="process_update_detail.php" method="post" enctype="multipart/form-data">
    <font color="green" size="2">
    <?php
		if(isset($_SESSION['update']['ok']))
		{
			echo '<font color="blue" size="3">'.$_SESSION['update']['ok'].'</font>';
		 }
	?>
    
    <table border="0" width="100%">
    <tr>
    	<td>
        	<?php //echo $_GET['msg'];?>
        </td>
    </tr>
    <tr>
    	<td><b>Company ID:</b></td>
        <td><select name="cid" style="width:146px">
        <?php
			include("connect.php");
			$q="select * from company";
			$res=mysqli_query($con,$q);
			
			while($row=mysqli_fetch_assoc($res))
			{
					echo '<option value='.$row['id'].'>'.$row['company'];
			}
		?>
        </select>
        </td>
     </tr>
     
     <tr><td>&nbsp;</td>
     <?php
	 	if(isset($_SESSION['update']['cid']))
		{
			echo '<td><font color="red">'.$_SESSION['update']['cid'].'</font><br>&nbsp;';
		}
	?>
    </tr>
    <tr>
    	<td><b>Model name</b></td>
        <td><input type="text" name="model" value="<?php echo $row1['model'];?>"/></td>
    </tr>
 
 	<tr><td>&nbsp;</td>
    <?php
		if(isset($_SESSION['update']['model']))
		{
			echo '<td><font color="red">'.$_SESSION['update']['model'].'</font><br>&nbsp;';
		}
	?>
    </tr>
    
    <tr>
    	<td><b>Description</b></td>
        <td><textarea name="desc" cols="17" rows="5" ><?php echo $row1['description']; ?></textarea></td>
    </tr>
 
 	<tr><td>&nbsp;</td>
    <?php
		if(isset($_SESSION['update']['desc']))
		{
			echo '<td><font color="red">'.$_SESSION['update']['desc'].'</font><br>&nbsp;';
		}
	?>
    </tr>
    
    <tr>
    	<td><b>Display</b></td>
        <td><input type="text" name="disp" value="<?php echo $row1['display'];?>"/></td>
    </tr>
 
 	<tr><td>&nbsp;</td>
    <?php
		if(isset($_SESSION['update']['disp']))
		{
			echo '<td><font color="red">'.$_SESSION['update']['disp'].'</font><br>&nbsp;';
		}
	?>
    </tr>
    
    <tr>
    	<td><b>Color</b></td>
        <td><input type="text" name="color" value="<?php echo $row1['color'];?>"/></td>
    </tr>
    
    <tr><td>&nbsp;</td>
    <?php
		if(isset($_SESSION['update']['color']))
		{
			echo '<td><font color="red">'.$_SESSION['update']['color'].'</font><br>&nbsp;';
		}
	?>
   	</tr>
    
    <tr>
    	<td><b>Price</b></td>
        <td><input type="text" name="price" value="<?php echo $row1['price'];?>"/></td>
        
    </tr>
    
    
    <tr><td>&nbsp;</td>
    <?php
		if(isset($_SESSION['update']['price']))
		{
			echo '<td><font color="red">'.$_SESSION['update']['price'].'</font><br.&nbsp;';
		}
	?>
</tr>

<tr>
	<td><b>Image</b></td>
    <td><input type="file"  name="photo"/>
    	<input type="hidden" name="oldphoto" value="<?php echo $row1['img']; ?>"/>
        <img src="../images/<?php echo $row1['img'];?>" height="100px" width="100"/></td>
    </tr>
    
    <tr><td>&nbsp;</td>
    </tr>
    <input type="hidden" name="id" value="<?php echo $row1['id'];?>"/>
    <tr>
    	<td align="center" colspan="2">
        <input type="submit" name="update" value="update"/>
        	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="reset" name="reset" value="reset"/>
        <input type="button" name="clear" value="cancel" onClick="location:href='update_mobile.php';"/>
        </td>
    </tr>
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
   
    	
			
