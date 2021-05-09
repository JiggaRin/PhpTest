<?php
session_start();

unset($_SESSION['user'],
    $_SESSION['message'],
    $_SESSION['attempts'],
    $_SESSION['expired'],
    $_SESSION['warnMess'],
    $_SESSION['restTime']);
header('Location: ../view/signinPage.php');