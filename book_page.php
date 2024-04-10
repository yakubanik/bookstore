<?php
require_once 'queries.php';
require_once 'db_connect.php';

$pdo = connect();
$book = getBookByID($pdo, $_GET['id']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $book['title']?></title>
</head>
<body>
<h1><?php echo $book['title']?></h1>
<h3><?php echo $book['author']?></h3>
<p><?php echo $book['price']?></p>
<a href="index.php">All books</a>
</body>
</html>