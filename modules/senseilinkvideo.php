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
	<form method="post" action="/modules/postlinkvideo.php">
		<div class="row justify-content-center">
			<div class="form-group col-6">
				<label for="url">YouTube video URL</label>
			    <input type="text" class="form-control" name="url" id="url" placeholder="" required>
			</div>
			<input type="submit" value="Submit" class="btn btn-primary col-6">
			<?php
				echo '<input type="hidden" name="grade" value="'.$_GET["grade"].'"/>';
				echo '<input type="hidden" name="unit" value="'.$_GET["id"].'"/>';
			?>
		</div>
	</form>

	<?php include("logoutbar.php")?>
</div>