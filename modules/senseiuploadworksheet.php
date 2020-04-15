<?php
	session_start();
	if(isset($_SESSION['userID']) == false) {
		echo '<script type="text/JavaScript">window.location.href = "/";</script>';
		exit();
	}

	if(isset($_GET['grade']) == false){
		echo '<script type="text/JavaScript">window.location.href = "/?category=sensei";</script>';
		exit();
	}
?>
<script src="js/dropzone.js"></script>
<link rel="stylesheet" type="text/css" href="css/dropzone.css">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  	<?php
	    echo '<li class="breadcrumb-item"><a href="?category=sensei">Main page</a></li>';
	    echo '<li class="breadcrumb-item"><a href="?category=senseigrades&grade='.$_GET["grade"].'">'.$_GET["grade"].'年生</a></li>';
	    echo '<li class="breadcrumb-item"><a href="?category=senseiunits&grade='.$_GET["grade"].'">Units</a></li>';
	    echo '<li class="breadcrumb-item"><a href="?category=senseiunit&grade='.$_GET["grade"].'&id='.$_GET["id"].'">Unit</a></li>';
	    echo '<li class="breadcrumb-item active" aria-current="page">Upload file</li>';
    ?>
  </ol>
</nav>

<div class="container">
	<div class="row justify-content-center">

		<?php 
			include('config.php');

			
		?>
		<div id="dropzone">
			<form action="/upload" id="dropzoneform" class="dropzone needsclick dz-clickable" id="demo-upload">

		  		<div class="dz-message needsclick">
		    		<button type="button" class="dz-button">Drop files here or click to upload.</button><br>
		    		<span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
		  		</div>
		  		<?php
		  			echo '<input type="hidden" name="grade" value="'.$_GET["grade"].'"/>
		  			<input type="hidden" name="unit" value="'.$_GET["id"].'"/>';
		  		?>
			</form>
		</div>
	</div>

	<script type="text/javascript">var myDropzone = new Dropzone("#dropzoneform", { url: "/modules/postnewworksheet.php"});</script>

	<?php include("logoutbar.php")?>
</div>

