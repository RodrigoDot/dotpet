<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <title>Cadastro de Animais</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/estilo.css"/>
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

            <form id="animais" class="cadAnimal" action="php/insertAnimal.php" method="post" enctype="multipart/form-data">


                    <label for="nome_animal">Nome:</label>
                    <input autofocus id="nome_animal" name="cadNomeAnimal" size="38" maxlength="50" placeholder="Nome do Animal"/>

                    <label for="idade">Idade Estimada:</label>
                    <input type="number" id="idade" class="idade" name="cadIdadeAnimal" min="0" max="20" step="1"/>

                    <label for="tipo">Tipo de Animal</label>
                    <select id="tipo" name="cadTipoAnimal">
                        <optgroup>
                            <option value="1" selected>Canino</option>
                            <option value="2">Felino</option>
                        </optgroup>
                    </select>

                    <label for="raca">Raça:</label>
                    <select id="raca" name="cadRacaAnimal">
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
                    <select id="porte" name="cadPorteAnimal">
                        <optgroup>
                            <option value="Desconhecido" selected>Não sei</option>
                            <option value="Pequeno">Pequeno</option>
                            <option value="Medio">Médio</option>
                            <option value="Grande">Grande</option>
                        </optgroup>
                    </select>

                    <label for="castracao">Castrado?</label>
                    <select id="castracao" name="cadCastracaoAnimal">
                        <optgroup>
                            <option value="Desconhecido" selected>Não sei</option>
                            <option value="Sim">Sim</option>
                            <option value="Nao">Não</option>
                        </optgroup>
                    </select>

                    <label for="sexo_animal">Sexo:</label>
                    <select id="sexo_animal" name="cadSexoAnimal">
                        <optgroup>
                            <option value="Desconhecido">Não sei</option>
                            <option value="Macho" selected>Macho</option>
                            <option value="Femea">Fêmea</option>
                        </optgroup>
                    </select>

                    <label for="fotoAnimal">Add Foto</label>
                    <input class="file" id="fotoAnimal" type="file" name="cadFotoAnimal" value="Escolher"/>

                    <label for="descricao">Descrição</label>
                    <textarea id="descricao" name="cadDescricaoAnimal"></textarea>

                    <label for="causa">Motivo:</label>
                    <textarea id="causa" name="cadCausaAnimal"></textarea>

                <input name="salvar" value="Salvar" class="botao" id="salvar" type="submit"/>

            </form>

            </main>

        </div>

        <footer id="rodape">

            <?php include("php/rodape.php"); ?>

        </footer>

    </body>

</html>
