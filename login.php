<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login page</title>
</head>
<body>
<h1>Login</h1>
<form action="login_handler.php" method="post">
    <label>
        name <input type="text" name="name" required>
    </label><br>
    <label>
        password <input type="password" name="password" required>
    </label><br>
    <input type="submit"><br>
</form>
<?php
if (isset($_SESSION['message'])) {
    echo '<b>' . $_SESSION['message'] . '</b>';
    unset($_SESSION['message']);
}
?>
</body>
</html>