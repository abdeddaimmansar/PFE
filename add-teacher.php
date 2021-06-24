<?php
session_start();
if($_SESSION['loggedin']== false)
{
  header("location: logout.php");
}

 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title> Teachers</title>

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
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Notifications</span>
								<a href="javascript:void(0)" class="clear-noti"> Clear All </a>
							</div>
							<div class="noti-content">
								<ul class="notification-list">
                  <?php
                  include("Volume.php");
                  $vol = new Volume();
                  $reservation = $vol->Reservation();
                   foreach ($reservation as $reser){ ?>

									<li class="notification-message">
										<a href="#">
											<div class="media">
                       <?php echo $reser["nom_Adh"]." Reserver Volume  ".$reser["titre"]; ?>

											</div>
										</a>
									</li>
                <?php } ?>
								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a href="reservations.php">View all Notifications</a>
							</div>
						</div>
					</li>
					<!-- /Notifications -->

					<!-- User Menu -->
          <li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="<?php echo $_SESSION['admin']['image']; ?>" width="31" alt="Ryan Taylor"></span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="<?php echo $_SESSION['admin']['image']; ?>" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6><?php echo $_SESSION['admin']['nom_adm']." ".$_SESSION['admin']['prenom']; ?></h6>
									<p class="text-muted mb-0">Administrateur</p>
								</div>
							</div>
							<a class="dropdown-item" href="profile.php">My Profile</a>
							<a class="dropdown-item" href="login.php">Logout</a>
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
            <li><a href="add-emprunteur.php">Add emprunteur</a></li>
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

        <li class="submenu">
          <a href="#"><i class="fas fa-inbox"></i> <span>Reservations</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a href="reservations.php">les Reservations</a></li>


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
						<div class="row align-items-center">
							<div class="col">
								<h3 class="page-title">Add Teachers</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="teachers.php">Teachers</a></li>
									<li class="breadcrumb-item active">Add Teachers</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

          <div class="row">
						<div class="col-sm-12">

							<div class="card">
								<div class="card-body">
									<form action="savenewTeacher.php" method="post" enctype="multipart/form-data".  >
										<div class="row">
											<div class="col-12">
												<h5 class="form-title"><span>Teacher Information</span></h5>
											</div>
                      <div class="col-12 col-sm-6">
												<div class="form-group">
													<label>CIN</label>
													<input type="text" name="cin" class="form-control">
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Nom</label>
													<input type="text" name="txtNom" class="form-control">
												</div>
											</div>
											<div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Prénom</label>
													<input type="text" name="txtPrenom" class="form-control">
												</div>
											</div>

                      <div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Image</label>
													<input type="file" name="photo" class="form-control">
												</div>
											</div>

                      <div class="col-12 col-sm-6">
												<div class="form-group">
													<label>Department</label>
													<select class="form-control" name="seldep">
                            <option>select</option>
                            <option>GI</option>
                            <option>TM</option>
                            <option>GIM</option>
                            <option>TIMQ</option>
													</select>
												</div>
											</div>
                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label>Téléphone</label>
                          <input type="text" name="tele" class="form-control">
                        </div>
                      </div>


                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text"  name="email" class="form-control">
                        </div>
                      </div>


                      <div class="col-12 col-sm-6">
                        <div class="form-group">
                          <label>nbr_emprunt</label>
                          <input type="text" name="nbr" class="form-control">
                        </div>
                      </div>



											</div>

											<div class="col-12">
												<button type="submit"  name="save" class="btn btn-primary">Ajouter</button>
											</div>
										</div>
<?php
	$fullUrl="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	if(strrpos($fullUrl,"empty")==true){
		echo"<p style='font-size:15px; color:red; font-weight:500;margin-top:25px'>Veuillez remplir tout les champs ! </p> ";
		exit();
	}
 ?>
									</form>
								</div>
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
		<script src="assets/js/script.js"></script>
    </body>
</html>
