<?php
if(!isset($_SESSION))
    session_start();

    include("../../php/banco.php");   

    $path = "/xampp/htdocs/dotpet/chat/messenger/loghistory/";
    $pathUser = $path . $_SESSION['usuario'] . "/";
    $pathDestiny = $path . $_GET['destinatario'] . "/";


    $usuario = $_SESSION['usuario'];
    $nomeUsuario = $_SESSION['nomeUsuario'];
    $destinatario = $_GET['destinatario'];

    //ATUALIZA O HISTORICO DO LOG
    $selectQuery = ("SELECT a.nome, b.ultimo_log, b.id_usuario FROM usuarios a, chat_logs b
    WHERE b.id_usuario_destinatario = '$usuario' and a.id_usuario = b.id_usuario
    ORDER BY -b.ultimo_log
    ");

    $loadQuery = mysqli_query($conexao, $selectQuery);
    mysqli_close($conexao);
    
    $logHostoryUser = fopen($pathUser . "logHistory" . $usuario . ".html", "w");   
    while($resultado = mysqli_fetch_assoc($loadQuery)){
        $logHostoryUser = fopen($pathUser . "logHistory" . $usuario . ".html", "a");   
        fwrite($logHostoryUser, "<b><a class='logLine' href='index.php?destinatario=" . $resultado['id_usuario'] . "'>" . $resultado['ultimo_log'] . " - " . $resultado['nome'] . "</a></b>");
    }
    fclose($logHostoryUser); 
 
?>

  