// Function to validate registration form
function isRegisterValid(pForm) {
    const fullName = pForm.full_name.value.trim();
    const email = pForm.email.value.trim();
    const password = pForm.password.value;
    const confirmPassword = pForm.confirm_password.value;
    const contact = pForm.contact.value.trim();
    const gender = pForm.gender.value;

    let e1 = document.getElementById("err1");
    let e2 = document.getElementById("err2");
    let e3 = document.getElementById("err3");
    let e4 = document.getElementById("err4");
    let e5 = document.getElementById("err5");

    e1.innerHTML = "";
    e2.innerHTML = "";
    e3.innerHTML = "";
    e4.innerHTML = "";
    e5.innerHTML = "";

    let flag = true;

    if (fullName === "") {
        e1.innerHTML = "Full name cannot be blank.";
        flag = false;
    }

    if (email === "") {
        e2.innerHTML = "Email cannot be blank.";
        flag = false;
    } else {
        // Simple email regex
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            e2.innerHTML = "Invalid email format.";
            flag = false;
        }
    }

    if (password === "") {
        e3.innerHTML = "Password cannot be blank.";
        flag = false;
    } else if (password.length < 6) {
        e3.innerHTML = "Password must be at least 6 characters.";
        flag = false;
    }

    if (confirmPassword === "") {
        e4.innerHTML = "Confirm password cannot be blank.";
        flag = false;
    } else if (password !== confirmPassword) {
        e4.innerHTML = "Passwords do not match.";
        flag = false;
    }

    if (contact === "") {
        e5.innerHTML = "Contact number cannot be blank.";
        flag = false;
    } else {
        // Simple contact number regex (e.g., 10 digits)
        const contactRegex = /^\d{10}$/;
        if (!contactRegex.test(contact)) {
            e5.innerHTML = "Invalid contact number.";
            flag = false;
        }
    }

    return flag;
}

// Function to validate login form
function isLoginValid(pForm) {
    const email = pForm.email.value.trim();
    const password = pForm.password.value;

    let e1 = document.getElementById("err1");
    let e2 = document.getElementById("err2");

    e1.innerHTML = "";
    e2.innerHTML = "";

    let flag = true;

    if (email === "") {
        e1.innerHTML = "Email cannot be blank.";
        flag = false;
    }

    if (password === "") {
        e2.innerHTML = "Password cannot be blank.";
        flag = false;
    }

    return flag;
}

// Function to validate profile form
function isProfileValid(pForm) {
    const fullName = pForm.full_name.value.trim();
    const contact = pForm.contact.value.trim();

    let e1 = document.getElementById("err1"); 
    let e2 = document.getElementById("err2"); 

    e1.innerHTML = "";
    e2.innerHTML = "";

    let flag = true;

    if (fullName === "") {
        e1.innerHTML = "Full name cannot be blank.";
        flag = false;
    } 

    if (contact === "") {
        e2.innerHTML = "Contact number cannot be blank.";
        flag = false;
    } else {
        // Simple contact number regex (e.g., 10 digits)
        const contactRegex = /^\d{10}$/;
        if (!contactRegex.test(contact)) {
            e2.innerHTML = "Invalid contact number.";
            flag = false;
        }
    } 

    return flag;
}

// Function to validate password change form
function isPasswordChangeValid(pForm) {
    const oldPassword = pForm.old_password.value;
    const newPassword = pForm.new_password.value;
    const confirmNewPassword = pForm.confirm_password.value;

    let e1 = document.getElementById("err1"); 
    let e2 = document.getElementById("err2"); 
    let e3 = document.getElementById("err3"); 

    e1.innerHTML = "";
    e2.innerHTML = "";
    e3.innerHTML = "";

    let flag = true;

    if (oldPassword === "") {
        e1.innerHTML = "Old password cannot be blank.";
        flag = false;
    }

    if (newPassword === "") {
        e2.innerHTML = "New password cannot be blank.";
        flag = false;
    } else if (newPassword.length < 6) {
        e2.innerHTML = "New password must be at least 6 characters.";
        flag = false;
    }

    if (confirmNewPassword === "") {
        e3.innerHTML = "Confirm new password cannot be blank.";
        flag = false;
    } else if (newPassword !== confirmNewPassword) {
        e3.innerHTML = "New passwords do not match.";
        flag = false;
    }

    return flag;
}

// **AJAX Function to Check Email Existence**
function checkEmail() {
    const email = document.getElementById("email").value.trim();
    const emailError = document.getElementById("emailErr");

    if (email === "") {
        emailError.innerHTML = "Email cannot be blank.";
        return;
    }

    // Create an XMLHttpRequest object
    const xhttp = new XMLHttpRequest();

    // Define the callback
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            try {
                const response = JSON.parse(this.responseText);
                if (response.status === 'exists') {
                    emailError.innerHTML = response.msg;
                } else if (response.status === 'available') {
                    emailError.innerHTML = '<span style="color: green;">' + response.msg + '</span>';
                } else {
                    emailError.innerHTML = response.msg;
                }
            } catch (e) {
                console.error("Invalid JSON response:", this.responseText);
            }
        }
    };

    // Open the request
    xhttp.open("POST", "../controllers/AjaxController.php", true);

    // Set the request header
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Send the request with action and email
    xhttp.send(`action=checkEmail&email=${encodeURIComponent(email)}`);
}

// **AJAX Function to Verify Old Password**
function verifyOldPassword() {
    const oldPassword = document.getElementById("old_password").value;
    const oldPasswordError = document.getElementById("oldPasswordErr");

    if (oldPassword === "") {
        oldPasswordError.innerHTML = "Old password cannot be blank.";
        return;
    }

    // Create an XMLHttpRequest object
    const xhttp = new XMLHttpRequest();

    // Define the callback
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            try {
                const response = JSON.parse(this.responseText);
                if (response.status === 'valid') {
                    oldPasswordError.innerHTML = '<span style="color: green;">' + response.msg + '</span>';
                } else if (response.status === 'invalid') {
                    oldPasswordError.innerHTML = response.msg;
                } else {
                    oldPasswordError.innerHTML = response.msg;
                }
            } catch (e) {
                console.error("Invalid JSON response:", this.responseText);
            }
        }
    };

    // Open the request
    xhttp.open("POST", "../controllers/AjaxController.php", true);

    // Set the request header
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Send the request with action and old_password
    xhttp.send(`action=verifyOldPassword&old_password=${encodeURIComponent(oldPassword)}`);
}

// **AJAX Function to Update Profile**
function updateProfile(event) {
    event.preventDefault(); // Prevent the default form submission

    const form = document.getElementById("profileForm");
    if (!isProfileValid(form)) {
        return;
    }

    const fullName = form.full_name.value.trim();
    const contact = form.contact.value.trim();
    const gender = form.gender.value;

    // Create an XMLHttpRequest object
    const xhttp = new XMLHttpRequest();

    // Define the callback
    xhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            try {
                const response = JSON.parse(this.responseText);
                const messageDiv = document.getElementById("message");
                if (response.status === 'success') {
                    messageDiv.innerHTML = `<p class="success">${response.msg}</p>`;
                } else {
                    messageDiv.innerHTML = `<p class="error">${response.msg}</p>`;
                }
            } catch (e) {
                console.error("Invalid JSON response:", this.responseText);
            }
        }
    };

    // Open the request
    xhttp.open("POST", "../controllers/AjaxController.php", true);

    // Set the request header
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // Send the request with action and profile data
    xhttp.send(`action=updateProfile&full_name=${encodeURIComponent(fullName)}&contact=${encodeURIComponent(contact)}&gender=${encodeURIComponent(gender)}`);
}
