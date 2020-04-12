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
	//To do: 
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  	<?php
	    echo '<li class="breadcrumb-item"><a href="?category=sensei">Main page</a></li>';
	    echo '<li class="breadcrumb-item"><a href="?category=senseigrades&grade='.$_GET["grade"].'">'.$_GET["grade"].'年生</a></li>';
	    echo '<li class="breadcrumb-item active" aria-current="page">Units</li>';
    ?>
  </ol>
</nav>

<div class="container">
	<div class="row">
		<?php
			//echo '<div class="col-12"><div class="card" id="newunit"><a class="card-body btn btn-primary alert-success" href="?category=senseinewunit&grade=', $_GET["grade"], '"><h5 class="card-title">New unit</h5><p class="card-text">Create a new unit for ', $_GET["grade"], '年生</p></a></div></div>';
		?>
	</div>
	<div class="row">
		<?php 
			include('config.php');

			if(isset($_GET['grade'])){
		   		$stmt = $db->prepare("SELECT units.id, units.title FROM units WHERE GRADE = ? ORDER BY units.title  ASC;");
		   		$stmt->execute(array($_GET['grade']));

		   		if($stmt->rowCount() > 0) {
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach ($rows as $unit) {
						echo '<div class="col-12 col-md-4"><div class="card" id="unit', $unit["id"], '"><a class="card-body btn btn-primary alert-primary" href="?category=senseiunit&grade=', $_GET["grade"], '&id=', $unit["id"], '"><h5 class="card-title">', $unit["title"], '</h5><p class="card-text"></p></a></div></div>';
					}
				}
		   	}
		?>
	</div>
	
	<?php include("logoutbar.php")?>
</div>