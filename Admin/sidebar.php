<ul class="category_list">
	<?php
		/*if(!(isset($_SESSION['status']) && $_SESSION['unm']=="admin"))
		{
			echo '<li><a href="index.php">Log in</a>';
		}
		*/
		
		if(isset($_SESSION['status']) && $_SESSION['unm']=="admin")
		{
			echo '<li><a href="show_mobile.php">Show Mobile</a></li>
			<li><a href="userlist.php">User List</a></li>
			<li><a href="company.php">Company</a></li>
			<li><a href="addmobile.php">Add Mobile</a></li>
			<li><a href="contact.php">Contact</a></li>
			<li><a href="logout.php">Log Out</a></li>';
		}
		else
		{
			echo '<li><a href="../index.php">User Log in</a></li>';
		}
	?>
<!--<li><a href="../index.php">Web Site</a>; -->

	<br><br><br><br><br><br><br><br>
</ul>
		
		