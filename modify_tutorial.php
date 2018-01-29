<?php

session_start();

if(isset($_SESSION['admin']) && isset($_POST['topic']) && isset($_POST['category']) && isset($_POST['new_topic']) && isset($_POST['new_category'])) {

	include('functions.php');

	$topic = $_POST['topic'];
	$category = $_POST['category'];

	$new_topic = $_POST['new_topic'];
	$new_category = $_POST['new_category'];

	$xml = simplexml_load_file("xml/tutorials.xml");
	
	foreach($xml->children() as $tutorial) {
    	
		if($tutorial->topic == $topic && $tutorial->category == $category) {

			$tutorial->topic = $new_topic;
			$tutorial->category = $new_category;
		}
	}

	$xml->asXML("xml/tutorials.xml");

	$page = "manage_tutorials.php";
	$msg = "MODIFIED: $topic TO $new_topic";

	reloadPageWithMessage($page, $msg); 
}

?>