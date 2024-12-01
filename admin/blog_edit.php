<?php
require_once "connection.php";

// Check if an ID is passed and fetch the current data
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure the ID is an integer
    $stmt = $con->prepare("SELECT * FROM blogs WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Blog post not found!");
    }
    $stmt->close();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize inputs
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_POST['author'];
    $status = $_POST['status']; // Assuming a status field is in use

    // Use a prepared statement to update the blog post
    $stmt = $con->prepare("UPDATE blogs SET title = ?, content = ?, author = ?, status = ? WHERE id = ?");
    $stmt->bind_param("ssssi", $title, $content, $author, $status, $id);

    if ($stmt->execute()) {
        echo "<script>alert('Blog post updated successfully!');</script>";
        header("Location: blog_crud.php"); // Redirect to the blog list page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$con->close(); // Close the database connection
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Portal - Edit Blog</title>
        <link rel="stylesheet" href="css/layout.css">
        
        <style>
  /* Main Content */
  .main-content {
            padding: 40px 20px;
            background-color: #f4f6f9;
            min-height: 100vh;
            box-sizing: border-box;
        }

        /* Title and Paragraph Styles */
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
            margin-bottom: 20px;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-group textarea {
            resize: vertical;
            height: 200px;
        }

        .form-group button {
            background-color: #084d7b;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: #045081;
        }

        /* Image Upload */
        .form-group input[type="file"] {
            padding: 5px;
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
                    <h1>Edit Blog</h1>
                    <form action="blog_edit.php?id=<?php echo $id; ?>" method="POST">
                <label for="title">Title:</label><br>
                <input type="text" name="title" value="<?php echo htmlspecialchars($row['title']); ?>" required class="form-control"><br>

                <label for="content">Content:</label><br>
                <textarea name="content" rows="10" required class="form-control"><?php echo htmlspecialchars($row['content']); ?></textarea><br>

                <label for="author">Author:</label><br>
                <input type="text" name="author" value="<?php echo htmlspecialchars($row['author']); ?>" required class="form-control"><br>

                <label for="status">Status:</label><br>
                <select name="status" class="form-control" required>
                    <option value="DRAFT" <?php if ($row['status'] == 'DRAFT') echo 'selected'; ?>>Draft</option>
                    <option value="PUBLISHED" <?php if ($row['status'] == 'PUBLISHED') echo 'selected'; ?>>Published</option>
                </select><br>

                <button type="submit" class="form-group">Save Changes</button>
            </form>

                </div>
            </div>
        </div>
    </div>
        <?php require_once "jslinks.php"; ?>
    </body>
    </html>
