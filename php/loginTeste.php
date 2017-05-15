<?php

    if(!function_exists("verificarLogin")){
        
        function verificarLogin(){
            
            if(!isset($_SESSION))
                session_start();
            
            if(!isset($_SESSION['usuario']) || !is_numeric($_SESSION['usuario'])){
                echo " <script>
                            window.alert('Você precisa estar logado para acessar essa página. Por favor faça login e tente novamente !');
                            window.location='http://localhost/dotpet8/entrar.php';                         
                        </script> ";
            }
        }        
    }

?>



<?PHP
    /*
    include("loginTeste.php");
    verificarLogin();
    */    
?>
