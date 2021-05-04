<?php
session_start();

$login = $_POST['login'];
$password = $_POST['password'];

$logPass = fopen("../db/user.txt", 'r');

while(!feof($logPass)){
    $data = fgets($logPass, 1024);
    list($uid, $user, $pass) = explode('|', $data);
    if($user == $login && $pass == $password){
       $user_id = $uid;
       break;
    }
}
    if($user_id) {
        $_SESSION['user'] = $login;
        header('Location: ../view/profile.php');
    } else {
        $_SESSION['message'] = 'Неверные данные';
        $_SESSION['count']++;
        header('Location: ../view/signinPage.php');
    }