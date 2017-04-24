<html lang="pt-br">
    
    <head>
        <title>Entrar</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/estilo.css">
        <link rel="stylesheet" href="css/estiloFormulario.css"/>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>        
    </head>
    
    <body>
         <header id="cabecalho"> 

            <img class="logo"  src="imagens/LogoPet.png" height="auto" width="100%" onclick="location.href='index.php'"/>
            
            <?php include("php/checkUp.php"); ?>
                        
        </header> 
        
        <?php include("php/menuCompleto.php"); ?>  
        
        <main id="containerGeral">
        
        <section>
            
            <form id="login" action="php/login/gerarNovaSenha.php" method="post">
             
                <label class="labelLogin" for="email_usuario">Usuario ou E-mail</label>
                <input required autofocus class="entrada" type="email" id="email_usuario" name="nemail_conta" size="40" maxlength="50" placeholder="Ex.: dotpet@dotpet.com" />
                
                <input class="botao" value="Enviar" type="submit" />                 
                
            </form>
            
        </section>
        
        </main>
                
        <footer id="rodape">
            
            <?php include("php/rodape.php"); ?>
            
        </footer>     
        
    </body>
    
</html>