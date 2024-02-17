<ul>
	<li><a href="index.php" class="current">Home</a></li>
    <li><a href="company.php">Company</a></li>
    <li><a href="cart.php">Cart</a></li>
    	<?php
			if(!isset($_SESSION['status']))
			{
				echo '<li><a href="register.php">Register</a></li>';
			}
		?>
		<li><a href="contactus.php" class="last">Contact Us</a></li>
        <?php
			if(isset($_SESSION['status']))
			{
				echo '<li><a href="logout.php">Log Out</a></li>';
			}
		?>
</ul>