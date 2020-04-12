<?php 
	date_default_timezone_set("Asia/Tokyo");
	$filename = "../answers/Grade".$_REQUEST["Grade"]." - ".$_REQUEST["Class"]." - Quiz ".$_REQUEST["Quiz"]." - ".$_REQUEST["StudentName"]." ".date("Y-m-d H-i-s").".txt";
	$message = "";
	foreach($_REQUEST as $key => $detail) {
	    $message .= $key.": ".$detail."\r\n";
	}
	file_put_contents($filename, $message);
?>