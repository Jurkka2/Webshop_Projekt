<?php
function getDB() {
    static $db;
    if($db instanceof mysqli){
        return $db;
    }
    require_once CONFIG_DIR.'\database.php';

    $db = new mysqli(DB_HOST, DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    return $db;
}