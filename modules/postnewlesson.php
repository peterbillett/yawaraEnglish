<?php
	session_start();
	if(isset($_SESSION['userID']) == false) {
		echo '<script type="text/JavaScript">window.location.href = "/";</script>';
		exit();
	}

	include("config.php");

	$stmt = $db->prepare("INSERT INTO lesson(title,content,uid)
                              VALUES(:title,:content,:uid)");
	$stmt->execute(array(':title' => $_POST["title"], ':content' => $_POST["content"], ':uid' => $_POST["unit"]));
	$insertId = $db->lastInsertId(); //Get the items id

	//Check if it failed
	if($stmt->rowCount() == 0){
		echo '<script type="text/JavaScript">alert("FAILED!");</script>';
	}
	else{ 
		echo '<script type="text/JavaScript">window.location.href = "/?category=senseilesson&grade='.$_POST['grade'].'&id='.$_POST['unit'].'&lesson='.$insertId.'";</script>';
    }
?>