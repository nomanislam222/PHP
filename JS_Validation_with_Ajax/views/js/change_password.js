function validatePasswordForm(pForm) {
    const currentPassword = pForm.current_password.value.trim();
    const newPassword = pForm.new_password.value.trim();
    const confirmPassword = pForm.confirm_password.value.trim();

    let flag = true;

    let eCurrent = document.getElementById("err_current_password");
    let eNew = document.getElementById("err_new_password");
    let eConfirm = document.getElementById("err_confirm_password");

    eCurrent.innerHTML = "";
    eNew.innerHTML = "";
    eConfirm.innerHTML = "";

    if (currentPassword === "") {
        eCurrent.innerHTML = "Please enter your current password.";
        flag = false;
    }

    if (newPassword === "") {
        eNew.innerHTML = "Please enter a new password.";
        flag = false;
    } else if (newPassword.length < 6) {
        eNew.innerHTML = "New password must be at least 6 characters long.";
        flag = false;
    }

    if (confirmPassword === "") {
        eConfirm.innerHTML = "Please confirm your new password.";
        flag = false;
    } else if (newPassword !== confirmPassword) {
        eConfirm.innerHTML = "Passwords do not match.";
        flag = false;
    }

    return flag;
}
