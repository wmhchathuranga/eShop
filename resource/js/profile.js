function updateProfile() {
    // alert(1);
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var mobile = document.getElementById("mobile");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");
    var province = document.getElementById("province");
    var district = document.getElementById("district");
    var city = document.getElementById("city");
    var pcode = document.getElementById("pcode");
    var image = document.getElementById("profileimg");

    var f = new FormData();
    f.append("fn", fname.value);
    f.append("ln", lname.value);
    f.append("m", mobile.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);
    f.append("p", province.value);
    f.append("d", district.value);
    f.append("c", city.value);
    f.append("pc", pcode.value);

    if (image.files.length == 0) {

        var confirmation = confirm("Are you sure You don't want to update Profile Image?");

    } else {
        f.append("image", image.files[0]);
    }

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == 1) {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("POST", "updateProfileProcess.php", true);
    r.send(f);
}

function changeImage() {
    var view = document.getElementById("viewImg");//img tag
    var file = document.getElementById("profileimg");//file chooser

    file.onchange = function () {
        var file1 = this.files[0];
        var url = window.URL.createObjectURL(file1);
        view.src = url;
    }

}

function getDistrict(){
    var district = document.getElementById("district");
    var province = document.getElementById("province");
    var selected_province_id = province.options[province.options.selectedIndex].value;
    var option_length = district.options.length;
    for(var i = 0; i <= option_length; i++){
        district.options.remove(i);
        district.options.remove(district.options.selectedIndex);
    }

    var request = new XMLHttpRequest();
    var form = new FormData();
    form.append("province_id",selected_province_id);

    request.onreadystatechange = ()=>{
        if(request.readyState == 4){
            var response = request.responseText;
            var jsonRespone = JSON.parse(response);
            var option = document.createElement("option");
            option.innerHTML = "Select Destrict";
            option.value = 0;
            option.setAttribute("selected",true);
            district.options.add(option);

            for(let i in jsonRespone){
                option = document.createElement("option");
                option.innerHTML = jsonRespone[i].name;
                option.value = jsonRespone[i].id;
                district.options.add(option);
            } 
        }
    }

    request.open("POST","getAddress.php",true);
    request.send(form);

    
    
}

function getCity(){
    var city = document.getElementById("city");
    var district = document.getElementById("district");
    var selected_district_id = district.options[district.options.selectedIndex].value;
    var option_length = city.options.length;
    
    for(var i = 0; i <= option_length; i++){
        city.options.remove(i);
        city.options.remove(city.options.selectedIndex);
    }

    var request = new XMLHttpRequest();
    var form = new FormData();
    form.append("district_id",selected_district_id);

    request.onreadystatechange = ()=>{
        if(request.readyState == 4){
            var response = request.responseText;
            var jsonRespone = JSON.parse(response);
            var option = document.createElement("option");
            option.innerHTML = "Select City";
            option.value = 0;
            option.setAttribute("selected",true);
            city.options.add(option);
            
            for(let i in jsonRespone){
                option = document.createElement("option");
                option.innerHTML = jsonRespone[i].name;
                option.value = jsonRespone[i].id;
                city.options.add(option);
            } 
        }
    }

    request.open("POST","getAddress.php",true);
    request.send(form);

    
    
}

function showPassword(){
    var eye1 = document.getElementById("eye1");
    var eye2 = document.getElementById("eye2");
    var password = document.getElementById("password");

    eye1.classList.toggle("d-none");
    eye2.classList.toggle("d-none");

    if(password.getAttribute("type") == "password"){
        password.setAttribute("type","text");
    }
    else if(password.getAttribute("type") != "password"){
        password.setAttribute("type","password");
    }

}