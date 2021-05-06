<?php
session_start();

$login = $_POST['login'];
$password = $_POST['password'];

$user_id = 0;
$logPass = file_get_contents("../db/user.txt", 'r');
$userData = explode("\n", $logPass);

foreach($userData as $data){

    $userInfo = explode('|', $data);

    if($userInfo[1] === $login && $userInfo[2] === $password){
        $user_id = $userInfo[0];
        $_SESSION['user'] = $login;
        header('Location: ../view/profile.php');
        break;
    } else {
        $_SESSION['message'] = 'Неверные данные';
        header('Location: ../view/signinPage.php');
    }
}