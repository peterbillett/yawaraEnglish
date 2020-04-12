<?php
	session_start();
	if(isset($_SESSION['userID']) == false) {
		echo '<script type="text/JavaScript">window.location.href = "/";</script>';
		exit();
	}

	if(isset($_GET['grade']) == false){
		echo '<script type="text/JavaScript">window.location.href = "/?category=sensei";</script>';
		exit();
	}
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  	<?php
	    echo '<li class="breadcrumb-item"><a href="?category=sensei">Main page</a></li>';
	    echo '<li class="breadcrumb-item active" aria-current="page">'.$_GET["grade"].'年生</li>';
    ?>
  </ol>
</nav>

<div class="container">
	<div class="row">
		<?php 
			echo '<div class="col-12 col-md-3"><a class="card-body btn btn-primary alert-primary" style="width:100%" href="?category=senseiunits&grade='.$_GET['grade'].'">Units</a></div>';
			echo '<div class="col-12 col-md-3"><a class="card-body btn btn-primary alert-danger" style="width:100%" href="?category=senseiquizess&grade='.$_GET['grade'].'">Quizes</a></div>';
			echo '<div class="col-12 col-md-3"><a class="card-body btn btn-primary alert-success" style="width:100%" href="?category=senseiworksheets&grade='.$_GET['grade'].'">Worksheets</a></div>';
			echo '<div class="col-12 col-md-3"><a class="card-body btn btn-primary alert-warning" style="width:100%" href="?category=senseivideos&grade='.$_GET['grade'].'">Videos</a></div>';
		?>
	</div>
	
	<?php include("logoutbar.php")?>
</div>