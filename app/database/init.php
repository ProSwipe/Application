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
            array("John Doe", "john@example.com", "hashedpassword1", "https://proswipe.gaetandev.fr/assets/img/pro/profile2.jpg", "Développeur web", "Description du travail 1", "https://proswipe.gaetandev.fr/assets/video/pro/video1.mp4"),
            array("Jane Smith", "jane@example.com", "hashedpassword2", "https://proswipe.gaetandev.fr/assets/img/pro/profile1.png", "Designer graphique", "Description du travail 2", "https://proswipe.gaetandev.fr/assets/video/pro/video2.mp4"),
            array("Alice Johnson", "alice@example.com", "hashedpassword3", "https://proswipe.gaetandev.fr/assets/img/pro/profile3.jpg", "Administrateur système", "Description du travail 3", "https://proswipe.gaetandev.fr/assets/video/pro/video3.mp4"),
            array("Bob Brown", "bob@example.com", "hashedpassword4", "https://proswipe.gaetandev.fr/assets/img/pro/profile4.webp", "Ingénieur logiciel", "Description du travail 4", "https://proswipe.gaetandev.fr/assets/video/pro/video4.mp4"),
            array("Eve White", "eve@example.com", "hashedpassword5", "https://proswipe.gaetandev.fr/assets/img/pro/profile5.jpg", "Analyste de données", "Description du travail 5", "https://proswipe.gaetandev.fr/assets/video/pro/video5.mp4"),
            array("Charlie Green", "charlie@example.com", "hashedpassword6", "https://proswipe.gaetandev.fr/assets/img/pro/profile6.jpg", "Consultant en sécurité", "Description du travail 6", "https://proswipe.gaetandev.fr/assets/video/pro/video6.mp4")
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

function createUserProTable() {
    global $db;

    $createTableQuery = "CREATE TABLE IF NOT EXISTS userPro (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            userId INT(6),
            proId INT(6)
        )";

    if ($db->query($createTableQuery)) {
        echo "La table 'userPro' a été créée avec succès.";
    } else {
        echo "Erreur lors de la création de la table 'userPro': " . $db->error;
    }
}

createUsersTable();
createProTable();
createUserProTable();
?>