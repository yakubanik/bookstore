<?php
function getBooks(PDO $pdo): false|PDOStatement
{
    $query = "SELECT * FROM book";
    return $pdo->query($query);
}

function getBookById(PDO $pdo, int $id)
{
    $query = "SELECT * FROM book WHERE id = :id";
    $statement = $pdo->prepare($query);
    $statement->execute(['id' => $id]);
    $book = $statement->fetch(PDO::FETCH_ASSOC);
    if (!$book) {
        $book = [
            'title' => "Book doesn't exist",
            'author' => "",
            'price' => ""
        ];
    }
    return $book;
}

function isUserExists(PDO $pdo, string $username): bool
{
    $query = "SELECT name FROM customers WHERE name = :name";
    $statement = $pdo->prepare($query);
    $statement->execute(['name' => $username]);
    return boolval($statement->fetch(PDO::FETCH_ASSOC));
}

function create_user(PDO $pdo, string $username, string $password): void
{
    $query = "INSERT INTO customers(name, password) VALUES (:username, :password)";
    $statement = $pdo->prepare($query);
    try {
        $statement->execute([
            'username' => $username,
            'password' => $password
        ]);
    } catch (PDOException $e) {
        echo "User creation is failed" . $e;
        die();
    }
}

function getUser(PDO $pdo, string $username)
{
    if (isUserExists($pdo, $username)) {
        $query = "SELECT name, password FROM customers WHERE name = :username";
        $statement = $pdo->prepare($query);
        $statement->execute(['username' => $username]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    return null;
}
