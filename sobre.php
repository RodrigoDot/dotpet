<!DOCTYPE html>

<html lang="pt-br">
    
    <head>
        <title>DotPET</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/estilo.css"/>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        
        <style>
        
            .corpo{
                width: 100%;
                text-align: justify;
            }
            
            #sobre{
                display: block;
                margin: 2% auto 2% auto;
            }
            
            #desenvolvedores{
                display: block;
                margin: 2% auto 2% auto;
            }
        
        </style>
        
    </head>
    
    <body>
         <header id="cabecalho"> 

            <img class="logo" src="imagens/LogoPet.png" onclick="location.href='index.php'" width="100%" height="auto"/>
            
            <?php include("php/checkUp.php"); ?>
                        
        </header> 
        
        <?php include("php/menuCompleto.php"); ?>        
        
        <main id="containerGeral">
        
            <section class="corpo">

                <article id="sobre">
                    <h3>Nossa Missão</h3>
                    <p>O Dotpet é um sistema para ajudar pessoas que amam os animais.</p>
                    <p>O sistema oferece um ambiente para divulgação de informações para que mais animais não sejam abandonados e consigam encontrar um lar onde sejam tratados de forma digna.</p>
                </article>

                <article id="desenvolvedores">
                    <h2>Desenvolvedores</h2>
                    <p>Rodrigo</p>
                    <p>Lucas Tecmundo</p>
                    <p>Lucas Silva</p>
                    <p>Leonardo</p>
                    <p>Vitor</p>
                    <p>Caio</p>
                </article>

            </section>
                            
        </main>
                
        <footer id="rodape">
            
            <?php include("php/rodape.php"); ?>
            
        </footer>   
        
    </body>
    
</html>