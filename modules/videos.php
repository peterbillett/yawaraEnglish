<div class="container">
	<div class="row">

		<?php 
			include('config.php');

			if(isset($_GET['grade'])){
		   		$stmt = $db->prepare("SELECT video.id, video.url FROM video JOIN weeklywork ON video.wwid = weeklywork.id WHERE weeklywork.grade = ? ORDER BY weeklywork.startdate");
		   		$stmt->execute(array($_GET['grade']));

		   		if($stmt->rowCount() > 0) {
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach ($rows as $video) {
						echo '<div id="video' . $video["id"] . '" class="col-md-4 col-12"><div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="' . $video["url"] . '" allowfullscreen></iframe></div></div>';
					}
				}
		   	}
		?>

    </div>
</div>