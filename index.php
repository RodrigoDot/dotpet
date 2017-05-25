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
                        <h2 class="cardTitulo">Aumenta o número de animais nas ruas</h2>
                        <p>Precisamos olhar para isso com mais cuidado</p>
                        <p class="cardContato">
                            <img src="imagens/facebook.png" width="15%" height="auto"/>
                            <img src="imagens/square-twitter.png" width="15%" height="auto"/>
                            <img src="imagens/square-google-plus.png" width="15%" height="auto"/>
                        </p>
                        <p class="cardDataAutor">14/10/2016 | Rodrigo</p>
                    </div>
                    <figure class="fotoNoticia">
                        <a href="noticias/noticia1.php"><img src="imagens/ImagensIndex/01.jpg" width="100%" height="auto"/></a>
                    </figure>
                </article>

                <article class="card" onclick="location.href='#'">
                    <div class="cardConteudo">
                        <h2 class="cardTitulo">Um animal é um ótimo companheiro</h2>
                        <p>Todo mundo deveria ter um animal</p>
                        <p class="cardContato">
                            <img src="imagens/facebook.png" width="15%" height="auto"/>
                            <img src="imagens/square-twitter.png" width="15%" height="auto"/>
                            <img src="imagens/square-google-plus.png" width="15%" height="auto"/>
                        </p>
                        <p class="cardDataAutor">14/10/2016 | Rodrigo</p>
                    </div>
                    <figure class="fotoNoticia">
                        <a href="noticias/noticia2.php"><img src="imagens/ImagensIndex/02.jpg" width="100%" height="auto"/></a>
                    </figure>
                </article>

                <article class="card" onclick="location.href='#'">
                    <div class="cardConteudo">
                        <h2 class="cardTitulo">Coexistir com respeito</h2>
                        <p>A vida pode ser ainda mais bela com um animal por perto</p>
                        <p class="cardContato">
                            <img src="imagens/facebook.png" width="15%" height="auto"/>
                            <img src="imagens/square-twitter.png" width="15%" height="auto"/>
                            <img src="imagens/square-google-plus.png" width="15%" height="auto"/>
                        </p>
                        <p class="cardDataAutor">14/10/2016 | Rodrigo</p>
                    </div>
                    <figure class="fotoNoticia">
                        <a href="noticias/noticia3.php"><img class="foto" src="imagens/ImagensIndex/03.jpeg" width="100%" height="auto" /></a>
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
