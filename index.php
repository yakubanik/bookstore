<?php
session_start();
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
<?php
if (isset($_SESSION['current_user'])) {
    echo "<p>Hello, " . $_SESSION['current_user'] . "</p>";
    echo "<a href='cart.php'>My cart | </a>";
    echo "<a href='logout.php'>logout</a>";
} else {
    echo "<a href='login.php'>login</a> | <a href='registration.php'>registration</a>";
}
?>
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
            <td><a href="buy_item.php?id=<?php echo $book['id']; ?>">
                    <button>Buy</button>
                </a></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>