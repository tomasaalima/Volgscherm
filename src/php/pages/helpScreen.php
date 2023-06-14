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
require("../components/systemThemeColors.php");

//Invoca arquivo que guarda variáveis de caminhos
require('../components/paths.php');

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
    <meta 
        charset="UTF-8"
    >
    <meta 
        http-equiv="X-UA-Compatible" 
        content="IE=edge"
    >
    <meta 
        name="viewport" 
        content="width=device-width, initial-scale=1.0"
    >

    <link 
        rel="stylesheet" 
        href="<?=$css?>/base.css"
    >
    <link 
        rel="stylesheet" 
        href="<?=$css?>/home.css"
    >
    <link 
        rel="stylesheet" 
        href="<?=$css?>/sysEdit.css"
    >
    <link 
        rel="stylesheet" 
        href="<?=$css?>/navMenu.css"
    >

    <style>
        article {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        img {
            background-color: white;
            max-height: 200px;
            margin-top: 50px;
            border-radius: 10px;
        }

        .remote{
            font-size: 20px;
            width: 85%;
            
        }
        p{
            text-align: justify;
            justify-content: center;
            align-items: center;
        }
    </style>

    <!--Recurso google para biblioteca de ícones-->
    <link 
        rel="stylesheet" 
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" 
    />

    <title>
        Ajuda
    </title>

</head>

<body>

    <?php
        require('../components/headerBlock.php'); //invocação do header da página 
    ?>

    <main>
        <div 
            class="config-container"
        >
            <ul 
                class="unordered-element"
            >
                <div 
                    title="Opção de personalização do sistema" 
                    class="config-topics"
                >
                    <a 
                        href="adjusts.php"
                    >
                        <li 
                            class="li-topic"
                        >
                            Personalização
                        </li>
                    </a>
                </div>
                <div 
                    title="Opção de exclusão de conta" 
                    class="config-topics"
                >
                    <a 
                        href="userDelete.php"
                    >
                        <li 
                            class="li-topic"
                        >
                            Deletar Usuário
                        </li>
                    </a>
                </div>
                <div 
                    title="Informações sobre o sistema" 
                    class="config-topics actual-atribute"
                >
                    <a 
                        href="helpScreen.php"
                    >
                        <li 
                            class="li-topic"
                        >
                            Ajuda
                        </li>
                    </a>
                </div>
            </ul>

            <!--Informações-->
            <article>
                <div 
                    class="remote"
                >
                    <br>
                    <p>
                        <!--Redirecionamento Github-->
                        O projeto 
                        <strong>
                            Volgscherm
                        </strong> 
                        está em constante desenvolvimento e é disponibilizado remotamente no 
                        <a 
                            target="_blank" 
                            href="https://github.com/tomasaalima/volgscherm"
                        >
                            <strong 
                                title="Direcionar ao GitHub"
                            >
                                GitHub.
                            </strong>
                        </a>
                    </p>
                    <br>
                    <p>
                        <!--Redirecionamento para envio de e-mail-->
                        Para sugestões ou reportar bugs você poderá entrar em contado pelo email: 
                        <a 
                            target="_blank" 
                            href="mailto:taal@discente.ifpe.edu.br"
                        >
                            <strong 
                                title="Enviar E-mail"
                            >
                                taal@discente.ifpe.edu.br 
                            </strong>
                        </a> 
                        ou 
                        <a 
                            target="_blank" 
                            href="mailto:jrem1@discente.ifpe.edu.br"
                        >
                            <strong 
                                title="Enviar E-mail"
                            >
                                jrem1@discente.ifpe.edu.br.
                            </strong>
                        </a>
                    </p>
                    <br>
                    <p>
                        Para mais informações consultar a documentação do sistema.
                    </p>
                    <!--imagem volgscherm-->
                    <picture 
                        title="Logo da impresa"
                    >
                        <img 
                            src="<?=$img?>/logo.png" 
                            alt="logo volgscherm"
                        >
                    </picture>
                </div>
            </article>
        </div>
    </main>
</body>

</html>