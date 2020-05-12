
<?php


require_once(__DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR
    . "global.php");

$usuario = new Usuario();

define("ERRO", 0);
define("SUCESSO", 1);
define("NOME_INVALIDO", 2);
define("EMAIL_INVALIDO", 3);
define("NIVEL_ACESSO_INVALIDO", 4);
define("SENHA_INVALIDA", 5);
define("CONFIRMACAO_SENHA_INVALIDA", 6);
define("SENHAS_DIFERENTES", 7);
define("DADOS_INVALIDOS", 8);


$usuario = new Usuario();
$vetErros = [];

if (isset($_POST["txtNome"]) && !empty($_POST['txtNome'])) {
    $usuario->setNomeUsuario($_POST["txtNome"]);
} else {

    $erro = array("msg" => "O nome está inválido", "status" => NOME_INVALIDO);
    array_push($vetErros, $erro);
}

if (isset($_POST["txtEmail"]) && !empty($_POST["txtEmail"])) {

    $usuario->setEmailUsuario($_POST["txtEmail"]);
} else {

    $erro = array("msg" => "O email está inválido", "status" => EMAIL_INVALIDO);
    array_push($vetErros, $erro);
}

if (isset($_POST["cboNivelAcesso"]) &&  !empty($_POST["cboNivelAcesso"])) {

    $nivelAcesso = new NivelAcesso();
    $nivelAcesso->setIdNivelAcesso($_POST["cboNivelAcesso"]);

    $result = NivelAcessoController::getNivelAcessoById($nivelAcesso->getIdNivelAcesso());

    foreach ($result as $r) {

        $nivelAcesso->setDescricaoNivelAcesso($r['descricaoNivel']);
    }

    $usuario->setNivelAcessoUsuario($nivelAcesso);
} else {


    $erro = array("msg" => "O nível de acesso está inválido", "status" => NIVEL_ACESSO_INVALIDO);
    array_push($vetErros, $erro);
}

if (isset($_POST["txtSenha"]) && !empty($_POST['txtSenha'])) {

    $usuario->setSenhaUsuario($_POST["txtSenha"]);
} else {


    $erro = array("msg" => "A senha está inválida", "status" => SENHA_INVALIDA);
    array_push($vetErros, $erro);
}

if (
    isset($_POST["txtConfirmarSenha"]) &&
    !empty($_POST["txtConfirmarSenha"]) &&
    $usuario->getSenhaUsuario() == $_POST["txtConfirmarSenha"]
) {

    $usuario->setSenhaUsuario($_POST["txtConfirmarSenha"]);
} else {


    $erro = array("msg" => "A confirmação da senha está inválida", "status" => CONFIRMACAO_SENHA_INVALIDA);
    array_push($vetErros, $erro);
}

if (count($vetErros) === 0) {

    $userController = new UsuarioController();

    $usuario->setIdUsuario($_POST['idUsuario']);

    if ($userController->isValidEmailForEdit($usuario)) {

        $userController->editar($usuario);

        $listUsuario = array(
            "nome" => $usuario->getNomeUsuario(),
            "email" => $usuario->getEmailUsuario(), "nivel" => $usuario->getNivelAcessoUsuario()->getDescricaoNivelAcesso(), "id" => $usuario->getIdUsuario(),
            "status" => SUCESSO
        );

        echo json_encode($listUsuario);
    } else {

        $erro = array("msg" => "O email está inválido", "status" => EMAIL_INVALIDO);
        array_push( $vetErros, $erro);
        
        $vetErros['status'] = DADOS_INVALIDOS;
        echo json_encode($vetErros);
    }
}
else {
        
    $vetErros['status'] = DADOS_INVALIDOS;
    echo json_encode($vetErros);
}




?>