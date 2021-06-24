<?php
 session_start();
// If the user is not logged in redirect to the login page...
if($_SESSION['loggedin'] == false)
{
  header('location: logout.php');
}
else {
  include 'admin.php';
  $ad = new admin();
  $ad->getadmin();

  include("Adherent.php");
  $student = new Etudiant();
  $fetch = $student->GetEmprunt();
  $tech  = new Enseignant();
  $teacher = $tech->GetEmprunt();
  $nbrStu = $student->Count();
  $nbrTech = $tech->Count();
  include("Volume.php");
  $vol = new Volume();
  $reservation = $vol->Reservation();



}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Dashboard</title>

		<!-- Favicon -->
        <link rel="shortcut icon" href="assets/img/eca-logo.png">

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
					<a href="index.html" class="logo logo-small">
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
                  <?php  foreach ($reservation as $reser){ ?>

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
						<div class="row">
							<div class="col-sm-12">
								<h3 class="page-title">Welcome Admin!</h3>
								<ul class="breadcrumb">
									<li class="breadcrumb-item active">Dashboard</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /Page Header -->

					<!-- Overview Section -->
					<div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card bg-one">
								<div class="card-body">
									<div class="db-widgets d-flex justify-content-between align-items-center">
										<div class="db-icon">
											<i class="fas fa-user-graduate"></i>
										</div>
										<div class="db-info">
											<h3><?php echo $nbrStu; ?></h3>
											<h6>Students</h6>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card bg-two">
								<div class="card-body">
									<div class="db-widgets d-flex justify-content-between align-items-center">
										<div class="db-icon">
											<i class="fas fa-chalkboard-teacher"></i>
										</div>
										<div class="db-info">
											<h3><?php echo $nbrTech; ?></h3>
											<h6>Teachers</h6>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card bg-three">
								<div class="card-body">
									<div class="db-widgets d-flex justify-content-between align-items-center">
										<div class="db-icon">
											<i class="fas fa-building"></i>
										</div>
										<div class="db-info">
											<h3>4</h3>
											<h6>Department</h6>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card bg-four">
								<div class="card-body">
									<div class="db-widgets d-flex justify-content-between align-items-center">
										<div class="db-icon">
										<i class="fas fa-chart-pie"></i>
										</div>
										<div class="db-info">
											<h3>4</h3>
											<h6>Filière</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Overview Section -->
          <div class="row">
          <div class="col-md-6 d-flex">
            <!-- Feed Activity -->
            <div class="card flex-fill">
              <div class="card-header">
                <h5 class="card-title">Student Activity</h5>
              </div>
              <div class="card-body">
                <ul class="activity-feed">

                      <?php foreach ($fetch as $rmp) {
                       ?>
                  <li class="feed-item">
                    <div class="feed-date"><?php echo $rmp["date_emp"]." ".$rmp["dateRet"]; ?></div>
                    <span class="feed-text"><a> <?php echo $rmp["prenom"]." ".$rmp["nom_Adh"]; ?></a> empruté volume <a>"<?php echo $rmp["titre"]; ?>"</a></span>
                  </li>
                <?php } ?>

                </ul>
              </div>
            </div>
            <!-- /Feed Activity -->
          </div>
          <div class="col-md-6 d-flex">
  <!-- Feed Activity -->
  <div class="card flex-fill">
    <div class="card-header">
      <h5 class="card-title">Teacher Activity</h5>
    </div>
    <div class="card-body">
      <ul class="activity-feed">
        <?php foreach ($teacher as $prof){ ?>
        <li class="feed-item">
          <div class="feed-date"><?php echo $prof["date_emp"]." ".$prof["dateRet"]; ?></div>
          <span class="feed-text"><a><?php echo $prof["prenom"]." ".$prof["nom_Adh"]; ?></a> emprunté <a href="invoice.html"><?php echo $prof["titre"]; ?></a></span>
        </li>
      <?php } ?>
      </ul>
    </div>
  </div>
  <!-- /Feed Activity -->
</div>
</div>

				<!-- Footer -->
				<footer>
					<p>École Supérieure de Technologie - SAFI.</p>
				</footer>
				<!-- /Footer -->

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

		<!-- Chart JS -->
		<script src="assets/plugins/apexchart/apexcharts.min.js"></script>
		<script src="assets/plugins/apexchart/chart-data.js"></script>

		<!-- Custom JS -->
		<script  src="assets/js/script.js"></script>

    </body>
</html>
