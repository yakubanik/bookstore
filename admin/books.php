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
            <td><a href="../book_page.php?id=<?php echo $book['id']; ?>">
                    <?php echo $book['title'] ?></a></td>
            <td><?php echo $book['author'] ?></td>
            <td><?php echo $book['price'] ?></td>
            <td><a href="edit_book.php?id=<?= $book['id'] ?>">
                    <button>edit</button>
                </a></td>
            <td><a>
                    <button>delete</button>
                </a></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td><a>
                <button>add new</button>
            </a></td>
    </tr>
</table>

</body>
</html>
