<?php

function redirect($page) {
    header("Location: /$page");
    exit();
}

function checkConnection() {
    if (!isset($_SESSION['email'])) {
        redirect('index.php');
    }
}

?>
