<!-- nav-bar.php -->
<nav class="navbar navbar-expand-md navbar-dark" style="position: relative; background:#27272b;">
	<div class="container">
		<a class="navbar-brand" href="index.php" style="color:white"> Multi Restaurant Table Booking</a>


		<ul class="navbar-nav ml-auto">
			<li class="nav-item"><a href="index.php" class="nav-link" style="color:white">Home</a></li>
			<li class="nav-item"><a href="list.php" class="nav-link" style="color:white">List</a></li>
			<?php if (!isset($_SESSION['isLoggedIn'])) { ?>
				<li class="nav-item"><a href="register.php" class="nav-link" style="color:white">Register</a></li>
				<li class="nav-item"><a href="login.php" class="nav-link" style="color:white">Login</a></li>
			<?php } elseif (isset($_SESSION['isLoggedIn'])) { ?>
				<li class="nav-item"><a href="logout.php" class="nav-link" style="color:white"><?php echo $_SESSION['name']; ?>(Logout)</a></li>
			<?php } ?>
		</ul>

	</div>
</nav>