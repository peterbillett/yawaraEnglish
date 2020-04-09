<?php 
	date_default_timezone_set("Asia/Tokyo");
	$filename = "../answers/Grade".$_REQUEST["Grade"]." - ".$_REQUEST["Class"]." - ".$_REQUEST["StudentName"]." - ".date("Y-m-d H-i-s").".txt";
	$message = "";
	foreach($_REQUEST as $key => $detail) {
	    $message .= $key.": ".$detail."\r\n";
	}
	file_put_contents($filename, $message);

	//header("Location: /");
	//exit();

	//header('Content-type: application/json');
    //echo json_encode($response_array);
?>