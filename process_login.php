<?php session_start();
	if(empty($_POST))
	{
		header("location:index.php");
	}
	else
	{
		header("location:index.php");
	}
	
	$_SESSION['login']=array();
	
	if(empty($_POST['unm']))
	{
		$_SESSION['login']['unm']="Please Enter User Name";
	}
	if(empty($_POST['pwd']))
	{
		$_SESSION['login']['pwd']="Please Enter Password";
	}
	if(!empty($_SESSION['login']))
	{
		header("location:".$_POST['page']);
	}
	else
	{
		include("connect.php");
		$unm=$_POST['unm'];
		$q="select * from user where username='$unm'";
		$res=mysqli_query($con,$q) or die ("wrong query");
		$row=mysqli_fetch_assoc($res);
		if(!empty($row))
		{
			if($_POST['pwd']==$row['password'])
			{
				$_SESSION=array();
				$_SESSION['unm']=$row['username'];
				$_SESSION['fnm']=$row['fullname'];
				$_SESSION['uid']=$row['id'];
				$_SESSION['status']=1;
				
				$v="update visit set v_count=(v_count+1)";
				mysqli_query($con,$v) or die ("wrong query update");
				header("location:index.php");
			}
			else
			{
				$_SESSION['login']['wpwd']="wrong password";
				header("location:".$_POST['page']);
			}
		}
		else
		{
			$_SESSION['login']['use']="No such user";
			header("location:".$_POST['page']);
		}
	}
?>