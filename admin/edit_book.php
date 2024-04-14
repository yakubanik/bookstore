<?php
require '../db_connect.php';
require '../queries.php';

$book = getBookById(connect(), $_GET['id']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit book</title>
</head>
<body>
<a href="books.php">Books</a>
<a href="">Users</a>
<a href="">Orders</a>
<br>
<br>
<form action="form_handler.php" method="post">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    <label>
        Title <input type="text" name="title" value="<?= $book['title'] ?>"/>
    </label><br>
    <label>
        Author <input type="text" name="author" value="<?= $book['author'] ?>"/>
    </label><br>
    <label>
        Price <input type="number" name="price" min="0.00" max="10000.00" step="0.01" value="<?= $book['price'] ?>"/>
    </label><br>
    <input type="submit" name="edit_book" value="submit">
</form>
</body>
</html>
