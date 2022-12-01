function deleteFromCart(id){
    var  r = new XMLHttpRequest();

    r.onreadystatechange = function (){
        if(r.readyState == 4){
            var t = r.responseText;

            if(t == "Product has been removed"){
                alert (t);
                window.location.reload();
            }else{
                alert (t);
            }
        }
    }

    r.open("GET","removeCartProcess.php?id="+id,true);
    r.send();
}   
