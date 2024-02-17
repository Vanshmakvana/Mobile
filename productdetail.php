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
					$q="select * from product where id=".$_GET['id'];
					$res=mysqli_query($con,$q);
					$row=mysqli_fetch_assoc($res);
					$f="select * from rate where r_is_id=".$_SESSION['uid']." and r_for_id=".$_GET['id'];
					$fres=mysqli_query($con,$f) or die($f);
					$frow=mysqli_fetch_assoc($fres);
					
					$query="select company from company where id='".$_GET['id']."'";
					$res1=mysqli_query($con,$query);
					$row1=mysqli_fetch_assoc($res1);
				?>
	<h2><?php echo $row1['company']." ".$row['model'];?></h2>
</div>
<div class="section_w500">
<table border="0" width="100%">
<tr>
	<td align="center" width="43%" valign="top"><img src="images/<?php echo $row['img']; ?>" width="190" height="300" /><br /><br />
    	<?php
			if(isset($_SESSION['cart']))
			{
			    $flag=false;
				foreach($_SESSION['cart'] as $id=>$val)
				{
					$flag=($val['model']==$row['model'])?true:false;
				}
				
				if($flag)
				{
					echo '<font color="red">You bought this mobile</font>';
				}
				else
				{
					echo '<a href="addtocart.php?company='.$row['cid'].'&model='.$row['model'].'&price='.$row['price'].'"><img src="images/addtocart.gif"></a>';
				}
			}
			else
			{
				echo '<a href="addtocart.php?company='.$row['cid'].'&model='.$row['model'].'&price='.$row['price'].'"><img src="images/addtocart.gif"></a>';
			}
		?>
		<br />
        <br />
        <?php
			if(empty($frow))
			{
				echo '<form action="process_rating.php" method="post">
				<font size="2"><b>Rating : </b>
				<select name="rate">
					<option value="1">1
					<option value="2">2
					<option value="3">3
					<option value="4">4
					<option value="5">5
				</select>
				<input type="hidden" value="'.$row['id'].'" name="pid">
				<input type="submit" value="ok"></form>';
			}
			else
			{
				echo '<font color="blue">You are already voted</font>';
			}
		?>
		<td width="10%" valign="top"><img src="images/line.jpg" height="320"  /></td>
        <td valign="top"><font size="2">
        	<font size="2.5" color="green"><li><u><b>Model :</b></u></li></font>
            <?php echo $row['model']; ?><br />
        <hr style="border:1px dotted #c1c1c1" align="left" width="70%" />
        <font size="2.5" color="green"><li><u><b>Discription :</b></u></li></font>
        
	<?php echo $row['description']; ?>
	
    <hr style="border:1px dotted #c1c1c1" align="left" width="70%" />
    <font size="2.5" color="green"><li><u><b>Display :</u></b></li></font><?php echo $row['display']; ?><br />
    <hr style="border:1px dotted #c1c1c1" align="left" width="70%" />
    <font size="2.5" color="green"><li><u><b>Color :</u></b></li></font><?php echo $row['color']; ?><br />
    <hr style="border:1px dotted #c1c1c1" align="left" width="70%" />
    <font size="2.5" color="green"><li><u><b>Price :</u></b></li></font><?php echo $row['price']; ?><br />
    <hr style="border:1px dotted #c1c1c1" align="left" width="70%" />
    <font size="2.5" color="green"><li><u><b>Rating :</u></b></li></font><?php echo $row['rate']; ?><br />
    
    <?php
		for($i=1;$i<=$row['rate'];$i++)
		{
			echo '<img src="images/star.png">';
		}
	?>
	<br>
	</font>
</td>
</tr>
</table>
<hr style="border:1px dotted #c1c1c1" />
<h3><img src="images/commenticon.png" height="40" />Comment</h3>
<form action="process_comment.php" method="post">
<textarea cols="60" name="comment"></textarea><br />
<input type="hidden" name="prodid" value="<?php echo $_GET['id']; ?>" />
<input type="submit" value="submit" />
	<?php
		if(isset($_SESSION['comment']['com']))
		{
			echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="red">'.$_SESSION['comment']['com'].'</font>';
		}
		if(isset($_SESSION['comment']['ok']))
		{
			//echo '&nbsp;&nbsp;&nbsp;&nbsp;<font color="blue">'.$_SESSION['comment']['ok'].'</font>';
		}
	?>
</form>
<hr style="border:1px dotted #c1c1c1" />
<table border="0" width="100%">
<?php
	include("connect.php");
	$comq="select * from comment where com_pid=".$_GET['id']." order by com_id desc";
	$comres=mysqli_query($con,$comq) or die($comq);
	$count=0;
	while($comrow=mysqli_fetch_assoc($comres))
	{
		if($count==5)
		{
			break;
		}
		echo '<tr bgcolor="#f1f1f1"><td><font color="blue">Date:'.$comrow['com_date'].'</font><br><br>
			<table border="0" width="100%">
				<tr> 
					<td align="center" width="12%"><img src="images/comment.png" height="40"></td>
					<td valign="top">'.$comrow['com_desc'].'</td>
				</tr>
			</table>
			<label style="border:1px solid #993300; padding: 2px 2px 2px 2px">'.$comrow['com_unm'];
			echo '<br></td></tr>';
			echo '<tr><td><hr style="border:1px dotted #c1c1c1"></td></tr>';
			$count++;
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