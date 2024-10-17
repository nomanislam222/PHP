function checkEmailExists() {
    const email = document.getElementById("email").value;
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {
        const response = JSON.parse(this.responseText);
        if (response.exists) {
            alert("Email already exists!");
            document.getElementById("email").value = ""; 
            document.getElementById("email").focus(); 
        }
    }
    xhttp.open("GET", "../controllers/CheckEmail.php?email=" + encodeURIComponent(email), true);
    xhttp.send();
}