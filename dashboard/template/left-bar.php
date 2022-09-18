<aside id="sidebar-left" class="sidebar-left">

	<div class="nano">
		<div class="nano-content">
			<nav id="menu" class="nav-main" role="navigation">
				<ul class="nav nav-main">
					<li class="nav-active">
						<a href="index.php">
							<i class="fa fa-home" aria-hidden="true"></i>
							<span>Dashboard</span>
						</a>
					</li>
					<?php if((isset($_SESSION['isLoggedIn']) && $_SESSION['role'] == 1)){ ?>
						<li class="nav-active">
						<a href="table-add.php">
							<span style="margin-left: 30px;">Add Tables</span>
						</a>
					</li>
					<?php } ?>

					<?php if((isset($_SESSION['isLoggedIn']) && $_SESSION['role'] == 1)){ ?>
					<li class="nav-active">
						<a href="index.php">
							<span style="margin-left: 30px;">Bookings</span>
						</a>
					</li>
					<?php } ?> 
				</ul>
			</nav>

		</div>

	</div>

</aside>