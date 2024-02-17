<?php //session_start();

	
	/*if($_POST['unm']=="")
	{
		$_SESSION['admin']['unm']="please enter user name<br>";
	}
	
	if($_POST['pwd']=="")
	{
		$_SESSION['admin']['pwd']="please enter password<br>";
	}*/
	
	
	/*if(!empty($_SESSION['admin']))
	{
		header("location:index.php");
	}
	else
	{
		include("connect.php");
		$q="select * from admin where admin_nm='".$_POST['unm']."'";
		
		$res=mysql_query($q);
		$row=mysql_fetch_assoc($res);
		if($_POST['unm']="admin" && $_POST['pwd']=="123456");
		{
			if(!empty($row))
			{
				if($_POST['pwd']==$row['password'])
				{
					$_SESSION=array();
					$_SESSION['unm']=$row['username'];
					$_SESSION['uid']=$row['id'];
					$_SESSION['status']=true;
					header("location:index.php");
				}
			
				else
				{
					$_SESSION['admin']['wpwd']="wrong password";
					header("location:index.php");
				}
			}
			else
			{
				$_SESSION['admin']['nuser']="no such user";
				header("location:index.php");
			}
		}
	}*/
	/*$unm="admin";
	$pwd="123456";
	if(isset($_POST['ok']))
	{
		if($_POST['unm']!="" && $_POST['pwd']!="")
		{
			if($_POST['unm']==$unm && $_POST['pwd']==$pwd)
			{
				header("location:index.php");
				echo "hello";
			}
			else
			{
				echo "invalid username or password";
			}
		}
		else
		{
			echo "please enter user name and password";
		}
	}*/
	$unm="admin";
	if(isset($_POST['ok']))
	{
		if($_POST['unm']!="" && $_POST['pwd']!="")
		{
			if($_POST['unm']=="admin" && $_POST['pwd']=="123456789")
			{
				session_start();
				$_SESSION['unm']=$unm;
				$_SESSION['status']=true;
				header("location:show_mobile.php");
			}
			else
			{
				$msg="please login correct";
				header("location:index.php?msg=$msg");
			}
		}
		else
		{
			$msg="please enter username or password";
			header("location:index.php?msg=$msg");
		}
	}
	
	/*$user=$_POST['unm'];
	$pass=$_POST['pwd'];
	if($user=="admin" && $pass=="123456")
	{
		session_start();
		$uname=$_POST['unm'];
		$_SESSION['unm']=$uname;
		header("location:index.php");
		echo "hello";
	}*/
	
?>