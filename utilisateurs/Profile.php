

<?php
include_once 'nav.php';
?>

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
											<img class="rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
										</a>
									</div>
									<div class="col ml-md-n2 profile-user-info">
										<h4 class="user-name mb-0">Rawbati Ilham.</h4>
										<h6 class="text-muted">Administrateur</h6>
										<div class="user-Location"><i class="fas fa-map-marker-alt"></i> SAFI, Maroc</div>
										<div class="about-text">Responsable de la Bibliothèque.</div>
                                	</div>
                                    <div class="col-auto profile-btn ">
										<a href="" class="btn btn-primary " style="height:40px;">
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
											<div class="card" >
												<div class="card-body">
													<h5 class="card-title d-flex justify-content-between">
														<span>Personal Details</span>
														<a class="edit-link" data-toggle="modal" href="#edit_personal_details"><i class="far fa-edit mr-1"></i>Edit</a>
													</h5>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Nom</p>
														<p class="col-sm-9">Rawbati </p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Prénom</p>
														<p class="col-sm-9">Ilham</p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Email</p>
														<p class="col-sm-9"></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0 mb-sm-3">Téléphone</p>
														<p class="col-sm-9"></p>
													</div>
													<div class="row">
														<p class="col-sm-3 text-muted text-sm-right mb-0">Adresse</p>
														<p class="col-sm-9 mb-0">,<br>
														,<br>
														,<br>
														.</p>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-3">
										</div>
									</div>
									<!-- /Personal Details -->
								</div>
								<!-- /Personal Details Tab -->
								<!-- Change Password Tab -->
								
								
								<div id="password_tab" class="tab-pane fade ">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">Change Password</h5>
											
											<div class="row">
												<div class="col-md-10 col-lg-6">
													<form action="savePass.php" method="post" enctype="multipart/form-data" onSubmit="return valid();">
													<?php if (isset($_GET["error"])) { ?>
													<p class="error" style="color:red"><?php echo $_GET[ 'error']; ?></p>
													<?php } ?>
														<div class="form-group">
															<label>Old Password</label>
															<input type="password" name="oldpass" required  class="form-control " placeholder="Old Password" >
														</div>
														<div class="form-group">
															<label>New Password</label>
															<input type="password" name="newpass" required class="form-control" placeholder="New Password"  >
														</div>
														<div class="form-group">
															<label>Confirm New Password</label>
															<input type="password" name="newpassagain" required class=" form-control" placeholder="Confirm New Password" >
														</div>
														<button class="btn btn-primary" [disabled]="oldpass.errors?.required || newpass.errors?.required || newpassagain.errors?.required"  type="submit" onClick='return confirmation();'>Save Changes</button>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- /Change Password Tab -->
							</div>
						</div>
					</div>
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