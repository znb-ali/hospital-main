<?php
// Include database connection
require_once "connection.php"; // Ensure this file contains the correct DB connection logic

// Check if an article ID is passed as a GET parameter
if (isset($_GET['id'])) {
    $article_id = intval($_GET['id']);

    // Fetch article data from the database
    $query = "SELECT title, content, image, author FROM blogs WHERE id = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    $stmt->bind_result($title, $content, $image, $author);
    $stmt->fetch();
    $stmt->close();
} else {
    // Redirect to a 404 page or display an error if no article ID is provided
    header("Location: 404.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?> </title>
	<style>
		.post-image img {
    object-fit: contain; /* Use 'contain' if you want the whole image visible */
    max-width: 100%;
    height: auto;
    border-radius: 8px; /* Optional: Adds rounded corners for aesthetics */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Optional: Adds a subtle shadow */
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

    <!-- Header Start -->
    <?php require_once 'linkheader.php'?>
    <!-- Header End -->

    <!-- Subpage Header Start -->
    <div class="subpage-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="subpage-header-box">
                        <h1 class="text-anime-style-3"><?php echo htmlspecialchars($title); ?></h1>
                        
                        <div class="post-single-meta">
                           
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <!-- Subpage Header End -->

    <!-- Post Single Page Start -->
    <div class="page-post-single">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="post-content">
                        <!-- Post Single Image Start -->
<div class="post-image">
    <figure class="image-anime reveal">
        <img src="uploads/<?php echo htmlspecialchars($image); ?>" 
             alt="<?php echo htmlspecialchars($title); ?>" 
             class="img-fluid" 
             style="width: 100%; height: auto;">
    </figure>
</div>
<!-- Post Single Image End -->

                        <!-- Post Entry Start -->
                        <div class="post-entry">
                            <h2><?php echo htmlspecialchars($title); ?></h2>

                            <p><?php echo nl2br(htmlspecialchars($content)); ?></p>
                        </div>
                        <!-- Post Entry End -->
                        <b><p>Written by <?php echo nl2br(htmlspecialchars($author)); ?></p></b>


                        <!-- Post Tag Links Start -->
                       
                        <!-- Post Tag Links End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Post Single Page End -->

    <?php require_once "footer.php"; ?>
    <?php require_once "jslinks.php"; ?>
</body>
</html>