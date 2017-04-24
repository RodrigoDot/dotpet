<?php
    
    include("loginTeste.php");
    verificarLogin();            

    session_start();
    session_unset($_SESSION['usuario']);
?>

<script>location.href='../entrar.php'</script>