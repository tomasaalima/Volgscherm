<?php

// Invoca arquivo que realiza a conexão com o banco de dados
require('../connections/mysqliConnection.php');

// Função para obter o número de impressoras por status
function getImpressoraCountByStatus($connection)
{
    $query = "SELECT status, COUNT(*) AS count FROM impressora GROUP BY status";
    $result = $connection->query($query) or die("Falha na execução do código SQL: " . $connection->error);

    $statusCounts = array();
    while ($db_data = mysqli_fetch_assoc($result)) {
        $status = $db_data['status'];
        $count = $db_data['count'];
        $statusCounts[$status] = $count;
    }

    return $statusCounts;
}

// Obtém a contagem de impressoras por status
$statusCounts = getImpressoraCountByStatus($connection);

// Arrays contendo números seriais das impressoras com os respectivos status (0, 1, 2, 3)
$sts0 = array();
$sts1 = array();
$sts2 = array();
$sts3 = array();

// Atribui o número serial ao respectivo array de acordo com o status
foreach ($statusCounts as $status => $count) {
    switch ($status) {
        case '0':
            for ($i = 0; $i < $count; $i++) {
                array_push($sts0, $i + 1);
            }
            break;
        case '1':
            for ($i = 0; $i < $count; $i++) {
                array_push($sts1, $i + 1);
            }
            break;
        case '2':
            for ($i = 0; $i < $count; $i++) {
                array_push($sts2, $i + 1);
            }
            break;
        case '3':
            for ($i = 0; $i < $count; $i++) {
                array_push($sts3, $i + 1);
            }
            break;
    }
}
?>

<!--Bloco de cabeçalho ultilizado em multiplas páginas-->
<header>
    <div 
        class='header-logo'
        >
        <a 
            href="../pages/home.php"
        >
            <i 
                id="back-icon" 
                class="material-symbols-outlined"
            >
                arrow_back
            </i>
        </a>
    </div>

    <!--badges de alertas-->
    <div 
        class='header-alert'
    >
        <div>
            <div 
                title="Dispositivos com Problemas" 
                style='background-color: rgba(255, 0, 0, 0.7);'
            >
                <strong 
                    class='alert'
                >
                    !!
                </strong>
                <span 
                    class='badge'
                >
                    <?php 
                        echo count($sts3); 
                    ?>
                </span>
            </div>
        </div>
        <div>
            <div 
                title="Dispositivos com Baixa Carga" 
                style='background-color: rgba(0, 132, 255, 0.7);'
            >
                <strong 
                    class='alert'
                >
                    BC
                </strong>
                <span 
                    class='badge'
                >
                    <?php 
                        echo count($sts1); 
                    ?>
                </span>
            </div>
        </div>
        <div>
            <div 
                title="Novos Dispositivos" 
                style='background-color: rgba(208, 255, 0, 0.7);'
            >
                <strong 
                    class='alert'
                >
                    ND
                </strong>
                <span 
                    class='badge'
                >
                    <?php 
                        echo count($sts0); 
                    ?>
                </span>
            </div>
        </div>
        <div>
            <div 
                title="Dispositivos Desativados" 
                style='background-color: rgba(133, 125, 125, 0.7);'
            >
                <strong 
                    class='alert'
                >
                    DD
                </strong>
                <span 
                    class='badge'
                >
                    <?php 
                        echo count($sts2); 
                    ?>
                </span>
            </div>
        </div>
    </div>

    <!--Imagem do usuário e menu hamburguer-->
    <div 
        class='header-user'
    >
        <div 
            title="Imagem do usuário" 
            class='user-image'
        >
            <img 
                class='user-img' 
                src='../pages/uploads/user-img.jpg' 
                alt='imagem do usuário'
            >
        </div>
        <div 
            class='line'
        >
            <hr>
        </div>
        <div 
            title="Menu Hamburguer" 
            class='triple-line-menu'
        >
            <i 
                id="burguer" 
                class="material-symbols-outlined" 
                onclick="openMenu()"
            >
                menu
            </i>
            <script>
                function openMenu() {
                    if (menu.style.display == 'block') {
                        document.getElementById('burguer').innerHTML = 'menu';
                        menu.style.display = 'none';
                    } else {
                        document.getElementById('burguer').innerHTML = 'close';
                        menu.style.display = 'block';
                    }
                }
            </script>
        </div>

    </div>
</header>

<!--Navegação do menu Hamburguer-->
<nav 
    id="menu-nav"
>
    <menu 
        id="menu"
    >
        <ul>
            <li 
                title="Ir para tela de configurações"
            >
                <a 
                    href="../pages/adjusts.php"
                >
                    <i 
                        class="material-symbols-outlined"
                    >
                        settings
                    </i>
                    Configurações
                </a>
            </li>
            <li 
                title="Realizar Logout"
            >
                <a 
                    href="../components/logout.php"
                >
                    <i 
                        class="material-symbols-outlined"
                    >
                        logout
                    </i>
                    Logout
                </a>
            </li>
        </ul>
    </menu>
</nav>