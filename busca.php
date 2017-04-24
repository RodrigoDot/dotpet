<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <title>Busca</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/estilo.css"/>
        <link rel="stylesheet" href="css/estiloFormulario.css"/>
        <meta name="viewport" content="width=device-width,initial-scale=1">
    </head>

    <body>
         <header id="cabecalho">

            <img class="logo"  src="imagens/LogoPet.png" height="auto" width="100%" onclick="location.href='index.php'"/>

            <?php include("php/checkUp.php"); ?>

        </header>

        <?php include("php/menuCompleto.php"); ?>

        <main id="containerGeral">

            <section id="pesquisa">
                <form class="busca" action="resultadoBusca.php" method="post">

                        <label for="tipo">Tipo de animal</label>
                        <select id="tipo" name="ntipo">
                            <option value="0" selected>Todos</option>
                            <option value="1">Canino</option>
                            <option value="2">Felino</option>
                        </select>

                        <label for="raca">Raça</label>
                        <select id="raca" name="nraca">
                        <option value="0" selected>Todas</option>
                        <optgroup label="Canino">
                            <option value="2">Pastor Alemão</option>
                            <option value="3">Beagle</option>
                            <option value="4">Chow-Chow</option>
                            <option value="5">Labrador</option>
                            <option value="6">Pit-Bulls</option>
                            <option value="7">Poodle</option>
                            <option value="8">Husky</option>
                            <option value="9">Bulldog</option>
                        </optgroup>
                        <optgroup label="Felino">
                            <option value="10">Himalaia</option>
                            <option value="11">Cymric</option>
                            <option value="12">Savannah</option>
                            <option value="13">Munchkin</option>
                            <option value="14">Ragamuffin</option>
                            <option value="15">Persa</option>
                            <option value="16">Siâmes</option>
                        </optgroup>
                    </select>

                        <label for="porte">Porte</label>
                        <select id="porte" name="nporte">
                            <optgroup>
                                <option value="0" selected>Todos</option>
                                <option value="Pequeno">Pequeno</option>
                                <option value="Medio">Médio</option>
                                <option value="Grande">Grande</option>
                            </optgroup>
                        </select>

                        <label for="castracao">Castrado?</label>
                        <select id="castracao" name="ncastracao">
                            <optgroup>
                                <option value="0" selected>Todos</option>
                                <option value="Sim">Sim</option>
                                <option value="Nao">Não</option>
                            </optgroup>
                        </select>

                        <label for="sexo_animal">Sexo</label>
                        <select id="sexo_animal" name="nsexo_animal">
                            <optgroup>
                                <option value="0" selected>Todos</option>
                                <option value="Macho">Macho</option>
                                <option value="Femea">Fêmea</option>
                            </optgroup>
                        </select>

                    <p><input value="Procurar meu animal" class="botao" id="buscar" type="submit"/></p>
                </form>

            </section>

        </main>

        <footer id="rodape">

            <?php include("php/rodape.php"); ?>

        </footer>

    </body>

</html>
