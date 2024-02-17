<?php
	session_start();
	
	include("connect.php");
	
	$photo=mysqli_query($con,"select img from product where id=".$_GET['id']);
	
	$pic=mysqli_fetch_array($photo);
	
	unlink("../images/".$pic[0]);
	
	$q="delete from product where id=".$_GET['id'];
	
	mysqli_query($con,$q);
	
	$_SESSION['delete']['ok']="product are deleted";
	
	header("location:show_mobile.php");
?>