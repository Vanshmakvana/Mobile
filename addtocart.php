<?php
	session_start();
	
	if(isset($_GET['company']) && isset($_GET['model']) && isset($_GET['price']))
	{
		$_SESSION['cart'][]=array("cid"=>$_GET['company'],"model"=>$_GET['model'],"price"=>$_GET['price'],"qty"=>1);
		//echo $_SESSION[['cart'];
		header("location:cart.php?company=".$_GET['company']);
	}
	else if(isset($_GET['id']))
	{
		unset($_SESSION['cart'][$_GET['id']]);
		//echo $_GET['id'];
		header("location:cart.php");
	}
	else if(isset($_POST['id']))
	{
		$id_array=$_POST['id'];
		foreach($id_array as $i=>$k)
		{
			$_SESSION['cart'][$i]['qty']=$k;
		}
		header("location:cart.php");
	}
?>
	
		