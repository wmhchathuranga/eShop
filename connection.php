<?php

class Database{
    
    private static $connection;

    private static function setUpConnection(){

        if(!isset(Database::$connection))
        {
            Database::$connection = new mysqli("localhost","root","root","es_db","3306");
        }
    }

    public static function iud($query){
        Database::setUpConnection();
        Database::$connection -> query($query);
    }

    public static function select($query){
        Database::setUpConnection();
        $result = Database::$connection -> query($query);
        return $result;
    }
}
