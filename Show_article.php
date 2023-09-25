<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ARTICLE</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="photo/logo1.png" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5"> 
            
                <?php 
                require 'connect.php';
                $select="SELECT * from category ";
                $result_category=$conn->query($select);
                if($result_category->num_rows>0){
                    while($row=$result_category->fetch_assoc()){

                        echo  '<a class="navbar-brand" href="filter.php?id=' . $row['id'].'"> '. $row['cat_name'].' </a>' ;
                         
                    }
                }
                ?>
            <a class="navbar-brand" href="index.php">all posts</a>
        
                <div class="container px-5">
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            
                            <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
							<li class="nav-item"><a class="nav-link" href="#features">Articles</a></li>
                            
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">register</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                            <li><a class="dropdown-item" href="create_.php">sign_up</a></li>
                            <li><a class="dropdown-item" href="register.php">log-in</a></li>
                            </ul>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">create </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                            <li><a class="dropdown-item" href="insert_category.php">create category</a></li>
                            <li><a class="dropdown-item" href="create_post.php">create post</a></li>
                            </ul>
                            

                    </div>
                </div>
            </nav>
			 <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h2 class="fw-bolder">From our blog</h2>
                                <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
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
