<?php

include_once("./connection.php");

$email = $_POST["email"];
$password = $_POST["password"];
$remember = $_POST["remember"];

if (empty($email)) {
    echo ("Please enter your Email");
} else if (strlen($email) > 100) {
    echo ("Email must have less than 100 characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email");
} else if (empty($password)) {
    echo ("Please enter your Password");
} else if (strlen($password) < 8 || strlen($password) > 20) {
    echo ("Password must have between 8-20 charaters");
} else {
    $query1 = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
    $response = Database::select($query1);
    $rows = $response->num_rows;
    if($rows > 0){
        echo "Success";
    }
    else{
        echo "Invalid Username or Password";
    }
}