<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tamem articles test project</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    <title>update article</title>
</head>
<body class="d-flex flex-column">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html">sign up</a>
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
            <!-- Page content-->
            <section class="py-5">
                <div class="container px-5">
                    <!-- Contact form-->
                    <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                        <div class="text-center mb-5">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                            <h1 class="fw-bolder">Get in touch</h1>
                            <p class="lead fw-normal text-muted mb-0">We'd love to hear from you</p>
                        </div>
                        <div class="row gx-5 justify-content-center">
                            <div class="col-lg-8 col-xl-6">
                            <div class="mb-3">
                                <?php 
                                include 'connect.php';
                                $post_id=$_GET['id'];
                                $sql="SELECT * from post WHERE id='$post_id' ";
                                $result = $conn->query($sql);
                               $row=($result->fetch_assoc());
                                echo '<form id="updateForm" action="#" method="POST" enctype="multipart/form-data">>

                                        <input class="form-control" name="name" id="name" type="text" value="'.$row['name'].'" data-sb-validations="required" />
                                        <label for="name">art name</label>
                                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                                    </div>
                                    
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="description" id="description" type="text" value="'.$row['description'].'" data-sb-validations="required" />
                                        <label for="text">description</label>
                                        <div class="invalid-feedback" data-sb-feedback="required">A description is required.</div>
                                        
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="author" id="author" type="text" value="'.$row['author'].'" data-sb-validations="required" />
                                        <label for="text">author</label>
                                        <div class="invalid-feedback" data-sb-feedback="required">An author is required.</div>
                                        
                                    </div>
                                    
                                    </div>
                                    <!-- Message input-->
                                    <div class="form-floating mb-3">
                                        <textarea class="form-control" name="body" id="body" type="text"  style="height: 10rem" data-sb-validations="required">'.$row['body'].'</textarea>
                                        <label for="artical">artical</label>
                                        <div class="invalid-feedback" data-sb-feedback="message:required">An artical is required.</div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" name="id" id="id" type="hidden" value="'.$row['id'].'" />
                                        
                                        
                                        
                                    </div>
                                    <div>
                                    <div class="form-floating mb-3">
                                        <input type="file" name="image" value="'.$row['img'].'" >
                                        <img src="image/'.$row['img'].'" width=200 >
                                    <!-- Submit success message-->
                                    <!---->
                                    <!-- This is what your users will see when the form-->
                                    <!-- has successfully submitted-->
                                    <div class="d-none" id="submitSuccessMessage">
                                        <div class="text-center mb-3">
                                            <div class="fw-bolder"> <a href="insert_art.php">wait a second </a></div>
                                            To activate this form, sign up at
                                            <br />
                                           
                                        </div>
                                    </div>
                                    <!-- Submit error message-->
                                    <!---->
                                    <!-- This is what your users will see when there is-->
                                    <!-- an error submitting the form-->
                                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                                    <!-- Submit Button-->
                                    <div class="d-grid"><button class="btn btn-primary" type="submit">Go</button>
</div>
                                                                    
                                  
                                   
                                </form> ';
                                
                                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                
                                    //                  $db_host = 'localhost'; // Replace with your database host
                                    //$db_name = 'articals'; // Replace with your database name
                                    //$db_user = 'root'; // Replace with your database username
                                    //$db_pass = ''; // Replace with your database password
                            
                                    // Create a database connection
                                    //$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
                            
                                    // Check the connection
                                    //if ($conn->connect_error) {
                                       // die("Connection failed: " . $conn->connect_error);
                                    //}
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
                                        if ($_FILES['image']['error'] === UPLOAD_ERR_OK){
                                        move_uploaded_file($pictmp, "image/$picname");}
                                    } else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                    }
                                    
                                    echo "<br>";
                                    // Close the database connection
                                    $conn->close();}?>
                                thank you for visiting 
                            </div>
                            </div>
                          
                   </body>           
          </html>                  
                            
       