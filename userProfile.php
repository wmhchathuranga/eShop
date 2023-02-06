<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User Profile | eShop</title>

    <link rel="stylesheet" href="./resource/css/bootstrap.css" />
    <link rel="stylesheet" href="./resource/css/profile.css" />

    <link rel="icon" href="resource/logo.svg" />
</head>

<body>

    <div class="container-fluid">
        <?php include "header.php"; ?>
        <div class="row">

            <?php

            require_once "connection.php";

            if (isset($_SESSION["user"])) {

                $email = $_SESSION["user"]["email"];

                $details_rs = Database::select("SELECT * FROM `users` INNER JOIN `gender` ON 
                gender.id=users.gender_id WHERE `email`='" . $email . "'");

                $image_rs = Database::select("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");

                $address_rs = Database::select("SELECT * FROM `user_has_address` 
                INNER JOIN `city` ON user_has_address.city_id=city.id 
                INNER JOIN `district` ON city.district_id=district.id 
                INNER JOIN `province` ON district.province_id=province.id WHERE `user_email`='" . $email . "'");

                $data = $details_rs->fetch_assoc();
                $image_data = $image_rs->fetch_assoc();
                $address_data = $address_rs->fetch_assoc();

            ?>

                <div class="col-12 bg-light">
                    <div class="row">
                        <div class="col-12 bg-body rounded mt-4 mb-4">
                            <div class="row g-2">

                                <!-- Profile image -->
                                <div class="col-md-3 border-end">
                                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                                        <?php

                                        $image_rs = Database::select("SELECT * FROM `profile_image` WHERE `user_email`='" . $email . "'");

                                        if (empty($image_data["path"])) {

                                        ?>
                                            <img src="resource/profile_img/new_user.svg" class="rounded-circle mt-5" style="width: 150px;" id="viewImg" />
                                        <?php

                                        } else {
                                        ?>
                                            <img src="<?php echo $image_data["path"]; ?>" class="rounded-circle mt-5 mb-3" style="width: 150px; height:160px" id="viewImg" />
                                        <?php
                                        }

                                        ?>

                                        <span class="fw-bold"><?php echo $data["fname"] . " " . $data["lname"]; ?></span>
                                        <span class="fw-bold text-black-50"><?php echo $email; ?></span>

                                        <input type="file" class="d-none" id="profileimg" accept="image/*" />
                                        <label for="profileimg" class="btn btn-primary mt-4 w-75" onclick="changeImage();">Update Profile Image</label>

                                    </div>
                                </div>

                                <!-- Update information -->
                                <div class="col-md-5 border-end">
                                    <div class="p-3 py-5">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h4 class="fw-bold">Profile Settings</h4>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-6">
                                                <label class="form-label d-block">First Name</label>
                                                <input type="text" class="form-control" value="<?php echo $data["fname"]; ?>" id="fname" />
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label d-block">Last Name</label>
                                                <input type="text" class="form-control" value="<?php echo $data["lname"]; ?>" id="lname" />
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label mt-2 d-block">Mobile</label>
                                                <input type="text" class="form-control" value="<?php echo $data["mobile"]; ?>" id="mobile" />
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label mt-2 d-block">Password</label>
                                                <div class="input-group">
                                                    <input type="password" class="form-control" readonly value="<?php echo $data["password"]; ?>" id="password" />
                                                    <span class="input-group-text bg-primary" id="basic-addon1" class="show-password" onclick="showPassword()">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill d-none" id="eye1" viewBox="0 0 16 16">
                                                            <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z" />
                                                            <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z" />
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" id="eye2" viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label mt-2 d-block">Email</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $data["email"]; ?>" />
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label mt-2 d-block">Registered Date</label>
                                                <input type="text" class="form-control" readonly value="<?php echo $data["joined_date"]; ?>" />
                                            </div>
                                            <?php

                                            if (!empty($address_data["line1"])) {

                                            ?>

                                                <div class="col-12">
                                                    <label class="form-label mt-2 d-block">Address Line 1</label>
                                                    <input type="text" class="form-control" value="<?php echo $address_data["line1"]; ?>" id="line1" />
                                                </div>

                                            <?php

                                            } else {
                                            ?>

                                                <div class="col-12">
                                                    <label class="form-label mt-2 d-block">Address Line 1</label>
                                                    <input type="text" class="form-control" id="line1" />
                                                </div>

                                            <?php
                                            }

                                            if (!empty($address_data["line2"])) {

                                            ?>
                                                <div class="col-12">
                                                    <label class="form-label mt-2 d-block">Address Line 2</label>
                                                    <input type="text" class="form-control" value="<?php echo $address_data["line2"]; ?>" id="line2" />
                                                </div>
                                            <?php

                                            } else {
                                            ?>
                                                <div class="col-12">
                                                    <label class="form-label mt-2 d-block">Address Line 2</label>
                                                    <input type="text" class="form-control" id="line2" />
                                                </div>
                                            <?php
                                            }


                                            $provice_id;
                                            $district_id;
                                            $province_rs = Database::select("SELECT * FROM `province`");


                                            ?>

                                            <div class="col-6">
                                                <label class="form-label mt-2 d-block">Province</label>
                                                <select class="form-select" id="province" onchange="getDistrict()">
                                                    <option value="0">Select Province</option>

                                                    <?php
                                                    $province_num = $province_rs->num_rows;
                                                    for ($x = 0; $x < $province_num; $x++) {
                                                        $province_data = $province_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $province_data["id"]; ?>" <?php
                                                                                                            if (!empty($address_data["province_id"])) {

                                                                                                                if ($province_data["id"] == $address_data["province_id"]) {
                                                                                                                    $provice_id = $province_data["id"];
                                                                                                            ?>selected<?php
                                                                                                                    }
                                                                                                                }

                                                                                                                        ?>><?php echo $province_data["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label mt-2 d-block">District</label>
                                                <select class="form-select" id="district" onchange="getCity()">
                                                    <option value="0">Select District</option>
                                                    <?php

                                                    $district_rs = Database::select("SELECT * FROM `district`  WHERE `province_id` = $provice_id");
                                                    $district_num = $district_rs->num_rows;
                                                    for ($x = 0; $x < $district_num; $x++) {
                                                        $district_data = $district_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $district_data["id"]; ?>" <?php
                                                                                                            if (!empty($address_data["district_id"])) {
                                                                                                                if ($district_data["id"] == $address_data["district_id"]) {
                                                                                                                    $district_id = $district_data["id"];
                                                                                                            ?>selected<?php
                                                                                                                    }
                                                                                                                }
                                                                                                                        ?>><?php echo $district_data["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label mt-2 d-block">City</label>
                                                <select class="form-select" id="city">
                                                    <option value="0">Select City</option>
                                                    <?php
                                                    $city_rs = Database::select("SELECT * FROM `city` WHERE `district_id` = $district_id");
                                                    $city_num = $city_rs->num_rows;
                                                    for ($x = 0; $x < $city_num; $x++) {
                                                        $city_data = $city_rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $city_data["id"]; ?>" <?php
                                                                                                        if (!empty($address_data["city_id"])) {
                                                                                                            if ($city_data["id"] == $address_data["city_id"]) {
                                                                                                        ?>selected<?php
                                                                                                                }
                                                                                                            }
                                                                                                                    ?>><?php echo $city_data["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <?php

                                            if (!empty($address_data["postal_code"])) {
                                            ?>
                                                <div class="col-6">
                                                    <label class="form-label mt-2 d-block">Postal-Code</label>
                                                    <input type="text" class="form-control" value="<?php echo $address_data["postal_code"]; ?>" id="pcode" />
                                                </div>
                                            <?php
                                            } else {
                                            ?>
                                                <div class="col-6">
                                                    <label class="form-label mt-2 d-block">Postal-Code</label>
                                                    <input type="text" class="form-control" id="pcode" />
                                                </div>
                                            <?php
                                            }

                                            ?>
                                            <div class="col-12">
                                                <label class="form-label mt-2 d-block">Gender</label>
                                                <input type="text" class="form-control" readonly value="<?php echo ($data["gender_name"]); ?>" />
                                            </div>
                                            <div class="col-12 d-grid mt-3">
                                                <button class="btn btn-primary" onclick="updateProfile();">Update My Profile</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- User Ratings -->
                                <div class="col-md-4 text-center d-md-block d-none">
                                    <div class="row">
                                        <span class="mt-5 fw-bold text-black-50"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <?php

            } else {
                header("Location: home.php");
            }

            ?>

            <?php include "footer.php"; ?>
        </div>
    </div>

    <script src="./resource/js/profile.js"></script>

</body>

</html>