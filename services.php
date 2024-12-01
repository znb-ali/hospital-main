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
    <title>Care - Services</title>



    <?php
    require_once "mainlinks.php";
    require_once "connection.php";
    ?>

    <style>
        :root {
            --body-background: #FFF7F4;
            --primary-color: #113f56;
            --text-color: #000000;
            --accent-color: #96d4f0;
            --secondry-color: #FFFFFF;
            --transparent-color: #fffbfbcb;
            --transparent-secondry-color: #000000aa;
            --light-Background: #113f56;
            --light-accent-color: #bcddf7;
            --default-font: "Figtree", sans-serif;
            ;
        }

        .search-container {
            background-color: var(--secondry-color);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;

        }

        .dropdowns select {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid var(--primary-color);
            border-radius: 4px;
            background-color: var(--light-accent-color);
            color: var(--primary-color);
        }

        .search-btn {
            padding: 10px 20px;
            background-color: var(--accent-color);
            color: var(--primary-color);
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 95%;
            margin-top: 20px;
        }

        .search-btn:hover {
            background-color: var(--primary-color);
            color: var(--secondry-color);
        }
    </style>

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
    <?php require_once 'linkheader.php' ?>
    <!-- Header End -->

    <!-- Subpage Hero Section Start -->
    <div class="subpage-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Sub page Header start -->
                    <div class="subpage-header-box">
                        <h1 class="text-anime-style-3">Services</h1>
                        <ol class="breadcrumb wow fadeInUp">
                            <li><a href="index.php">Home</a></li>
                            <li>services</li>
                        </ol>
                    </div>

                    <!-- Sub page Header End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Subpage Hero Section End -->

    <!-- Our Services Section Start -->
    <div class="our-services">
        <div class="container">
            <div class="row section-row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="wow fadeInUp">Specialised Departments</h3>
                        <h2 class="text-anime-style-3">Providing Medical Care For The Sickest In Our Community</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Our Service Item Start -->
                    <div class="our-services-item wow fadeInUp">
                        <div class="service-item-image">
                            <img src="images/icon-service-page-1.svg" alt="Diabetic Clinic">
                        </div>
                        <div class="services-item-content">
                            <h3>Diabetics Clinic</h3>
                            <p>Expert consultations with board-certified cardiologists to assess heart health, discuss symptoms, and develop personalized treatment plans.</p>
                            <ul>
                                <li>Cardiac Electrophysiology</li>
                                <li>Cardiac Catheterization</li>
                                <li>Arrhythmia Management</li>
                            </ul>
                        </div>
                        <div class="services-item-btn">
                            <a href="show_by_specialization.php?id=1" class="btn-default">View Doctors</a>
                        </div>
                    </div>
                    <!-- Our Service Item End -->
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Our Service Item Start -->
                    <div class="our-services-item wow fadeInUp" data-wow-delay="0.25s">
                        <div class="service-item-image">
                            <img src="images/icon-service-page-2.svg" alt="Pathology Clinic">
                        </div>
                        <div class="services-item-content">
                            <h3>Pathology Clinic</h3>
                            <p>Comprehensive tests to analyze body fluids, aiding in the diagnosis and monitoring of organ function and metabolic disorders.</p>
                            <ul>
                                <li>Molecular Pathology</li>
                                <li>Cytogenetics</li>
                                <li>Immunology</li>
                            </ul>
                        </div>
                        <div class="services-item-btn">
                            <a href="show_by_specialization.php?id=4" class="btn-default">View Doctors</a>
                        </div>
                    </div>
                    <!-- Our Service Item End -->
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Our Service Item Start -->
                    <div class="our-services-item wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item-image">
                            <img src="images/icon-service-page-3.svg" alt="Laboratory Analysis">
                        </div>
                        <div class="services-item-content">
                            <h3>Laboratory Analysis</h3>
                            <p>Our Laboratory Analysis Services offer a comprehensive range of advanced tests to aid in the accurate diagnosis of metabolic disorders.</p>
                            <ul>
                                <li>Comprehensive Test Menu</li>
                                <li>Timely Turnaround</li>
                                <li>Advanced Diagnostic Tests</li>
                            </ul>
                        </div>
                        <div class="services-item-btn">
                            <a href="show_by_specialization.php?id=7" class="btn-default">View Doctors</a>
                        </div>
                    </div>
                    <!-- Our Service Item End -->
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Our Service Item Start -->
                    <div class="our-services-item wow fadeInUp" data-wow-delay="0.75s">
                        <div class="service-item-image">
                            <img src="images/icon-service-page-4.svg" alt="Pediatric Clinic">
                        </div>
                        <div class="services-item-content">
                            <h3>Pediatric Clinic</h3>
                            <p>Comprehensive well-child checkups, growth monitoring, and developmental assessments to ensure your child's health.</p>
                            <ul>
                                <li>Nutrition Counseling</li>
                                <li>Pediatric Dermatology</li>
                                <li>Developmental Evaluations</li>
                            </ul>
                        </div>
                        <div class="services-item-btn">
                            <a href="show_by_specialization.php?id=6" class="btn-default">View Doctors</a>
                        </div>
                    </div>
                    <!-- Our Service Item End -->
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Our Service Item Start -->
                    <div class="our-services-item wow fadeInUp" data-wow-delay="1s">
                        <div class="service-item-image">
                            <img src="images/icon-service-page-5.svg" alt="Cardiac Clinic">
                        </div>
                        <div class="services-item-content">
                            <h3>Cardiac Clinic</h3>
                            <p>Find comprehensive care and support for heart failure patients, including lifestyle recommendations and advanced therapies.</p>
                            <ul>
                                <li>Heart Failure Program</li>
                                <li>Cardiac Rehabilitation</li>
                                <li>Lipid Management</li>
                            </ul>
                        </div>
                        <div class="services-item-btn">
                            <a href="show_by_specialization.php?id=5" class="btn-default">View Doctors</a>
                        </div>
                    </div>
                    <!-- Our Service Item End -->
                </div>

                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Our Service Item Start -->
                    <div class="our-services-item wow fadeInUp" data-wow-delay="1.25s">
                        <div class="service-item-image">
                            <img src="images/icon-service-page-6.svg" alt="Neurology Clinic">
                        </div>
                        <div class="services-item-content">
                            <h3>Neurology Clinic</h3>
                            <p>Consultations with specialized neurologists to address various neurological concerns, symptoms, and disorders.</p>
                            <ul>
                                <li>Epilepsy Management</li>
                                <li>Headache and Migraine Clinic</li>
                                <li>Neurological Examinations</li>
                            </ul>
                        </div>
                        <div class="services-item-btn">
                            <a href="show_by_specialization.php?id=3" class="btn-default">View Doctors</a>
                        </div>
                    </div>
                    <!-- Our Service Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Our Services Section End -->

	<!-- Cta Section Start -->
	<div class="cta-box">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-8">
					<!-- Cta Item Start -->
					<div class="cta-item">
						<!-- Icon Box Start -->
						<div class="icon-box">
							<img src="images/icon-appointment.svg" alt="">
						</div>
						<!-- Icon Box End -->

						<!-- Cta Content Start -->
						<div class="cta-content">
							<h3 class="text-anime-style-3">Open For Appointments</h3>
							<p class="wow fadeInUp" data-wow-delay="0.25s">we are delighted to announce that our doors are open, and we are now accepting appointments to serve you better.</p>
						</div>
						<!-- Cta Content End -->
					</div>
					<!-- Cta Item End -->
				</div>

				<div class="col-lg-4">
					<!-- Cta Btn Start -->
					<div class="cta-btn">
						<a href="appointment.php" class="appointment-btn wow fadeInUp">make appointment <i class="fa-solid fa-calendar-days"></i></a>
					</div>
					<!-- Cta Btn End -->
				</div>
			</div>
		</div>
	</div>
	<!-- Cta Section End -->


    <!-- Our Culture Section Start -->
    <div class="our-culture">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-md-6">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">our culture</h3>
                        <h2 class="text-anime-style-3">Our Infrastructure & Culture</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
                <div class="col-md-6">
                    <!-- Section Title Content Start -->
                    <div class="section-title-content">
                        <p class="wow fadeInUp">At our medipro , we pride ourselves on fostering a culture of care, where every individual’s well-being is our utmost priority. Our commitment to excellence in healthcare is grounded.</p>
                    </div>
                    <!-- Section Title Content End -->
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="culture-image-gallery wow fadeInUp">
                    <div class="caulture-img">
                        <div class="photo-gallery">
                            <a href="images/cultuer-1.jpg"><img src="images/cultuer-1.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="caulture-img">
                        <div class="photo-gallery">
                            <a href="images/cultuer-2.jpg"><img src="images/cultuer-2.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="caulture-img">
                        <div class="photo-gallery">
                            <a href="images/cultuer-3.jpg"><img src="images/cultuer-3.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="caulture-img">
                        <div class="photo-gallery">
                            <a href="images/cultuer-4.jpg"><img src="images/cultuer-4.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="caulture-img">
                        <div class="photo-gallery">
                            <a href="images/cultuer-5.jpg"><img src="images/cultuer-5.jpg" alt=""></a>
                        </div>
                    </div>

                    <div class="caulture-img">
                        <div class="photo-gallery">
                            <a href="images/cultuer-6.jpg"><img src="images/cultuer-6.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="caulture-img">
                        <div class="photo-gallery">
                            <a href="images/cultuer-7.jpg"><img src="images/cultuer-7.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="caulture-img">
                        <div class="photo-gallery">
                            <a href="images/cultuer-8.jpg"><img src="images/cultuer-8.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="caulture-img">
                        <div class="photo-gallery">
                            <a href="images/cultuer-9.jpg"><img src="images/cultuer-9.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="caulture-img">
                        <div class="photo-gallery">
                            <a href="images/cultuer-10.jpg"><img src="images/cultuer-10.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Culture Section End -->

    <!-- Services Specialist Section Start -->
    <div class="service-specialist">
        <div class="container">
            <div class="row section-row align-items-center">
                <div class="col-md-6">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h3 class="wow fadeInUp">top service</h3>
                        <h2 class="text-anime-style-3">We Are a Pogressive Medical Clinic.</h2>
                    </div>
                    <!-- Section Title End -->
                </div>
                <div class="col-md-6">
                    <!-- Section Title Content Start -->
                    <div class="section-title-content">
                        <p class="wow fadeInUp">Welcome to our comprehensive medical services designed to cater to your diverse healthcare needs. We are committed to delivering top-notch medical care with a patient-centered approach.</p>
                    </div>
                    <!-- Section Title Content End -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-6">
                    <!-- Specialist Item Start -->
                    <div class="specialist-item wow fadeInUp">
                        <div class="icon-box">
                            <img src="images/icon-specialist-1.svg" alt="">
                        </div>
                        <div class="specialist-content">
                            <h3>cardiology</h3>
                        </div>
                    </div>
                    <!-- Specialist Item End -->
                </div>

                <div class="col-md-3 col-6">
                    <!-- Specialist Item Start -->
                    <div class="specialist-item wow fadeInUp" data-wow-delay="0.25s">
                        <div class="icon-box">
                            <img src="images/icon-specialist-2.svg" alt="">
                        </div>
                        <div class="specialist-content">
                            <h3>diagnostics</h3>
                        </div>
                    </div>
                    <!-- Specialist Item End -->
                </div>

                <div class="col-md-3 col-6">
                    <!-- Specialist Item Start -->
                    <div class="specialist-item wow fadeInUp" data-wow-delay="0.5s">
                        <div class="icon-box">
                            <img src="images/icon-specialist-3.svg" alt="">
                        </div>
                        <div class="specialist-content">
                            <h3>virology</h3>
                        </div>
                    </div>
                    <!-- Specialist Item End -->
                </div>

                <div class="col-md-3 col-6">
                    <!-- Specialist Item Start -->
                    <div class="specialist-item wow fadeInUp" data-wow-delay="0.75s">
                        <div class="icon-box">
                            <img src="images/icon-specialist-4.svg" alt="">
                        </div>
                        <div class="specialist-content">
                            <h3>therapy</h3>
                        </div>
                    </div>
                    <!-- Specialist Item End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Services Specialist Section End -->




    <?php
    require_once "footer.php";
    ?>


    <?php
    require_once "jslinks.php";
    ?>
</body>

</html>