<?php 
define("LOGIN", 1);
include 'header.php';
?>

<div class="container">
	<div class="row mt-5">
		<div class="col-md-6 offset-md-3">
			<div class="card">
				<div class="card-header text-center bg-primary text-white">
					<h2>Login</h2>
				</div>
				<div class="card-body">
					<form id="loginForm">
						<div class="form-group mb-3">
							<label class="h5" for="username"><i class="fa fa-user m-1"></i> Username: </label><input type="text" name="username" id="username" required="required" class="form-control" autofocus="">
						</div>
						<div class="form-group mb-3">
							<label class="h5" for="password"><i class="fa fa-lock m-1"></i> Password: </label><input type="password" name="password" id="password" required="required" class="form-control">  
						</div>
						<center>
							<button type="submit" name="login" id="loginBtn" class="px-4 btn btn-primary col-5"><b>Login</b><i class="fa-solid fa-arrow-right-to-bracket mx-1"></i></button>
						</center>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
include 'footer.php';
?>