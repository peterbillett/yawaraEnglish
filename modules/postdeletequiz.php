<?php
	session_start();
	if(isset($_SESSION['userID']) == false) {
		echo '<script type="text/JavaScript">window.location.href = "/?category=senseilogin";</script>';
		exit();
	}

	include("config.php");

	$stmt = $db->prepare("DELETE FROM quiz WHERE quiz.id = :id");
	$stmt->bindValue(':id', $_REQUEST['id'], PDO::PARAM_STR);
	$stmt->execute();
	if($stmt->rowCount() > 0){
		echo '<script type="text/JavaScript">$("#quiz'.$_REQUEST['id'].'").fadeOut("normal", function() {$(this).remove();});</script>';
	} else {
		echo '<script type="text/JavaScript">alert("FAILED!");</script>';
	}
?>