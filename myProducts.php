<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Products | eShop</title>
    <link rel="shortcut icon" href="./resource/img/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="./resource/css/bootstrap.css">
    <link rel="stylesheet" href="./resource/css/myProduct.css">
</head>

<body>
    <div class="container-fluid">
        <?php
        require_once("./connection.php");
        session_start();
        if (!isset($_SESSION["user"])) {
            header("Location: welcome.php");
        }
        $page_number = 1;
        if (isset($_GET["page"])) {
            $page_number = $_GET["page"];
        }
        ?>
        <!-- Cstom Header -->
        <div class="row header bg-primary py-3">
            <div class="col-md-2 mb-2 mb-md-0">
                <img src="
                <?php

                $query = "SELECT * FROM `profile_image` WHERE `user_email` = '" . $_SESSION["user"]["email"] . "'";
                $response = Database::select($query);
                $rows = $response->num_rows;

                if ($rows = 1) {
                    $row = $response->fetch_assoc();
                    echo $row["path"];
                } else {
                    echo "resource/profile_img/new_user.svg";
                }

                ?>
                " alt="" class="img-fluid d-block mx-auto rounded-circle" style="width: 140px; height:150px">
            </div>
            <div class="col-md-2 align-self-center">
                <p class="text-center text-light m-0">
                    <?php
                    echo $_SESSION["user"]["fname"] . " " . $_SESSION["user"]["lname"];
                    ?>
                </p>
                <p class="text-center text-light fw-bold m-0 d-none d-md-block">
                    <?php
                    echo $_SESSION["user"]["email"];
                    ?>
                </p>
            </div>
            <div class="col-md-4 align-self-center mt-3 mt-md-0">
                <h1 class="text-light text-center m-0">My Products</h1>
            </div>
            <div class="col-md-4 align-self-center mt-3 mt-md-0">
                <p class="text-center">
                    <a href="home.php" class="text-dark">Home</a>
                </p>
            </div>
        </div>

        <!-- Body -->
        <div class="row body bg-gray mt-0 py-4 pe-md-4">

            <!-- filters -->
            <div class="col-md-2">
                <div class="row justify-content-center">
                    <div class="col-10 border border-info pt-3 mb-3 mb-md-0">

                        <p class="fw-bold mb-0">Filters</p>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search..." id="search_text">
                            <button class="btn" onclick="basic_search()">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                    </svg>
                                </span>
                            </button>
                        </div>

                        <!-- Filter by Active time -->
                        <span class="small fw-bold">Active Time</span>
                        <hr class="mt-0">
                        <div class="input-group">
                            <input type="radio" name="time" id="time1">
                            <label for="time1" class="ms-1">Newest to Oldest</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="radio" name="time" id="time2">
                            <label for="time2" class="ms-1">Oldest to Newer</label>
                        </div>
                        <!-- Filter by Quantity -->
                        <span class="small fw-bold">By Quantity</span>
                        <hr class="mt-0">
                        <div class="input-group">
                            <input type="radio" name="quantity" id="quantity1">
                            <label for="quantity1" class="ms-1">High to Low</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="radio" name="quantity" id="quantity2">
                            <label for="quantity2" class="ms-1">Low to High</label>
                        </div>

                        <!-- Filter by Condition -->
                        <span class="small fw-bold">By Condition</span>
                        <hr class="mt-0">
                        <div class="input-group">
                            <input type="radio" name="condition" id="condition1">
                            <label for="condition1" class="ms-1">Brand-New</label>
                        </div>
                        <div class="input-group mb-3">
                            <input type="radio" name="condition" id="condition2">
                            <label for="condition2" class="ms-1">Used</label>
                        </div>

                        <div class="row justify-content-center mb-3">
                            <div class="col-md-4 px-3 px-md-1 text-center me-md-1 mb-2 mb-md-0">
                                <button class="btn btn-success btn-sm w-100" onclick="sort()">Search</button>
                            </div>
                            <div class="col-md-7 px-3 px-md-1 text-center">
                                <button class="btn btn-primary btn-sm w-100">Clear Filters</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Items -->
            <div class="col-md-10">
                <div class="row">
                    <div class="col bg-light">
                        <div class="row mb-2 p-2 justify-content-around" id="search_result">
                            <?php

                            $query = "SELECT * FROM `product` WHERE `user_email` = '" . $_SESSION["user"]["email"] . "'";
                            $response = Database::select($query);
                            $rows = $response->num_rows;

                            $results_per_page = 6;
                            $number_of_pages = ceil($rows / $results_per_page);
                            $offset = ($page_number - 1) * $results_per_page;

                            $query = "SELECT * FROM `product` WHERE `user_email` = '" . $_SESSION["user"]["email"] . "' LIMIT $results_per_page OFFSET $offset";
                            $response = Database::select($query);
                            $rows = $response->num_rows;



                            for ($i = 0; $i < $rows; $i++) {
                                $row = $response->fetch_assoc();
                            ?>
                                <!-- Card -->
                                <div class="col-md-5 mx-0 mb-2 mt-2 py-1">
                                    <div class="row px-2 ">
                                        <div class="col-4 p-0 me-2">
                                            <img src="
                                        <?php
                                        $img_query = "SELECT * FROM `images` WHERE `product_id` = '" . $row["id"] . "'";
                                        $img_response = Database::select($img_query);
                                        $img = $img_response->fetch_assoc();
                                        echo $img["code"];
                                        ?>
                                        " alt="" class="img-thumbnail" style="height: 140px;">
                                        </div>
                                        <div class="col text-center me-2 mt-1">
                                            <span><?php echo $row["title"]; ?></span><br>
                                            <span>Rs. <?php echo $row["price"] ?>.00</span><br>
                                            <span><?php echo $row["price"] ?> Items Left</span><br>
                                            <div class="col-10 align-self-center">
                                                <div class="form-check form-switch justify-content-center">
                                                    <input id="active" class="form-check-input" onclick="changeStatus(<?php echo $row["id"]; ?>)" type="checkbox" role="switch" id="flexSwitchCheckChecked" <?php
                                                                                                                                                                                                            if ($row["status_id"] == "1") {
                                                                                                                                                                                                                echo "Checked";
                                                                                                                                                                                                            }
                                                                                                                                                                                                            ?> <label class="form-check-label w-50 text-center" for="flexSwitchCheckChecked">
                                                    <?php
                                                    if ($row["status_id"] == "1") {
                                                        echo "Active";
                                                    } else {
                                                        echo "Inactive";
                                                    }
                                                    ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row p-0">
                                                <div class="col p-0 me-1"><button class="btn btn-success w-100" onclick="sendId(<?php echo $row['id']; ?>);">Update</button></div>
                                                <div class="col p-0"><button class="btn btn-danger w-100">Delete</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <div class="row mt-3">
            <div class="col d-flex">
                <nav aria-label="Page navigation example" class="mx-auto">
                    <ul class="pagination m-0">
                        <li class="page-item">
                            <a class="page-link" href="myProducts.php?page=1" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php
                        for ($i = 1; $i <= $number_of_pages; $i++) {
                        ?>
                            <li class="page-item"><a class="page-link <?php
                                                                        if ($i == $page_number) {
                                                                            echo "bg-gray";
                                                                        }
                                                                        ?>" href="myProducts.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                        }
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="myProducts.php?page=<?php echo $number_of_pages; ?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <?php require_once("./footer.php"); ?>
    </div>
    <script src="./resource/js/myProduct.js"></script>
</body>

</html>