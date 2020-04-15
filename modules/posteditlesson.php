<?php
	session_start();
	if(isset($_SESSION['userID']) == false) {
		echo '<script type="text/JavaScript">window.location.href = "/";</script>';
		exit();
	}

	include("config.php");
	$stmt= $db->prepare("UPDATE lesson SET title=?,content=?,uid=? WHERE id=?");
	$stmt->execute([$_POST["title"], $_POST["content"], $_POST["unit"], $_POST["lesson"]]);
	echo '<script type="text/JavaScript">window.location.href = "/?category=senseilesson&grade='.$_POST['grade'].'&id='.$_POST['unit'].'&lesson='.$_POST['lesson'].'";</script>';
?>