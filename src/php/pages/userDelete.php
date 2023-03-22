<?php

//limpar Cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//Invoca arquivo que protege a sessão, evitando acesso sem log-in
require('../components/sessionProtection.php');

//Invoca arquivo que realiza a conexão com o banco de dados
require('../connections/mysqliConnection.php');

//invoca arquivo para trabalhar com os temas do sistema e suas respectivas cores
require('../components/systemThemeColors.php');

//invoca arquivo contendo dados sobre a chave do produto
require('../components/systemKey.php');

//Contenção do alerta
$SweetAlert = false;

//Parâmetros para SweetAlerts
$message = "";
$icon = "";
$title = "";

//Verifica correspondência da chave do produto
if (isset($_POST['productKey'])) {
    $key = $_POST['productKey'];

    if ($key != $product_key) {
        //Bloqueia acesso
        $message = "A chave inserida não é válida";
        $icon = "error";
        $title = "Dados Inválidos";

        //Autorização do alerta
        $SweetAlert = True;
        
    } else {
        //Deleta o usuário atual
        $user = $_SESSION['user'];
        $connection->query("DELETE FROM administrador WHERE usuario = '$user'");
        header('Location: userLogout.php');
    }
}


/*Consulta qual o tema no banco de dados e obtem um Array[4] contendo as cores respectivas ao mesmo */
$systemColors = getColors();
?>

<!--Aplicação das cores de tema ao sistema-->
<script>
    document.documentElement.style.setProperty('--palette-A', '<?php echo $systemColors[0]; ?>');
    document.documentElement.style.setProperty('--palette-B', '<?php echo $systemColors[1]; ?>');
    document.documentElement.style.setProperty('--palette-C', '<?php echo $systemColors[2]; ?>');
    document.documentElement.style.setProperty('--palette-D', '<?php echo $systemColors[3]; ?>');
</script>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../../public/css/base.css">
    <link rel="stylesheet" href="../../../public/css/home.css">
    <link rel="stylesheet" href="../../../public/css/sysEdit.css">
    <link rel="stylesheet" href="../../../public/css/navMenu.css">

    <style>
        article {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        form {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            gap: 30px;
        }

        .chave{
            font-size: 20px;
        }
    
        .submit{
            border-radius: 10px;
            line-height: 25px;
            text-align: center;
        }


        .submit:hover{
            cursor: pointer;
            background-color:rgb(218, 208, 208);
        }
        p{
            font-size: 22px;
            font-weight: 500;
        }

        .subm{
            border-radius: 10px;
            line-height: 30px;
            text-align: center;
            width: 190px;
            color: red;
            border: 1px solid red;
        }

        .subm:hover{
            cursor: pointer;
            background-color: rgb(212, 95, 95);
            color: white;
        }



    </style>

    <!--Recurso google para biblioteca de ícones-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <title>Deletar Conta</title>

</head>

<body>

    <?php
    require('../components/headerBlock.php'); //invocação do header da página 
    ?>

    <!--Ivocação da biblioteca respectiva aos sweetalerts-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        //Execução do sweetAlert
        <?php
        if ($SweetAlert === true){
            echo "Swal.fire({
                icon: '$icon',
                title: '$title',
                text: '$message'
                })";
                $SweetAlert = false;
        }
        ?>
    </script>

    <main>

        <!--Bloco de opções-->
        <div class="config-container">
            <ul class="unordered-element">
                <div title="Opção de personalização do sistema" class="config-topics">
                    <a href="adjusts.php">
                        <li class="li-topic">Personalização</li>
                    </a>
                </div>
                <div title="Opção de exclusão de conta" class="config-topics actual-atribute">
                    <a href="userDelete.php">
                        <li class="li-topic">Deletar Usuário</li>
                    </a>
                </div>
                <div title="Informações sobre o sistema" class="config-topics">
                    <a href="helpScreen.php">
                        <li class="li-topic">Ajuda</li>
                    </a>
                </div>
            </ul>

            <!--Bloco de informações respectivas a opção selecionada-->
            <article>

                <!--Formulário para remoção do usuário(inserção de chave do produto)-->
                <form action="" method="post">
                    <p>Se deletar essa conta será direcionado a tela de login e não poderá mais iniciar sessão com os dados da mesma.</p>
                    <div title="Chave serial do produto">
                        <label for="productKey" class="chave">Chave do Produto:</label><br><br>
                        <input type="text" name="productKey" class="submit" placeholder="•••••">
                    </div>

                    <!--Botão de confirmação-->
                    <div title="Deletar sua conta"><input type="submit" value="Deletar Minha Conta" class="subm"></div>
                </form>
            </article>
        </div>
    </main>
</body>

</html>