<?php session_start();

	$_SESSION['contact']=array();
	
	if(empty($_POST['nm']))
	{
		$_SESSION['contact']['nm']="Please Enter Name";
	}
	
	if(empty($_POST['email']))
	{
		$_SESSION['contact']['email']="Please Enter E-mail";
	}
	
	if(empty($_POST['query']))
	{
		$_SESSION['contact']['query']="Please Enter your Query";
	}
	
	if(!preg_match("^[a-z0-9_]+[a-z0-9_.]*@[a-z0-9_-]+[a-z0-9.-]*\.[a-z]{2,5}$^",$_POST['email']))
	{
		$_SESSION['contact']['regex']="Please Enter Right E-mail";
	}
	
	if(!empty($_SESSION['contact']))
	{
		header("location:contactus.php");
	}
	else
	{
		include("connect.php");
		$q="insert into contact (c_name,c_email,c_query) values('".$_POST['nm']."','".$_POST['email']."','".$_POST['query']."')";
		mysqli_query($con,$q);
		$_SESSION['contact']['ok']="Your Query Sent to Admin";
		header("location:contactus.php");
	}
?>