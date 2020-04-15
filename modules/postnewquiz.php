<?php
	session_start();
	if(isset($_SESSION['userID']) == false) {
		echo '<script type="text/JavaScript">window.location.href = "/";</script>';
		exit();
	}

	include("config.php");

	//echo print_r($_REQUEST);

	$db->beginTransaction();
	$stmt = $db->prepare("INSERT INTO quiz(title,pageinfo,enabled,wwid) VALUES(:title,:pageinfo,:enabled,:wwid)");
	$stmt->execute(array(':title' => $_POST["title"], ':pageinfo' => $_POST["pageinfo"], ':enabled' => 1, ':wwid' => $_POST["id"]));
	$quizid = $db->lastInsertId();

	foreach( $_REQUEST as $stuff ) {
	    if( is_array( $stuff ) ) {
	        foreach( $stuff as $thing ) {
	        	if (array_key_first($thing) == "QuestionMContent") {
	        		$stmt = $db->prepare("INSERT INTO question(qid,content,written) VALUES(:qid,:content,:written)");
					$stmt->execute(array(':qid' => $quizid, ':content' => $thing["QuestionMContent"], ':written' => 0));
					$answerid = $db->lastInsertId();

					foreach($thing as $answer) {
						if ($thing["QuestionMContent"] != $answer) {
							$stmt = $db->prepare("INSERT INTO answer(qid,content) VALUES(:qid,:content)");
							$stmt->execute(array(':qid' => $answerid, ':content' => $answer));
						}
					}
	        	} else if (array_key_first($thing) == "QuestionWContent") {
					foreach($thing as $answer) {
						$stmt = $db->prepare("INSERT INTO question(qid,content,written) VALUES(:qid,:content,:written)");
						$stmt->execute(array(':qid' => $quizid, ':content' => $answer, ':written' => 1));
					}

	        	}
	        }
	    }
	}
	$db->commit();
	echo '<script type="text/JavaScript">window.location.href = "/?category=senseiquiz&grade='.$_POST['grade'].'&unit='.$_POST['id'].'&id='.$quizid.'";</script>';
?>