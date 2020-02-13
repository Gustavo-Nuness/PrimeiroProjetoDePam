<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css">
    <title>Crud Usuário</title>
</head>

<body>
    <?php
        require(__DIR__.DIRECTORY_SEPARATOR."controller".DIRECTORY_SEPARATOR."innerVerify.php");    
        include_once(__DIR__ . DIRECTORY_SEPARATOR . "header.php");
        require_once(__DIR__ . DIRECTORY_SEPARATOR . "global.php");
        
    ?>

    <div class="container mt-5">

        <h1>Cadastro, edição, remoção e consulta de usuários

        </h1>
        <form class="needs-validation" novalidate>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="txtNome">Nome do usuário</label>
                    <input type="text" class="form-control" name="txtNome" id="txtNome" placeholder="Digite o seu nome" required>
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
                        <input type="text" class="form-control" id="txtEmail" placeholder="Digite o seu email" aria-describedby="validationTooltipUsernamePrepend" required>
                        <div class="invalid-tooltip">
                            Por favor, escolha um usuário válido e único.
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <div class="form-group">
                        <label for="txtNivelAcesso">Nível de acesso</label>
                        <select class="form-control" id="txtNivelAcesso" name="txtNivelAcesso">
                            <?php

                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="txtSenha">Senha</label>
                    <input type="text" class="form-control" id="txtSenha" name="txtSenha" placeholder="Digite uma senha de pelo menos 8 caracteres" required>
                    <div class="invalid-tooltip">
                        Tudo certo!
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationTooltip05">Repita a senha</label>
                    <input type="text" class="form-control" id="txtSenha" name="txtSenha" placeholder="Digite a senha novamente" required>
                    <div class="invalid-tooltip">
                        Digite uma Senha válida
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Cadastrar</button>
        </form>



        <div class="input-group mb-3 mt-5">
            <input type="text" class="form-control" placeholder="Pesquisar por usuário" aria-label="Recipient's username" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="button" id="button-addon2">Consultar</button>
            </div>
        </div>

        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Usuário</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Nível</th>
                    <th scope="col">Rotinas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php

    include_once(__DIR__ . DIRECTORY_SEPARATOR . "footer.php");

    ?>