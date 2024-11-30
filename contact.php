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
	<title>Care - Contact</title>
	
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
                        <h1 class="text-anime-style-3">Contact Us</h1>
                        <ol class="breadcrumb wow fadeInUp">
                            <li><a href="contact.php#">Home</a></li>
                            <li>contact us</li>
                        </ol>
                    </div>
                    <!-- Sub page Header End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Subpage Header End -->

    <!-- Google Map starts -->
    <div class="google-map">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <!-- Google Map Iframe Start -->
                    <div class="google-map-iframe">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96737.10562045308!2d-74.08535042841811!3d40.739265258395164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1703158537552!5m2!1sen!2sin"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <!-- Google Map Iframe End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Google Map Ends -->

    <!-- Contact Infomation start -->
    <div class="contact-information wow fadeInUp" data-wow-delay="0.25s">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
					<!-- Item Box Start -->
                    <div class="contact-item">
						<!-- Icon Box Start -->
                        <div class="icon-box">
                            <i class="fa-solid fa-phone"></i>
                        </div>
						<!-- Icon Box End -->
						
						<!-- Box Content Start -->
                        <div class="contact-info-content">
                            <h3>Help Line</h3>
                            <p>(+0) 123 456 789</p>
                        </div>
						<!-- Box Content End -->
                    </div>
					<!-- Item Box End -->
                </div>

                <div class="col-md-4">
					<!-- Item Box Start -->
                    <div class="contact-item">
						<!-- Icon Box Start -->
                        <div class="icon-box">
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
						<!-- Icon Box End -->

						<!-- Box Content Start -->
                        <div class="contact-info-content">
                            <h3>Location</h3>
                            <p>Jl. Raya Kuta No.70, Kuta</p>
                        </div>
						<!-- Box Content End -->
                    </div>
                </div>

                <div class="col-md-4">
					<!-- Item Box Start -->
                    <div class="contact-item">
						<!-- Icon Box Start -->
                        <div class="icon-box">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
						<!-- Icon Box End -->

						<!-- Box Content Start -->
                        <div class="contact-info-content">
                            <h3>Email Address</h3>
                            <p>healthcare@gmail.com</p>
                        </div>
						<!-- Box Content End -->
                    </div>
					<!-- Item Box End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Infomation End -->

    <!-- Contact Form start -->
    <div class="page-contact-form">
        <div class="container">
            <div class="row section-row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3 class="wow fadeInUp">fill the form</h3>
                        <h2 class="text-anime-style-3">Contact Form</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <!-- Contact Form start -->
                    <div class="contact-us-form wow fadeInUp" data-wow-delay="0.5s">
                        <form id="contactForm" action="contact.php#" method="POST" data-toggle="validator">
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter Your Full Name" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="email" name ="email" class="form-control" id="email" placeholder="Enter Your Email" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Your Phone Number" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="subject" class="form-control" id="subject" placeholder="Your Subject" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-12 mb-4">
                                    <textarea name="msg" class="form-control" id="msg" rows="4" placeholder="Typer Your Message" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="contact-form-btn">
										<button type="submit" class="btn-default">book now</button>
                                        <div id="msgSubmit" class="h3 hidden"></div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Contact Form end -->
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Form End -->

	<!-- Footer Start -->
	<?php
	require_once "footer.php"
	?>
	<!-- Footer End -->
	
  
	<?php
    require_once "jslinks.php";
    // require_once "connection.php";
    ?>
</body>
</html>