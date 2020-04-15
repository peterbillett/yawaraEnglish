<?php 
	session_start();
	if(isset($_SESSION['userID']) == false OR empty($_FILES) OR isset($_REQUEST['grade']) == false OR isset($_REQUEST['unit']) == false) {
		echo '<script type="text/JavaScript">window.location.href = "/";</script>';
		exit();
	}

	include("config.php");
	$stmt = $db->prepare("INSERT INTO worksheet(title,uid)
                              VALUES(:title,:uid)");
	$stmt->execute(array(':title' => $_FILES['file']['name'], ':uid' => $_REQUEST["unit"]));

	if($stmt->rowCount() == 0){
		echo '<script type="text/JavaScript">alert("FAILED!");</script>';
	}
	else{
		$ds = DIRECTORY_SEPARATOR;
	    $tempFile = $_FILES['file']['tmp_name'];            
	    $targetFile =  '..'.$ds.'worksheets'.$ds.$_REQUEST["grade"].$ds.$_FILES['file']['name'];
	    move_uploaded_file($tempFile,$targetFile);
    }
?>