<?php

require("./connection.php");

if (isset($_POST["province_id"])) {
    getDistrict($_POST["province_id"]);
} elseif (isset($_POST["district_id"])) {
    getCity($_POST["district_id"]);
}

function getDistrict($province_id)
{
    $query = "SELECT * FROM `district` where `province_id` = $province_id";
    $response = Database::select($query);
    $rows = $response->num_rows;

    $array = [];

    for ($i = 0; $i < $rows; $i++) {
        $row = $response->fetch_assoc();
        array_push($array, $row);
    }
    echo json_encode($array);
}

function getCity($district_id)
{
    $query = "SELECT * FROM `city` where `district_id` = $district_id";
    $response = Database::select($query);
    $rows = $response->num_rows;

    $array = [];

    for ($i = 0; $i < $rows; $i++) {
        $row = $response->fetch_assoc();
        array_push($array, $row);
    }
    echo json_encode($array);
}
