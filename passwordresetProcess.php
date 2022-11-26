<?php
include_once("./connection.php");

$password1 = $_POST["password1"];
$password2 = $_POST["password2"];
$token = $_POST["token"];

if (empty($password1) || empty($password2)){
    echo ("Password must be between 8 - 20 charcters");
}
else if ($password1 != $password2){
    echo ("Password not matching");
}
else if(strlen($password1) < 8 || strlen($password1) > 20){
    echo ("Password must be between 8 - 20 charcters");
}
else{
    $query1 = "SELECT * FROM `users` WHERE `verification_code` = '$token'";
    $response = Database::select($query1);
    $rows = $response->num_rows;
    if ($rows == 1){
        $row = $response->fetch_assoc();
        $email = $row["email"];
        $query2 = "UPDATE `users` SET `password` = '$password1' WHERE `email` = '$email'";
        $query3 = "UPDATE `users` SET `verification_code` = '' WHERE `email` = '$email'";
        Database::iud($query2);
        Database::iud($query3);
        echo "Success";
    }
    else{
        echo "Invalid Token!";
    }
}