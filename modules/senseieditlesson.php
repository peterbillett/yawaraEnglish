<?php
	session_start();
	if(isset($_SESSION['userID']) == false) {
		echo '<script type="text/JavaScript">window.location.href = "/";</script>';
		exit();
	}

	include('config.php');
	$stmt = $db->prepare("SELECT lesson.title, lesson.content FROM lesson WHERE lesson.id = ?");
	$stmt->execute(array($_REQUEST['lesson']));
	if($stmt->rowCount() > 0) {
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
	} else{
		exit();
	}

	echo '<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">';
	    echo '<li class="breadcrumb-item"><a href="?category=sensei">Main page</a></li>';
	    echo '<li class="breadcrumb-item"><a href="?category=senseigrades&grade='.$_GET["grade"].'">'.$_GET["grade"].'年生</a></li>';
	    echo '<li class="breadcrumb-item"><a href="?category=senseiunits&grade='.$_GET["grade"].'">Units</a></li>';
	    echo '<li class="breadcrumb-item"><a href="?category=senseiunit&grade='.$_GET["grade"].'&id='.$_GET["id"].'">Unit</a></li>';
	    echo '<li class="breadcrumb-item active" aria-current="page">Edit lesson</li>';
  	echo '</ol>
	</nav>';

	echo '<div class="container">
	<h1>EDIT LESSON</h1>
	<form method="post" action="/modules/posteditlesson.php">
		<div class="row">
			<div class="form-group col-12 col-md-6">
				<label for="title">Lesson title:</label>
			    <input type="text" class="form-control" name="title" id="title" placeholder="" value="'.$result["title"].'" required>
			</div>';

				echo '<div class="form-group col-12 col-md-6"><label for="unit">Unit: </label><select class="form-control" name="unit" id="unit">';
				$stmt = $db->prepare("SELECT units.id, units.title FROM units WHERE units.enabled = 1 AND GRADE = ? ORDER BY units.title ASC");
		   		$stmt->execute(array($_GET['grade']));
		   		if($stmt->rowCount() > 0) {
					$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
					foreach ($rows as $unit) {
						echo '<option value="'.$unit["id"].'">'.$unit["title"].'</option>';
					}
				}
				echo '</select></div>';

		      	echo '<input type="hidden" name="grade" value="'.$_GET["grade"].'"/>';
		      	echo '<input type="hidden" name="lesson" value="'.$_GET["lesson"].'"/>';
			
				echo '<input type="submit" value="Submit" class="btn btn-primary col-6">
				<a href="/?category=senseiunit&grade=', $_GET["grade"], '&id=',$_GET['id'], '" class="btn btn-light col-6">Cancel</a>
			</div>
		<br>
		<textarea id="summernote" name="content" required></textarea>
	</form>
</div>

<script>
	$(document).ready(function() {
	    $("#unit").val("'.$_GET["id"].'");
	    // initialize summernote
		$("#summernote").summernote();
		// and set code
		$("#summernote").summernote("code", "'.addslashes($result["content"]).'");
	});
</script>'
?>