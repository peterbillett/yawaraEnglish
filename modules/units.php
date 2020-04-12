<?php
 	if(isset($_GET['grade']) == false){
		exit();
	}
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  	<?php
	    echo '<li class="breadcrumb-item"><a href="?category=grade&grade='.$_GET["grade"].'">'.$_GET["grade"].'年生</a></li>';
	    echo '<li class="breadcrumb-item active" aria-current="page">Units</li>';
    ?>
  </ol>
</nav>

<div class="container">
	<div class="row">

		<?php 
			include('config.php');

	   		$stmt = $db->prepare("SELECT units.id, units.title FROM units WHERE units.enabled = 1 AND GRADE = ? ORDER BY units.title  ASC");
	   		$stmt->execute(array($_GET['grade']));

	   		if($stmt->rowCount() > 0) {
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($rows as $unit) {
					echo '<div class="col-12 col-md-4"><div class="card" id="unit', $unit["id"], '"><a class="card-body btn btn-primary alert-primary" href="?category=unit&grade=', $_GET["grade"], '&id=', $unit["id"], '"><h5 class="card-title">', $unit["title"], '</h5><p class="card-text"></p></a></div></div>';
				}
			}
		?>

    </div>
</div>

