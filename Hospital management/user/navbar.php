<?php
include('security.php');
$role=$_SESSION['role'];
if($role=='admin')
{
	$ea=$_SESSION['ea'];
	$da=$_SESSION['da'];
	$an=$_SESSION['an'];
}
?>
<body>
	<div class="wrapper compact-wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<?php 
			$headcolor=($role=='admin')? "orange" :(($role=='staff')? "light-blue" : (($role=='doctor')? "purple":"white"));
			$headcolor2=($role=='admin')? "orange2" :(($role=='staff')? "light-blue2" : (($role=='doctor')? "purple2":"white"));
			?>		
			<div class="logo-header" data-background-color='<?php echo $headcolor; ?>' >
				<a href="main.php"  class="logo">					
					<!-- <img class='navbar-brand' src='../image/Online-Attendance-logo3.png'> -->
					<b style="color: white">Renal Projects</b>
				</a>				
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
			</div>
			<!-- End Logo Header -->
			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color='<?php echo $headcolor2; ?>'>
				<div class="container-fluid">
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">

							<?php
							$id=$_SESSION['id'];
							$query="SELECT * FROM $role WHERE id=$id";
							$sql=mysqli_query($connection,$query);
							if (mysqli_num_rows($sql)>0) {
								while ($row=mysqli_fetch_assoc($sql)) {
									?>
									<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
										<div class="avatar-sm">
											<?php echo "<img src='../image/".$row['image']."' class='avatar-img rounded-circle'/>";?>
										</div>
									</a>
									<!-- <ul class="dropdown-menu dropdown-user animated fadeIn">
										<div class="dropdown-user-scroll scrollbar-outer">
											<li>
												<div class="user-box">
													<div class="avatar-lg">
														<?php echo "<img src='../image/".$row['image']."' class='avatar-img rounded-circle'/>";?>
													</div>
													<div class="u-text">
														<h4><?php echo $row['name'];?></h4>
														<p class="text-muted"><?php echo $row['email'];?></p>
														<button type="button" class="btn btn-xs btn-secondary btn-sm" data-toggle="modal" data-target="#vaddadminprofile">View Profile</button>
													</div>
												</div>
											</li>
											<li>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="#">Inbox</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="profile.php">Account Setting</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item"  data-toggle="modal" data-target="#logoutModal">Logout</a>
											</li>
										</div>
									</ul> -->		
								</li>
							</ul>
						</div>
					</nav>
					<!-- End Navbar -->
				</div>
				<!-- Logout Modal-->
				<div class="modal fade" id="logoutModal" tabmain="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
								<button class="close" type="button" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">×</span>
								</button>
							</div>
							<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
							<div class="modal-footer">
								<form action="logout.php" method="POST">
									<button class="btn btn-danger" type="button" data-dismiss="modal">
										<span class="btn-label"><i class="fa fa-exclamation-circle"></i>Cancel</span>
									</button>
									<button type="submit" name="logout_btn" class="btn btn-success">
										<span class="btn-label"><i class="fa fa-check"></i>Logout</span>
									</button>					
								</form>

							</div>
						</div>
					</div>
				</div>
				<!-- Sidebar -->
				<div class="sidebar sidebar-style-2 ">			
					<div class="sidebar-wrapper scrollbar scrollbar-inner">
						<div class="sidebar-content">						
							<ul class="nav nav-primary ">
								<li class="nav-item">
									<a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
										<?php $rl=$_SESSION['role'];
										$ravtar=($rl=='admin')?"fas fa-user-edit":(($rl=='staff')?"fas fa-user-edit":(($rl=='doctor')?"fas fa-user-md":"fas fa-user")); ?>
										<i class='<?php echo($ravtar); ?>'></i>
										<p style="text-transform: capitalize;"><?php echo $_SESSION['role'].' Login';?></p>
									</a>
								</li>
								<li class="nav-item ">
									<a  href="main.php" >
										<i class="fas fa-home"></i>
										<p>Home</p>
									</a>
								</li>
								<?php if ($role=="admin") {
									?>
									<li class="nav-item">
										<a href="admin.php">
											<i class="fas fa-user-tie"></i>
											<p>Admin</p>
										</a>
									</li>
									<li class="nav-item">
										<a href="doctor.php">
											<i class="fas fa-stethoscope"></i>
											<p>Doctors</p>
										</a>
									</li>
									<li class="nav-item">
										<a  href="branch.php">
											<i class="fas fa-code-branch"></i>
											<p>Branches</p>
										</a>
									</li>
									<li class="nav-item">
										<a  href="staff.php">
											<i class="fas fa-users"></i>
											<p>Staff</p>
										</a>
									</li>
								<?php } ?>
								<?php if ($role=="staff") {?>
									<li class="nav-item">
										<a  href="patient.php">
											<i class="fas fa-user-plus"></i>
											<p>Add Patient</p>
										</a>
									</li>
								<?php } ?>
								<?php if ($role=="doctor") {
									?>
									<li class="nav-item">
										<a  href="staff.php">
											<i class="fas fa-users"></i>
											<p>Staff</p>
										</a>
									</li>
								<?php } ?>								
								<li class="nav-item">							
									<a class="dropdown-item" href="profile.php">
										<i class="fas fa-user-cog"></i>	
										<p>My Profile</p>
									</a>
								</li>
								<li class="nav-item">
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
										<i class="fas fa-sign-out-alt fa-mx fa-fw mr-1 text-gray-800"></i>
										<p>Logout</p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- End Sidebar -->
				<!-- <div class="modal fade" id="vaddadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">My Proflie </h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="row">
								<center>
									<div class="col-md-1"></div>
									<div class="col-md-3">
										<div class="avatar-lg">
											<?php echo "<img src='../image/".$row['image']."' class='avatar-img avatar-xl rounded'/>";?>
										</div>										
									</div>
								</center>
								<div class="col-md-9">
									<form method="POST" enctype="multipart/form-data"><div class="modal-body">
										<div class="form-group">
											<label> Name </label> <?php echo $row['name'];?>
										</div>
										<div class="form-group">
											<label> Email </label> <?php echo $row['email'];?>
										</div>
										<div class="form-group">
											<label> Contact </label> <?php echo $row['mono'];?>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div> -->
			<?php
		}
	}?>
	<div class="main-panel">
		<div class="content">