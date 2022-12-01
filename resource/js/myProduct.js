function changeStatus(id){
    var product_id = id;
    var status_controller = document.getElementById("active");
    if(status_controller.checked){
        status_controller = 1;
    }
    else{
        status_controller = 2;
    }

    var form = new FormData();
    var request = new XMLHttpRequest();

    form.append("id",product_id);
    form.append("status",status_controller);

    request.onreadystatechange = ()=>{
        if(request.readyState == 4){
            var response = request.responseText;
            // alert(response);
            window.location.reload();
        }
    }

    request.open("POST", "changeItemStatus.php",true);
    request.send(form);
}

function sort(){
    
    var time1 = document.getElementById("time1");
    var time2 = document.getElementById("time2");
    var quantity1 = document.getElementById("quantity1");
    var quantity2 = document.getElementById("quantity2");
    var condition1 = document.getElementById("condition1");
    var condition2 = document.getElementById("condition2");
    
    var form = new FormData();
    var request = new XMLHttpRequest();

    form.append("time1",time1.checked);
    form.append("time2",time2.checked);
    form.append("quantity1",quantity1.checked);
    form.append("quantity2",quantity2.checked);
    form.append("condition1",condition1.checked);
    form.append("condition2",condition2.checked);

    request.onreadystatechange = ()=>{
        if(request.readyState == 4){
            var response = request.responseText;
            alert(response);
        }
    }

    request.open("POST","sortItems.php",true);
    request.send(form);

}

function basic_search() {

    var text = document.getElementById("search_text");
    var search_result = document.getElementById("search_result");

    var request = new XMLHttpRequest();

    request.onreadystatechange = () => {
        if (request.readyState == 4) {

            var response = request.responseText;
            search_result.innerHTML = response;
        }
    }
    request.open("GET", "myProductSearch.php?search="+text.value, true);
    request.send();
}

function sendId(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "updateProduct.php";
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "sendProductIdProcess.php?id=" + id, true);
    r.send();

}