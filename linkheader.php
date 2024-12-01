<?php
require_once 'connection.php';

?>

<!-- Header Start -->
	<header class="main-header">
		<div class="header-sticky">
			<nav class="navbar navbar-expand-lg">
				<div class="container">
					<!-- Logo Start -->
					<div class="header-logo">
						<a class="navbar-brand" href="index.php">
                        <img style=" width:70px; height : 80px;" src="images/new_care.png"  class="logo" alt="">
						
						</a>
					</div>
					<!-- Logo End -->

					<!-- Main Menu Start -->
					<div class="collapse navbar-collapse main-menu">
                        <div class="nav-menu-wrapper">
                            <ul class="navbar-nav mr-auto" id="menu">
                                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                                <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                                <li class="nav-item"><a class="nav-link" href="blog.php">blogs</a></li>
                                <li class="nav-item"><a class="nav-link" href="filter_doctors.php">Doctors</a></li>
                                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                                <!-- <li class="nav-item submenu"><a class="nav-link" href="#">City</a> -->
                               <ul>
    <?php
    // Database connection (assuming $con is already set up)
    $query = "SELECT city_id, city_name FROM city";
    $result = $con->query($query);

    // Loop through the cities and display them as dropdown links
    while ($row = $result->fetch_assoc()) {
		echo "<li class='nav-item'><a class='nav-link' href='show_by_city.php?city_id=" . $row['city_id'] . "'>" . $row['city_name'] . "</a></li>";
    }
    ?>
</ul>

                            </li>


                                <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>

								











                                <li class="nav-item submenu"><a class="nav-link" href="#">SignUp</a>
                                    <ul>                                        
                                        <li class="nav-item"><a class="nav-link" href="signup_doctor.php">Doctor Sign-up</a></li>
										<li class="nav-item"><a class="nav-link" href="signup_patient.php">Patient Sign-up</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item highlighted-menu"><a class="nav-link" href="signup_patient.php">Book Appointment<i class="fa-solid fa-calendar-days"></i></a></li>
                            </ul>
                        </div>
					</div>
					<!-- Main Menu End -->
					<div class="navbar-toggle"></div>
				</div>
			</nav>
			<div class="responsive-menu"></div>
		</div>
	</header>
	<!-- Header End -->
	