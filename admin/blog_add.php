    <?php
    require_once "connection.php"; // Connect to the database

    // Check if 'uploads' folder exists, if not, create it
    if (!file_exists('uploads')) {
        mkdir('uploads', 0777, true);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $author = $_POST['author'];
        $status = '';

        // Determine status based on button clicked
        if (isset($_POST['publish'])) {
            $status = 'published';
        } elseif (isset($_POST['save_as_draft'])) {
            $status = 'draft';
        }

        // Handle image upload
        $targetDir = "../uploads/";
        $imageName = uniqid() . '-' . basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $imageName;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Check if the file is an actual image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($targetFilePath)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size (limit to 2MB)
        if ($_FILES["image"]["size"] > 2000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow only certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Attempt to upload the file
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
                // Insert blog post into the database
                $sql = "INSERT INTO blogs (title, content, image, author, status) VALUES (?, ?, ?, ?, ?)";
                $stmt = $con->prepare($sql);

                if ($stmt) {
                    // Bind the parameters to the query
                    $stmt->bind_param("sssss", $title, $content, $imageName, $author, $status);

                    // Execute the query
                    if ($stmt->execute()) {
                        echo $status == 'published' ? "New blog post added and published successfully!" : "Blog post saved as draft!";
                    } else {
                        echo "Error executing query: " . $stmt->error;
                    }

                    // Close the statement
                    $stmt->close();
                } else {
                    echo "Error preparing the statement: " . $con->error;
                }
            }
        }
    }

    $con->close(); // Close the database connection
    ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Portal - Add Blogs</title>
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
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #bcddf7;
            color: #333;
        }

        /* Image Upload */
        .form-group input[type="file"] {
            padding: 5px;
        }
            </style>
            <?php require_once "mainlinks.php"; ?>
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
                    <h1>Create New Blog Post</h1>
                    <form action="blog_add.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="title" placeholder="Title" required>
                        </div>
                        <div class="form-group">
                            <textarea name="content" placeholder="Content" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="text" name="author" placeholder="Author Name" required>
                        </div>
                        <div class="form-group">
                            <input type="file" name="image" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="publish">Publish</button>
                            <button type="submit" name="save_as_draft">Save as Draft</button>
                        </div>
                    </form>

          </div>
                    </div>
                </div>
            </div>
        </div>
            <?php require_once "jslinks.php"; ?>
        </body>
        </html>
