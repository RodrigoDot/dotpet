<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <title>Cadastro de Usuários</title>
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

        <section id="centro">

            <form id="usuario" class="cadUsuario" action="php/insertUsuario.php" method="post" enctype="multipart/form-data">

                    <div class="dados">
                    <label for="nome">Nome:</label>
                    <input autofocus required type="text" id="nome" name="cadNome" size="40" maxlength="50" placeholder="Ex.: Ada Lovelace"/>

                    <label for="email">E-mail:</label>
                    <input required type="email" id="email" name="cadEmail" size="40" maxlength="50" placeholder="Ex.: dotpet@dotpet.com" />

                    <label for="senha">Senha:</label>
                    <input required type="password" id="senha" name="cadSenha" size="16" maxlength="16" placeholder="Máx 16 caracteres" />

                    <label for="celular">Celular:</label>
                    <input type="tel" id="celular" name="cadCelular" size="20" maxlength="11" placeholder="Ex.: 13999999999" >

                    <label for="nascimento">Nascimento:</label>
                    <input type="date" id="nascimento" name="cadNascimento" size="20" maxlength="10" placeholder="Ex.: 15082000" />

                    <label for="sexoUsuario">Sexo:</label>
                    <select id="sexoUsuario" name="cadSexo">
                        <optgroup>
                            <option value="Masculino" selected>Masculino</option>
                            <option value="Feminino">Feminino</option>
                            <option value="Indefinido">Indefinido</option>
                        </optgroup>
                    </select>
                    </div>
                    <div class="foto-perfil">
                        <label>Add Foto</label>
                        <input type="file" id="fotoUsuario" class="file" name="cadFotoUsuario"/>
                    </div>

                <input name="salvar" value="Salvar" class="botao" id="salvar" type="submit"/>

            </form>

        </section>

        </div>

        <footer id="rodape">

            <?php include("php/rodape.php"); ?>

        </footer>

    </body>

</html>
