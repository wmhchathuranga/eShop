function signout(){
    var request = new XMLHttpRequest();
    request.onreadystatechange = ()=>{
        if(request.readyState == 4){
            response = request.responseText;
            if(response == "Success"){
                window.location = "home.php";
            }
        }
    }

    request.open("GET","signoutProcess.php",true);
    request.send();
}

function signin(){
    window.location = "welcome.php";
}
