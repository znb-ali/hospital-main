<?php
    require_once "mainlinks.php";
    require_once "connection.php";  // Ensure this file contains the connection to your database

    // Define a variable to show the success message
    $successMessage = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve form data
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $msg = $_POST['msg'];

        // Insert the form data into the database
        $sql = "INSERT INTO appointments (name, email, phone, date, message) 
                VALUES (?, ?, ?, ?, ?)";

        // Prepare the SQL query
        if ($stmt = $con->prepare($sql)) {
            // Bind parameters to the SQL query
            $stmt->bind_param("sssss", $name, $email, $phone, $date, $msg);

            // Execute the query
            if ($stmt->execute()) {
                // Success message
                $successMessage = 'Thank you for making an appointment! We will call you later.';
            } else {
                // Error message if query execution fails
                $successMessage = 'Something went wrong. Please try again.';
            }

            // Close the statement
            $stmt->close();
        } else {
            $successMessage = 'Error preparing the SQL query.';
        }
    }
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Awaiken">
    <title>Care - Appointment</title>
    
    <?php require_once "jslinks.php"; ?>
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

    <!-- Subpage Header Start -->
    <div class="subpage-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="subpage-header-box">
                        <h1 class="text-anime-style-3">Appointment Booking</h1>
                        <ol class="breadcrumb wow fadeInUp">
                            <li><a href="appointment.php#">Home</a></li>
                            <li>Appointment Booking</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Subpage Header End -->

    <?php if ($successMessage): ?>
                    <!-- Success Message -->
                    <div class="alert alert-success">
                        <?php echo $successMessage; ?>
                    </div>
                    <?php endif; ?>
    <!-- Appointment Booking Section Start -->
    <div class="appointment-booking wow fadeInUp" data-wow-delay="0.25s">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-8">
                    <!-- Contact Form Start -->
                    <div class="contact-form">
                        <form id="appointmentForm" action="appointment.php" method="POST" data-toggle="validator">
                            <div class="row">
                                <div class="form-group col-md-6 mb-4">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" required>
                                    <div class="help-block with-errors"></div>
                                </div>

                                <div class="form-group col-md-6 mb-4">
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
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
                                    <button type="submit" class="btn-default">Make Appointment</button>
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
                        <div class="quick-contacts-content">
                            <h3>Quick Contacts</h3>
                            <p>Have any questions or need to schedule an appointment? Reach out to us quickly!</p>
                        </div>
                        <div class="quick-contact-info">
                            <div class="quick-contact-box">
                                <div class="icon-box">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <p>Jl. Raya Kuta No.70, Kuta</p>
                            </div>
                            <div class="quick-contact-box">
                                <div class="icon-box">
                                    <i class="fas fa-envelope-open-text"></i>
                                </div>
                                <p>healthcare@gmail.com</p>
                            </div>
                            <div class="quick-contact-box">
                                <div class="icon-box">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <p>808 707 6060</p>
                            </div>
                            <div class="quick-contact-box">
                                <div class="icon-box">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <p>8 AM - 5 PM, Monday - Saturday</p>
                            </div>
                        </div>
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
                        <h3 class="wow fadeInUp">Our Best Doctor</h3>
                        <h2 class="text-anime-style-3">Meet Our Doctors.</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Team members here -->
                <!-- (Keep the doctor profiles as they are) -->
            </div>
        </div>
    </div>
    <!-- Appointment Our Team End -->

    <?php require_once "footer.php"; ?>

</body>
</html>
