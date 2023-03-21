<?php

//limpar Cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


//Onde está hospedado o banco de dados
$host = "localhost";

//Nome do proprietário do banco de dados
$user = "root";

//Senha do proprietário
$pass = "aqui742830";

//Nome do banco de dados
$dbname = "volgscherm";

try {
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem a porta
    $connection = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "Conexão com banco de dados realizado com sucesso.";
} catch (PDOException $err) {
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}
    //Fim da conexão com o banco de dados utilizando PDO
