<?php
	session_start();
	if(isset($_SESSION['userID']) == false) {
		echo '<script type="text/JavaScript">window.location.href = "/category=login";</script>';
		exit();
	}

	include('config.php');
	$stmt = $db->prepare("SELECT message.content FROM message WHERE message.id = 1");
	$stmt->execute();
	if($stmt->rowCount() > 0) {
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
	} else{
		exit();
	}

	echo '<nav aria-label="breadcrumb">
  	<ol class="breadcrumb">';
	    echo '<li class="breadcrumb-item"><a href="?category=sensei">Main page</a></li>';
	    echo '<li class="breadcrumb-item active" aria-current="page">Edit welcome message</li>';
  	echo '</ol>
	</nav>';

	echo '<div class="container">
		<h1>EDIT WELCOME MESSAGE</h1>
		<form method="post" action="/modules/posteditmessage.php">
			<div class="row">';
				echo '<input type="submit" value="Submit" class="btn btn-primary col-6">
				<a href="/?category=sensei" class="btn btn-light col-6">Cancel</a>
			</div>
			<br>
			<textarea id="summernote" name="content" required></textarea>
			<input type="submit" value="Submit" class="btn btn-primary col-12">
		</form>
	</div>

	<script>
		$(document).ready(function() {
			$("#summernote").summernote();
			$("#summernote").summernote("code", "'.addslashes($result["content"]).'");
		});
	</script>'
?>