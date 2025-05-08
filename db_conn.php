<?php

// Server info
$sName = "localhost";
$uName = "root";
$pass = "";
$db_name = "online_book_store_db";

// PDO connection
try {
    $conn = new PDO("mysql:host=$sName;dbname=$db_name", $uName, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
