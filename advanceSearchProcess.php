<?php
require "connection.php";

$txt = $_POST["t"];
$category = $_POST["cat"];
$brand = $_POST["b"];
$model = $_POST["m"];
$condition = $_POST["con"];
$colour = $_POST["col"];
$price_form = $_POST["pf"];
$price_to = $_POST["to"];
$sort = $_POST["s"];

$query = "SELECT * FROM `product`";
$status = 0;

if ($sort == 0) {

    if (!empty($txt)) {
        $query .= "WHERE `title` LIKE '%" . $txt . "%'";
        $status = 1;
    }

    if ($sort == 0 && $category != 0) {
        $query .= "WHERE `category_id`='" . $category . "'";
        $status = 1;
    } else if ($sort != 0 && $category != 0) {
        $query .= "AND `category_id`='" . $category . "'";
    }

    $pid = 0;

    if ($brand != 0 && $model == 0) {

        $brand_rs = Database::select("SELECT * FROM `brand_has_model` WHERE `brand_id`='" . $brand . "'");
        $brand_num = $brand_rs->num_rows;

        for ($x = 0; $x < $brand_num; $x++) {
            $brand_data = $brand_rs->fetch_assoc();
            $pid = $brand_data["id"];
        }

        if ($status == 0) {
            $query .= "WHERE `brand_has_model_id`='" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= "AND `brand_has_model_id`='" . $pid . "'";
        }
    }

    if ($brand == 0 && $model != 0) {
        $model_rs = Database::select("SELECT * FROM `brand_has_model` WHERE `model_id`= '" . $model . "'");
        $model_num = $model_rs->num_rows;

        for ($x = 0; $x < $model_num; $x++) {
            $model_data = $model_rs->fetch_assoc();
            $pid = $model_data["id"];
        }

        if ($status == 0) {
            $query .= "WHERE `brand_has_model_id`='" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= "AND `brand_has_model_id`='" . $pid . "'";
        }
    }

    if ($brand != 0 && $model != 0) {
        $brand_has_model_rs = Database::select("SELECT * FROM `brand_has_model` WHERE `brand_id`='" . $brand . "' AND `model_id`= '" . $model . "'");
        $brand_has_model_num = $brand_has_model_rs->num_rows;

        for ($x = 0; $x < $brand_has_model_num; $x++) {
            $brand_has_model_data = $brand_has_model_rs->fetch_assoc();
            $pid = $brand_has_model_data["id"];
        }

        if ($status == 0) {
            $query .= "WHERE `brand_has_model_id`='" . $pid . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= "AND `brand_has_model_id`='" . $pid . "'";
        }
    }


    if ($status == 0 && $condition != 0) {
        $query .= "WHERE `condition_id`='" . $condition . "'";
        $status = 1;
    } else if ($status != 0 && $condition != 0) {
        $query .= "AND `condition_id`='" . $condition . "'";
    }

    if ($status == 0 && $colour != 0) {
        $query .= "WHERE `colour_id`='" . $colour . "'";
        $status = 1;
    } else if ($status != 0 && $colour != 0) {
        $query .= "AND `colour_id`='" . $colour . "'";
    }

    if (!empty($pice_form) && empty($price_to)) {
        if ($status == 0) {
            $query .= "WHERE `price` >= '" . $price_form . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= "AND `price` >= '" . $price_form . "'";
        }
    } else if (empty($pice_form) && !empty($price_to)) {
        if ($status == 0) {
            $query .= "WHERE `price` <= '" . $price_to . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= "AND `price` <= '" . $price_to . "'";
        }
    } else if (!empty($pice_form) && !empty($price_to)) {
        if ($status == 0) {
            $query .= "WHERE `price` BETWEEN '" . $price_form . "' AND '" . $price_to . "'";
            $status = 1;
        } else if ($status != 0) {
            $query .= "AND `price` BETWEEN '" . $price_form . "' AND '" . $price_to . "'";
        }
    }
} else if ($sort == 1) {
    if (!empty($txt)) {
        $query .= "WHERE `title` LIKE '%" . $txt . "%' ORDER BY `price` DESC";
        $status = 1;
    }
} else if ($sort == 2) {
    echo ("PRICE LOW TO HIGH");
} else if ($sort == 3) {
    echo ("QUANTITY HIGH TO LOW");
} else if ($sort == 4) {
    echo ("QUANTITY LOW TO HIGH");
}


if ($_POST["page"] != "0") {

    $pageno = $_POST["page"];
} else {

    $pageno = 1;
}

$product_rs = Database::select($query);
$product_num = $product_rs->num_rows;

$results_per_page = 10;
$number_of_pages = ceil($product_num / $results_per_page);

$viewed_results_count = ((int)$pageno - 1) * $results_per_page;

$query .= " LIMIT " . $results_per_page . " OFFSET " . $viewed_results_count . "";
$results_rs = Database::select($query);
$results_num = $results_rs->num_rows;

while ($results_data = $results_rs->fetch_assoc()) {
?>

    <div class="card mb-3 mt-3 col-12 col-lg-6">
        <div class="row">

            <div class="col-md-4 mt-4">

                <img src="resource/mobile_images/iphone12.jpg" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">

                    <h5 class="card-title fw-bold"><?php echo $results_data["title"]; ?></h5>
                    <span class="card-text text-primary fw-bold"><?php echo $results_data["price"]; ?></span>
                    <br />
                    <span class="card-text text-success fw-bold fs">10 Items Left</span>

                    <div class="row">
                        <div class="col-12">

                            <div class="row g-1">
                                <div class="col-12 col-lg-6 d-grid">
                                    <a href="#" class="btn btn-success fs">Buy Now</a>
                                </div>
                                <div class="col-12 col-lg-6 d-grid">
                                    <a href="#" class="btn btn-danger fs">Add Cart</a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

<?php
}

?>



<div class="offset-lg-4 col-12 col-lg-4 mb-3 text-center">

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
                        <li class="page-item"><a onclick="advancedSearch('<?php echo ($i); ?>')" class="page-link <?php
                                                                                                                    if ($i == $page_number) {
                                                                                                                        echo "bg-gray";
                                                                                                                    }
                                                                                                                    ?>" href="#"><?php echo $i; ?></a></li>
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
    
</div>