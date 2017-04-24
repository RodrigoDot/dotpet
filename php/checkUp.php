<?php

    if(!isset($_SESSION))
                session_start();

    if(!isset($_SESSION['usuario']) || !is_numeric($_SESSION['usuario'])) {
        echo "<a class='cabecalho-item' href='entrar.php'>Entrar</a>" ;
    }else {
        echo "
                <div id='usuarioInfo'>
                    <a href='perfil.php'> <img id='fotoPerfil' src='$_SESSION[fotoPerfil]' /></a> 
                    <a class='usuario' href='perfil.php'>$_SESSION[nomeUsuario]</a>
                    <a class='logout' href='php/logout.php'>Sair</a>
                </div>
        ";
    }



?>
