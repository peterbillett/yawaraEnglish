<?php
	session_start();
	if(isset($_SESSION['userID']) == false) {
		echo '<script type="text/JavaScript">window.location.href = "/";</script>';
		exit();
	}
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  	<?php
	    echo '<li class="breadcrumb-item active" aria-current="page">Main page</li>';
    ?>
  </ol>
</nav>

<div class="container">
	<div class="row">
		<div class="col-12 col-md-4"><a class="card-body btn btn-primary alert-primary" style="width:100%" href="?category=senseigrades&grade=1">1年生</a></div>
		<div class="col-12 col-md-4"><a class="card-body btn btn-primary alert-primary" style="width:100%" href="?category=senseigrades&grade=2">2年生</a></div>
		<div class="col-12 col-md-4"><a class="card-body btn btn-primary alert-primary" style="width:100%" href="?category=senseigrades&grade=3">3年生</a></div>
		<div class="col-12"><a class="card-body btn btn-primary alert-primary" style="width:100%" href="?category=senseieditmessage">Edit welcome message</a></div>
	</div>
	
	<?php include("logoutbar.php")?>
</div>