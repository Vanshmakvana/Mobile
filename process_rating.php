<?php
	session_start();
	include("connect.php");
	
	$rate=$_POST['rate'];
	$pid=$_POST['pid'];
	$uid=$_SESSION['uid'];
	
	$q="update product set rate=(rate+$rate)/2 where id=".$pid;
	
	mysqli_query($con,$q) or die($q);

	$r="insert into rate(r_is_id,r_for_id) values($uid,$pid)";
	
	mysqli_query($con,$r) or die ($r);
	
	header("location:productdetail.php?id=".$pid);
?>