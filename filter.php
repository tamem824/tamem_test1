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

                        echo  '<a class="navbar-brand" href="filter.php?id=' . $row['id'].'"> '. $row['cat_name'].' </a>'; 
                        
                         
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
                            <li><a class="dropdown-item" href="register.php">sign_up</a></li>
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
                                <p class="lead fw-normal text-muted mb-5"><?php include 'connect.php';
                                $sql="SELECT * from category where id=".$_GET['id'];
                                $result_cat=$conn->query($sql);
                                if($result_cat->num_rows>0){
                                    while($roww=$result_cat->fetch_assoc()){
                                        echo $roww['about'];
                                    }
                                }

                                ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                    <?php
include 'connect.php'; 
$ide = $_GET['id'];
$sql = "SELECT * FROM post WHERE category_id = $ide";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-lg-4 mb-5">
            <div class="card h-100 shadow border-0">
                <img class="card-img-top" src="image/' . $row['img'] . '" alt="..." />
                <div class="card-body p-4">
                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                    <a class="btn btn-primary" href="Show_article.php?id=' . $row['id'] . '">
                        <h5 class="card-title mb-3">' . $row["name"] . '</h5>
                    </a>
                    <p class="card-text mb-0">' . $row["description"] . '</p>
                </div>
                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                    <div class="d-flex align-items-end justify-content-between">
                        <a class="btn btn-primary" href="Update_post.php?id=' . $row['id'] . '">Update</a>
                        
                        <div>
    <a href="delete_post.php?id=' . $row['id'] . '" class="btn btn-outline-danger" onclick="return confirmDelete(event)">Delete</a>
    
</div>
<script>-
    function confirmDelete(event) {
        event.preventDefault();

        var result = confirm("ARE YOUU SURE?");

        if (result) {
            window.location.href = event.target.href;
        } else {
            
        }
    }
</script>

         <div class="d-flex align-items-center">
            <div class="small">
                <div class="fw-bold">'.$row['author'].'</div>
                <div class="text-muted">'.$row['date'].' min read</div>
                <img class="rounded-circle me-3" src="photo/BOOK.png" alt="..">
            </div>
        </div>
    </div>
  
</div>
</div>
</div>
</div>
</div>
</div>
</div>';
       
        

    }
} else {
    echo "No posts found.";
}
$tagsQuery = "SELECT t.tag_name FROM tags_posts tp JOIN tags t ON tp.tagid = t.id WHERE tp.postid = '$ide'";
$resultTags = $conn->query($tagsQuery);

if ($resultTags->num_rows > 0) {
    while ($tag = $resultTags->fetch_assoc()) {
        echo '<h5 class="card-title mb-3">' . $tag["tag_name"] . '</h5>';
    }
}



$del = "SELECT * FROM category WHERE id=" . $_GET['id'];
$result = $conn->query($del);

if ($result->num_rows > 0) {
    while ($rows = $result->fetch_assoc()) {
        echo '<li><a href="delete_category.php?id=' . $rows['id'] . '" class="btn btn-outline-danger" onclick="return confirmDelete(event)">Delete</a></li>';
    }
}

$conn->close();
?>
</div>

    </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Your Website 2023</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
