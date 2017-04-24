<?php

header('Content-Type: text/html; charset=utf-8');

$bdServidor = '127.0.0.1';
$bdUsuario = 'root';
$bdSenha = '';
$bdBanco = 'dot4';    

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if (mysqli_connect_errno($conexao)){
    echo "</br></br>Problemas com a conexao. Verifique os dados !";
    die();
}

?>