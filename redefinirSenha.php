<!DOCTYPE html>

<?php

    include("php/loginTeste.php");
    verificarLogin();  

?>

<html lang="pt-br">
    
    <head>
        <title>Nova Senha</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1"/>        
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="css/estiloFormulario.css"/>
        <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css" />
        <script src="lib/JQuery/jquery-3.1.1.min.js"></script>        
        <script src="javascript/login/atualizarSenha.js"></script>
    </head>
    
    <body>
         <header id="cabecalho"> 

             <img class="logo"  src="imagens/LogoPet.png" height="auto" width="100%" onclick="location.href='index.php'"/>
             <?php include("php/checkUp.php"); ?>
      
        </header> 
        
        <main id="containerGeral">
        
        <section>
            
            <form id="redefinirSenha" action="php/login/atualizarSenha.php" method="post">
                
                <label class="labelLogin" for="email_usuario">E-mail</label>
                <input required autofocus class="confirmaEmail entrada" type="email" id="confirmaEmail" name="confirmarEmail" size="40" maxlength="50" placeholder="Ex.: dotpet@dotpet.com"/>
                    <br/>
                <label class="labelLogin" for="senha_usuario">Nova Senha</label>
                <input required class="novaSenha entrada" type="password" id="senha_usuario" name="novaSenha" size="40" maxlength="16" placeholder="Máx 16 caractéres"/>
                    <br/>
                <label class="labelLogin" for="senha_usuario">Confirmar Senha</label>
                <input required class="confirmaSenha entrada" type="password" id="senha_usuario" name="confirmaSenha" size="40" maxlength="16" placeholder="Máx 16 caractéres"/>
                
                <div class="btn-group btn-group-justified">
                    <a href="perfil.php"><button class='btn-danger btn-inline-block' type="button" name='cancelar'>Cancelar</button></a>
                    <button class='testar btn-primary btn-inline-block' type='submit' name='salvar'>Salvar</button> 
                </div>
                    
            </form>
            
            <div id="mensagem"></div>
            
        </section>
        
        </main>
                
        <footer id="rodape">
            
            <?php include("php/rodape.php"); ?>
            
        </footer>     
        
    </body>
    
</html>