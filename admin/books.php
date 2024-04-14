<?php
require '../db_connect.php';
require '../queries.php';

$books = getBooks(connect());
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book management</title>
</head>
<body>
<a href="books.php">Books</a>
<a href="">Users</a>
<a href="">Orders</a>


</body>
</html>
