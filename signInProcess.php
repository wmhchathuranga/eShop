<?php

session_start();

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
    if($rows == 1){
        
        $user = $response->fetch_assoc();
        
        $_SESSION["user"] = $user;

        if($remember == "true"){
            setcookie("email",$email,time()+(60*60*24*30));
            setcookie("password",$password,time()+(60*60*24*30));
        }
        else{
            setcookie("email","",-1);
            setcookie("password","",-1);
        }
        echo "Success";
    }
    else{
        echo "Invalid Username or Password";
    }
}