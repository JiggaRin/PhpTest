<?php
session_start();
if ($_SESSION['user']) {
    header('Location: profile.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>
<body>
<p class="error">
    <?php
    if($_SESSION['message']) {
        echo $_SESSION['message'];
    }
    ?>
</p>
<form action="/vendor/signin.php" method="post">
    <label>Логин</label>
    <input type="text" name="login" placeholder="Введите свой логин" required>
    <label>Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль" required>
    <button type="submit" class="btn">Войти</button>
</form>
</body>