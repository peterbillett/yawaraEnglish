<div class="container">
	<div class="row">

		<?php 
			include('config.php');

			if(isset($_GET['grade'])){
		   		$stmt = $db->prepare("SELECT weeklywork.id, weeklywork.title FROM weeklywork WHERE weeklywork.startdate <= now() AND GRADE = ? ORDER BY weeklywork.startdate DESC");
		   		$stmt->execute(array($_GET['grade']));

		   		if($stmt->rowCount() > 0) {
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach ($rows as $week) {
						echo '<div class="col-12 col-md-4"><div class="card" id="week', $week["id"], '"><a class="card-body btn btn-primary alert-primary" href="?category=week&grade=', $_GET["grade"], '&id=', $week["id"], '"><h5 class="card-title">', $week["title"], '</h5><p class="card-text"></p></a></div></div>';
					}
				}
		   	}
		?>

    </div>
</div>

