    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Portal - Blogs</title>
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
                   <h1>Blogs</h1>
                   
<a href="blog_add.php" class="btn btn-outline-info">Add Blog</a>


                   <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Title</th>
      <th scope="col">Content</th>
      <th scope="col">Files</th>
      <th scope="col">Author</th>
      <th scope="col">status</th>
      <th scope="col">Created At</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query = "SELECT * FROM blogs";
    $sel = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($sel)) {
        echo "<tr>
                <th scope='row'>{$row['id']}</th>
                <td>{$row['title']}</td>
                <td>{$row['content']}</td>
                <td><img src='../uploads/{$row['image']}' alt='blog image' width='50'></td>
                <td>{$row['author']}</td>
                <td>{$row['status']}</td>
                <td>{$row['created_at']}</td>
                <td><a href='blog_edit.php?id={$row['id']}' class='btn btn-outline-info'>EDIT</a></td>
                <td><a href='blog_delete.php?id={$row['id']}' class='btn btn-outline-warning' onclick='return confirm(\"Are you sure you want to delete this blog post?\");'>DELETE</a></td>
            </tr>";
    }
    ?>
</table>
                </div>
            </div>
        </div>
    </div>
        <?php require_once "jslinks.php"; ?>
    </body>
    </html>
