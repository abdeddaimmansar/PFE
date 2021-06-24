<?php
session_start();
if($_SESSION['loggedin'] == false)
{
  header('location: logout.php');
}
else {
  include 'admin.php';
  $ad = new admin();
  $ad->getadmin();

}



 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Profile</title>

		<!-- Favicon -->
        <link rel="shortcut icon" href="assets/img/favicon.png">

		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

		<!-- Main CSS -->
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>

		<!-- Main Wrapper -->
        <div class="main-wrapper">

			<!-- Header -->
            <div class="header">

				<!-- Logo -->
                <div class="header-left">
                    <a href="index.php" class="logo">
						<img src="assets/img/eca-logo.png" alt="Logo">
					</a>
					<a href="index.php" class="logo logo-small">
            <img src="assets/img/Cadi-Ayyad-logo.png" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->

				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fas fa-align-left"></i>
				</a>

			 

				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fas fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->

				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					<!-- Notifications -->
					<li class="nav-item dropdown noti-dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i class="far fa-bell"></i> <span class="badge badge-pill"></span>
						</a>
            <div class="noti-content">
              <ul class="notification-list">


                <li class="notification-message">
                  <a href="#">
                    <div class="media">


                    </div>
                  </a>
                </li>

              </ul>
            </div>
					</li>
					<!-- /Notifications -->

					<!-- User Menu -->
          <li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="<?php echo $_SESSION['admin']['image']; ?>" width="31" alt="<?php  echo $_SESSION['admin']['image']; ?>"></span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="<?php echo  $_SESSION['admin']['image']; ?>" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6><?php echo $_SESSION['admin']['nom_adm']." ".$_SESSION['admin']['prenom']; ?></h6>
									<p class="text-muted mb-0">Administrateur</p>
								</div>
							</div>
							<a class="dropdown-item" href="profile.php">My Profile</a>
							<a class="dropdown-item" href="logout.php">Logout</a>
						</div>
					</li>
					<!-- /User Menu -->

				</ul>
				<!-- /Header Right Menu -->

            </div>
			<!-- /Header -->

			<!-- Sidebar -->
      <div class="sidebar" id="sidebar">
          <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <li class="menu-title">
          <span>Main Menu</span>
        </li>
        <li class="active">
          <a href="index.php"><i class="fas fa-th-large"></i> <span>Dashboard</span></a>
        </li>
        <li class="submenu">
          <a href="#"><i class="fas fa-user-graduate"></i> <span> Students</span> <span class="menu-arrow"></span></a>
          <ul>

           <li><a href="students.php">Student List</a></li>
            <li><a href="add-student.php">Student Add</a></li>

          </ul>
        </li>
        <li class="submenu">
          <a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Teachers</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="teachers.php">Teacher List</a></li>
            <li><a href="add-teacher.php">Teacher Add</a></li>

          </ul>
        </li>
        <li class="submenu">
          <a href="#"><i class="fas fa-building"></i> <span> Liste des emprunteurs</span> <span class="menu-arrow"></span></a>
          <ul>

            <li><a href="emprunte-etudiants.php">Liste des étudiants</a></li>
            <li><a href="emprunte-enseignants.php">Liste des enseignants</a></li>
            <li> <a href="add-emprunteur.php">add emprunteur</a> </li>
          </ul>
        </li>
        <li class="submenu">
          <a href="#"><i class="fas fa-book-reader"></i> <span> Library</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="#"><i class="fas fa-book-reader"></i> <span> Categorie</span> <span class="menu-arrow"></span></a>
                <ul>
                  <li><a href="categorie.php"> List</a></li>
                  <li><a href="add-categorie.php">Add</a></li>
                </ul>
            </li>
            <li>
              <a href="#"><i class="fas fa-book"></i> <span>volumes</span><span class="menu-arrow"></span></a>
               <ul>
            <li>
                 <a href="#"><i class="fas fa-book"></i> <span>Livres</span><span class="menu-arrow"></span></a>
                  <ul>

                 <li><a href="livres.php"> List</a></li>
                 <li><a href="add-livre.php"> Add</a></li>

                   </ul>
            </li>

            <li>
                 <a href="#"><i class="fas fa-book"></i> <span>Polycopes</span><span class="menu-arrow"></span></a>
                  <ul>

                 <li><a href="polycopes.php"> List</a></li>
                 <li><a href="add-polycope.php"> Add</a></li>

                   </ul>
            </li>

            <li>
                 <a href="#"><i class="fas fa-book"></i> <span>Dictionnaire</span><span class="menu-arrow"></span></a>
                  <ul>

                    <li><a href="Dictionnaire.php"> List</a></li>
                    <li><a href="add-dictionnaire.php"> Add</a></li>
                   </ul>
            </li>


          </ul>
        </li>











      </ul>
    </div>
          </div>
      </div>
			<!-- /Sidebar -->

			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">

					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col">
								<h3 class="page-title">Profile</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
									<li class="breadcrumb-item active">Profile</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<div class="row">
						<div class="col-md-12">
							<div class="profile-header">
								<div class="row align-items-center">
									<div class="col-auto profile-image">
										<a href="#">
											<img class="rounded-circle" alt="User Image" src="<?php echo $_SESSION['admin']['image']; ?>">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0"><?php echo $_SESSION['admin']['nom_adm']." ".$_SESSION['admin']['prenom']; ?>.</h4>
										<h6 class="text-muted">Administrateur</h6>
										<div class="user-Location"><i class="fas fa-map-marker-alt"></i> SAFI, Maroc</div>
										<div class="about-text">Responsable de la Bibliothèque.</div>
									</div>
									<div class="col-auto profile-btn">

										<a href="" class="btn btn-primary" id="click">
											Edit
										</a>
									</div>
								</div>
							</div>
							<div class="profile-menu">
								<ul class="nav nav-tabs nav-tabs-solid">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#per_details_tab">About</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#password_tab">Password</a>
									</li>
								</ul>
							</div>
							<div class="tab-content profile-tab-cont">

								<!-- Personal Details Tab -->
								<div class="tab-pane fade show active" id="per_details_tab">

									<!-- Personal Details -->
									<div class="row">
										<div class="col-lg-9">
											<div class="card">
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span>

														<a class="edit-link"  href="Edit-admin.php"><i class="far fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Nom</p>
														<p class="col-sm-9"><?php echo $_SESSION['admin']['nom_adm']; ?> </p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Prénom</p>
														<p class="col-sm-9"><?php echo $_SESSION['admin']['prenom']; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email</p>
														<p class="col-sm-9"><?php echo $_SESSION['admin']['email']; ?></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Téléphone</p>
														<p class="col-sm-9"><?php echo $_SESSION['admin']['tele']; ?></p>
													</div>

												</div>
											</div>

										</div>

										<div class="col-lg-3" style="display: none;" id="folks" >

                         <h1>hello folks!!</h1>



										</div>
									</div>
									<!-- /Personal Details -->

								</div>
								<!-- /Personal Details Tab -->

								<!-- Change Password Tab -->
								<div id="password_tab" class="tab-pane fade">

									<div class="card">
										<div class="card-body">
                      <form class="" action="changepassword.php" method="post">


											<h5 class="card-title">Change Password</h5>
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form>
														<div class="form-group">
															<label>Old Password</label>
															<input type="password" name="password" class="form-control">
														</div>
														<div class="form-group">
															<label>New Password</label>
															<input type="password" name="pass1" class="form-control">
														</div>
														<div class="form-group">
															<label>Confirm Password</label>
															<input type="password" name="pass2" class="form-control">
														</div>
														<button class="btn btn-primary" type="submit" name="savepassword">Save Changes</button>
													</form>
												</div>
											</div>
                    </form>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->

							</div>
						</div>
					</div>

				</div>
			</div>
			<!-- /Page Wrapper -->

        </div>
		<!-- /Main Wrapper -->

		<!-- jQuery -->
        <script src="assets/js/jquery-3.5.1.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

		<!-- Slimscroll JS -->
        <script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>

		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>

    </body>
</html>
