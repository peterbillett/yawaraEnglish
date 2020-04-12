<?php
	session_start();
	if(isset($_SESSION['userID']) == false) {
		echo '<script type="text/JavaScript">window.location.href = "/";</script>';
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
	    echo '<li class="breadcrumb-item active" aria-current="page">New lesson</li>';
    ?>
  </ol>
</nav>

<div class="container">
	<?php echo '<h1>NEW '.$_GET["grade"].'年生 LESSON</h1>'; ?>
	<form method="post" action="/modules/postnewlesson.php">
		<div class="row">
			<div class="form-group col-12 col-md-6">
				<label for="title">Lesson title:</label>
			    <input type="text" class="form-control" name="title" id="title" placeholder="" required>
			</div>

			<?php
				echo '<div class="form-group col-12 col-md-6"><label for="unit">Unit: </label><select class="form-control" name="unit" id="unit">';

				include('config.php');
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
		    ?>
		</div>
		<p><input type="submit" value="Submit" class="btn btn-primary col-12"></p>
		<textarea id="summernote" name="content" required></textarea>
	</form>
</div>

<script>
	$(document).ready(function() {
	    $('#summernote').summernote();
	    <?php echo'$("#unit").val("'.$_GET["id"].'");' ?>
	});
</script>
