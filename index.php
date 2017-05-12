<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <title>DotPET</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/estilo.css" />
        <link rel="stylesheet" href="css/estiloIndex.css"/>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
        <script src="lib/JQuery/jquery-3.1.1.min.js"></script>
        <script src="javascript/login/chatLog.js"></script>
    </head>

    <body>

        <header id="cabecalho">

            <img class="logo" src="imagens/LogoPet.png" height="auto" width="100%" onclick="location.href='index.php'"/>

            <?php include("php/checkUp.php"); ?>

        </header>

        <?php include("php/menuCompleto.php"); ?>

        <main id="containerGeral">

        <section class="corpo">

                <article class="card" onclick="location.href='#'">
                    <div class="cardConteudo">
                        <h2 class="cardTitulo">Lorem ipsum dolor sit amet.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p class="cardContato">
                            <img src="imagens/facebook.png" width="15%" height="auto"/>
                            <img src="imagens/square-twitter.png" width="15%" height="auto"/>
                            <img src="imagens/square-google-plus.png" width="15%" height="auto"/>
                        </p>
                        <p class="cardDataAutor">14/10/2016 | Rodrigo</p>
                    </div>
                    <figure class="fotoNoticia">
                        <img src="imagens/ImagensIndex/01.jpg" width="100%" height="auto"/>
                    </figure>
                </article>

                <article class="card" onclick="location.href='#'">
                    <div class="cardConteudo">
                        <h2 class="cardTitulo">Lorem ipsum dolor sit amet.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p class="cardContato">
                            <img src="imagens/facebook.png" width="15%" height="auto"/>
                            <img src="imagens/square-twitter.png" width="15%" height="auto"/>
                            <img src="imagens/square-google-plus.png" width="15%" height="auto"/>
                        </p>
                        <p class="cardDataAutor">14/10/2016 | Rodrigo</p>
                    </div>
                    <figure class="fotoNoticia">
                        <img src="imagens/ImagensIndex/02.jpg" width="100%" height="auto"/>
                    </figure>
                </article>

                <article class="card" onclick="location.href='#'">
                    <div class="cardConteudo">
                        <h2 class="cardTitulo">Lorem ipsum dolor sit amet.</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <p class="cardContato">
                            <img src="imagens/facebook.png" width="15%" height="auto"/>
                            <img src="imagens/square-twitter.png" width="15%" height="auto"/>
                            <img src="imagens/square-google-plus.png" width="15%" height="auto"/>
                        </p>
                        <p class="cardDataAutor">14/10/2016 | Rodrigo</p>
                    </div>
                    <figure class="fotoNoticia">
                        <img class="foto" src="imagens/ImagensIndex/03.jpeg" width="100%" height="auto" />
                    </figure>
                </article>

        </section>

        <aside>

            <article>
                <h2>Como manter seu animal sempre saudável</h2>
                <figure>
                    <img src="imagens/youtube.png" width="100%" height="auto"/>
                </figure>
            </article>

            <article>
                <h2>Benefícios de uma caminhada</h2>
                <figure>
                    <img src="imagens/youtube.png" width="100%" height="auto"/>
                </figure>
            </article>

        </aside>

        </main>

        <footer id="rodape">

            <?php include("php/rodape.php"); ?>

        </footer>

    </body> 
</html>
