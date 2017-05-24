<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();

if(isset($_SESSION['nomeUsuario'])) {
    
    //CODIGO QUE GERA OS LOGS DO CHAT
    $path = "/xampp/htdocs/dotpet/chat/messenger/loghistory/"; // CAMINHO ABSOLUTO PARA A PASTA DOS LOGS DOS USUARIOS
    $pathUser = $path . $_SESSION['usuario'] . "/";
    $pathDestiny = $path . $_GET['destinatario'] . "/";
    
    $text = $_POST['text']; //DADOS ENVIADOS PELO POST DO JQUERY
    
    $fileOpen1 = fopen($pathUser . "log" . $_SESSION['usuario'] . $_GET['destinatario'] .".html", "a");
    fwrite($fileOpen1, "<div class='msgLine'>(" . date("j\/m\/Y h:i:s A ") . ") - <b>" . $_SESSION['nomeUsuario'] . "</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fileOpen1);
    
    $fileOpen2 = fopen($pathDestiny . "log" . $_GET['destinatario'] . $_SESSION['usuario'] .".html", "a");
    fwrite($fileOpen2, "<div class='msgLine'>(" . date("j\/m\/Y h:i:s A ") . ") - <b>" . $_SESSION['nomeUsuario'] . "</b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
    fclose($fileOpen2);
    //FIM
    
    /*
    //CODIGO QUE GERA O HISTORICO DO LOG DO CHAT VERSAO 1 
    $logHostoryDestiny = fopen($pathDestiny . "logHistory" . $_GET['destinatario'] . ".html", "w");      
    fwrite($logHostoryDestiny, "<b><a class='logLine' href='#'>(" . date("j\/m\/Y h:i:s A ") . ") - " . $_SESSION['nomeUsuario'] . "</a></b>");
    fclose($logHostoryDestiny);      
    //FIM
    */
    
    //CODIGO QUE GERA O HISTORICO DO LOG DO CHAT VERSAO 2 
    function logHistory() {
        $path = "/xampp/htdocs/dotpet/chat/messenger/loghistory/";
        $pathDestiny = $path . $_GET['destinatario'] . "/";
        
        include("../../php/banco.php");   

        $usuario = $_SESSION['usuario'];
        $nomeUsuario = $_SESSION['nomeUsuario'];
        $destinatario = $_GET['destinatario'];
   
        //VERIFICA SE EXISTE HISTORICO DO LOG
        $checkQuery = ("SELECT * FROM chat_logs
        WHERE id_usuario = '$usuario' AND id_usuario_destinatario = '$destinatario'    
        ");
        
        $checkResult = mysqli_query($conexao, $checkQuery);
        $existsCheck = mysqli_fetch_assoc($checkResult);
        
        if(isset($existsCheck['id_usuario'])) { //SE EXISTE ATUALIZA
            $updateQuery = "UPDATE chat_logs   
            SET ultimo_log = DEFAULT
            WHERE id_usuario = '$usuario' and id_usuario_destinatario = '$destinatario'
            "; 
            mysqli_query($conexao, $updateQuery);            
        }else {                                 //SE NAO EXISTE CRIA
            $insertQuery = "INSERT INTO chat_logs (id_log, id_usuario, id_usuario_destinatario, ultimo_log)
            VALUES
            (DEFAULT, '$usuario', '$destinatario', DEFAULT)
            ";
            mysqli_query($conexao, $insertQuery);
        }        
    }
        
    logHistory();
    
}

?>

 
