<?php
// PHP script to handle database interactions for CRUD operations
// This script provides functions to add, update, and delete records in a MySQL database using PDO.
// Ensure you have the PDO extension enabled in your PHP configuration
// and replace the database connection settings with your own.
// Remember in a actual site, you can move $host, $db, $user, $pass to a config file and not repeat yourself.

function addToDatabase($table, $query, $params = []) {
    // Database connection settings
    $host = 'localhost';
    $db   = 'your_database_name';
    $user = 'your_username';
    $pass = 'your_password';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        // Prepare and execute the query
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        return $pdo->lastInsertId();
    } catch (\PDOException $e) {
        // Handle error
        return false;
    }
}

// Example usage:
// $table = 'users';
// $query = "INSERT INTO $table (name, email) VALUES (?, ?)";
// $params = ['John Doe', 'john@example.com'];
// $insertId = addToDatabase($table, $query, $params);

function updateDatabase($table, $query, $params = []) {
    // Database connection settings
    $host = 'localhost';
    $db   = 'your_database_name';
    $user = 'your_username';
    $pass = 'your_password';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        // Prepare and execute the update query
        $stmt = $pdo->prepare($query);
        return $stmt->execute($params);
    } catch (\PDOException $e) {
        // Handle error
        return false;
    }
}

// Example usage:
// $table = 'users';
// $query = "UPDATE $table SET name = ?, email = ? WHERE id = ?";
// $params = ['Jane Doe', 'jane@example.com', 1];
// $success = updateDatabase($table, $query, $params);

function deleteFromDatabase($table, $query, $params = []) {
    // Database connection settings
    $host = 'localhost';
    $db   = 'your_database_name';
    $user = 'your_username';
    $pass = 'your_password';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
        // Prepare and execute the delete query
        $stmt = $pdo->prepare($query);
        return $stmt->execute($params);
    } catch (\PDOException $e) {
        // Handle error
        return false;
    }
}

// Example usage:
// $table = 'users';
// $query = "DELETE FROM $table WHERE id = ?";
// $params = [1];
// $success = deleteFromDatabase($table, $query, $params);

?>