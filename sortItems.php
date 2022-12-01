<?php
require("./connection.php");

session_start();
if(!$_SESSION["user"]){
    return 0;
}

$time1 = $_POST["time1"];
$time2 = $_POST["time2"];
$quantity1 = $_POST["quantity1"];
$quantity2 = $_POST["quantity2"];
$condition1 = $_POST["condition1"];
$condition2 = $_POST["condition2"];

$query = "SELECT * FROM `product` WHERE `user_email` = '" . $_SESSION["user"]["email"] . "' ORDER BY ";

if($time1 == "true"){
    $query = $query." `datetime_added` ";
    if($quantity1 == "true"){
        $query = $query." , `qty` ";
    }
    if($condition1 == "true"){
        $query = $query." ,`condition_id`";
    }
    if($quantity2 == "true"){
        $query = $query." , `qty` DESC";
    }
    if($condition2 == "true"){
        $query = $query." ,`condition_id` DESC";
    }
}
elseif($quantity1 == "true"){
    $query = $query." `qty` ";
    if($condition1 == "true"){
        $query = $query." ,`condition_id`";
    }
    if($condition2 == "true"){
        $query = $query." ,`condition_id` DESC";
    }
    if($time2 == "true"){
        $query = $query." ,`datetime_added` DESC";
    }
}
elseif($condition1 == "true"){
    $query = $query." `condition_id` ";
    if($time2 == "true"){
        $query = $query." ,`datetime_added` DESC";
    }
    if($quantity2 == "true"){
        $query = $query." , `qty` DESC";
    }

}

if($time2 == "true"){
    $query = $query." `datetime_added` DESC";
    if($quantity2 == "true"){
        $query = $query." , `qty` DESC";
    }
    if($condition2 == "true"){
        $query = $query." ,`condition_id` DESC";
    }
}
elseif($quantity2 == "true"){
    $query = $query." `qty` DESC";
    if($condition2 == "true"){
        $query = $query." ,`condition_id` DESC";
    }
}
elseif($condition2 == "true"){
    $query = $query." `condition_id` DESC";
}

echo $query;