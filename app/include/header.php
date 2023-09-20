<?php
session_start();

if (isset($_GET['logout']) && isset($_SESSION['email'])) {
    session_unset();
    session_destroy();
    header("Refresh:0; url=index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <title>ProSwipe</title>
    <base href="/">

    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta content="ie=edge" http-equiv="X-UA-Compatible"/>

    <link href="../assets/css/output.css" rel="stylesheet"/>
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />

    <script src="../assets/js/turbo.js" type="module" async></script>
</head>
</html>
