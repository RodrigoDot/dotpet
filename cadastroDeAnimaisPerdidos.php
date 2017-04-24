<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <title>Animais Perdidos</title>
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

        <div id="containerGeral">

        <main>

            <form id="animais" action="php/insertAnimalPerdido.php" method="post" enctype="multipart/form-data">

                <label for="nome_animal">Nome:</label>
                <input autofocus id="nome_animal" name="cadNomeAnimalPerdido" size="38" maxlength="50" placeholder="Nome do Animal"/>

                <label for="idade">Idade Estimada:</label>
                <input type="number" id="idade" name="cadIdadeAnimalPerdido" min="0" max="20" step="1"/>

                <label for="tipo">Tipo de Animal</label>
                <select id="tipo" name="cadTipoAnimalPerdido">
                    <optgroup>
                        <option value="1" selected>Canino</option>
                        <option value="2">Felino</option>
                    </optgroup>
                </select>

                <label for="raca">Raça:</label>
                <select id="raca" name="cadRacaAnimalPerdido">
                    <optgroup>
                        <option value="1"selected>Não sei</option>
                    </optgroup>
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

                <label for="porte">Porte:</label>
                <select id="porte" name="cadPorteAnimalPerdido">
                    <optgroup>
                        <option value="Desconhecido" selected>Não sei</option>
                        <option value="Pequeno">Pequeno</option>
                        <option value="Medio">Médio</option>
                        <option value="Grande">Grande</option>
                    </optgroup>
                </select>

                <label for="sexo_animal">Sexo:</label>
                <select id="sexo_animal" name="cadSexoAnimalPerdido">
                    <optgroup>
                        <option value="Desconhecido">Não sei</option>
                        <option value="Macho" selected>Macho</option>
                        <option value="Femea">Fêmea</option>
                    </optgroup>
                </select>

                <label for="fotoAnimalPerdido">Add Foto</label>
                <input class="file" name="cadFotoAnimalPerdido" type="file" value="Escolher"/>

                <label for="descricao">Descrição do Animal</label>
                <textarea id="descricao" name="cadDescricaoAnimalPerdido">
                </textarea>

                <label for="detalhes">Detalhes de Como Sumiu</label>
                <textarea id="detalhes" name="cadDetalhesPerdido">
                </textarea>

            <input name="salvar" value="Salvar" class="botao" id="salvar" type="submit"/>

            </form>

            </main>


        </div>

        <footer id="rodape">

            <?php include("php/rodape.php"); ?>

        </footer>

    </body>

</html>

