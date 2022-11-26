<?php
session_start();
require_once("./connection.php");

$category = $_POST["category"];
$text = $_POST["text"];

if(!empty($text) && $category == 0){
    $query = "SELECT * FROM `product` WHERE `title` like '%$text%'";
}
else if(empty($text) && $category != 0){
    $query = "SELECT * FROM `product` WHERE `category_id` = $category";
}
else if(empty($text) && $category == 0){
    $query = "SELECT * FROM `product`";
}
else if(!empty($text) && $category != 0){
    $query = "SELECT * FROM `product` WHERE `title` like '%$text%' AND `category_id` = $category" ;
}

?>

<?php
$response2 = Database::select($query);
$rows2 = $response2->num_rows;
for ($j = 0; $j < $rows2; $j++) {
    $product = $response2->fetch_assoc();
?>
    <div class="col-md-3 col-8 mb-4 px-md-5>
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
