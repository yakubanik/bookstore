<?php
function connect($servername = "localhost",
                 $dbname = "bookstore",
                 $username = "book_admin",
                 $password = "book_admin")
{
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        die();
    }
    return $conn;
}