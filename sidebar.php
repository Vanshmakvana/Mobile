<?php
	if(isset($_SESSION['status']))
	{
		echo '<h2>Welcome</h2><ul class="category_list">';
		
		echo '<font color="green" size="3">'.$_SESSION['fnm'].'</font>';
	}
	else
	{
		echo '
		<h2>Log in</h2>
			<ul class="category_list">';
		$page=basename($_SERVER['SCRIPT_NAME']);
		
		echo '
		<form action="process_login.php" method="post">User Name : <input type="text" name="unm">';
		
		if(isset($_SESSION['login']['unm']))
		{
			echo '<br><font color="red">'.$_SESSION['login']['unm'].'</font>';
		}
		else if(isset($_SESSION['login']['use']))
		{
			echo '<br><font color="red">'.$_SESSION['login']['use'].'</font>';
		}
		echo '<br><br> Password : <input type="password" name="pwd">';
		
		if(isset($_SESSION['login']['pwd']))
		{
			echo '<br><font color="red">'.$_SESSION['login']['pwd'].'</font>';
		}
		else if(isset($_SESSION['login']['wpwd']))
		{
			echo '<br><font color="red">'.$_SESSION['login']['wpwd'].'</font>';
		}
		
		echo '<br><br>
		
		<input type="hidden" name="page" value="'.$page.'">
		<input type="submit" value="Login"><br><br>
		<hr color="green" style="border:2px dotted"><br>
	    <center><a href="register.php" style="color:red;text-decoration:underline;">New User/Registration</a></center>
	    <center><a href="Admin/index.php" style="color:red;text-decoration:underline;">Admin Login!!</a></center>
		</form>';
	}
?>

</ul><br>
<hr color="green" style="border:2px dotted">
<h2>categories</h2>
<ul class="category_list">
	<?php
		include("connect.php");
		$q="select * from company";
		$res=mysqli_query($con,$q);
		while($row=mysqli_fetch_assoc($res))
		{
			echo '<li><a href="productlist.php?company='.$row['id'].'">'.$row['company'].'</a></li>';
		}
	?>
</ul>
