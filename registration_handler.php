<?php
require 'queries.php';
require 'db_connect.php';
session_start();

$username = $_POST['username'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];

if($password1 != $password2) {
    $_SESSION['message'] = 'Passwords didn\'t match!';
    header('Location: registration.php');
    die();
} elseif(isUserExists(connect(), $username)) {
    $_SESSION['message'] = 'Username is already taken!';
    header('Location: registration.php');
    die();
} else {
    create_user(connect(), $username, $password1);
    $_SESSION['current_user'] = $username;
    header('Location: index.php');
};