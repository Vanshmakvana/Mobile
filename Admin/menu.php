<ul>
	
    
    <?php
	if(isset($_SESSION['status']) && $_SESSION['unm']=="admin")
	{
		echo '<li><a href="company.php">company</a></li>
			
				<li><a href="addmobile.php">Add Mobile</a></li>
				
				<li><a href="contact.php">Contact</a></li>
				
				<li><a href="logout.php">Logout</a></li>';
	}
	?>
</ul>