<?php

session_start();

require "connection.php";

try {


    if (isset($_SESSION["user"])) {

        $fname = $_POST["fn"];
        $lname = $_POST["ln"];
        $mobile = $_POST["m"];
        $line1 = $_POST["l1"];
        $line2 = $_POST["l2"];
        $province = $_POST["p"];
        $district = $_POST["d"];
        $city = $_POST["c"];
        $pcode = $_POST["pc"];

        // Image processing
        if (isset($_FILES["image"])) {
            $image = $_FILES["image"];

            $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
            $file_ex = $image["type"];

            if (!in_array($file_ex, $allowed_image_extentions)) {
                echo ("Please select a valid image.");
            } else {

                $new_file_extention;

                if ($file_ex == "image/jpg") {
                    $new_file_extention = ".jpg";
                } else if ($file_ex == "image/jpeg") {
                    $new_file_extention = ".jpeg";
                } else if ($file_ex == "image/png") {
                    $new_file_extention = ".png";
                } else if ($file_ex == "image/svg+xml") {
                    $new_file_extention = ".svg";
                }

                $file_name = "./resource/profile_img/" . $_SESSION["user"]["fname"] . "_" . uniqid() . $new_file_extention;
                // $file_name = "./resource/profile_img/test.png";

                move_uploaded_file($image["tmp_name"], $file_name);

                $image_rs = Database::select("SELECT * FROM `profile_image` WHERE 
            `user_email`='" . $_SESSION["user"]["email"] . "'");
                $image_num = $image_rs->num_rows;

                if ($image_num == 1) {

                    Database::iud("UPDATE `profile_image` SET `path`='" . $file_name . "' WHERE 
                `user_email`='" . $_SESSION["user"]["email"] . "'");
                } else {

                    Database::iud("INSERT INTO `profile_image` (`path`,`user_email`) VALUES 
                ('" . $file_name . "','" . $_SESSION["user"]["email"] . "')");
                }
            }
        }

        Database::iud("UPDATE `users` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`mobile`='" . $mobile . "'
            WHERE `email`='" . $_SESSION["user"]["email"] . "'");

        $address_rs = Database::select("SELECT * FROM `user_has_address` WHERE 
            `user_email`='" . $_SESSION["user"]["email"] . "'");
        $address_num = $address_rs->num_rows;

        if ($address_num == 1) {

            Database::iud("UPDATE `user_has_address` SET `line1`='" . $line1 . "',
                `line2`='" . $line2 . "',
                `city_id`='" . $city . "',
                `postal_code`='" . $pcode . "' WHERE `user_email`='" . $_SESSION["user"]["email"] . "'");
        } else {

            Database::iud("INSERT INTO `user_has_address`
                (`line1`,`line2`,`user_email`,`city_id`,`postal_code`) VALUES
                ('" . $line1 . "','" . $line2 . "','" . $_SESSION["user"]["email"] . "','" . $city . "','" . $pcode . "')");
        }

        echo 1;
    } else {
        echo 2;
    }
} catch (\Throwable $th) {
    echo $th;
}
