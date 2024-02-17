<?php
	session_start();
	
	$_SESSION['error']=array();
	
	if(empty($_POST['id']))
	{
		if($_POST['id'] == 0)
		$_SESSION['error']['id']="please select company";
	}
	
	if(empty($_POST['model']))
	{
		$_SESSION['error']['model']="please enter model";
	}
	
	if(empty($_POST['desc']))
	{
		$_SESSION['error']['desc']="please enter description";
	}
	
	if(empty($_POST['disp']))
	{
		$_SESSION['error']['disp']="please enter display";
	}
	
	if(empty($_POST['color']))
	{
		$_SESSION['error']['color']="please enter color";
	}
	
	if(empty($_POST['price']))
	{
		$_SESSION['error']['price']="please enter price";
	}
	
	if(empty($_FILES['file1']['name']))
	{
		$_SESSION['error']['name']="file not upload";
	}
	
	if(!($_FILES['file1']['type']=='image/jpeg'
		 ||$_FILES['file1']['type']=='image/jpg'
		 ||$_FILES['file1']['type']=='image/png'
		 ||$_FILES['file1']['type']=='image/x-png'
		 ||$_FILES['file1']['type']=='image/pipg'))
	{
		$_SESSION['error']['type']="wrong file type";
	}
	
	if(file_exists("../images/".$_FILES['file1']['name']))
	{
		$_SESSION['error']['exists']="file already exists";
	}
	
	if(!empty($_SESSION['error']))
	{
		header("location:addmobile.php");
	}
	else
	{
		include("connect.php");
		
		move_uploaded_file($_FILES['file1']['tmp_name'],"../images/".$_FILES['file1']['name']);
		
		$t=$_FILES['file1']['name'];
		
		$q="insert into product(cid,model,description,display,color,price,img) values('".$_POST['id']."','".$_POST['model']."','".$_POST['desc']."','".$_POST['disp']."','".$_POST['color']."','".$_POST['price']."','".$t."')";
	
		$r=mysqli_query($con,$q);
		
		//if($r)
		//{
			$msg="successfully detail inserted";
			
			$_SESSION['error']['ok']="successfully inserted";
			
			header("location:addmobile.php?msg=$msg");
		//}
	}
?>