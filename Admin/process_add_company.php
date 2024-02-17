<?php
	$smg="";
	if(empty($_POST['cnm']))
	{
		header("location:company.php?error=Please enter the company");
	}
	else
	{
		include("connect.php");
		$q="insert into company(company) values('".$_POST['cnm']."')";
		mysqli_query($con,$q);
		header("location:company.php?ok=company inserted");
	}
?>
