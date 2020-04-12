<?php 
	session_start();
	if(isset($_SESSION['userID'])) {
		echo '<script type="text/JavaScript">window.location.href = "/?category=sensei";</script>';
		exit();
	}
?>


   
<form id="login" action="">
  <div class="row justify-content-center">
  <div class="form-group mb-2 col-lg-3 col-md-4">
    <label for="Username" class="sr-only">Email</label>
   <input type="text" id="username" name="user" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
  </div>
</div>
<div class="row justify-content-center">
  <div class="form-group mb-2 col-lg-3 col-md-4">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
  </div>
</div>
<div class="row justify-content-center">
  <input id="submitLogin" class="btn btn-primary col-lg-3 col-md-4 mb-2" value="Login" type="submit">
</div>
</form>
