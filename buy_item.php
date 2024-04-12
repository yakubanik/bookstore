<?php
session_start();

require 'db_connect.php';
require 'queries.php';

if(!isset($_SESSION['current_user'])) {
    $_SESSION['message'] = 'Login to you account to buy the book';
    header('Location: login.php');
    die();
}

$user = getUser(connect(), $_SESSION['current_user']);
$book_id = $_GET['id'];

addToOrder(connect(), $book_id, $user['id']);
header('Location: index.php');