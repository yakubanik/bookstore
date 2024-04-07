<?php
$servername = "localhost";
$username = "book_admin";
$password = "book_admin";

try {
    $conn = new PDO("mysql:host=$servername;dbname=bookstore", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}