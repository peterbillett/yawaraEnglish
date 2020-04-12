<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<!--Setup meta info for browser and crawlers-->
		<title>Yawara JHS English</title>
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<meta name="author" content="Yawara JHS Tsukubamirai">
		<meta name="keywords" content="student English education Japan Japanese junior high school">
		<meta name="description" content="Yawara JHS English resources">

		<noscript><META HTTP-EQUIV="Refresh" CONTENT="0;URL=javascriptDisabled"></noscript>

	    <!--[if IE 8]>
		    <META HTTP-EQUIV="Refresh" CONTENT="0;URL=ie8Redirect">
		<![endif]-->
	    
		<script src="js/jquery-3.4.1.min.js"></script>
		<script src="js/tooltip.min.js"></script>
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/script.js"></script>

		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="shortcut icon" href="media/favicon.ico"/>

		<!-- include summernote css/js -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css">
    	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>

	</head>

	<body>
		<!--Navbar goes here-->
		<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navBar">
			<?php include ('modules/navbarCore.php'); ?>
		</nav>

		<!--Loading bar-->
		<div id="loadingBar" class="progress" style="display: none">
		  	<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:100%">Loading...</div>
		</div>

		<!--Error message-->
		<div id="messageContainer">
		</div>

		<!--Pages load into here-->
		<section>
		    <div id="pageCore">
		    </div>
	    </section>

	    <!--Modal that can be filled with custom info-->
	    <div class="modal fade" id="modal-modalDetails">
	        <div id="modalDetails"></div>
	    </div>

	</body>
</html>