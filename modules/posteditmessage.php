<?php
	session_start();
	if(isset($_SESSION['userID']) == false) {
		echo '<script type="text/JavaScript">window.location.href = "/";</script>';
		exit();
	}

	include("config.php");
	$stmt= $db->prepare("UPDATE message SET content=? WHERE id=1");
	$stmt->execute([$_POST["content"]]);
	echo '<script type="text/JavaScript">window.location.href = "/";</script>';
?>