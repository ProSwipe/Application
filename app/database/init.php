<?php
include_once "database.php";

function createUsersTable()
{
    global $db;

    $usersTableExists = "SELECT 1 FROM users LIMIT 1";

    if (!$db->query($usersTableExists)) {
        $createTableQuery = "CREATE TABLE users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            email VARCHAR(50),
            password VARCHAR(255)
        )";

        if ($db->query($createTableQuery)) {
            echo "La table 'users' a été créée avec succès.";
        } else {
            echo "Erreur lors de la création de la table 'users': " . $db->error;
        }
    } else {
        echo "La table 'users' existe déjà.";
    }
}

createUsersTable();
?>