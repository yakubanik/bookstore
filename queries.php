<?php
function getBooks(PDO $pdo): false|PDOStatement
{
    $query = "SELECT * FROM book";
    return $pdo->query($query);
}

function getBookByID(PDO $pdo, int $id)
{
    $query = "SELECT * FROM book WHERE id = $id";
    $book = $pdo->query($query)->fetch(PDO::FETCH_ASSOC);
    if (!$book) {
        $book = [
            'title' => "Book doesn't exist",
            'author' => "",
            'price' => ""
        ];
    }
    return $book;
}
