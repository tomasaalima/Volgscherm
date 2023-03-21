<?php

//limpar Cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


//verifica existência de uma sessão
if (!isset($_SESSION)) {
    session_start();
}

//Termina a sessão
session_destroy();

//Redireciona o usuário para tela de login
header("Location: ../../index.php");
