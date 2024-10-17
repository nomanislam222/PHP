function isValid(pForm) {
    const fullName = pForm.full_name.value;
    const contact = pForm.contact.value;

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
    } 

    return flag;
}
