function loadContent(page) {
	
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	
		if (xhttp.readyState == 4 && xhttp.status == 200) {

   			document.getElementById("content").innerHTML = xhttp.responseText;
   		}
	};
	
	xhttp.open("GET", page, true);
	xhttp.send();

	return false;
}


