<?php
require_once("./connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | Eshop</title>
    <link rel="shortcut icon" href="./resources/img/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="./resources/css/bootstrap.css">
    <link rel="stylesheet" href="./resources/css/login.css">
</head>

<body>
    <div class="container-fluid background vh-100">
        <div class="row welcome justify-content-center h-25">
            <div class="col-md-4 h-100">
                <div class="row h-100 p-3">
                    <img src="./resources/img/logo.svg" alt="" class="img-fluid h-75">
                    <p class="text-center fs-2 m-0 welcome-text">Hi, Welcome to eShop</p>
                </div>
            </div>
        </div>
        <div class="row form px-2">
            <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center">
                <img src="./resources/img/background.svg" alt="" class="img-fluid h-75">
            </div>

            <!-- Sign up div -->
            <div class="col-md-6 pt-5 " id="signup-div">
                <div class="row align-items-center h-100">
                    <div class="form-container">
                        <div class="row d-none d-md-block">
                            <h2 class="fs-3 ">Create New Account</h2>
                        </div>
                        <div class="row d-md-none">
                            <h2 class="fs-3 text-center">Create New Account</h2>
                        </div>
                        <div class="col">
                            <div class="alert alert-danger d-none alert-dismissible fade show" role="alert" id="err-popup1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle mb-1" viewBox="0 0 16 16">
                                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
                                </svg>
                                <span id="err-msg1">
                                    
                                </span>
                            
                            </div>
                            <div class="alert alert-success d-none" role="alert" id="success1">
                                Registration Successfull!
                                
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-md-6">
                                <label for="fname" class="d-block">First Name</label>
                                <input type="text" class="form-control" id="fname">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lname" class="d-block">Last Name</label>
                                <input type="text" class="form-control" id="lname">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group">
                                <label for="email" class="d-block">Email</label>
                                <input type="email" class="form-control" id="email-signup">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group">
                                <label for="password" class="d-block">Password</label>
                                <input type="password" class="form-control" id="password-signup">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-md-6">
                                <label for="mobile" class="d-block">Mobile</label>
                                <input type="text" class="form-control" id="mobile" placeholder="0771231231">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="gender" class="d-block">Gender</label>
                                <select name="gender" id="gender" class="form-select">
                                    <?php
                                    $query = "SELECT * FROM `gender`";
                                    $response = Database::select($query);
                                    $rows = $response->num_rows;

                                    for ($x = 0; $x < $rows; $x++) {
                                        $gender_row = $response->fetch_assoc();
                                        echo ("<option value='" . $gender_row['id'] . "'>" . $gender_row['gender_name'] . "</option>");
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-md-6 mb-2">
                                <button class="btn btn-primary w-100" onclick="signUp()">Sign Up</button>
                            </div>
                            <div class="col-md-6 mb-2">
                                <button class="btn btn-dark w-100" onclick="toggle_sign()">Already have an account? Sign In</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sign in div -->
            <div class="col-md-6 pt-5 d-none" id="signin-div">
                <div class="row align-items-center h-100">
                    <div class="form-container">
                        <div class="row d-none d-md-block mb-4">
                            <h2 class="fs-3 ">Sign In</h2>
                        </div>
                        <div class="col">
                            <div class="alert alert-danger d-none alert-dismissible fade show" role="alert" id="err-popup2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle mb-1" viewBox="0 0 16 16">
                                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z" />
                                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z" />
                                </svg>
                                <span id="err-msg2">
                                    
                                </span>
                            
                            </div>
                            <div class="alert alert-success d-none" role="alert" id="success2">
                                Login Success!
                                
                            </div>
                        </div>
                        <div class="row d-md-none">
                            <h2 class="fs-3 text-center mb-2">Sign In</h2>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group">
                                <label for="email" class="d-block">Email</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group">
                                <label for="password" class="d-block">Password</label>
                                <input type="password" class="form-control" id="password">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="form-group col-6">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" id="remember_me" class="form-check-input">
                                    <label for="remember" class="form-check-label d-block">Remember Me</label>
                                </div>
                            </div>
                            <div class="form-group col-6">
                                <div class="row pe-1">
                                    <span class="text-end">
                                        <a href="#">Forgot Password</a>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-md-6 mb-2">
                                <button class="btn btn-primary w-100" onclick="signIn()">Sign In</button>
                            </div>
                            <div class="col-md-6 mb-2">
                                <button class="btn btn-danger w-100" onclick="toggle_sign()">New to eShop? Join Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row footer">
            <div class="col">
                <p class="text-center copyright small mb-0 mt-3">&copy; 2022 eshop.lk || All Right Reserved</p>
            </div>
        </div>
    </div>

    <script src="./resources/js/bootstrap.bundle.js"></script>
    <script src="./resources/js/login.js"></script>
</body>

</html>