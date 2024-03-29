<?php

//limpar Cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


// Limpar o buffer
ob_start();

//Invoca arquivo em que existem as variáveis correspondentee as datas
require('../components/homeControl.php');

//Invoca arquivo que realiza a conexão com o banco de dados
include_once '../connections/pdoConnection.php';

//Verifica se foi definido um periodo específico na busca
if ($period != "MAX") {
    generateCSV("SELECT data_execucao, SUM(novas_impressoes), COUNT(DISTINCT serial_impressora) FROM dados_impressora WHERE data_execucao BETWEEN '$date' and '$today' GROUP BY data_execucao ORDER BY data_execucao ASC");

    //Se não, retorna todos os valores no banco de dados
} else {
    generateCSV("SELECT data_execucao, SUM(novas_impressoes), COUNT(DISTINCT serial_impressora) FROM dados_impressora GROUP BY data_execucao ORDER BY data_execucao ASC");
}

function generateCSV($sql)
{

    // Preparar a QUERY
    global $connection;
    $result = $connection->prepare($sql);

    // Executar a QUERY
    $result->execute();

    // Acessa o IF quando encontrar registro no banco de dados
    if (($result) and ($result->rowCount() != 0)) {

        // Aceitar csv ou texto 
        header('Content-Type: text/csv; charset=utf-8');

        // Nome arquivo
        header('Content-Disposition: attachment; filename=arquivo.csv');

        // Gravar no buffer
        $file = fopen("php://output", 'w');

        // Criar o cabeçalho do Excel - Usar a função mb_convert_encoding para converter carateres especiais
        $header = ['Data', 'impressões', 'Impressoras Ultilizadas', mb_convert_encoding('', 'ISO-8859-1', 'UTF-8')];

        // Escrever o cabeçalho no arquivo
        fputcsv($file, $header, ',');

        // Ler os registros retornado do banco de dados
        while ($db_data = $result->fetch(PDO::FETCH_ASSOC)) {

            // Escrever o conteúdo no arquivo
            fputcsv($file, $db_data, ',');
        }

        // Fechar arquivo
        //fclose($file);

    } else { // Acessa O ELSE quando não encontrar nenhum registro no BD
        header("Location: ../pages/home.php");
    }
}
