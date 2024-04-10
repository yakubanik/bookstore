<?php
session_start();
require 'queries.php';
require 'db_connect.php';

$username = $_POST['name'];
$password = $_POST['password'];

$user = getUser(connect(), $username);

if ($user and $user['password'] == $password) {
    $_SESSION['current_user'] = $username;
    header('Location: index.php');
} else {
    $_SESSION['message'] = 'Invalid username and/or password';
    header('Location: login.php');
}