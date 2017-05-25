<?php
    
    include("loginTeste.php");
    verificarLogin();            

    session_start();
    session_unset($_SESSION['usuario']);
    header("Location: ../entrar.php");
?>
