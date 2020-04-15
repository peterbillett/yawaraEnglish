<?php
	session_start();
	if(isset($_SESSION['userID']) == false) {
		echo '<script type="text/JavaScript">window.location.href = "/";</script>';
		exit();
	}

	include("config.php");
	$db->beginTransaction();
	$stmt= $db->prepare("UPDATE units SET units.enabled=NOT units.enabled WHERE units.id=?;");
	$stmt->execute([$_REQUEST["id"]]);
	$stmt= $db->prepare("SELECT units.enabled FROM units WHERE units.id=? LIMIT 1;");
	$stmt->execute([$_REQUEST["id"]]);
	$enabled = $stmt->fetchColumn();
	$db->commit();
	echo '<script type="text/JavaScript">$("#toggleunit").html("'.($enabled ? 'Disable unit' : 'Enable unit').'"); $("#toggleunit").toggleClass("btn-danger btn-success");</script>';
?>