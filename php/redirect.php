<?php 
	include("config.php");
	$pg = isset($_GET["pg"]) ? $_GET['pg'] : '';
	switch ($pg) {
	    case "1":
	        include ('1.php');
	        break;
	    case "2":
	        include ('2.php');
	        break;
	    default:
	       include ('../modules/home.php');
	       break;
	}
?>