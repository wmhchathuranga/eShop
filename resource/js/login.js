var signup_div = document.getElementById("signup-div");
var signin_div = document.getElementById("signin-div");

function toggle_sign() {
    signin_div.classList.toggle("d-none");
    signup_div.classList.toggle("d-none");
}

function signUp() {
    var fname = document.getElementById("fname")
    var lname = document.getElementById("lname")
    var email = document.getElementById("email-signup")
    var password = document.getElementById("password-signup")
    var mobile = document.getElementById("mobile")
    var gender = document.getElementById("gender")

    var form = new FormData;
    form.append("fname", fname.value);
    form.append("lname", lname.value);
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("mobile", mobile.value);
    form.append("gender", gender.value);
    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var response = request.responseText;
            var err_popup = document.getElementById("err-popup1");
            var err_msg = document.getElementById("err-msg1");
            if (response != "Success") {
                err_msg.innerHTML = response;
                if(err_popup.classList.contains("d-none")){
                    err_popup.classList.toggle("d-none");
                }
                if(!document.getElementById("success1").classList.contains("d-none")){
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
                    toggle_sign();
                }, 2000);
            }
        }
    }
    request.open("POST", "signupProcess.php", true);
    request.send(form);
}

function signIn() {

    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var remember_me = document.getElementById("remember_me");

    var form = new FormData;
    form.append("email", email.value);
    form.append("password", password.value);
    form.append("remember", remember_me.checked);

    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            var response = request.responseText;
            var err_popup = document.getElementById("err-popup2");
            var err_msg = document.getElementById("err-msg2");
            if (response != "Success") {
                err_msg.innerHTML = response;
                if(err_popup.classList.contains("d-none")){
                    err_popup.classList.toggle("d-none");
                }
                if(!document.getElementById("success2").classList.contains("d-none")){
                    document.getElementById("success2").classList.toggle("d-none");
                }
            }
            else {
                if( !err_popup.classList.contains("d-none")){
                    err_popup.classList.toggle("d-none");
                }
                if(document.getElementById("success2").classList.contains("d-none")){
                    document.getElementById("success2").classList.toggle("d-none");
                }
                setTimeout(() => {
                    window.location = "home.php";
                }, 2000);
            }
        }
    }

    request.open("POST", "signinProcess.php", true);
    request.send(form);

}

function forgotPassword(){
    var email = document.getElementById("reset-email");

    var form = new FormData();
    form.append("email",email.value);
    var request = new XMLHttpRequest();
    request.onreadystatechange = () =>{
        if(request.readyState == 4){
            alert(request.responseText);
        }
    }

    request.open("POST", "forgotpassword.php", true);
    request.send(form);
}