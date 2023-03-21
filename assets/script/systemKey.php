<?php

//limpar Cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//Invoca arquivo que realiza a conexão com o banco de dados
require("db_connection.php");

//busca pelo id pré-definido da chave do produto
$sql = "SELECT * FROM sistema WHERE id = 654678786";
$result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;
$data = $result->fetch_assoc();

//Atribui chave à variável para uso
$product_key = $data["chave"];
