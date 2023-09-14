<?php

  include("Includes/header.php");
  include("Includes/navbar.php");
if(isset($_SESSION['auth'])){
	$_SESSION['message'] = "Your Are Loged In ";
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
					<?php include("message.php"); ?>
				<div class="card">
				
					<div class="card-header">
						<h4>Register Here</h4>
                    </div>
					<div class="card-body">
  					<form id="login-form" action="register_code.php" method="POST" >
					  <div class="form-group mb-3">
  							<label for="username" class="control-label">Name</label>
  							<input required type="text" id="username" name="name" class="form-control">
  						</div>
  						<div class="form-group">
  							<label for="username" class="control-label">Email</label>
  							<input required type="text" id="username" name="email" class="form-control">
  						</div>

  						<div class="form-group">
  							<label for="password" class="control-label">Password</label>
  							<input required type="password" id="txtPassword" name="password" class="form-control">
                           
  						</div>
						  <div class="form-group mb-3 ">
  							<label for="password" class="control-label">Confirm Password</label>
  							<input required type="password" id="txtPassword" name="cpassword" class="form-control">
                           
  						</div>

            
  						<center><button type="submit" name="register_btn" class="btn btn-block btn-wave col-md-4 btn-primary">Register Now</button></center>
  					</form>
  				</div>
					</div>
				</div>
		</div>
	</div>
</div>
<?php
include("Includes/footer.php");
?>