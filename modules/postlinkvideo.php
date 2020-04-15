<?php
	session_start();
	if(isset($_SESSION['userID']) == false) {
		echo '<script type="text/JavaScript">window.location.href = "/";</script>';
		exit();
	}

	include("config.php");

	$url = "https://www.youtube.com/embed/".getId($_REQUEST["url"]);

	$stmt = $db->prepare("INSERT INTO video(url,wwid)
                              VALUES(:url,:uid)");
	$stmt->execute(array(':url' => $url, ':uid' => $_POST["unit"]));

	//Check if it failed
	if($stmt->rowCount() == 0){
		echo '<script type="text/JavaScript">alert("FAILED!");</script>';
	}
	else{ 
		echo '<script type="text/JavaScript">alert("Success!"); window.location.href = "/?category=senseiunit&grade='.$_POST['grade'].'&id='.$_POST['unit'].'";</script>';
    }

	function getId($url) {
		preg_match('/^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/', $url, $match);
	    return ($match && strlen($match[2]) === 11)? $match[2]: null;
	}
?>