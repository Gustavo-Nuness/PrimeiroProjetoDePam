<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css">
    <title>Projetão monstro</title>
</head>

<body>
    <?php
    include_once(__DIR__ . DIRECTORY_SEPARATOR . "header.php");

    ?>

    <div class="container mt-5">

        <h1>Cadastro,
            
        </h1>
        <form class="needs-validation" novalidate>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationTooltip01">Email</label>
                    <input type="text" class="form-control" id="validationTooltip01" placeholder="Nome" value="Mark" required>
                    <div class="valid-tooltip">
                        Tudo certo!
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="validationTooltipUsername">Usuário</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                        </div>
                        <input type="text" class="form-control" id="validationTooltipUsername" placeholder="Usuário" aria-describedby="validationTooltipUsernamePrepend" required>
                        <div class="invalid-tooltip">
                            Por favor, escolha um usuário válido e único.
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="validationTooltip03">Cidade</label>
                    <input type="text" class="form-control" id="validationTooltip03" placeholder="Cidade" required>
                    <div class="invalid-tooltip">
                        Por favor, informe uma cidade válida.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationTooltip04">Estado</label>
                    <input type="text" class="form-control" id="validationTooltip04" placeholder="Estado" required>
                    <div class="invalid-tooltip">
                        Por favor, informe um estado válido.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationTooltip05">CEP</label>
                    <input type="text" class="form-control" id="validationTooltip05" placeholder="CEP" required>
                    <div class="invalid-tooltip">
                        Por favor, informe um CEP válido.
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Enviar</button>
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