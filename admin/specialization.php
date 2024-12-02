<?php
require_once "connection.php";
// Get logged-in admin details
$admin_email = $_SESSION["admin"];
$query = "SELECT name, email FROM reg WHERE email = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $admin_email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

$admin_name = $user['name'] ?? "Unknown";
$admin_email = $user['email'] ?? "No email found";

// Fetch specializations
$query = "SELECT * FROM specialization";
$sel = mysqli_query($con, $query);
if (!$sel) {
    die("Query failed: " . mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal - Specializations</title>
    <link rel="stylesheet" href="css/layout.css">
    <style>
        .main-content {
            padding: 40px 20px;
            background-color: #f4f6f9;
            min-height: 100vh;
        }

        .main-content h1 {
            font-size: 28px;
            color: #084d7b;
            text-align: center;
        }

        .btn_add_specialization {
            background-color: #084d7b;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            cursor: pointer;
        }

        .btn_add_specialization:hover {
            background-color: #bcddf7;
            color: #333;
        }
    </style>
    <?php require_once "mainlinks.php"; ?>
</head>

<body>
    <div class="dashboard_container">
        <?php include('linkheader.php'); ?>
        <div class="dashboard_main">
            <?php include('side.php'); ?>
            <div class="dashboard_content_main">
                <div class="main-content">
                    <h1>Specializations</h1>
                    <a href="add_sp.php" class="btn_add_specialization">Add Specialization</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Specialization</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_assoc($sel)): ?>
                                <tr>
                                    <td><?php echo $row["sp_id"]; ?></td>
                                    <td><?php echo $row["sp_name"]; ?></td>
                                    <td><a href="edit_sp.php?sp_id=<?php echo $row['sp_id']; ?>" class="btn btn-outline-info">EDIT</a></td>
                                    <td><a href="delete_sp.php?sp_id=<?php echo $row['sp_id']; ?>" class="btn btn-outline-warning" onclick="return confirm('Are you sure you want to delete this specialization?');">DELETE</a></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>