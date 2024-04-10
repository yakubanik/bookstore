<?php
require_once 'queries.php';
require_once 'db_connect.php';

$pdo = connect();
$books = getBooks($pdo);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All books</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Price</th>
    </tr>
    </thead>
    <?php foreach ($books as $book): ?>
        <tr>
            <td><a href="book_page.php?id=<?php echo $book['id']; ?>">
                    <?php echo $book['title'] ?></a></td>
            <td><?php echo $book['author'] ?></td>
            <td><?php echo $book['price'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>