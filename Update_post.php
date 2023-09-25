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
$post_id = $_GET['id'];
$sql = "SELECT * FROM post, category WHERE post.id='$post_id' ";
$result = $conn->query($sql);
$row = ($result->fetch_assoc());

echo '<form id="updateForm" action="#" method="POST" enctype="multipart/form-data">

    <div class="form-floating mb-3">
        <input class="form-control" name="name" id="name" type="text" value="' . $row['name'] . '" data-sb-validations="required" />
        <label for="name">Art Name</label>
        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
    </div>

    <div class="form-floating mb-3">
        <input class="form-control" name="description" id="description" type="text" value="' . $row['description'] . '" data-sb-validations="required" />
        <label for="description">Description</label>
        <div class="invalid-feedback" data-sb-feedback="description:required">A description is required.</div>
    </div>

    <div class="form-floating mb-3">
        <input class="form-control" name="author" id="author" type="text" value="' . $row['author'] . '" data-sb-validations="required" />
        <label for="author">Author</label>
        <div class="invalid-feedback" data-sb-feedback="author:required">An author is required.</div>
    </div>

    <div class="form-floating mb-3">
        <select class="form-select" aria-label="Default select example" name="category">';

    $sel = "SELECT * FROM category";
    $result_upd = $conn->query($sql);

if ($result_upd->num_rows > 0) {
    while ($rows = $result_upd->fetch_assoc()) {
        echo '<option value="' . $rows['cat_name'] . '">' . $rows['cat_name'] . '</option>';
    }
}

echo '</select>
        <label for="category">Category</label>
    </div>

    <div class="form-floating mb-3">
        <textarea class="form-control" name="body" id="body" style="height: 10rem" data-sb-validations="required"> ' . $row['body'] . '</textarea>
        <label for="body">Article</label>
        <div class="invalid-feedback" data-sb-feedback="body:required">An article is required.</div>
    </div>

    <input class="form-control" name="id" id="id" type="hidden" value="' . $row['id'] . '" />

    <div class="form-floating mb-3">
        <input type="file" name="image" value="' . $row['img'] . '" />
        <img src="image/'. $row['img'] . '" width="200" />
    </div>

    <div class="d-grid">
        <button class="btn btn-primary" type="submit">Go</button>
    </div>
</form>';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'connect.php';

    // Get the post data from the form

    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $pic = $_FILES['image'];
        $picname = $pic['name'];
        $pictmp = $pic['tmp_name'];
    } else {
        $picname = $row['img'];
    }

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $body = mysqli_real_escape_string($conn, $_POST['body']);
    $id = $_POST['id'];
    $author = mysqli_real_escape_string($conn, $_POST['author']);

    $todaydate = date("Y-m-d");

    $sql = "UPDATE post SET name='$name', description='$description', body='$body', img='$picname', author='$author', date='$todaydate' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "New post created successfully.";
        if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
            move_uploaded_file($pictmp, "image/$picname");
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    echo "<br>";

    // Close the database connection
    $conn->close();
}
?>

Thank you for visiting.
                          
                   </body>           
          </html>                  
                            
       