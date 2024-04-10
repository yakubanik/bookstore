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
    <title>Registration</title>
</head>
<body>
<h1>Registration</h1>
<form action="registration_handler.php" method="post">
    <label>
        username <input type="text" name="username" required>
    </label><br>
    <label>
        password <input type="password" name="password1" required>
    </label>
    <label><br>
        repeat password <input type="password" name="password2" required>
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