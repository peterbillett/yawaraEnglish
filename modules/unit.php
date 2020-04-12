<?php
 	if(isset($_GET['id']) == false OR isset($_GET['grade']) == false){
		exit();
	}
	
	include('config.php');

	$stmt = $db->prepare("SELECT units.title FROM units WHERE units.id = ?");
	$stmt->execute(array($_GET['id']));
	if($stmt->rowCount() < 1) {
		exit();
	} else {
		$result = $stmt->fetchColumn();
	}
	echo '<nav aria-label="breadcrumb"><ol class="breadcrumb">';
	echo '<li class="breadcrumb-item"><a href="?category=grade&grade='.$_GET["grade"].'">'.$_GET["grade"].'年生</a></li>';
    echo '<li class="breadcrumb-item"><a href="?category=units&grade='.$_GET["grade"].'">Units</a></li>';
    echo '<li class="breadcrumb-item active" aria-current="page">Unit</li>';
	echo '</ol></nav>';
	echo '<div class="container"><h1>', $result , '</h1>';
?>

	<!-- LESSONS -->
	<div class="row">
		<div class="col-12">
			<h2>Lessons</h2>
		</div>
		<?php
	   		$stmt = $db->prepare("SELECT lesson.id, lesson.title FROM lesson WHERE lesson.uid = ? ORDER BY lesson.id");
	   		$stmt->execute(array($_GET['id']));

	   		if($stmt->rowCount() > 0) {
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($rows as $lesson) {
					echo '<div class="col-12 col-md-4"><div class="card" id="quiz', $lesson["id"], '"><a class="card-body btn btn-primary alert-primary" href="?category=lesson&grade=', $_GET["grade"], '&id=',$_GET['id'],'&lesson=', $lesson["id"], '"><h5 class="card-title">', $lesson["title"], '</h5><p class="card-text"></p></a></div></div>';
				}
			}
		?>
	</div>
	<hr>

	<!-- QUIZES -->
	<div class="row">
		<div class="col-12">
			<h2>Quizes</h2>
		</div>
		<?php
			if(isset($_GET['id'])){
		   		$stmt = $db->prepare("SELECT quiz.id, quiz.title, quiz.pageInfo FROM quiz WHERE quiz.wwid = ? ORDER BY quiz.startdate");
		   		$stmt->execute(array($_GET['id']));

		   		if($stmt->rowCount() > 0) {
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach ($rows as $quiz) {
						echo '<div class="col-12 col-md-4"><div class="card" id="quiz', $quiz["id"], '"><a class="card-body btn btn-primary alert-danger" href="?category=quiz&grade=', $_GET["grade"], '&id=', $quiz["id"], '"><h5 class="card-title">', $quiz["title"], '</h5><p class="card-text">', $quiz["pageInfo"], '</p></a></div></div>';
					}
				}
		   	}
		?>
	</div>
	<hr>

	<!-- WORkSHEETS -->
	<div class="row">
		<div class="col-12">
			<h2>Worksheets</h2>
		</div>
		<?php
			if(isset($_GET['grade'])){
			    $grade = $_GET['grade'];
				$files = glob("../worksheets/$grade/*.{pdf}", GLOB_BRACE);
				foreach($files as $file) {
				  echo "<div class=\"col-md-4 col-12\"><a class=\"btn btn-light\" style=\"width: 100%;\" href=\"worksheets/$grade/" . basename($file) . "\">" . basename($file) . "</a></div>";
				};
			};
		?>
	</div>
	<hr>

	<!-- VIDEOS -->
	<div class="row">
		<div class="col-12">
			<h2>Videos</h2>
		</div>
		<?php
			if(isset($_GET['id'])){
		   		$stmt = $db->prepare("SELECT video.id, video.url FROM video JOIN units ON video.wwid = units.id WHERE units.grade = ? AND video.wwid = ? ORDER BY units.startdate");
		   		$stmt->execute(array($_GET['grade'], $_GET['id']));

		   		if($stmt->rowCount() > 0) {
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach ($rows as $video) {
						echo '<div id="video' . $video["id"] . '" class="col-md-4 col-12"><div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="' . $video["url"] . '" allowfullscreen></iframe></div></div>';
					}
				}
		   	}
		?>
		<hr>
		<br>
    </div>
</div>

