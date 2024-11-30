<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="Awaiken">
	<!-- Page Title -->
	<title>Care - Appointment</title>
	
	<?php
    require_once "mainlinks.php";
    // require_once "connection.php";
    ?>
</head>

<body class="tt-magic-cursor">
	
	<!-- Preloader Start -->
	<div class="preloader">
		<div class="loading-container">
			<div class="loading"></div>
			<div id="loading-icon"><img src="images/new_care.png" alt=""></div>
		</div>
	</div>
	<!-- Preloader End -->

	<!-- Magic Cursor Start -->
	<div id="magic-cursor">
		<div id="ball"></div>
	</div>
	<!-- Magic Cursor End -->

    <!-- Header Start -->
	<?php require_once 'linkheader.php'?>
	<!-- Header End -->

    <!-- Subpage Header Start -->
    <div class="subpage-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Sub page Header start -->
                    <div class="subpage-header-box">
                        <h1 class="text-anime-style-3">Appointment Booking</h1>
                        <ol class="breadcrumb wow fadeInUp">
                            <li><a href="appointment.php#">Home</a></li>
                            <li>appointment booking</li>
                        </ol>
                    </div>
                    
                    <!-- Sub page Header End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Subpage Header End -->

    <!-- Appointment Booking Section Start -->
    <div class="appointment-booking wow fadeInUp" data-wow-delay="0.25s">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-8">
                    <!-- Contact Form Start -->
                    <div class="contact-form">
                        <form id="appointmentForm" action="appointment.php#" method="POST" data-toggle="validator">
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="email" name ="email" class="form-control" id="email" placeholder="Email" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Your Phone" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                
                                <div class="form-group col-md-6 mb-4">
                                    <input type="date" name="date" class="form-control" id="date" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <textarea name="msg" class="form-control" id="msg" rows="4" placeholder="Your Message" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-md-12 form-group">
                                    <button type="submit" class="btn-default">make appointment</button>
                                    <div id="msgSubmit" class="h3 hidden"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form End -->
                </div>
                <div class="col-lg-4">
                    <!-- Quick Contacts Start -->
                    <div class="quick-contacts">
                        <!-- Quick Contacts Content Start -->
                        <div class="quick-contacts-content">
                            <h3>Quick Contacts</h3>
                            <p>Have any questions or need to schedule an appointment? Reach out to us quickly!</p>
                        </div>
                        <!-- Quick Contacts Content End -->
            
                        <!-- Quick Contacts Info Start -->
                        <div class="quick-contact-info">
                            <!-- Quick Contacts Box Start -->
                            <div class="quick-contact-box">
                                <div class="icon-box">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <p>Jl. Raya Kuta No.70, Kuta</p>
                            </div>
                            <!-- Quick Contacts Box End -->

                            <!-- Quick Contacts Box Start -->
                            <div class="quick-contact-box">
                                <div class="icon-box">
                                    <i class="fas fa-envelope-open-text"></i>
                                </div>
                                <p>healthcare@gmail.com</p>
                            </div>
                            <!-- Quick Contacts Box End -->

                            <!-- Quick Contacts Box Start -->
                            <div class="quick-contact-box">
                                <div class="icon-box">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <p>808 707 6060</p>
                            </div>
                            <!-- Quick Contacts Box End -->

                            <!-- Quick Contacts Box Start -->
                            <div class="quick-contact-box">
                                <div class="icon-box">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <p>8 AM - 5 PM , Monday - Saturday</p>
                            </div>
                            <!-- Quick Contacts Box End -->
                        </div>
                        <!-- Quick Contacts Info End -->
                    </div>
                    <!-- Quick Contacts End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment Booking Section End -->

    <!-- Appointment Our Team Start -->
    <div class="meet-our-team appointment-our-team">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="section-title">
                        <h3 class="wow fadeInUp">our best doctor</h3>
                        <h2 class="text-anime-style-3">Meet Our Doctors.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <!-- Team Member Item Start -->
                    <div class="team-member-item wow fadeInUp">
                        <!-- Team Image Start -->
                        <div class="team-image">
                            <figure class="image-anime">
                                <img src="images/team-1.jpg" alt="">
                            </figure>

                            <!-- Team Social List Start -->
                            <div class="team-social-list">
                                <ul>
                                    <li><a href="appointment.php#" class="social-icon"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="appointment.php#" class="social-icon"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="appointment.php#" class="social-icon"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="appointment.php#" class="social-icon"><i class="fa-brands fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                            <!-- Team Social List End -->
                        </div>
                        <!-- Team Image End -->

                        <!-- Team Body Start -->
                        <div class="team-body">
                            <div class="team-content">
                                <h3>family physician</h3>
                                <h2><a href="appointment.php#">dr. elizabeth foster</a></h2>
                                <p>Compassionate care for all ages.</p>
                            </div>
                        </div>
                        <!-- Team Body End -->
                    </div>
                    <!-- Team Member Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Team Member Item Start -->
                    <div class="team-member-item wow fadeInUp" data-wow-delay="0.25s">
                        <!-- Team Image Start -->
                        <div class="team-image">
                            <figure class="image-anime">
                                <img src="images/team-2.jpg" alt="">
                            </figure>

                            <!-- Team Social List Start -->
                            <div class="team-social-list">
                                <ul>
                                    <li><a href="appointment.php#" class="social-icon"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="appointment.php#" class="social-icon"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="appointment.php#" class="social-icon"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="appointment.php#" class="social-icon"><i class="fa-brands fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                            <!-- Team Social List End -->
                        </div>
                        <!-- Team Image End -->

                        <!-- Team Body Start -->
                        <div class="team-body">
                            <div class="team-content">
                                <h3>surgeon</h3>
                                <h2><a href="appointment.php#">dr. david lee</a></h2>
                                <p>Skillful hands, transforming lives.</p>
                            </div>
                        </div>
                        <!-- Team Body End -->
                    </div>
                    <!-- Team Member Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Team Member Item Start -->
                    <div class="team-member-item wow fadeInUp" data-wow-delay="0.5s">
                        <!-- Team Image Start -->
                        <div class="team-image">
                            <figure class="image-anime">
                                <img src="images/team-3.jpg" alt="">
                            </figure>

                            <!-- Team Social List Start -->
                            <div class="team-social-list">
                                <ul>
                                    <li><a href="appointment.php#" class="social-icon"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="appointment.php#" class="social-icon"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="appointment.php#" class="social-icon"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="appointment.php#" class="social-icon"><i class="fa-brands fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                            <!-- Team Social List End -->
                        </div>
                        <!-- Team Image End -->

                        <!-- Team Body Start -->
                        <div class="team-body">
                            <div class="team-content">
                                <h3>cardiologist</h3>
                                <h2><a href="appointment.php#">dr. ava white</a></h2>
                                <p>Mental wellness and guiding.</p>
                            </div>
                        </div>
                        <!-- Team Body End -->
                    </div>
                    <!-- Team Member Item End -->
                </div>

                <div class="col-lg-3 col-md-6">
                    <!-- Team Member Item Start -->
                    <div class="team-member-item wow fadeInUp" data-wow-delay="0.75s">
                        <!-- Team Image Start -->
                        <div class="team-image">
                            <figure class="image-anime">
                                <img src="images/team-4.jpg" alt="">
                            </figure>

                            <!-- Team Social List Start -->
                            <div class="team-social-list">
                                <ul>
                                    <li><a href="appointment.php#" class="social-icon"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="appointment.php#" class="social-icon"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="appointment.php#" class="social-icon"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href="appointment.php#" class="social-icon"><i class="fa-brands fa-facebook-f"></i></a></li>
                                </ul>
                            </div>
                            <!-- Team Social List End -->
                        </div>
                        <!-- Team Image End -->

                        <!-- Team Body Start -->
                        <div class="team-body">
                            <div class="team-content">
                                <h3>dermatologist</h3>
                                <h2><a href="appointment.php#">Dr. Daniel Brown</a></h2>
                                <p>Focuses on skin, hair disorders.</p>
                            </div>
                        </div>
                        <!-- Team Body End -->
                    </div>
                    <!-- Team Member Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment Our Team Start -->

	<!-- Footer Start -->
	<footer>
		<!-- Main Footer Start -->
		<div class="main-footer">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-12">
						<!-- About Footer Start -->
						<div class="about-footer">
							<!-- Footer Logo Start -->
							<div class="footer-logo">
								<figure>
									<img src="images/footer-logo.svg" alt="">
								</figure>
							</div>
							<!-- Footer Logo End -->

							<!-- Footer Content Start -->
							<div class="footer-content">
								<p>Our family-centered approach to healthcare ensures that each member of your family receives personalized attention.</p>
							</div>
							<!-- Footer Content End -->

							<!-- Footer Social Links Start -->
							<div class="footer-social-links">
								<ul>
									<li><a href="appointment.php#"><i class="fa-brands fa-linkedin-in"></i></a></li>
									<li><a href="appointment.php#"><i class="fa-brands fa-youtube"></i></a></li>
									<li><a href="appointment.php#"><i class="fa-brands fa-twitter"></i></a></li>
									<li><a href="appointment.php#"><i class="fa-brands fa-instagram"></i></a></li>
									<li><a href="appointment.php#"><i class="fa-brands fa-facebook-f"></i></a></li>
								</ul>
							</div>
							<!-- Footer Social Links End -->
						</div>
						<!-- About Footer End -->
					</div>
	
					<div class="col-lg-2 col-md-3 col-5">
						<!-- Footer Quick Links Start -->
						<div class="footer-quick-links">
							<h2>quick links</h2>
							<ul>
								<li><a href="appointment.php#">home</a></li>
								<li><a href="appointment.php#">about us</a></li>
								<li><a href="appointment.php#">doctors</a></li>
								<li><a href="appointment.php#">services</a></li>
								<li><a href="appointment.php#">contact us</a></li>
							</ul>
						</div>
						<!-- Footer Quick Links End -->
					</div>
	
					<div class="col-lg-3 col-md-4 col-7">
						<!-- Footer Contact Details Start -->
						<div class="footer-contact-details">
							<h2>contact details</h2>
							<!-- Footer Contact Info Box Start -->
							<div class="footer-contact-box">
								<!-- Info Box Start -->
								<div class="footer-info-box">
									<!-- Icon Box Start -->
									<div class="icon-box">
										<i class="fa-solid fa-location-dot"></i>
									</div>
									<!-- Icon Box End -->
									<p>Jl. Raya Kuta No.70, Kuta</p>
								</div>
								<!-- Info Box End -->
	
								<!-- Info Box Start -->
								<div class="footer-info-box">
									<!-- Icon Box Start -->
									<div class="icon-box">
										<i class="fa-solid fa-envelope-open-text"></i>
									</div>
									<!-- Icon Box End -->
									<p>healthcare@gmail.com</p>
								</div>
								<!-- Info Box End -->
	
								<!-- Info Box Start -->
								<div class="footer-info-box">
									<!-- Icon Box Start -->
									<div class="icon-box">
										<i class="fa-solid fa-phone"></i>
									</div>
									<!-- Icon Box End -->
									<p>+01 547 547 5478</p>
								</div>
								<!-- Info Box End -->
	
								<!-- Info Box Start -->
								<div class="footer-info-box">
									<!-- Icon Box Start -->
									<div class="icon-box">
										<i class="fa-solid fa-clock"></i>
									</div>
									<!-- Icon Box End -->
									<p>8 AM - 5 PM , Monday - Saturday</p>
								</div>
								<!-- Info Box End -->
							</div>
							<!-- Footer Contact Info Box End -->
						</div>
						<!-- Footer Contact Details End -->
					</div>
	
					<div class="col-lg-3 col-md-5">
						<!-- Footer Newsletter Start -->
						<div class="footer-newsletter">
							<h2>newsletter</h2>
							<div class="subscribe-content">
								<h3>subscribe to our newsletter</h3>
								<p>Stay informed and never miss out on the latest news, health tips.</p>
							</div>
							<div class="footer-newsletter-form">
								<form id="newslettersForm" action="appointment.php#" method="POST">
									<div class="form-group">
										<input type="email" name="email" class="form-control"  id="mail" placeholder="Enter Your Email" required>
										<button type="submit" class="btn-default">send </button>
									</div>
								</form>
							</div>
						</div>
						<!-- Footer Newsletter End -->
					</div>
				</div>

				<!-- Footer Copyright Section Start -->
				<div class="footer-copyright">
					<div class="row">
						<div class="col-lg-12">
							<!-- Footer Copyright Start -->
							<div class="footer-copyright-text">
								<p>copyright 2024 © <span>MediPro</span> all right reserved.</p>
							</div>
							<!-- Footer Copyright End -->
						</div>
					</div>
				</div>
				<!-- Footer Copyright Section End -->
			</div>
		</div>
		<!-- Main Footer End -->
	</footer>
	<!-- Footer End -->
	
	<?php
    require_once "jslinks.php";
    // require_once "connection.php";
    ?>
</body>
</html>