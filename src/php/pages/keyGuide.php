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
        href="/volgscherm/public/css/base.css"
    >

    <style>
        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        article {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            margin: auto;
            width: 60%;
            border: 1px solid black;
            text-align: center;
            height: 50%;
            padding: 0px 10px 0px 10px;
            border-radius: 20px;
            box-shadow: 0 12px 16px 0  rgba(64, 70, 70, 0.808), 0 17px 50px 0  rgba(64, 70, 70, 0.808);

        }

        article:hover{
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }

        article>div {
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 10px;
        }

        .submit-btn {
            width: 40%;
            border-radius: 10px;
            line-height: 25px;
            margin-bottom: 12px;
        }

        .submit-btn:hover{
            cursor: pointer;
            background-color:rgb(218, 208, 208);
        }
        .justify{
            width: 85%;
            text-align: justify;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        h1{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 30px;
            font-weight: 400;
        }
        p{
            text-indent: 20px;
        }
        .vid{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

    </style>

    <title>Chave de Acesso</title>

</head>

<body>
    <article>
        <div>
            <!--Informações sobre a chave do produto-->
            <h1>O que é a Chave do Produto?</h1>
            <div 
                class="vid"
            >
                <div 
                    class="justify"
                >
                    <p>
                        A Chave do Produto é um código serial fornecido pelos proprietários do sistema que acompanha o produto. É um meio de gerenciamento e recurso que visa a segurança aos seus utilizadores.
                        Neste sistema você precisará da chave de gerenciamento para cadastro, remoção e atualização de dados do utilizador do sistema .
                    </p>
                    <br>
                    <p>
                        Você encontrará a chave na Documentação do produto &rArr; Manual do Usuário &rArr; Chave do produto.
                    </p>
                </div>
            </div>
        </div>
        <div 
            class="form-btns"
        >
            <a 
                href="/volgscherm/index.php"
            >
                <!--Botão para retorno-->
                <input 
                    class="submit-btn" 
                    class="toback" 
                    type="button" 
                    value="Voltar"
                >
            </a>
        </div>
    </article>

</body>

</html>