<?php

include_once("./connection.php");

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$mobile = $_POST["mobile"];
$gender = $_POST["gender"];

if(empty($fname)){
    echo ("Please enter your First Name !!!");
}else if(strlen($fname) > 50){
    echo ("First Name must have less than 50 characters");
}else if(empty($lname)){
    echo ("Please enter your Last Name !!!");
}else if(strlen($lname) > 50){
    echo ("Last Name must have less than 50 characters");
}else if (empty($email)){
    echo ("Please enter your Email !!!");
}else if(strlen($email) >= 100){
    echo ("Email must have less than 100 characters");
}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo ("Invalid Email !!!");
}else if (empty($password)){
    echo ("Please enter your Password !!!");
}else if(strlen($password) < 8 || strlen($password) > 20){
    echo ("Password must be between 8 - 20 charcters");
}else if(empty($mobile)){
    echo ("Please enter your Mobile !!!");
}else if(strlen($mobile) != 10){
    echo ("Mobile must have 10 characters");
}else if(!preg_match("/07[0,1,2,4,5,6,7,8][0-9]/",$mobile)){
    echo ("Invalid Mobile !!!");
}else{
    $date = new DateTime();
    $zone = new DateTimeZone("Asia/Colombo");
    $date -> setTimezone($zone);
    $date = $date->format("Y-m-d H:i:s");


    $query1 = "SELECT * FROM `users` WHERE `email` = '$email'";
    $response = Database::select($query1);
    $rows = $response->num_rows;
    
    if($rows > 0){
        echo "Account Already Exists. Please Sign In!";
    }
    else{
        $query2 = "INSERT INTO `users` (`fname`,`lname`,`email`,`password`,`mobile`,`gender_id`,`joined_date`,`status`) VALUES ('$fname','$lname','$email','$password','$mobile','$gender','$date','1')";
        Database::iud($query2);
        echo "Success";
    }
}