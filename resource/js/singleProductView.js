function loadMainImg(id) {
    // alert(1);
    var img = document.getElementById("productImg" + id).src;
    var main_img = document.getElementById("main_img");
    main_img.style.backgroundImage = "url(" + img + ")";
    // mainimg.style.backgroundColor = "red";
}

function qty_inc(qty) {
    var input = document.getElementById("qty_input");
    if (input.value < qty) {
        var newValue = parseInt(input.value) + 1;
        input.value = newValue.toString();
    } else {
        alert("Maximum quantity has achieved");
        input.value = qty;
    }
}

function qty_dec() {
    var input = document.getElementById("qty_input");
    if (input.value > 1) {
        var newValue = parseInt(input.value) - 1;
        input.value = newValue.toString();
    } else {
        input.value = 1;
    }
}
