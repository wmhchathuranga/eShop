<?php

require("./connection.php");

session_start();
if(!$_SESSION["user"]){
    return 0;
}

$product_id = $_POST["id"];
$status = $_POST["status"];

$query = "UPDATE `product` SET `status_id` = $status WHERE `id` = $product_id AND `user_email` = '".$_SESSION["user"]["email"]."'";
try {
    Database::iud($query);
} catch (\Throwable $th) {
    echo $th;
}
?>