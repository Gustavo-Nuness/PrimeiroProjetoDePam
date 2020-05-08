<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php

    include_once("imports/imports-css.php");

    ?>

    <title>Crud Usuário</title>
</head>

<body>
    <?php
        require(__DIR__.DIRECTORY_SEPARATOR."controller".DIRECTORY_SEPARATOR."innerVerify.php");    
        include_once(__DIR__ . DIRECTORY_SEPARATOR . "header.php");
        require_once(__DIR__ . DIRECTORY_SEPARATOR . "global.php");
        
    ?>

    <?php
    $usuario = new Usuario();

    if (isset($_GET["idUsuarioEditar"]) && !empty($_GET['idUsuario'])) {

        $usuario->setIdUsuario($_GET["idUsuarioEditar"]);
        $userController = new  UsuarioController();
        $listaUsuario = $userController->consultarById($usuario->getIdUsuario());

        foreach ($listaUsuario as $s) {

            $usuario->setNomeUsuario($s['nomeUsuario']);
            $usuario->setEmailUsuario($s['emailUsuario']);
            $usuario->setSenhaUsuario($s['senhaUsuario']);
            $usuario->setNivelAcessoUsuario(new NivelAcesso());
            $usuario->getNivelAcessoUsuario()->setIdNivelAcesso($s['idNivel']);
        }
    }

    ?>

    <div class="container mt-6">

        <h5 class="display-4 text-center">
            Crud do usuário
        </h5>
        <form action="<?php echo (isset($_GET['idUsuarioEditar'])) ?  "controller/usuario/editarUsuario.php" :  "controller/usuario/inserirUsuario.php"; ?>" id="<?php (isset($_GET['idUsuario'])) ? "form-edit-user" : "form-insert-user"; ?>" method="post" class="needs-validation mt-5" novalidate>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="txtNome">Nome do usuário</label>
                    <input type="text" class="form-control" name="txtNome" id="txtNome" placeholder="Digite o seu nome" required value="<?php echo (isset($_GET['idUsuarioEditar'])) ? $usuario->getNomeUsuario() : ""; ?>">
                    <div class="valid-tooltip">
                        Tudo certo!
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="txtEmail">Email do usuário</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="spaEmail">@</span>
                        </div>
                        <input type="text" class="form-control" id="txtEmail" name="txtEmail" placeholder="Digite o seu email" aria-describedby="validationTooltipUsernamePrepend" required value=
                        "<?php

                            echo (isset($_GET['idUsuarioEditar'])) ? $usuario->getEmailUsuario() : "";
                        ?>">

                        <div class="invalid-tooltip">
                            Por favor, escolha um usuário válido e único.
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="cboNivelAcesso">Nível de acesso</label>
                        <select class="form-control" id="cboNivelAcesso" name="cboNivelAcesso">
                            <?php
                            if (isset($_GET['idUsuarioEditar'])) {

                                $listaNiveisAcesso = NivelAcessoController::getAll();
                                foreach ($listaNiveisAcesso as $nivelAcesso) {
                                    echo ("<option value='" . $nivelAcesso["idNivel"] . "'" . (($nivelAcesso["idNivel"] == $usuario->getNivelAcessoUsuario()->getIdNivelAcesso()) ? "selected" : "") . " >" . $nivelAcesso["descricaoNivel"] .  "</option>");
                                }
                            } else {

                                $listaNiveisAcesso = NivelAcessoController::getAll();
                                foreach ($listaNiveisAcesso as $nivelAcesso) {
                                    echo ("<option value='" . $nivelAcesso["idNivel"] . "'>" . $nivelAcesso["descricaoNivel"] . "</option>");
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="txtSenha">Senha</label>
                    
                    <input type="password" class="form-control" id="txtSenha" 
                    name="txtSenha" placeholder="Digite uma senha de pelo menos 8 caracteres" 
                    required value="<?php

                        echo (isset($_GET['idUsuarioEditar'])) ? $usuario->getSenhaUsuario() : "";

                    ?>">
                    <div class="invalid-tooltip">
                        Tudo certo!
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationTooltip05">Repita a senha</label>
                    <input type="password" class="form-control" id="txtConfirmarSenha" name="txtConfirmarSenha" placeholder="Digite a senha novamente" required value="<?php echo (isset($_GET['idUsuarioEditar'])) ? $usuario->getSenhaUsuario() : ""; ?>">
                    <div class="invalid-tooltip">
                        Digite uma Senha válida
                    </div>
                </div>


            </div>

            <div class="row mt-3">


                <div class="col-md-3">
                    <button type="submit" class="btn btn-success btn-block" type="submit"> <i class="far fa-paper-plane"></i> Cadastrar </button>
                </div>

                <div class="col-md-3">
                    <button type="reset" class="btn btn-danger btn-block" id="btnLimpar"> <i class="far fa-window-close"></i> Limpar </button>
                </div>
            </div>

            <div class="modal fade" id="excluirModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"> Excluir usuário </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            <a href=<?php echo ("controller/usuario/excluirUsuario?idUsuario='" . @isset($_GET['idUsuario']) . "'>") ?>>
                                <button type="button" class="btn btn-success">Confirmar</button> </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if (isset($_GET['idUsuarioEditar'])) {

                echo "<input type='hidden' value='" . $usuario->getIdUsuario() . "' name='idUsuario'/>";
            }


            ?>
        </form>


        <div class="row">
            <div class="col-md-12">
                <form action="controller/usuario/consultarUsuario.php" method="post" id="form-consulta">
                    <div class="input-group mb-3 mt-5">

                        <input type="text" class="form-control" placeholder="Pesquisar por usuário" aria-label="Recipient's username" aria-describedby="button-addon2" name="txtPesquisa" id="txtPesquisa" />
                        <div class="input-group-append">


                            <button class="btn btn-outline-success" type="submit"> <i class="fas fa-search"></i></button>
                        </div>

                </form>
            </div>
        </div>

    </div>
    <table class="table table-hover" id="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Usuário</th>
                <th scope="col">E-mail</th>
                <th scope="col">Nível</th>
                <th scope="col">Rotinas</th>
            </tr>
        </thead>
        <tbody id="table-body">

            <?php
            $userController = new UsuarioController();
            $listUsers = $userController->getAll();

            foreach ($listUsers as $user) {

                // echo "<tr>" . "<td>" . $user['nomeUsuario'] . "</td>";
                // echo "<td>" . $user['emailUsuario'] . "</td>";
                // echo "<td>" . $user['descricaoNivel'] . "</td>";
                // echo "<td class='d-flex justify-content-center' >" . "<form class = 'form-editar' action = 'controller/usuario/getUsuario.php' method='post'>"
                //     . "<input type='image' src='img/edit.png'/>"
                //     . "<input class='idUsuario' name='idUsuario' type ='hidden' value='" . $user['idUsuario'] . "' />"
                //     . "</form>" .
                //     '<form class="form-excluir" action="controller/usuario/excluirUsuario.php" method="post">'
                //     . "<input type='image' src='img/bin.png' />" .
                //     "<input class='idUsuario' name='idUsuario' type ='hidden' value='" . $user['idUsuario'] . "' />" .
                //     '</form>'
                //     . '</td>' . "</tr>";


                echo "<tr>" . "<td>" . $user['nomeUsuario'] . "</td>";
                echo "<td>" . $user['emailUsuario'] . "</td>";
                echo "<td>" . $user['descricaoNivel'] . "</td>";
                echo "<td class='d-flex justify-content-center' >"
                    . "<a href='usuario.php?idUsuarioEditar=" . $user['idUsuario'] . "'>"
                    . "<i class='fas fa-edit'></i>" .
                    "</a>" .

                    "<a href='usuario.php?idUsuarioExcluir=" . $user['idUsuario'] . "'>"
                    . "<i class='fas fa-trash-alt'></i>" .
                    "</a>" .

                    '</td>' . "</tr>";
            }
            ?>

        </tbody>
    </table>
    </div>

    <?php

    include_once(__DIR__ . DIRECTORY_SEPARATOR . "footer.php");

    ?>

    <div class="modal fade" id="modal-response-insertion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-body-response-insertion">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#form-insert-user").submit(function(e) {

            e.preventDefault();

            $.ajax({

                url: "controller/usuario/inserirUsuario.php",
                type: "post",
                dataType: "json",
                data: {

                    "txtNome": $("#txtNome").val(),
                    "txtEmail": $("#txtEmail").val(),
                    "cboNivelAcesso": $("#cboNivelAcesso").val(),
                    "txtSenha": $("#txtSenha").val(),
                    "txtConfirmarSenha": $("#txtConfirmarSennha").val()


                },
                success: function(response) {


                    var status = response.status;

                    if (status == 0) {


                        $('#modal-response-insertion').modal('show');

                        $('#modal-title').empty();
                        $('#modal-title').append("Sucesso");

                        $('#modal-body-response-insertion').empty();
                        $('#modal-body-response-insertion').append("<p>" + 'Usuário cadastrado com sucesso' + "</p>");
                        $("#txtNome").val("");
                        $("#txtEmail").val("");
                        $("#txtSenha").val("");
                        $("#txtConfirmarSenha").val("");

                        $("#table-body").append(



                            "<tr>" + "<td>" + response.nome + "</td>" +
                            "<td>" + response.email + "</td>" +
                            "<td>" + response.nivel + "</td>" +
                            "<td class='d-flex justify-content-center'>" +
                            "<a href='usuario.php?idUsuarioEditar='" + response.id + "'>" +
                            "<i class='fas fa-edit'></i>" + "</a>" +
                            "<a href='usuario.php?idUsuarioRemover='" + "'>" +
                            "<i class='fas fa-trash-alt' data-toggle='modal' data-target='#excluirModal'></i>" +
                            "</a>" +
                            '</td>' + "</tr>");




                    } else if (status == 1) {

                        $('#modal-response-insertion').modal('show');

                        $('#modal-body-response-insertion').empty();
                        $('#modal-body-response-insertion').append("<p>" + 'Email já cadastrado!' + "</p>");
                        $('#modal-title').empty();
                        $('#modal-title').append("Erro");
                    }



                }

            });
        });




        $('#form-consulta').submit(function(e) {

            e.preventDefault();

            $.ajax({

                url: "controller/usuario/consultarUsuario.php",
                type: "post",
                dataType: "json",
                data: {

                    "txtPesquisa": $('#txtPesquisa').val()
                },
                success: function(response) {


                    $("#table-body").empty();
                    $.each(response, function(key, value) {


                        $("#table-body").append(

                            // "<tr>" + "<td>" + value.nomeUsuario + "</td>" +
                            // "<td>" + value.emailUsuario + "</td>" +
                            // "<td>" + value.descricaoNivel + "</td>" +
                            // "<td class='d-flex justify-content-center'>" +
                            // "<a href='controller/usuario/UsuarioController.php?id='" + value.idUsuario + "'>" +
                            // "<i class='fas fa-edit'></i>" +
                            // "<i class='fas fa-trash-alt' data-toggle='modal' data-target='#excluirModal'></i>" +
                            // '</td>' + "</tr>");


                            "<tr>" + "<td>" + value.nomeUsuario + "</td>" +
                            "<td>" + value.emailUsuario + "</td>" +
                            "<td>" + value.descricaoNivel + "</td>" +
                            "<td class='d-flex justify-content-center'>" +
                            "<a href='usuario.php?idUsuarioEditar='" + value.idUsuario + "'>" +
                            "<i class='fas fa-edit'></i>" + "</a>" +
                            "<a href='usuario.php?idUsuarioRemover='" + value.idUsuario + "'>" +
                            "<i class='fas fa-trash-alt' data-toggle='modal' data-target='#excluirModal'></i>" +
                            "</a>" +
                            '</td>' + "</tr>");




                    });



                }



            });


        });



        $(document).on("submit", "form-edit-user", function(e) {

            console.log("Chamou o evento submit");

            e.preventDefault();


            const ERRO_AO_EDITAR_O_USUARIO = 0;
            const USUARIO_EDITADO_COM_SUCESSO = 1;
            const DADOS_INVALIDOS = 2

            $.ajax({

                url: "controller/usuario/editarUsuario.php",
                type: "post",
                dataType: "json",
                data: {


                    "txtNome": $("#txtNome").val(),
                    "txtEmail": $("#txtEmail").val(),
                    "cboNivelAcesso": $("#cboNivelAcesso").val(),
                    "txtSenha": $("#txtSenha").val(),
                    "txtConfirmarSenha": $("#txtConfirmarSennha").val()


                },
                success: function(response) {

                    if (response.status === USUARIO_EDITADO_COM_SUCESSO) {


                        alert("Usuário editado com sucesso");
                        document.location.reload(true);

                    }
                    else if (response.status === DADOS_INVALIDOS){
                        
                        alert("Dados inválidos, por favor digite novamente");
                    }
                    else {

                        alert("Erro ao editar o usuário :(");
                    }

                },
                error: function() {

                    alert("Erro ao editar o usuário :(");
                }


            });
        });
    </script>

</body>

</html>