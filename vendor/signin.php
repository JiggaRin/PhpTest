<?php
session_start();

$login = $_POST['login'];
$password = $_POST['password'];
$logPass = file_get_contents("../db/user.txt", 'r');
$attemptsData = "../db/userAttempts.txt";
$userData = explode("\n", $logPass);

if ($_SESSION['restTime'] <= 0) {
    foreach ($userData as $data) {
        $userInfo = explode('|', $data);
        if ($userInfo[1] === $login && $userInfo[2] === $password) {
            $_SESSION['user'] = $login;
            $_SESSION['attempts'] = 0;
            $_SESSION['restTime'] = 0;
            header('Location: ../view/profile.php');
            break;
        } else {
            $_SESSION['message'] = 'Неверные данные';
            header('Location: ../view/signinPage.php');
        }
    }
} else {
        if($_SESSION['restTime'] <= 0) {
            $_SESSION['restTime'] = 0;
        } else {
            header('Location: ../view/signinPage.php');
        }
    }

if ($_SESSION['attempts'] >= 3 && $_SESSION['restTime'] <= 0) {
    $time = strtotime('+ 5 minutes');
    file_put_contents($attemptsData, $time);
    $expired = file_get_contents($attemptsData, $time);
    $_SESSION['expired'] = $expired;
} else {
    $_SESSION['attempts']++;
}

if (isset($_SESSION['expired']) && $_SESSION['restTime'] >= 0) {
    $_SESSION['restTime'] = $_SESSION['expired'] - strtotime('now');
    $_SESSION['warnMess'] = 'Попробуйте еще раз через ' . $_SESSION['restTime'] . ' секунд(ы)';
    $_SESSION['attempts'] = 0;
} else {
    unset ($_SESSION['expired'], $_SESSION['warnMess'], $_SESSION['restTime']);
}