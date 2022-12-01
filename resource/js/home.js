function basic_search() {
    var carousel = document.getElementById("carousel");
    var items = document.getElementById("items");
    var category = document.getElementById("search_category");
    var text = document.getElementById("search_text");
    var search_result = document.getElementById("search_result");
    var result_text = document.getElementById("result_text");
    var showing_results = document.getElementById("showing_results");
    var form = new FormData();

    form.append("category", category.value);
    form.append("text", text.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = () => {
        if (request.readyState == 4) {
            if(!items.classList.contains("d-none")){
                items.classList.toggle("d-none");
            }
            if(carousel.classList.contains("d-md-block")){
                carousel.classList.toggle("d-md-block");
            }
            result_text.innerText = text.value;
            if(showing_results.classList.contains("d-none")){
                showing_results.classList.toggle("d-none");
            }
            var response = request.responseText;
            search_result.innerHTML = response;
        }
    }
    request.open("POST", "basicSearch.php", true);
    request.send(form);
}


function addToWatchlist(id) {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "removed") {
                document.getElementById("heart" + id).style.className = "text-dark";
                window.location.reload();
            } else if (t == "added") {
                document.getElementById("heart" + id).style.className = "text-danger";
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "addToWatchlistProcess.php?id=" + id, true);
    r.send();
}

function removeFromWatchlist(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "removeWatchlistProcess.php?id=" + id, true);
    r.send();

}

function addToCart(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            alert(t);
        }
    }

    r.open("GET", "addToCartProcess.php?id=" + id, true);
    r.send();

}

function deleteFromCart(id) {

    var r = new XMLHttpRequest();

    r.onreadystatechange = function () {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Product removed from cart");
                window.location.reload();
            } else {
                alert(t);
            }
        }
    }

    r.open("GET", "deleteFromCartProcess.php?id=" + id, true);
    r.send();

}
