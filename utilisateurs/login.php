<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Login</title>

		<!-- Favicon -->
        <link rel="shortcut icon" href="assets/img/favicon.png">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style1.css">
    </head>
    <body>
    

		<!-- Main Wrapper -->
        <div class="main-wrapper login-body" style="background-image: url(/utilisateurs/assets/img/ecole.png); background-repeat: no-repeat;background-size: cover;po">
                <nav class="navbar site-header sticky-top py-1 p-2 px-md-6 bg-dark ">
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/eca-logo.png" height="80px" alt="">
                    </a>
                 </nav>    
            <div class="login-wrapper">
            	<div class="container">
                	<div class="loginbox">
                    	<div class="login-left">
                        </div>
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Login</h1>
								<p class="account-subtitle">Access to our dashboard</p>

                                <!-- Form -->
                                <form action="verify.php" method="POST">
                                
                                
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <select class="form-control" id="select" name="select">
                                            <option  value="0">Êtes-vous un/une:</option>
                                            <option  value="1" style="color:red;font-weight: bold;">Enseignant</option>
                                            <option  value="2" style="color:red;font-weight: bold;">Etudiant</option>
                                           
                                        </select>
                                    </div>
                                </div>

                                    <div class="form-group">
                                        <input class="form-control" type="text" name="username" placeholder="username">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password" name="pass" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
                                    </div>
                                        <?php
                                        if (isset($_GET['result'])) {
                                        if($_GET['result'] == 2) {echo "username or password not correct!";}

                                        }
                                        ?>
                                </form>
                                <!-- /Form -->

                            <div class="text-center forgotpass"><a  href="forgot-password.html">Forgot Password?</a></div>
                            <div class="login-or">


								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="assets/js/jquery-3.5.1.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>

    </body>
</html>