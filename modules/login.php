<?php
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['user']) & isset($_POST['password'])) {
			$username = $_POST['user'];
			$password = $_POST['password'];
			//echo password_hash($password, PASSWORD_DEFAULT);
			session_start();
			if ($username == 'test@test.com' & $password == '2020yawarapeterbillett') { //password_verify($password,$hash)
				$_SESSION['userID'] = $username;
				echo json_encode(array('result'=>'?category=sensei'));
			} else {
				http_response_code(406);
			}
		} else {
			if(isset($_SESSION['userID'])) {
				echo json_encode(array('result'=>'?category=sensei'));
				exit();
			}
		}
	} else {
		http_response_code(401);
	}
?>