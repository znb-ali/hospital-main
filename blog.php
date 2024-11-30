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
	<title>Care - Blogs</title>
	<style>
		.post-featured-image figure {
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
    height: 250px; /* Adjust this to set the height of the image container */
    background-color: #f4f4f4; /* Optional: Add a background color for placeholder */
}

.post-featured-image img {
    width: auto;
    height: 100%;
    object-fit: contain;
    transition: transform 0.3s ease; /* Optional: Add a hover effect */
}

.post-featured-image img:hover {
    transform: scale(1.05); /* Optional: Slight zoom on hover */
}

	</style>
	<?php
    require_once "mainlinks.php";
    // require_once "connection.php";
    ?>
</head>

<body class="tt-magic-cursor">
	
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
                        <h1 class="text-anime-style-3">Blog & News</h1>
                        <ol class="breadcrumb wow fadeInUp">
                            <li><a href="index.php">Home</a></li>
                            <li>blog</li>
                        </ol>
                    </div> 
                    <!-- Sub page Header End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Subpage Header End -->
     <!-- Our Blog Section start here -->
     <?php
require_once "connection.php"; // Connect to the database
     
// Fetch blogs from the database
$sql = "SELECT * FROM blogs WHERE status= 'published' ORDER BY created_at DESC";
$result = $con->query($sql);
?>

<div class="recent-post our-blog">
    <div class="container">
        <div class="row">
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <div class="col-lg-4 col-md-6">
                        <!-- Post Item Start -->
                        <div class="post-item wow fadeInUp" data-wow-delay="0.25s">
                            <!-- Post Image Start -->
							<div class="post-featured-image">
    <figure class="image-anime">
        <a href="blog.php?id=<?php echo $row['id']; ?>">
            <img src="uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
        </a>
    </figure>
</div>


                            <!-- Post Content Start -->
                            <div class="post-item-body">
                                <h2><a href="blog.php?id=<?php echo $row['id']; ?>">
                                    <?php echo $row['title']; ?>
                                </a></h2>
                                <p><?php echo substr($row['content'], 0, 100) . '...'; ?></p>
                            </div>
                            <!-- Post Content End -->

                            <!-- Btn Readmore Start -->
                            <div class="btn-readmore">
                                <a href="blog-single.php?id=<?php echo $row['id']; ?>">Read More <i class="fa-solid fa-arrow-right-long"></i></a>
                            </div>
                            <!-- Btn Readmore End -->
                        </div>
                        <!-- Post Item End -->
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p>No blog posts available.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php $con->close(); ?>


   
    <!-- Our Blog Section End -->

	<?php
    require_once "footer.php";
    ?>
	<?php
    require_once "jslinks.php";
    ?>
</body>
</html>