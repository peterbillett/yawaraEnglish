<?php
	session_start();
	if(isset($_SESSION['userID']) == false) {
		echo '<script type="text/JavaScript">window.location.href = "/?category=senseilogin";</script>';
		exit();
	}

	include("config.php");

	if ($db->beginTransaction()) {
		try {
			$stmt = $db->prepare("SELECT worksheet.title FROM worksheet WHERE worksheet.id = ?");
			$stmt->execute(array($_REQUEST['id']));
			if($stmt->rowCount() < 1) {
				echo '<script type="text/JavaScript">alert("FAILED!");</script>';
				exit();
			} else {
				$result = $stmt->fetch();
			}
			$stmt = $db->prepare("DELETE FROM worksheet WHERE worksheet.id = :id");
			$stmt->bindValue(':id', $_REQUEST['id'], PDO::PARAM_STR);
			$stmt->execute();
			unlink("..\\worksheets\\".$_REQUEST["grade"]."\\".$result['title']);
			echo '<script type="text/JavaScript">$("#worksheet'.$_REQUEST['id'].'").fadeOut("normal", function() {$(this).remove();});</script>';
			$db->commit();
		} 
		catch (Exception $ex) {
			if ($db->inTransaction()) {
				$db->rollBack();
				echo '<script type="text/JavaScript">alert("FAILED!");</script>';
			}        
		}
	}
?>