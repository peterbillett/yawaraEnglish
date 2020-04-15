<div class="container">
	<div class="row">
		<?php
			include('config.php');
	   		$stmt = $db->prepare("SELECT worksheet.id, worksheet.title FROM worksheet JOIN units ON worksheet.uid = units.id WHERE units.grade = ? ORDER BY worksheet.title ASC");
	   		$stmt->execute(array($_GET['grade']));

	   		if($stmt->rowCount() > 0) {
				$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($rows as $worksheet) {
					echo '<div class="col-12 col-md-4"><div class="card" id="worksheet', $worksheet["id"], '"><a class="card-body btn btn-light" href="worksheets/', $_GET['grade'], '/', $worksheet["title"],'"><h5 class="card-title">', $worksheet["title"], '</h5></a></div></div>';
				}
			}
		?>
	</div>
</div>