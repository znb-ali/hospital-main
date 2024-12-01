    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Portal - Patients</title>
        <link rel="stylesheet" href="css/layout.css">

        <style>
            /* Adjustments for Main Content in the New Layout */
            .main-content {
                padding: 40px 20px;
                background-color: #f4f6f9;
                min-height: 100vh;
                box-sizing: border-box;
            }

            .main-content h1 {
                font-size: 28px;
                color: #084d7b;
                margin-bottom: 15px;
                text-align: center;
            }

            .main-content p {
                font-size: 16px;
                color: #333;
                text-align: center;
                margin-bottom: 25px;
            }

            .btn_add_patient {
                background-color: #084d7b;
                color: #fff;
                padding: 10px 20px;
                text-decoration: none;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }

            .btn_add_patient:hover {
                background-color: #bcddf7;
                color: #333;
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
                        <h1>Patients</h1>

                        <a href="admin_patient_add.php" class="btn_add_patient">Add Patient</a>

                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Age</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>



                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "select * from patient_reg";
                                $sel = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_assoc($sel)) {
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $row["id"] ?></th>
                                        <td><?php echo $row["patient_name"] ?></td>
                                        <td><?php echo $row["patient_age"] ?></td>
                                        <td><?php echo $row["patient_email"] ?></td>
                                        <td><?php echo $row["patient_phone"] ?></td>
                                        <td><a href="patient_edit.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-info">EDIT</a></td>
                                        <td><a href="patient_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-warning" onclick="return confirm('Are you sure you want to delete this patient?')">DELETE</a></td>

                                    </tr>
                                <?php
                                }
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php require_once "jslinks.php"; ?>
    </body>

    </html>