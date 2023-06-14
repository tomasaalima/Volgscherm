<?php
//Invoca arquivo que realiza a conexão com o banco de dados
require('../connections/mysqliConnection.php');

//Invoca arquivo para controlar busca
require('searchPrinter.php');

//Invoca arquivo que guarda variáveis de caminhos
require('../components/paths.php');

function getPrintData($connection, $search) {
    
    if($search == ''){
        $sql = "SELECT serial, nome, endereco_ip, data_reconhecimento, modelo, setor FROM impressora";
    }else{
        $sql = "SELECT serial, nome, endereco_ip, data_reconhecimento, modelo, setor FROM impressora WHERE serial LIKE '%$search%'";
    }

    $result = $connection->query($sql) or die("Falha na execução do código SQL") . $connection->error;
    return $result;
}

$result = getPrintData($connection, $search);

//Bloco de impressoras em forma de tabela
while ($db_data = mysqli_fetch_assoc($result)) {
    echo "  <table 
                title=" . $db_data['serial'] . " 
                class='printer-object'
            >
                <thead>
                    <tr>
                        <th 
                            colspan='2'
                        >
                            <img 
                                width='70%' 
                                src='".$img."/printer.png' 
                                alt='logo de uma impressora'
                            >
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            Serial
                        </td>
                        <td>
                            " . htmlspecialchars($db_data['serial']) . "
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Nome
                        </td>
                        <td>
                            " . htmlspecialchars($db_data['nome']) . "
                        </td>
                    </tr>
                    <tr>
                        <td>
                            IP
                        </td>
                        <td>
                            " . htmlspecialchars($db_data['endereco_ip']) . "
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Reconhecida em
                        </td>
                        <td>
                            " . htmlspecialchars($db_data['data_reconhecimento']) . "
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Modelo
                        </td>
                        <td>
                            " . htmlspecialchars($db_data['modelo']) . "
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Setor
                        </td>
                        <td>
                            " . htmlspecialchars($db_data['setor']) . "
                        </td>
                    </tr>
                </tbody>
            </table>";
}
