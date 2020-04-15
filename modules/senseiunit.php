<?php
	session_start();
	if(isset($_SESSION['userID']) == false) {
		echo '<script type="text/JavaScript">window.location.href = "/";</script>';
		exit();
	}

	if(isset($_GET['grade']) == false & isset($_GET['id']) == false){
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
	    echo '<li class="breadcrumb-item active" aria-current="page">Unit</li>';
    ?>
  </ol>
</nav>

<?php include('config.php'); ?>
<div class="container">

	<?php 
		$stmt = $db->prepare("SELECT units.title, units.enabled FROM units WHERE units.id = ?");
		$stmt->execute(array($_GET['id']));
		if($stmt->rowCount() > 0) {
			$result = $stmt->fetch();
			echo '<h1>', $result["title"] , '<button type="button" class="btn ', $result["enabled"] ? "btn-danger" : "btn-success" ,'" id="toggleunit" onclick="sendPost(',"'/modules/postunittoggle.php?id=", $_GET['id'], "'", ')">', $result["enabled"] ? "Disable unit" : "Enable unit" , '</button></h1>';
		} else {
			exit();
		}
		echo '';
	?>

	<!-- LESSONS -->
	<div class="row">
		<div class="col-12">
			<h2>Lessons</h2>
		</div>
		<?php
			echo '<div class="col-12"><div class="card" id="newlesson"><a class="card-body btn btn-primary alert-success" href="?category=senseinewlesson&grade=', $_GET["grade"],'&id=', $_GET["id"], '"><h5 class="card-title">New Lesson</h5><p class="card-text">Create a new lesson</p></a></div></div>';

	   		$stmt = $db->prepare("SELECT lesson.id, lesson.title FROM lesson WHERE lesson.uid = ? ORDER BY lesson.id");
	   		$stmt->execute(array($_GET['id']));

	   		if($stmt->rowCount() > 0) {
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($rows as $lesson) {
					echo '<div class="col-12 col-md-4" id="lesson', $lesson["id"], '"><div class="card"><a class="card-body alert-primary btn cardlink" href="?category=senseilesson&grade=', $_GET["grade"], '&id=',$_GET['id'],'&lesson=', $lesson["id"], '"><h5 class="card-title">', $lesson["title"], '</h5></a><div class="card-footer text-muted" style="padding:0px;"><a href="/?category=senseieditlesson&grade=', $_GET["grade"], '&id=',$_GET['id'],'&lesson=', $lesson["id"], '" class="btn btn-light col-6">Edit</a><button type="button" onclick="sendPost(', "'/modules/postdeletelesson.php?id=", $lesson["id"], "'", ');" class="btn btn-danger col-6">Delete</button></div></div></div>';
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
			echo '<div class="col-12"><div class="card" id="newquiz"><a class="card-body btn btn-primary alert-success" href="?category=senseinewquiz&grade=', $_GET["grade"],'&id=', $_GET["id"], '"><h5 class="card-title">New quiz</h5><p class="card-text">Create a new quiz</p></a></div></div>';
	   		$stmt = $db->prepare("SELECT quiz.id, quiz.title, quiz.pageInfo FROM quiz WHERE quiz.wwid = ? ORDER BY quiz.id");
	   		$stmt->execute(array($_GET['id']));

	   		if($stmt->rowCount() > 0) {
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($rows as $quiz) {
					echo '<div class="col-12 col-md-4" id="quiz', $quiz["id"], '"><div class="card"><a class="card-body btn btn-primary alert-danger cardlink" href="?category=quiz&grade=', $_GET["grade"], '&id=', $quiz["id"], '"><h5 class="card-title">', $quiz["title"], '</h5><p class="card-text">', $quiz["pageInfo"], '</p></a><div class="card-footer text-muted" style="padding:0px;"><button type="button" class="btn btn-light col-6">Edit</button><button type="button" onclick="sendPost(', "'/modules/postdeletequiz.php?id=", $quiz["id"], "'", ');" class="btn btn-danger col-6">Delete</button></div></div></div>';
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
			echo '<div class="col-12"><div class="card" id="uploadworksheet"><a class="card-body btn btn-primary alert-success" href="?category=senseiuploadworksheet&grade=', $_GET["grade"],'&id=', $_GET["id"], '"><h5 class="card-title">Upload worksheet</h5><p class="card-text"></p></a></div></div>';
	   		$stmt = $db->prepare("SELECT worksheet.id, worksheet.title FROM worksheet WHERE worksheet.uid = ? ORDER BY worksheet.title ASC");
	   		$stmt->execute(array($_GET['id']));

	   		if($stmt->rowCount() > 0) {
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($rows as $worksheet) {
					echo '<div class="col-12 col-md-4" id="worksheet', $worksheet["id"], '"><div class="card"><a class="card-body btn btn-light" href="worksheets/', $_GET['grade'], '/', $worksheet["title"],'"><h5 class="card-title">', $worksheet["title"], '</h5></a></div><div class="card-footer text-muted" style="padding:0px;"><button type="button" onclick="sendPost(', "'/modules/postdeleteworksheet.php?id=", $worksheet["id"], "&grade=", $_GET['grade'], "'", ');" class="btn btn-danger col-12">Delete</button></div></div>';
				}
			}
		?>
	</div>
	<hr>

	<!-- VIDEOS -->
	<div class="row">
		<div class="col-12">
			<h2>Videos</h2>
		</div>
		<?php
			echo '<div class="col-12"><div class="card" id="uploadworksheet"><a class="card-body btn btn-primary alert-success" href="?category=senseilinkvideo&grade=', $_GET["grade"],'&id=', $_GET["id"], '"><h5 class="card-title">Link YouTube video</h5><p class="card-text"></p></a></div></div>';
	   		$stmt = $db->prepare("SELECT video.id, video.url FROM video JOIN units ON video.wwid = units.id WHERE units.grade = ? AND video.wwid = ? ORDER BY units.id");
	   		$stmt->execute(array($_GET['grade'], $_GET['id']));

	   		if($stmt->rowCount() > 0) {
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($rows as $video) {
					echo '<div id="video' . $video["id"] . '" class="col-md-4 col-12"><div class="embed-responsive embed-responsive-16by9"><iframe class="embed-responsive-item" src="' . $video["url"] . '" allowfullscreen></iframe></div><button type="button" onclick="sendPost(', "'/modules/postdeletevideo.php?id=", $video["id"], "'", ');" class="btn btn-danger col-12">Delete</button></div>';
				}
			}
		?>
		<hr>
		<br>
    </div>
	<?php include("logoutbar.php")?>
</div>