<?php

    if (!isset($_SESSION))
            session_start();
    include("../banco.php"); //INCLUSAO DO DOCUMENTO COM OS DADOS PARA A CONEXAO COM O BANCO
    $idProcesso = $_POST['idProcesso'];
    /*MONTAGEM DA QUERY EXCLUSAO DE PROCESSOS DO ANIMAL*/
    $exclusaoDeProcesso = "DELETE FROM processos
    WHERE $idProcesso = id_processo";
    if(mysqli_query($conexao, $exclusaoDeProcesso)) {
        echo"O processo foi excluido";
        header("Location: ../../perfil.php");
    }else {
        echo"Nao foi possivel excluir o processo";
    }
    mysqli_close($conexao);
?>
