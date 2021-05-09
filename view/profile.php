<?php
session_start();

if (!$_SESSION['user'] && isset($_SESSION['user'])) {
    header('Location: /view/signinPage.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
<h1>Добрый день, <?= $_SESSION['user'] ?></h1>
<p>
    <a href="../vendor/logout.php" class="logout">Выход</a>
</p>
</body>
</html>