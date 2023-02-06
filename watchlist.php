<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Watchlist | eShop</title>

    <link rel="stylesheet" href="./resource/css/bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./resource/css/style.css" />

    <link rel="icon" href="./resource/img/logo.svg" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">

            <?php
            include "header.php";


            if (isset($_SESSION["user"])) {

            ?>

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 border border-1 border-primary rounded mb-2">
                            <div class="row">

                                <div class="col-12">
                                    <label class="form-label fs-1 fw-bolder">Watchlist &hearts;</label>
                                </div>

                                <div class="col-12 col-lg-6">
                                    <hr />
                                </div>

                                <div class="col-12">
                                    <div class="row">
                                        <div class="offset-lg-2 col-12 col-lg-6 mb-3">
                                            <input type="text" class="form-control" placeholder="Search in Watchlist..." />
                                        </div>
                                        <div class="col-12 col-lg-2 mb-3 d-grid">
                                            <button class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <hr />
                                </div>

                                <div class="col-11 col-lg-2 border-0 border-end border-1 border-dark">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Watchlist</li>
                                        </ol>
                                    </nav>
                                    <nav class="nav nav-pills flex-column">
                                        <a class="nav-link active" aria-current="page" href="#">My Watchlist</a>
                                        <a class="nav-link" href="#">My Cart</a>
                                        <a class="nav-link" href="#">Recents</a>
                                    </nav>
                                </div>

                                <?php

                                $watch_rs = Database::select("SELECT * FROM `watchlist` WHERE `user_email`='" . $_SESSION["user"]["email"] . "'");
                                $watch_num = $watch_rs->num_rows;

                                if ($watch_num == 0) {
                                ?>
                                    <!-- empty view -->
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <div class="col-12 emptyView"></div>
                                            <div class="col-12 text-center">
                                                <label class="form-label fs-1 fw-bold">You have no items in your Watchlist yet.</label>
                                            </div>
                                            <div class="offset-lg-4 col-12 col-lg-4 d-grid mb-3">
                                                <a href="home.php" class="btn btn-warning fs-3 fw-bold">Start Shopping</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- empty view -->
                                <?php
                                } else {
                                ?>
                                    <!-- have products -->
                                    <div class="col-12 col-lg-9">
                                        <div class="row">
                                            <?php
                                            for ($x = 0; $x < $watch_num; $x++) {
                                                $watch_data = $watch_rs->fetch_assoc();
                                            ?>

                                                <div class="card mb-3 mx-0 mx-lg-2 col-12">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <?php
                                                            $img = array();

                                                            $images_rs = Database::select("SELECT * FROM `images` WHERE `product_id`='" . $watch_data["product_id"] . "'");
                                                            $images_data = $images_rs->fetch_assoc();

                                                            ?>
                                                            <img src="<?php echo $images_data["code"]; ?>" class="img-fluid rounded-start" style="height: 200px;" />
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="card-body">
                                                                <?php

                                                                $product_rs = Database::select("SELECT * FROM `product` WHERE `id`='" . $watch_data["product_id"] . "'");
                                                                $product_data = $product_rs->fetch_assoc();

                                                                ?>
                                                                <h5 class="card-title fs-2 fw-bold text-primary"><?php echo $product_data["title"]; ?></h5>
                                                                <?php

                                                                $clr_rs = Database::select("SELECT * FROM `color` WHERE `id`='" . $product_data["color_id"] . "'");
                                                                $clr_data = $clr_rs->fetch_assoc();

                                                                ?>
                                                                <span class="fs-5 fw-bold text-black-50">Colour : <?php echo $clr_data["name"]; ?></span>
                                                                &nbsp;&nbsp; | &nbsp;&nbsp;
                                                                <?php

                                                                $condition_rs = Database::select("SELECT * FROM `condition` WHERE `id`='" . $product_data["condition_id"] . "'");
                                                                $condition_data = $condition_rs->fetch_assoc();

                                                                ?>
                                                                <span class="fs-5 fw-bold text-black-50">Condition : <?php echo $condition_data["name"]; ?></span>
                                                                <br />
                                                                <span class="fs-5 fw-bold text-black-50">Price :</span>&nbsp;&nbsp;
                                                                <span class="fs-5 fw-bold text-black">Rs. <?php echo $product_data["price"]; ?> .00</span>
                                                                <br />
                                                                <span class="fs-5 fw-bold text-black-50">Quantity :</span>&nbsp;&nbsp;
                                                                <span class="fs-5 fw-bold text-black"><?php echo $product_data["qty"]; ?> Items available</span>
                                                                <br />
                                                                <span class="fs-5 fw-bold text-black-50">Seller :</span>
                                                                <br />
                                                                <span class="fs-5 fw-bold text-black">Lahiru</span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 mt-5">
                                                            <div class="card-body d-lg-grid">
                                                                <a href="#" class="btn btn-outline-success mb-2">Buy Now</a>
                                                                <a href="#" class="btn btn-outline-warning mb-2">Add to Cart</a>
                                                                <a href="#" class="btn btn-outline-danger" onclick='removeFromWatchlist(<?php echo $watch_data["id"]; ?>);'>Remove</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                        <?php
                                            }
                                        }

                                        ?>





                                        </div>
                                    </div>
                                    <!-- have products -->


                            </div>
                        </div>
                    </div>
                </div>

            <?php

            } else {
                header("Location:home.php");
            }

            ?>

            <?php include "footer.php"; ?>

        </div>
    </div>

    <script src="./resource/js/bootstrap.bundle.js"></script>
    <script src="./resource/js/script.js"></script>
</body>

</html>