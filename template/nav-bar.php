<!-- nav-bar.php -->
<nav class="navbar navbar-expand-md navbar-dark" style="position: relative; background:transparant;">
	<div class="container">
		<a class="navbar-brand" href="index.php"> Multi Restaurant Table Booking</a>


		<ul class="navbar-nav ml-auto">
			<li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
			<li class="nav-item"><a href="list.php" class="nav-link">List</a></li>
			<?php if (!isset($_SESSION['isLoggedIn'])) { ?>
				<li class="nav-item"><a href="register.php" class="nav-link">Register</a></li>
				<li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
			<?php } elseif (isset($_SESSION['isLoggedIn'])) { ?>
				<li class="nav-item"><a href="logout.php" class="nav-link"><?php echo $_SESSION['name']; ?>(Logout)</a></li>
			<?php } ?>
		</ul>

	</div>
</nav>