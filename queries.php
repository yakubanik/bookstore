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
        $query = "SELECT id, name, password FROM customers WHERE name = :username";
        $statement = $pdo->prepare($query);
        $statement->execute(['username' => $username]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    return null;
}


function addToOrder(PDO $pdo, int $book_id, int $customer_id, int $quantity = 1): void
{
    try {
        $query = "INSERT INTO order_item(book_id, quantity) VALUE (:book_id, :quantity);";
        $statement = $pdo->prepare($query);
        $statement->execute([
            'book_id' => $book_id,
            'quantity' => $quantity
        ]);
        $order_item_id = $pdo->lastInsertId();
        $query = "INSERT INTO orders(customer_id, order_item_id) VALUE (:customer_id, :order_item_id);";
        $statement = $pdo->prepare($query);
        $statement->execute([
            'customer_id' => $customer_id,
            'order_item_id' => $order_item_id
        ]);
    } catch (PDOException $e) {
        echo "INSERT error " . $e;
    }
}

function getUserCart(PDO $pdo, int $customer_id): false|array
{
    $query =
        "SELECT book.title, SUM(order_item.quantity) AS total_quantity,        
         SUM(book.price * order_item.quantity) AS total_price
         FROM customers
            JOIN orders ON customers.id = orders.customer_id
            JOIN order_item ON orders.order_item_id = order_item.id
            JOIN book ON order_item.book_id = book.id
         WHERE customers.id = :customer_id
         GROUP BY customers.name, book.title;";
    $statement = $pdo->prepare($query);
    $statement->execute([
        'customer_id' => $customer_id
    ]);
    return $statement->fetchAll(PDO:: FETCH_ASSOC);
}

function getUserIdByName(PDO $pdo, string $username)
{
    $query = "SELECT id FROM customers WHERE name = :name;";
    $statement = $pdo->prepare($query);
    $statement->execute(['name' => $username]);
    return $statement->fetch(PDO::FETCH_ASSOC);
}

function updateBook(PDO $pdo, int $id, string $title, string $author, float $price)
{
    $query =
        "UPDATE book 
        SET title = :title, author = :author, price = :price
        WHERE id = :id;";
    $statement = $pdo->prepare($query);
    $statement->execute([
        'id' => $id,
        'title' => $title,
        'author' => $author,
        'price' => $price
    ]);
}
