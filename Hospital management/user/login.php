<?php
include('header.php');
?>
<div class="page-inner mt--5">
	<div class="container">
		<style type="text/css">
			.wave{
				position: fixed;
				bottom: 0;
				left: 0;
				height: 100%;
				width: 100%;
				z-index: -1;
			}
		</style>
		<img class="wave" src="../image/bgfrp4.png" alt="Online attendance" />
		
		<div class="row justify-content-center">

			<div class="col-xl-6 col-lg-6 col-md-6">

				<div class="card o-hidden border-0 shadow-lg my-5 " style="border-bottom-right-radius:40px;
				border-bottom-left-radius:40px;">
				<div class="card-body p-1 ">

					<!-- Nested Row within Card Body -->
					<div class="row">
						<div class="col-lg-12">
							<div class="p-2">
								<a href="#" ><button  type="submit" name="submit" value="submit" class="btn btn- btn-user btn-block"style="background-color:rgb(47, 217, 119)">
									<span class="btn-label">
										<img src="../image/Online-Attendance-n2.png" alt="">
									HOME </span>
								</button></a><br>
								<div class="text-center">
									<h2 class="h2 text-gray-1000 mb-2">Login Here!</h2>
								</div>
								<form class="user" action="lhb.php" method="POST">

									<div class="form-group">
										<center><label for="smallSelect">Who You?</label></center>
										<select class="form-control form-control-sm" id="smallSelect" name="role" required="">
											<option value="staff">Staff</option>
											<option value="admin">Admin</option>
											<option value="doctor">Doctor</option>
										</select>
									</div>
									<div class="form-group">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">@</span>
											</div>
											<input type="email" class="form-control" placeholder="Email" aria-label="Username" name="Email" value="" aria-describedby="basic-addon1" id="email" required="Enter Email"/>
										</div>
									</div>
									<div class="form-group">
										<div class="input-group mb-1">
											<div class="input-group-prepend">
												<span class="input-group-text" id="basic-addon1">***</span>
											</div>
											<input type="password" name="Password" class="form-control" value="" placeholder="Password" aria-label="Username" aria-describedby="basic-addon1" id="pass" required="Enter Password"/>
										</div>
									</div>
									<div class="form-group" style="text-align:center;">
										<div class="custom-control custom-checkbox">
											<input  type="checkbox" name="rm" class="custom-control-input" id="switch1" >
											<label class="custom-control-label" for="switch1"> Remember me</label>
										</div>
									</div>
									<button type="submit" name="submit" value="submit" class="btn btn-primary btn-user btn-block">
										<span class="btn-label">
											<i class="fa fa-check"></i>
										</span>Login 
									</button>
								</form>
								<hr>
								<div class="text-center">
									<form class="user"> 
										<h5>
											<a href="#">
												<span class="btn btn-danger">
													<span class="btn-label">
														<i class="fa fa-exclamation-circle"></i>
													</span>Forger Password?
												</span>
											</a>
										</h5>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div> 
<?php
if (isset($_COOKIE['email']) and isset($_COOKIE['pass'])) 
{
	$email=$_COOKIE['email'];
	$pass=$_COOKIE['pass'];
	echo "<script>
	document.getElementById('email').value='$email';
	document.getElementById('pass').value='$pass';
	</script>";
}
include('footer.php');
include('script.php');
?>