<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to eShop | eShop</title>
    <link rel="shortcut icon" href="./resource/img/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="./resource/css/bootstrap.css">
    <link rel="stylesheet" href="./resource/css/home.css">
</head>

<body>
    <div class="container-fluid">

        <?php include_once("./header.php"); ?>

        <!-- search -->
        <div class="row align-items-center mb-3">
            <div class="col-md-2 mb-md-0 mb-3">
                <div class="row">
                    <div class="col d-flex">
                        <img src="./resource/img/logo.svg" alt="" class="img-fluid logo mx-auto">
                    </div>

                </div>
            </div>
            <div class="col-md mb-md-0 mb-3">
                <div class="row">
                    <div class="col">
                        <div class="input-group">
                            <input type="text" class="form-control w-75 d-none d-md-block" aria-label="Text input with dropdown button" id="search_text" placeholder="Search here">
                            <input type="text" class="form-control w-50 d-md-none" aria-label="Text input with dropdown button" id="search_text" placeholder="Search here">

                            <select name="category" id="search_category" class="form-select w-25 d-none d-md-block">
                                <option value="0">All Categories</option>
                                <?php

                                $query = "SELECT * FROM `category`";
                                $response = Database::select($query);
                                $rows = $response->num_rows;
                                for ($i = 0; $i < $rows; $i++) {
                                    $row = $response->fetch_assoc();
                                ?>

                                    <option value='<?php echo $row["id"]; ?>'><?php echo $row["name"]; ?></option>";
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <select name="category" id="search_category" class="form-select form-control d-md-none">
                            <option value="0">All Categories</option>
                            <?php

                            $query = "SELECT * FROM `category`";
                            $response = Database::select($query);
                            $rows = $response->num_rows;
                            for ($i = 0; $i < $rows; $i++) {
                                $row = $response->fetch_assoc();
                            ?>

                                <option value='<?php echo $row["id"]; ?>'><?php echo $row["name"]; ?></option>";
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-md-2 mb-md-0 mb-3">
                <div class="row">
                    <div class="col">
                        <button class="btn btn-primary w-100" onclick="basic_search()">Search</button>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col d-none d-md-block">
                        <a href="#" class="btn-link">Advanced</a>
                    </div>
                    <div class="col text-center d-md-none">
                        <a href="#" class="btn-link">Advanced</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- search result -->
        <div class="row justify-content-center">
            <h1 class="text-center d-none" id="showing_results">Showing Results for "<span id="result_text"></span>"</h1>
            <div class="col-10">
                <div class="row justify-content-center mx-md-5 px-md-5" id="search_result">
                </div>
            </div>
        </div>

        <!-- carousel -->
        <div class="row d-none d-md-block my-4" id="carousel">
            <div class="col">
                <div id="carouselExampleIndicators" class="carousel slide col-md-8 col-10 mx-auto" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="./resource/img/slider images/posterimg.jpg" class="d-block w-100 img-fluid" alt="...">
                            <div class="carousel-caption d-none d-md-block poster-caption">
                                <h5 class="poster-title">Welcome to eShop</h5>
                                <p class="poster-text">The world's Best Online Store By One Click</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="./resource/img/slider images/posterimg2.jpg" class="img-fluid d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="./resource/img/slider images/posterimg3.jpg" class="img-fluid d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block poster-caption2">
                                <h5 class="poster-title">Be Free...</h5>
                                <p class="poster-text">Experience the Lowest Delivery Costs With Us.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row" id="items">
            <?php
            $query = "SELECT * FROM `category`";
            $response = Database::select($query);
            $rows = $response->num_rows;
            for ($i = 0; $i < $rows; $i++) {
                $category = $response->fetch_assoc();
            ?>
                <!-- items -->
                <div class="row">
                    <div class="col mt-3">
                        <hr>
                        <div class="row mb-4">
                            <div class="col-md text-center mb-4">
                                <h2 class="">
                                    <?php
                                    echo $category["name"];
                                    ?>
                                </h2>
                                <span class="see_all btn-link text-secondary">See All</span>
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gray" class="bi bi-arrow-bar-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6 8a.5.5 0 0 0 .5.5h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L12.293 7.5H6.5A.5.5 0 0 0 6 8Zm-2.5 7a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5Z" />
                                    </svg>
                                </span>
                            </div>
                            <div class="align-self-center">
                            </div>
                            <hr>
                        </div>
                        <div class="row justify-content-center mx-md-5 px-md-4">


                            <?php
                            $query2 = "SELECT * FROM `product` WHERE `category_id` = '" . $category['id'] . "' limit 8";
                            $response2 = Database::select($query2);
                            $rows2 = $response2->num_rows;
                            for ($j = 0; $j < $rows2; $j++) {
                                $product = $response2->fetch_assoc();
                            ?>
                                <div class="col-md-3 col-8 mb-4 px-md-5">
                                    <div class="card text-center">
                                        <img src="<?php
                                                    $image_query = "SELECT * FROM `images` WHERE `product_id` = '" . $product["id"] . "'";
                                                    $images = Database::select($image_query);
                                                    $src = $images->fetch_assoc();
                                                    echo "./" . $src["code"];
                                                    ?>" class="card-img-top img-thumbnail" alt="..." style="height:170px">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo $product["title"]; ?> <span class="bg-info badge">New</span></h5>
                                            <span class="card-text text-primary">Rs. <?php echo $product["price"]; ?>.00</span>
                                            <br>

                                            <?php
                                            if ($product["qty"] > 0) {
                                                echo "<span class='card-text text-warning fw-bold'>In Stock</span>";
                                            } else {
                                                echo "<span class='card-text text-danger fw-bold'>Out Of Stock</span>";
                                            }
                                            ?>
                                            <br>
                                            <span class="card-text text-success fw-bold"><?php echo $product["qty"]; ?> items Available</span><br>
                                            <button class="btn btn-success w-100">Buy Now</button>
                                            <button class="btn btn-danger w-100 mt-2">Add to Cart</button>
                                            <button class="btn btn-outline-light w-100 mt-2">
                                                <span class="text-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <?php include_once("./footer.php"); ?>
    </div>
    <script src="./resource/js/home.js"></script>
</body>

</html>