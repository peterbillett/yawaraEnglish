<div class="container">
	<div class="row">
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
</div>