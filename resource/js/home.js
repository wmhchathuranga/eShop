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