<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".."
    . DIRECTORY_SEPARATOR . "global.php");

$usuario = new Usuario();

define("SUCESSO", 0);
define("EMAIL_VAZIO", 1);
define("NOME_VAZIO", 2);
define("NIVEL_ACESSO_VAZIO", 3);
define("SENHA_VAZIA", 4);
define("SENHA_DIFERENTE", 5);
define("CONFIRMAR_SENHA_VAZIO", 6);
define("EMAIL_REPETIDO", 7);

$usuario = new Usuario();

if (isset($_POST["txtNome"]) && !empty($_POST["txtNome"])) {
    $usuario->setNomeUsuario($_POST["txtNome"]);
} else {

    $response = array("status" => NOME_VAZIO);
    echo json_encode($response);
}

if (isset($_POST["txtEmail"]) && !empty($_POST["txtEmail"])) {

    $usuario->setEmailUsuario($_POST["txtEmail"]);
} else {

    $response = array("status" => EMAIL_VAZIO);
    echo json_encode($response);
}

if (isset($_POST["cboNivelAcesso"]) && !empty($_POST["cboNivelAcesso"])) {

    $nivelAcesso = new NivelAcesso();
    $nivelAcesso->setIdNivelAcesso($_POST["cboNivelAcesso"]);

    $result = NivelAcessoController::getNivelAcessoById($nivelAcesso->getIdNivelAcesso());

    foreach ($result as $r) {

        $nivelAcesso->setDescricaoNivelAcesso($r['descricaoNivel']);
    }

    $usuario->setNivelAcessoUsuario($nivelAcesso);
} else {

    $response = array("status" => NIVEL_ACESSO_VAZIO);
    echo json_encode($response);
}

if (isset($_POST["txtSenha"]) && !empty($_POST["txtSenha"])) {

    $usuario->setSenhaUsuario($_POST["txtSenha"]);
} else {

    $response = array("status" => SENHA_VAZIA);
    echo json_encode($response);
}

if (isset($_POST["txtConfirmarSenha"]) && !empty($_POST["txtConfirmarSenha"])) {

    if ($usuario->getSenhaUsuario() == $_POST["txtConfirmarSenha"]) {

        $userController = new UsuarioController();

        if ($userController->isValidEmail($usuario->getEmailUsuario())) {

            $userController->cadastrar($usuario);

            $usuario->setIdUsuario(
                $userController->getIdByEmail($usuario->getEmailUsuario())
            );

            $listUsuario = array(
                "nome" => $usuario->getNomeUsuario(),
                "email" => $usuario->getEmailUsuario(), "nivel" => $usuario->getNivelAcessoUsuario()->getDescricaoNivelAcesso(), "id" => $usuario->getIdUsuario(),
                "status" => SUCESSO
            );

            echo json_encode($listUsuario);
        } else {

            $response = array("status" => EMAIL_REPETIDO);

            echo json_encode($response);
        }
    } else {
        $response = array("status" => SENHA_DIFERENTE);
        echo json_encode($response);
    }
} else {

    $response = array("status" => CONFIRMAR_SENHA_VAZIO);
    echo json_encode($response);
}


