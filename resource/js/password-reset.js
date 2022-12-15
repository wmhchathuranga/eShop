function resetPassword() {
    var password1 = document.getElementById("password1");
    var password2 = document.getElementById("password2");
    var token = document.getElementById("token");

    if (password1.value != password2.value) {
        alert("Password not matching");
    }

    var form = new FormData();
    form.append("password1",password1.value);
    form.append("password2",password2.value);
    form.append("token",token.value);
    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var response = request.responseText;
            var err_popup = document.getElementById("err-popup1");
            var err_msg = document.getElementById("err-msg1");
            if (response != "Success") {
                err_msg.innerHTML = response;
                if (err_popup.classList.contains("d-none")) {
                    err_popup.classList.toggle("d-none");
                }
                if (!document.getElementById("success1").classList.contains("d-none")) {
                    document.getElementById("success1").classList.toggle("d-none");
                }
            }
            else {
                if(!err_popup.classList.contains("d-none")){
                    err_popup.classList.toggle("d-none");
                }
                if(document.getElementById("success1").classList.contains("d-none")){
                    document.getElementById("success1").classList.toggle("d-none");
                }
                setTimeout(() => {
                    window.location = "welcome.php";
                }, 3000);
            }
        }
    }

    request.open("POST","passwordresetProcess.php", true);
    request.send(form);
}