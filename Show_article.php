<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Post Details</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <script>
        function displayTime() {
            var currentDate = new Date();
            var currentHour = currentDate.getHours();
            var currentMinute = currentDate.getMinutes();
            var currentSecond = currentDate.getSeconds();
            var clock = document.getElementById('clock');
            clock.textContent = currentHour + ':' + currentMinute + ':' + currentSecond;
        }

        setInterval(displayTime, 1000); // تحديث الساعة كل ثانية
    </script>
    </head>
    <body class="d-flex flex-column" style="--bs-body-color: #333;">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html">Show article</a>
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                            <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
                            <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="blog-home.html">Blog Home</a></li>
                                    <li><a class="dropdown-item" href="blog-post.html">Blog Post</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Portfolio</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                    <li><a class="dropdown-item" href="portfolio-overview.html">Portfolio Overview</a></li>
                                    <li><a class="dropdown-item" href="portfolio-item.html">Portfolio Item</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Header-->
            <header class="py-5">
            
                <div class="container px-5">
                    <div class="row justify-content-center">
                    <?php
include 'connect.php';
// Create a database connection

$post_id = $_GET['id'];
$sql = "SELECT * FROM post, category WHERE post.id = " . $post_id;
$result = $conn->query($sql);

// Display the post details
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo '<div class="col-lg-8 col-xxl-6">
            <div class="text-center my-5">
                <h1 class="fw-bolder mb-3">'. $row['name'].'</h1>
                <h4>'. $row['description'].'</h4>
                <img src="image/'.$row['img'].'" class="rounded float-start" width="300" height="150">
                <p class="lead fw-normal text-muted mb-4">
                    '.$row['body'].'
                </p>
                <p class="h4">'.$row['author'].'</p>
                <p>Updated on '.$row['date'].'</p>
                <p>Category: '.$row['cat_name'].'</p>
                <a class="btn btn-primary btn-lg" href="index.php">Go to home</a>
                <button type="button" class="btn-close" aria-label="Close"></button>
            </div>
        </div>';
        
} else {
    echo "No post found.";
}
?>
                    </div>
                </div>
            </header>
    <p id="clock"></a></p>         
    </body>
</html>
