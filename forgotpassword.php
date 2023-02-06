<?php

include_once("./connection.php");

include_once("./email/PHPMailer.php");
include_once("./email/SMTP.php");
include_once("./email/POP3.php");
include_once("./email/OAuth.php");
include_once("./email/Exception.php");

use PHPMailer\PHPMailer\PHPMailer;

$email = $_POST["email"];

if (empty($email)) {
    echo ("Please enter your Email");
} else if (strlen($email) > 100) {
    echo ("Invalid Email Address");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Address");
}
else{

    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $response = Database::select($query);
    $rows = $response->num_rows;
    if($rows > 0){

        $token = uniqid(more_entropy:true);

        $query2 = "UPDATE `users` SET `verification_code` = '$token' WHERE `email` = '$email'";
        Database::iud($query2);

        // Construct the email
        $mail = new PHPMailer;
        $mail->IsSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'harshana.all@gmail.com';
        $mail->Password = 'pyoncsvosvmjchfy';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('harshana.all@timewall.io', 'Eshop Account Team');
        $mail->addReplyTo('harshana.all@timewall.io', 'Eshop Account Team');
        $mail->addAddress($email);
        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Verification Code';
        $bodyContent = '<p">You have requested for a password reset. Please click on the link below to reset you Password <br/> <a href="http://localhost/eShop/password-reset.php?token='.$token.'">Reset Password</a></p>';
        $mail->Body    = $bodyContent;

        if($mail->send()){
            echo "Reset email sent to $email. ";
        }
        else{
            echo "Service is not available, Try again shortly.";
        }
    }
    else{
        echo "Invalid Email Address 1";
    }
}


