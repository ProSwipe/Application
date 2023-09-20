<?php
include_once "database.php";

function createUsersTable()
{
    global $db;

    $createTableQuery = "CREATE TABLE IF NOT EXISTS users (
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
}

function createProTable()
{
    global $db;

    $createTableQuery = "CREATE TABLE IF NOT EXISTS professionnals (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            email VARCHAR(50),
            password VARCHAR(255),
            profilePicture VARCHAR(255),
            job VARCHAR(50),
            jobDescription VARCHAR(255),
            jobVideo VARCHAR(255)
        )";

    if ($db->query($createTableQuery)) {
        echo "La table 'professionnals' a été créée avec succès.";

        $data = array(
            array("John Doe", "john@example.com", "hashedpassword1", "http://localhost:8888/assets/img/pro/profile1.png", "Développeur web", "Description du travail 1", "http://localhost:8888/assets/video/pro/video1.mp4"),
            array("Jane Smith", "jane@example.com", "hashedpassword2", "http://localhost:8888/assets/img/pro/profile1.png", "Designer graphique", "Description du travail 2", "http://localhost:8888/assets/video/pro/video2.mp4"),
            array("Alice Johnson", "alice@example.com", "hashedpassword3", "http://localhost:8888/assets/img/pro/profile1.png", "Administrateur système", "Description du travail 3", "http://localhost:8888/assets/video/pro/video3.mp4"),
            array("Bob Brown", "bob@example.com", "hashedpassword4", "http://localhost:8888/assets/img/pro/profile1.png", "Ingénieur logiciel", "Description du travail 4", "http://localhost:8888/assets/video/pro/video4.mp4"),
            array("Eve White", "eve@example.com", "hashedpassword5", "http://localhost:8888/assets/img/pro/profile1.png", "Analyste de données", "Description du travail 5", "http://localhost:8888/assets/video/pro/video5.mp4"),
            array("Charlie Green", "charlie@example.com", "hashedpassword6", "http://localhost:8888/assets/img/pro/profile1.png", "Consultant en sécurité", "Description du travail 6", "http://localhost:8888/assets/video/pro/video6.mp4")
        );

        $stmt = $db->prepare("INSERT IGNORE INTO professionnals (name, email, password, profilePicture, job, jobDescription, jobVideo) VALUES (?, ?, ?, ?, ?, ?, ?)");

        foreach ($data as $row) {
            $stmt->bind_param("sssssss", $row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
            $stmt->execute();
        }

        $stmt->close();

        echo "Les données aléatoires ont été insérées avec succès.";
    } else {
        echo "Erreur lors de la création de la table 'professionnals': " . $db->error;
    }
}

createUsersTable();
createProTable();
?>