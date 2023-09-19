<?php
$host = 'localhost';
$port = 3306;
$dbname = 'proswipe';
$user = 'root';
$pass = '';

$db = new mysqli($host, $user, $pass, $dbname, $port);

if ($db->connect_error) {
    die("Impossible de se connecter à MySQL: " . $db->connect_error);
}

$db->set_charset('utf8mb4');

function createAcc($name, $email, $password)
{
    global $db;

    $name = $db->real_escape_string($name);
    $email = $db->real_escape_string($email);

    $query = "INSERT IGNORE INTO users (name, email, password) 
              VALUES('$name', '$email', '$password')";

    return $db->query($query);
}

function isAccExists($email)
{
    global $db;

    $email = $db->real_escape_string($email);

    $user_check_query = "SELECT * FROM users WHERE email='$email'";
    $result = $db->query($user_check_query);
    return $result->fetch_assoc();
}

function getUserPassword($email)
{
    global $db;

    $email = $db->real_escape_string($email);

    $query = "SELECT password FROM users WHERE email='$email'";
    $result = $db->query($query);
    $row = $result->fetch_assoc();

    if ($row) {
        return $row['password'];
    }

    return false;
}
