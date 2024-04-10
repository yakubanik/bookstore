<?php
function getBooks(PDO $pdo): false|PDOStatement
{
    $query = "SELECT * FROM book";
    return $pdo->query($query);
}

function getBookByID(PDO $pdo, int $id)
{
    $query = "SELECT * FROM book WHERE id = $id";
    return $pdo->query($query)->fetch();
}

