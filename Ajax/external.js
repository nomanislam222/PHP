function getData() {
	const xhttp = new XMLHttpRequest();
	xhttp.onload = function() {
		const data = JSON.parse(this.responseText);
		let tableData = "<table border=1>";
		for(let i = 0; i < data.length; i++) {
			tableData +=
			"<tr>" +
			"<td>" + data[i].id +"</td>" + 
			"<td>" + data[i].email +"</td>" +
			"<td>" + data[i].password +"</td>" +
			"</tr>";
		}
		tableData += "</table>";
		document.getElementById("i1").innerHTML = tableData;	
	}
	xhttp.open("GET", "FirstAction.php");
	xhttp.send();
	
}