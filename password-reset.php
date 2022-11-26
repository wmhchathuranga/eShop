<?php
require_once("./connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset | Eshop</title>
    <link rel="shortcut icon" href="./resource/img/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="./resource/css/bootstrap.css">
    <link rel="stylesheet" href="./resource/css/login.css">
</head>

<body>
    <div class="container-fluid background vh-100">
        <div class="row welcome justify-content-center h-25">
            <div class="col-md-4 h-100">
                <div class="row h-100 p-3">
                    <img src="./resource/img/logo.svg" alt="" class="img-fluid h-75">
                    <p class="text-center fs-2 m-0 welcome-text">Hi, Welcome to eShop</p>
                </div>
            </div>
        </div>
        <div class="row form px-2 justify-content-center">
            <!-- Sign in div -->
            <div class="col-md-4 pt-5" id="signin-div">
                <div class="row align-items-center h-100">
                    <div class="form-container">
                        <div class="row d-none d-md-block mb-4">
                            <h2 class="fs-3 text-center">Reset Password</h2>
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
                                Password Reset Successfull!
                            </div>
                        </div>
                        <div class="row d-md-none">
                            <h2 class="fs-3 text-center mb-2">Reset Password</h2>
                        </div>
                        <div class="row mt-3">
                            <div class="form-group">
                                <label for="password1" class="d-block">New Password</label>
                                <input type="password" class="form-control" id="password1">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group">
                                <label for="password2" class="d-block">Retype Password</label>
                                <input type="password" class="form-control" id="password2">
                                <input type="hidden" name="token" id="token" value="<?php echo $_GET['token']; ?>">
                            </div>
                        </div>

                        

                        <div class="row my-3 justify-content-center">
                            <div class="col-md-6 mb-2">
                                <button class="btn btn-primary w-100" onclick="resetPassword()" type="submit">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row footer mt-5">
            <div class="col">
                <p class="text-center copyright small mb-0 mt-3">&copy; 2022 eshop.lk || All Right Reserved</p>
            </div>
        </div>
    </div>

    <script src="./resource/js/bootstrap.bundle.js"></script>
    <script src="./resource/js/password-reset.js"></script>
</body>

</html>