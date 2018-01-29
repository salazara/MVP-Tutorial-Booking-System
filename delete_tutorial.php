<?php

session_start();

if(isset($_SESSION['admin']) && isset($_POST['topic']) && isset($_POST['category'])) {

	include('functions.php');

	$topic = $_POST['topic'];
	$category = $_POST['category'];

	$xml = new DOMDocument();
	$xml->load("xml/tutorials.xml");
	
	$tutorials = $xml->getElementsByTagName("tutorial");

	foreach($tutorials as $tutorial) {
    	
		if($tutorial->getElementsByTagName("topic")->item(0)->nodeValue == $topic 
			&& $tutorial->getElementsByTagName("category")->item(0)->nodeValue == $category) {

			$tutorial->parentNode->removeChild($tutorial);
			break;
		}
	}

	$xml->save('xml/tutorials.xml');

	$page = "manage_tutorials.php";
	$msg = "DELETED: " . $topic;

	reloadPageWithMessage($page, $msg); 
}

?>