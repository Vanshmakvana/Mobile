<?php session_start();

	$_SESSION['register']=array();
	
	if(empty($_POST['fnm']))
	{
		$_SESSION['register']['fnm']="Please Enter Full Name";
	}
	
	if(empty($_POST['nm']))
	{
		$_SESSION['register']['nm']="Please Enter User Name";
	}
	
	if(empty($_POST['pwd']))
	{
		$_SESSION['register']['pwd']="Please Enter Password";
	}
	
	if(empty($_POST['cpwd']))
	{
		$_SESSION['register']['cpwd']="Please Enter Confirm Password";
	}
	
	if(empty($_POST['email']))
	{
		$_SESSION['register']['email']="Please Enter E-Mail";
	}
	
	if(empty($_POST['city']))
	{
		$_SESSION['register']['city']="Please Enter Your City";
	}
	
	if($_POST['pwd'] != $_POST['cpwd'])
	{
		$_SESSION['register']['pwdmatch']="Password Don't Match";
	}
	
	if(strlen($_POST['pwd'])<6)
	{
		$_SESSION['register']['length']="Enter Minimum 6 Character Password";
	}
	
	if(!preg_match("^[a-z0-9_]+[a-z0-9_.]*@[a-z0-9_-]+[a-z0-9_.-]*\.[a-z]{2,5}$^",$_POST['email']))
	{
		$_SESSION['register']['regex']="Please Enter Rigth Email";
	}
	
	include("connect.php");
	
	$q1="select * from user where username='".$_POST['nm']."'";
	
	$res1=mysqli_query($con,$q1) or die($q1);
	$row=mysqli_fetch_assoc($res1);
	
	if(!empty($row))
	{
		$_SESSION['register']['user']="User Already Exists";
	}
	
	if(empty($_POST['ans']))
	{
		$_SESSION['register']['ans']="Please Enter The Answer";
	}
	
	if(!empty($_SESSION['register']))
	{
		header("location:register.php");
	}
	else
	{
		$q="insert into user(fullname,username,password,email,city,secque,answer) values('".$_POST['fnm']."','".$_POST['nm']."','".$_POST['pwd']."','".$_POST['email']."','".$_POST['city']."','".$_POST['sque']."','".$_POST['ans']."')";
		mysqli_query($con,$q);
		header("location:register.php?ok=successfully Register");
	}
?>
