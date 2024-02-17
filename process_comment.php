<?php
	session_start();
	$id=$_POST['prodid'];
	$_SESSION['comment']=array();
	if(empty($_POST['comment']))
	{
		$_SESSION['comment']['com']="please write comment";
		header("location:productdetail.php?id=".$id);
	}
	else
	{
		include("connect.php");
		$dt=date("d/m/y");
		$unm=$_SESSION['unm'];
		$desc=$_POST['comment'];
	
		$q="insert into comment (com_date, com_desc, com_unm, com_pid) values ('$dt', '$desc', '$unm', $id)";
	
		mysqli_query($con,$q) or die ($q);
	
		$_SESSION['comment']['ok']="you comment post";
		header("location:productdetail.php?id=".$id);
	}
?>