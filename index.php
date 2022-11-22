<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/form.css">

    <title>volgscherm</title>

</head>
<body>
    <div class="container-login">
        <img class="logo-image" src="assets/img/logo.png" alt="logo da empresa">
        <div class="container-line">
            <hr class="line">
        </div>
        <div class="container-formulary">
            <form class="formulary" action="assets/script/config.php" method="post">
                <label class="label-formulary" for="user">Usuário</label>
                <input class="input-formulary" type="text" name="user">
                <label class="label-formulary" for="password">Senha</label>
                <input class="input-formulary" type="password" name="password" autocomplete="current-password">
                <div class="sub-elements">
                    <a href="#">Esqueceu Sua Senha?</a>
                    <a href="#">Cadastrar Usuário</a>
                </div>
                <button class="submit-btn" type="submit">Executar</button>
            </form>
        </div>
    </div>
</body>
</html>