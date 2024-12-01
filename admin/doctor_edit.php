<?php
require_once "connection.php";

// Retrieve doctor ID from URL
if (isset($_GET["id"])) {
    $doctor_id = $_GET["id"];

    // Fetch doctor data from the database
    $query = "SELECT d.*, c.city_name, s.sp_name AS specialization_name 
              FROM doctor_add d
              LEFT JOIN city c ON d.city = c.city_id
              LEFT JOIN specialization s ON d.specialization_id = s.sp_id
              WHERE d.id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $doctor_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $doctor = $result->fetch_assoc();

    if (!$doctor) {
        echo "Doctor not found!";
        exit();
    }
} else {
    echo "No doctor ID provided!";
    exit();
}

// Handle form submission for updating doctor
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $doctor_name = $_POST["doctor_name"];
    $doctor_email = $_POST["doctor_email"];
    $doctor_phone = $_POST["doctor_phone"];
    $city = $_POST["doctor_city"];
    $specialization = $_POST["doctor_sp"];
    $doctor_days = $_POST["doctor_days"];
    $timing = $_POST["doctor_time"];

    // Update the doctor details in the database (no password field)
    $update_query = "UPDATE doctor_add SET 
                     doctor_name = ?, doctor_email = ?, doctor_phone = ?, city = ?, specialization_id = ?, doctor_days = ?, timing = ?
                     WHERE id = ?";
    $stmt = $con->prepare($update_query);
    $stmt->bind_param("sssssssi", $doctor_name, $doctor_email, $doctor_phone, $city, $specialization, $doctor_days, $timing, $doctor_id);

    if ($stmt->execute()) {
        echo "<script>alert('Doctor updated successfully!'); window.location.href = 'doctor.php';</script>";
    } else {
        echo "<script>alert('Error updating doctor.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Edit Doctor</title>
    <link rel="stylesheet" href="css/layout.css">

    <style>
        /* General Styles for Main Content */
        .main-content {
            padding: 40px 20px;
            background-color: #f4f6f9;
            min-height: 100vh;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Heading Styling */
        .main-content h1 {
            font-size: 32px;
            color: #084d7b;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }

        /* Form Styles */
        form {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Input Field Styling */
        form .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #333;
            box-sizing: border-box;
            transition: all 0.3s ease-in-out;
        }

        /* Focus State for Inputs */
        form .form-control:focus {
            border-color: #084d7b;
            outline: none;
            box-shadow: 0px 0px 5px rgba(8, 77, 123, 0.3);
        }

        /* Dropdown Styling */
        form select.form-control {
            appearance: none;
            background: #f4f6f9;
        }

        /* File Upload Styling */
        form input[type="file"] {
            border: 1px dashed #ccc;
            padding: 10px;
            background: #f9f9f9;
            font-size: 14px;
            text-align: center;
            cursor: pointer;
        }

        /* Submit Button Styling */
        .btn_edit_doctor {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            background-color: #084d7b;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .btn_edit_doctor:hover {
            background-color: #bcddf7;
            color: #333;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                padding: 20px;
            }

            form .form-control {
                font-size: 14px;
            }

            form input[type="submit"] {
                font-size: 16px;
            }
        }
    </style>
    <?php require_once "mainlinks.php"; ?>
    <?php require_once "connection.php"; ?>
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

    <div class="dashboard_container">
        <!-- Include the header file -->
        <?php include('linkheader.php'); ?>

        <div class="dashboard_main">
            <!-- Sidebar -->
            <?php include('side.php'); ?>

            <!-- Main Content -->
            <div class="dashboard_content_main">
                <div class="main-content">
                    <h1>Edit Doctor</h1>
                    <form method="post" enctype="multipart/form-data">
                        <!-- Doctor Name -->
                        <input type="text" name="doctor_name" value="<?= htmlspecialchars($doctor['doctor_name']) ?>" placeholder="Doctor Name" class="form-control my-4" required>

                        <!-- Doctor Email -->
                        <input type="email" name="doctor_email" value="<?= htmlspecialchars($doctor['doctor_email']) ?>" placeholder="Doctor Email" class="form-control my-4" required>

                        <!-- Doctor Phone -->
                        <input type="number" name="doctor_phone" value="<?= htmlspecialchars($doctor['doctor_phone']) ?>" placeholder="Doctor Phone" class="form-control my-4" required>

                        <!-- Doctor Days -->
                        <input type="text" name="doctor_days" value="<?= htmlspecialchars($doctor['doctor_days']) ?>" placeholder="Doctor Days" class="form-control my-4" required>

                        <!-- Doctor Time -->
                        <input type="text" name="doctor_time" value="<?= htmlspecialchars($doctor['timing']) ?>" placeholder="Doctor Time" class="form-control my-4" required>

                        <!-- City Dropdown -->
                        <select name="doctor_city" class="form-control my-4" required>
                            <option value="">Select City</option>
                            <?php
                            // Fetch cities from the database
                            $query = "SELECT city_id, city_name FROM city";
                            $result = $con->query($query);

                            // Loop through the cities and populate the dropdown
                            while ($row = $result->fetch_assoc()) {
                                $selected = ($row['city_id'] == $doctor['city']) ? 'selected' : '';
                                echo "<option value='" . $row['city_id'] . "' $selected>" . $row['city_name'] . "</option>";
                            }
                            ?>
                        </select>

                        <!-- Specialization Dropdown -->
                        <select name="doctor_sp" class="form-control my-4" required>
                            <option value="">Select Specialization</option>
                            <?php
                            // Fetch specializations from the database
                            $query = "SELECT sp_id, sp_name FROM specialization";
                            $result = $con->query($query);

                            // Loop through the specializations and populate the dropdown
                            while ($row = $result->fetch_assoc()) {
                                $selected = ($row['sp_id'] == $doctor['specialization_id']) ? 'selected' : '';
                                echo "<option value='" . $row['sp_id'] . "' $selected>" . $row['sp_name'] . "</option>";
                            }
                            ?>
                        </select>

                        <!-- File Upload (optional) -->
                        <input type="file" name="file_name" class="form-control my-4">

                        <!-- Submit Button -->
                        <input type="submit" value="Update Doctor" name="btn_doctor" class="btn_edit_doctor">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require_once "jslinks.php"; ?>
</body>

</html>