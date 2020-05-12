<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR
. "global.php");

    if ( isset($_GET['idUsuarioExcluir']) && !empty($_GET['idUsuarioExcluir']) ) {

        $userController = new UsuarioController();

        $userController->remover($_GET['idUsuarioExcluir']);

        header("location: ../../usuario.php");
    }
    else {

        header("location: ../../usuario.php");
    }


?>