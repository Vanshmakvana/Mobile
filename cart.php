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
            	<h2>cart</h2>
            </div>
            <div class="section_w500">
            	<font size="2.5" color="blue">
                	<table border="1" width="100%" bgcolor="#cccfff">
                    <tr>
                    	<td>
                        <form action="addtocart.php" method="post">
                        	<table border="0" width="100%">
                            <tr>
                            	<td align="center"><b>No.</b></td>
                                <td align="center"><b>Company</b></td>
                                <td align="center"><b>Model</b></td>
                                <td align="center"><b>Qty</b></td>
                                
                                <td align="center"><b>Price</b></td>
                                <td align="center"><b>Delete</b></td>
                            </tr>
                            <tr>
                            	<td colspan="7"><hr></td>
                            </tr>
                            <?php
                                $total=0;
								if(!empty($_SESSION['cart']))
								{
									$count=1;
									//$total=0;
									foreach($_SESSION['cart'] as $id => $val)
									{
									    include("connect.php");
										$q="select company from company where id='".$val['cid']."'";
										$r=mysqli_query($con,$q);
										if($r)
										{
											if($data=mysqli_fetch_object($r))
											{
												$cname=$data->company;
											}
										}
										$pri=$val['qty']*$val['price'];
										$model=$val['model'];
										$qty=$val['qty'];
										$p=$val['price'];
										echo '
										<tr>
											<td align="center">'.$count.'</td>
											<td align="center">'.$cname.'</td>
											<td align="center">'.$val['model'].'</td>
											<td align="center"><input type="text" name="id['.$id.']" value="'.$val['qty'].'" size="1"></td>
											
											<td align="center">'.$pri.'</td>
											<td align="center" width="10%"><a href="addtocart.php?id='.$id.'"><img src="images/del.png" height="20"></a></td>
										</tr> ';
										$count++;
										$total=$total+$pri;
									}
								}
								//include("connect.php");
								//$q1="insert into cart(company,model,quantity,price,tot_price)values('$cname',$model,$qty,$p,$pri)";
								//$query=mysqli_query($con,$q1);
							?>
                            <tr>
                            	<td colspan="7"><hr></td>
                            <tr>
                            	<td></td>
                            </tr>
                            </tr>
                            <tr>
                            	<td colspan="4" align="right">&nbsp;</td>
                                <td align="center"><font color="red"><b>Total : </b></font></td>
                                <td align="center"><font color="red"><b><?php echo $total; ?></b></font></td>
                            </tr>
                            <tr>
                            	<td><input type="submit" name="submit" value="update cart" onclick="location.href='addtocart.php;'" /></td>
                                <td align="center" width="10%"><a href="process_cart.php?id='.$id.'">pay to cart</a></td>
                            </tr>
                            </table>
                       </td>
                       </tr>
                       </table>
                       <br><br>
                   </form>
                </font>
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
