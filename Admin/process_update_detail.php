<?php session_start();
$_SESSION['update']=array();

if($_POST['model']=="" && $_POST['desc']=="" && $_POST['disp']=="" && $_POST['color']=="" && $_POST['price']=="" && $_POST['img']=="")
{
	$id=$_POST['id'];
	$msg="Please enter all value";
	header("location:update_mobile_detail.php?id=$id&msg=$msg");
}
else
{
	$oldphoto=$_POST['oldphoto'];
	include("connect.php");
		if($_FILES['photo']['name'])
		{
			//$nfilename=$_FILES['photo']['name'];
			
			if(file_exists("../images/".$oldphoto))
			{
				unlink("../images/".$oldphoto);
			}
			$nfile=$_FILES['photo']['name'];
			$nfilename=$nfile;
			$file=$_FILES['photo']['tmp_name'];
			$path="../images/".$nfilename;
			copy($file,$path);
		}
		else
		{
			$nfilename=$oldphoto;
		}
		
		$q="update product set cid='".$_POST['cid']."',model='".$_POST['model']."',description='".$_POST['desc']."',display='".$_POST['disp']."',color='".$_POST['color']."',price=".$_POST['price'].",img='$nfilename' where id=".$_POST['id'];
		
		$r=mysqli_query($con,$q);
		if($r)
		{
			header("location:update_mobile.php");
		}
}
?>
	
		