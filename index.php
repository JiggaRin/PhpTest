<?php
session_start();

if ($_SESSION['user']) {
header('Location: /view/profile.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Добро пожаловать</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
<h1>Добро пожаловать</h1>
<br>
<p>
    <a href="view/signinPage.php">Войти</a>
</p>
</body>