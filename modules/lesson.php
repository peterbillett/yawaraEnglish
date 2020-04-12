<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  	<?php
  		echo '<li class="breadcrumb-item"><a href="?category=grade&grade='.$_GET["grade"].'">'.$_GET["grade"].'年生</a></li>';
	    echo '<li class="breadcrumb-item"><a href="?category=units&grade='.$_GET["grade"].'">Units</a></li>';
	    echo '<li class="breadcrumb-item"><a href="?category=unit&grade='.$_GET["grade"].'&id='.$_GET["id"].'">Unit</a></li>';
	    echo '<li class="breadcrumb-item active" aria-current="page">Lesson</li>';
    ?>
  </ol>
</nav>

<?php include('config.php'); ?>
<div class="container">
	<?php 
		$stmt = $db->prepare("SELECT lesson.title, lesson.content FROM lesson WHERE lesson.id = ?");
		$stmt->execute(array($_REQUEST['lesson']));
		if($stmt->rowCount() > 0) {
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			echo '<h1>', $result["title"] , '</h1>';
			echo $result["content"];
		}
	?>
</div>