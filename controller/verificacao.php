<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "global.php";

session_start();

$email = $_POST['loginTxt'];

$password = $_POST['senhaTxt'];

$userController = new UsuarioController();

$user = $userController->verifyUserExistenceByEmailAndPassword($email, $password);

if ($user != null) {
    $_SESSION['logado'] = $user;
    header("location: ../painel.php");
} else {
    header("location: ../index.php");
  
}

