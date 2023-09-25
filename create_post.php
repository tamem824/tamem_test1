
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>ARTICLE</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
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
            <a class="navbar-brand" href="#">
                <?php 
                require 'connect.php';
                $select="SELECT * from category ";
                $result_category=$conn->query($select);
                if($result_category->num_rows>0){
                    while($row=$result_category->fetch_assoc()){
                        echo $row['cat_name']." ";
                    }
                }
                ?></a>
            <a class="navbar-brand" href="#?id=">all posts</a>
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
                             require 'connect.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        

        // Get the post data from the form
        $pic=$_FILES["img"];
        $picname=$pic["name"];
        $pictmp=$pic["tmp_name"];
        $name = $_POST['name'];
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $body = mysqli_real_escape_string($conn, $_POST['body']);
        $author=$_POST['author'];
        $date=$_POST['date'];
        $category=$_POST['category'];
        $cat_id_query = "SELECT id FROM category WHERE cat_name='$category'";
        $cat_id_result = $conn->query($cat_id_query);
        $cat_id_row = $cat_id_result->fetch_assoc();
        $cat_id = $cat_id_row['id'];

         
         

        // Insert the new post into the database
        $sql = "INSERT INTO post (name, description,body,img,author,date,category_id) VALUES ('$name', '$description','$body','$picname','$author','$date','$cat_id')";

        if ($conn->query($sql) === TRUE) {
            echo "New post created successfully.";
            
            move_uploaded_file($pictmp,"image/$picname");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
                    ?>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                    <!-- Name input -->
                    <div class="form-floating mb-3">
                    <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                    <label for="name">Art Name</label>
                    <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                    <!-- Description input -->
                    <div class="form-floating mb-3">
                    <input class="form-control" name="description" id="description" type="text" placeholder="Anything to make them read" data-sb-validations="required" />
                    <label for="description">Description</label>
                    <div class="invalid-feedback" data-sb-feedback="description:required">A description is required.</div>
                    </div>
                    <!-- Article input -->
                    <div class="form-floating mb-3">
                    <textarea class="form-control" name="body" id="the_articles" placeholder="Enter your article here..." style="height: 10rem" data-sb-validations="required"></textarea>
                    <label for="the_articles">Article</label>
                    <div class="invalid-feedback" data-sb-feedback="body:required">An article is required.</div>
                    </div>
                    <!-- Author input -->
                    <div class="form-floating mb-3">
                    <input class="form-control" name="author" id="author" type="text" placeholder="Author" data-sb-validations="required" />
                    <label for="author">Author</label>
                    <div class="invalid-feedback" data-sb-feedback="author:required">An author is required.</div>
                    </div>
                    <!-- Category select -->
                    <div class="form-floating mb-3">
                    <select class="form-select" aria-label="Default select example" name="category">
                    <?php
                    include 'connect.php';
                    $sql = "SELECT * FROM category";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<option value="' . $row['cat_name'] . '">' . $row['cat_name'] . '</option>';
                        }
                    }
                    ?>
                    </select>
                    <label for="category">Category</label>
                    </div>
                    <!-- Date input -->
                    <div class="form-floating mb-3">
                    <input class="form-control" name="date" id="date" type="date" placeholder="Date" />
                    <label for="date">Date</label>
                    </div>
                    <!-- Image input -->
                    <div class="form-floating mb-3">
                    <input class="form-control" name="img" id="img" type="file" placeholder="Add photo" />
                    <label for="img">Image</label>
                    </div>
                    <!-- Submit success message -->
                    <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center mb-3">
                    <div class="fw-bolder">Wait a second</div>
                    To activate this form, sign up at
                    <br />
                    </div>
                    </div>
                    <!-- Submit error message -->
                    <div class="d-none" id="submitErrorMessage">
                    <div class="text-center text-danger mb-3">Error sending message!</div>
                    </div>
                    <!-- Submit Button -->
                    <div class="d-grid">
                    <button class="btn btn-primary btn-lg" name="submitButton" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
                   
</body>
</html>
