<?php
	include("connect.php");
	$q="delete from contact where c_id=".$_GET['id'];
	mysqli_query($con,$q);
	header("location:contact.php");
?>