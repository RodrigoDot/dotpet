<?php

header('Content-Type: text/html; charset=utf-8');

$bdServidor = 'mysql.hostinger.com.br';
$bdUsuario = 'u375412749_root';
$bdSenha = 'HOSTINGERmysql2017';
$bdBanco = 'u375412749_dot4';    

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if (mysqli_connect_errno($conexao)){
    echo "</br></br>Problemas com a conexao. Verifique os dados !";
    die();
}

?>