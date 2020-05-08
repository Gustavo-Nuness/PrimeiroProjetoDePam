<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php
    include_once("imports/imports-css.php");

    ?>
    <title>Projetão monstro</title>

</head>

<body>
    <main id="login-wallpaper">

        <div class="container full-height d-flex">
            <div class="row align-items-center w-100 p-3">
                <div class="col-md-6 mx-auto">
                    <form action="controller/verificacao.php" method="post" class="bg-white py-4 px-4">
                        <i class="far fa-user d-block mx-auto text-center icon-md"></i>
                        <div class="form-group mx-sm-5 mb-2">
                            <label for="loginTxt">Usuário</label>
                            <input type="text" class="form-control w-100 p-3" name="loginTxt" id="loginTxt" placeholder="Digite seu usuário">
                        </div>
                        <div class="form-group mx-sm-5 mb-2">
                            <label for="senhaTxt">Senha</label>
                            <input type="password" class="form-control w-100 p-3" name="senhaTxt" id="senhaTxt" placeholder="Digite sua senha">
                            <br />
                            <input type="submit" class="btn btn-success btn-lg btn-block" value="Entrar" style="border-radius: 0;" />

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <?php
    include_once("imports/imports-js.php");
    ?>
</body>

</html>