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
                            
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
  <!-- Name input -->
  <div class="form-floating mb-3">
    <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
    <label for="name">Username</label>
    <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
  </div>
  <!-- Email address input -->
  <div class="form-floating mb-3">
    <input class="form-control" id="email" type="email" placeholder="example.com" data-sb-validations="email:required" />
    <label for="email">Email</label>
    <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
  </div>
  <!-- Password input -->
  <div class="form-floating mb-3">
    <input class="form-control" id="password" type="password" data-sb-validations="required" name="password"
      pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$" required
      placeholder="Invalid password. It must contain an uppercase letter, a lowercase letter, a number, a special character, and be at least 8 characters long." />
    <div class="invalid-feedback" data-sb-feedback="required">Invalid password. It must contain an uppercase letter, a lowercase letter, a number, a special character, and be at least 8 characters long.</div>
  </div>
  <!-- Submit success message -->
  <div class="d-none" id="submitSuccessMessage">
    <div class="text-center mb-3">
      <div class="fw-bolder"><a href="insert_art.php">Wait a second</a></div>
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
    <button class="btn btn-primary btn-lg enabled" name="submitButton" type="submit">Go</button>
  </div>
</form>
                            </div>
                        </div>
                    </div>
                </body>
</html>
