<?php
$host = 'localhost';
$port = 3306;
$dbname = 'proswipe';
$user = 'root';
$pass = 'root';

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

function getUserFromEmail($email) {
    global $db;

    $email = $db->real_escape_string($email);

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = $db->query($query);
    $row = $result->fetch_assoc();

    if ($row) {
        return $row;
    }

    return false;
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

function getPro($id) {
    global $db;

    $id = $db->real_escape_string($id);

    $query = "SELECT * FROM professionnals WHERE id='$id'";
    $result = $db->query($query);
    $row = $result->fetch_assoc();

    if ($row) {
        return $row;
    }

    return false;
}

function getAllPro() {
    global $db;

    $query = "SELECT * FROM professionnals";
    $result = $db->query($query);

    $professionals = array();

    while ($row = $result->fetch_assoc()) {
        $professionals[] = $row;
    }

    return $professionals;
}

function getProFromJob($job) {
    global $db;

    $job = $db->real_escape_string($job);

    $query = "SELECT * FROM professionnals WHERE job LIKE '%$job%'";
    $result = $db->query($query);

    $professionals = array();

    while ($row = $result->fetch_assoc()) {
        $professionals[] = $row;
    }

    return $professionals;
}

function addUserProTable($userid, $proId) {
    global $db;

    $userid = $db->real_escape_string($userid);
    $proId = $db->real_escape_string($proId);

    $query = "INSERT IGNORE INTO userPro (userId, proId) 
              VALUES('$userid', '$proId')";

    return $db->query($query);
}

function getAllProOfUser($userId) {
    global $db;

    $userId = $db->real_escape_string($userId);

    $query = "SELECT * FROM userPro WHERE userId='$userId'";
    $result = $db->query($query);

    $pros = array();

    while ($row = $result->fetch_assoc()) {
        $pros[] = $row;
    }

    return $pros;
}
