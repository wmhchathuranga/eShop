<?php

require "connection.php";

if(isset($_GET["c"])){
    
    $category_id = $_GET["c"];
    
    $brands_rs = Database::select("SELECT * FROM `brand` INNER JOIN `category_has_brand` ON `brand`.`id` = `category_has_brand`.`brand_id` WHERE `category_has_brand`.`category_id` = '".$category_id."' ");
    
    $brands_num = $brands_rs->num_rows;
    
    if($brands_num > 0){

        for ($x = 0; $x < $brands_num; $x++) {

            $brands_data = $brands_rs->fetch_assoc();

            ?>
            
            <option value="<?php echo $brands_data["id"]; ?>"><?php echo $brands_data["name"]; ?></option>

            <?php

        }
    }else{
        
    }
}

 ?>