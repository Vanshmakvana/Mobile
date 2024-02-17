<?php
	if(empty($_GET))
	{
		exit;
	}
	include("connect.php");
	
	$q="select * from user where username='".$_GET['s']."'";
	$res=mysqli_query($con,$q) or die("3");
	$row=mysqli_fetch_assoc($res);
	if(!empty($row))
	{
		echo '<font color="red">Invalid</font>';
	}
	else
	{
		echo '<font color="green">valid</font>';
	}
	mysqli_close($con);
?>