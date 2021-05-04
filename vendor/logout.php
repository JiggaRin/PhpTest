<?php
session_start();

unset($_SESSION['user'], $_SESSION['message']);
header('Location: ../view/signinPage.php');