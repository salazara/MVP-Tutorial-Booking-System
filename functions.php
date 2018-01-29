<?php

function reloadPageWithMessage($page, $msg) {
	
   	echo "<form id='reloadPageWithMessage' action='index.php' method='POST'>";
   	echo "<input type='hidden' name='page' value='$page'/>";
	echo "<input type='hidden' name='msg' value='$msg'/>";
	echo "</form>";
	echo "<script>document.getElementById('reloadPageWithMessage').submit();</script>"; 
	exit();
	
}

?>