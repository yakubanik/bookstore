<?php
require '../db_connect.php';
require '../queries.php';

if (isset($_POST['edit_book'])) {
    edit_book();
    header('Location: books.php');
}

function edit_book(): void
{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];

    updateBook(connect(), $id, $title, $author, $price);
}