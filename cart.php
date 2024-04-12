<?php
session_start();
require 'queries.php';
require 'db_connect.php';

$username = $_SESSION['current_user'];
$cart = getUserCart(connect(), getUserIdByName(connect(), $username)['id']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
<body>
<a href="index.php">Home</a>
<?php echo '<h2>' . $username . '\'s cart</h2>';
?>
<table>
    <thead>
    <tr>
        <th>Title</th>
        <th>Total quantity</th>
        <th>Total price</th>
    </tr>
    </thead>
    <?php foreach ($cart as $item): ?>
        <tr>
            <td><?php echo $item['title'] ?> </td>
            <td><?php echo $item['total_quantity'] ?> </td>
            <td><?php echo $item['total_price'] ?> </td>
        </tr>
    <?php endforeach; ?>

</table>
</body>
</html>