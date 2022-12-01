<?php

session_start();
require_once("./connection.php");

$text = $_GET["text"];
if(isset($_GET["page"])){
    $page_number = $_GET["page"];
}
else{
    $page_number = 1;
}

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
                    <div class="col p-0 me-1"><button class="btn btn-success w-100">Update</button></div>
                    <div class="col p-0"><button class="btn btn-danger w-100">Delete</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php
}
?>