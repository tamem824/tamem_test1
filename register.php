<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content />
        <meta name="author" content />
        <title>Modern Business - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
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
                            <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                        
                            
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
