<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css" />
    <title>Projetão monstro</title>

</head>

<body>
    <main id="login-wallpaper">
        
        <div class="container full-height d-flex">
            <div class="row align-items-center w-100 p-3">
                <div class="col-md-6 mx-auto">
                    <form action="painel.php" method="post" class="bg-white py-4 px-4">
                        <div class="form-group mx-sm-5 mb-2">
                            <label for="loginTxt">Usuário</label>
                            <input type="text" class="form-control w-100 p-3" id="loginTxt" placeholder="Digite seu usuário">
                        </div>
                        <div class="form-group mx-sm-5 mb-2">
                            <label for="senhaTxt">Senha</label>
                            <input type="password" class="form-control w-100 p-3" id="senhaTxt" placeholder="Digite sua senha">
                            <br />
                            <input type="submit" class="btn btn-success btn-lg btn-block" value="Entrar" style="border-radius: 0;"/>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="bootstrap/js/bootstrap.js"></script>

</body>

</html>