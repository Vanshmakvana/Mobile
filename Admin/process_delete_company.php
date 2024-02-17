<?php
	$msg="";
	if(empty($_POST['cnm']))
	{
		header("location:company.php?del=please select company");
	}
	else
	{
		include("connect.php");
		
		$images=mysqli_query($con,"select img from product where cid=(select id from company where company='".$_POST['cnm']."')");
		while($image=mysqli_fetch_array($images))
		{
			@unlink("../images/".$image[0]);
		}
		
		$q1="delete from product where cid=(select id from company where company='".$_POST['cnm']."')";
		mysqli_query($con,$q1);
		
		$q="delete from company where company='".$_POST['cnm']."'";
		mysqli_query($con,$q);
		
		
		header("location:company.php?delok=company deleted");
	}
?>