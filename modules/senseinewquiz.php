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
	    echo '<li class="breadcrumb-item"><a href="?category=senseigrades&grade='.$_GET["grade"].'">'.$_GET["grade"].'年生</a></li>';
	    echo '<li class="breadcrumb-item"><a href="?category=senseiunits&grade='.$_GET["grade"].'">Units</a></li>';
	    echo '<li class="breadcrumb-item"><a href="?category=senseiunit&grade='.$_GET["grade"].'&id='.$_GET["id"].'">Unit</a></li>';
	    echo '<li class="breadcrumb-item active" aria-current="page">New quiz</li>';
    ?>
  </ol>
</nav>

<div class="container">
	<div class="row justify-content-center">

		<?php 
			include('config.php');

			
		?>
	</div>

	<?php include("logoutbar.php")?>
</div>