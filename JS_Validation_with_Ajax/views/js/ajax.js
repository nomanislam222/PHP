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

function checkCurrentPassword() {
    const currentPassword = document.querySelector('input[name="current_password"]').value.trim();
    
    if (currentPassword) {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            if (this.responseText === 'incorrect') {
                alert("Current password is incorrect.");
                document.querySelector('input[name="current_password"]').value = ""; // Clear the field for re-entry
            }
        }
        xhttp.open("GET", "../controllers/CheckPassword.php?current_password=" + encodeURIComponent(currentPassword), true);
        xhttp.send();
    }
}
document.querySelector('input[name="current_password"]').onblur = checkCurrentPassword;


