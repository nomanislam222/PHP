function isValid(pForm) {
    const email = pForm.email.value;
    const fullName = pForm.full_name.value;
    const contact = pForm.contact.value;
    const password = pForm.password.value;
    const confirmPassword = pForm.confirm_password.value;
    const gender = pForm.gender.value;

    let e1 = document.getElementById("err1"); 
    let e2 = document.getElementById("err2"); 
    let e3 = document.getElementById("err3"); 
    let e4 = document.getElementById("err4"); 
    let e5 = document.getElementById("err5"); 
    let e6 = document.getElementById("err6"); 

    e1.innerHTML = "";
    e2.innerHTML = "";
    e3.innerHTML = "";
    e4.innerHTML = "";
    e5.innerHTML = "";
    e6.innerHTML = "";

    let flag = true;

    if (email === "") {
        e1.innerHTML = "Please provide an email";
        flag = false;
    }

    if (fullName === "") {
        e2.innerHTML = "Please provide your full name";
        flag = false;
    }

    if (contact === "") {
        e3.innerHTML = "Please provide a contact number";
        flag = false;
    }

    if (password === "") {
        e4.innerHTML = "Please provide a password";
        flag = false;
    }

    if (confirmPassword === "") {
        e5.innerHTML = "Please confirm your password";
        flag = false;
    } else if (password !== confirmPassword) {
        e5.innerHTML = "Passwords do not match";
        flag = false;
    }

    if (!pForm.gender.value) {
        e6.innerHTML = "Please select your gender";
        flag = false;
    }

    return flag;
}
