<?php

    require_once(__DIR__.DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR
    ."global.php");

    $usuario = new Usuario();
    $usuario -> setNomeUsuario($_POST['txtPesquisa']);
    
    $usuarioController = new UsuarioController();
    
    $listaUsuarios = $usuarioController->consultar($usuario);
    echo json_encode($listaUsuarios);
?>