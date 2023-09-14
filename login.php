<?php

  include("Includes/header.php");
  include("Includes/navbar.php");
if(isset($_SESSION['auth'])){

	if(!isset($_SESSION['message'])){
	$_SESSION['message'] = "Your Are Loged In ";
	}
	header('Location:index.php');
	exit(0);
}


?>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    background: #007bff;
	}
	.card{
		background: white;
	}
</style>
<div class="py-5">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-5">
				<?php include("message.php")?>
				<div class="card">
					
					<div class="card-header">
						<h4>LogIn Here</h4>
					<div class="card-body">
  					<form id="login-form" action="loginauth.php" method="POST" >
					  
  						<div class="form-group">
  							<label for="username" class="control-label">Email</label>
  							<input type="text" id="username" name="email" class="form-control">
  						</div>

  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input type="password" id="txtPassword" name="password" class="form-control">
                           
  						</div>
						  <div class="form-check mt-2">
                                <input class="form-check-input" onclick="showPassword()" type="checkbox" value="" id="flexCheckChecked" >
                                <label class="form-check-label" for="flexCheckChecked">
                                    Show-Password
                                </label>
                            </div>
  						<center><button type="submit" name="login_btn" class="btn btn-block btn-wave col-md-4 btn-primary">Login Now</button></center>
  					</form>
  				</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include("Includes/footer.php") ?>