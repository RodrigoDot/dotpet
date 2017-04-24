<!DOCTYPE html>

<?PHP

    include("php/loginTeste.php");
    verificarLogin();

    include("php/banco.php");

    $idUsuario = $_SESSION['usuario'];
    $nomeUsuario = $_SESSION['nomeUsuario'];
    $fotoUsuario = $_SESSION['fotoPerfil'];

    //RECUPERAR INFORMACOES DO USUARIO
    $selectInfo = ("select id_usuario, nome, nascimento, email, celular, senha, sexo, data_cadastro, situacao
    from usuarios
    where id_usuario = $idUsuario");

    if($queryInfo = mysqli_query($conexao, $selectInfo)) {
       // echo"Info recuperado com sucesso</br>";
    }else {
        echo "Info nao pode ser recuperado</br>";
    }

    //RECUPERAR ANIMAIS DO USUARIO
    $selectAnimais = ("select a.id_animal, b.descricao_raca_animal, c.descricao_tipo_animal, a.condicao, a.sexo, a.nome_animal, a.idade, a.castracao, a.porte, a.data_cadastro, a.situacao
    from animais a
    join racas_animal b
    on a.id_raca = b.id_raca
    join tipos_animal c
    on a.id_tipo = c.id_tipo
    where $idUsuario = a.id_usuario");

    if($queryAnimais = mysqli_query($conexao, $selectAnimais)) {
       // echo"Animais recuperados com sucesso</br>";
    }else {
        echo "Animais nao puderam ser recuperados</br>";
    }


    //RECUPERAR PROCESSOS
    $selectProcessos = ("select a.id_processo, a.id_usuario_doador, a.id_usuario_adotante, a.id_animal, a.data_inicio, a.data_finalizacao, a.situacao, a.tipo_processo, a.contato_informante, a.mensagem, b.nome_animal, c.nome nome_informante
    from processos a
    join animais b
    on a.id_animal = b.id_animal
    join usuarios c
    on a.id_usuario_adotante = c.id_usuario
    where $idUsuario = a.id_usuario_doador or $idUsuario = a.id_usuario_adotante");

    if($queryProcessos = mysqli_query($conexao, $selectProcessos)) {
       // echo"Processos recuperados com sucesso</br>";
    }else {
        echo "Processos nao puderam ser recuperados</br>";
    }

?>

    <html lang="pt-br">

    <head>
        <title>Perfil</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <link rel="stylesheet" href="css/estilo.css" />
        <link rel="stylesheet" href="lib/bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" href="css/estiloPerfil.css" />
        <script src="lib/JQuery/jquery-3.1.1.min.js"></script>
        <script src="javascript/perfil/perfilViewControl.js"></script>
    </head>

    <body>
        <header id="cabecalho">
            <img class="logo" src="imagens/LogoPet.png" height="auto" width="100%" onclick="location.href='index.php'" />
            <?php include("php/checkUp.php"); ?>
        </header>

        <?php include("php/menuCompleto.php"); ?>

        <main id="containerGeral">

            <aside id="pessoalInfo">

            </aside>

            <section id="corpo">

                <ul id="menuNavegacaoPerfil">
                    <li class="perfilItemDados">Meus Dados</li>
                    <li class="perfilItemAnimais">Meus Animais</li>
                    <li class="perfilItemProcessos">Processos</li>
                </ul>

                <div id="formularioMD"></div>
                <div id="meusDados">
                    <?php
                    echo"<table class='table table-striped'>";
                        echo"
                            <tr>
                                <th>ID</th>
                                <th>NOME</th>
                                <th>NASCIMENTO</th>
                                <th>E-MAIL</th>
                                <th>CELULAR</th>
                                <th>SENHA</th>
                                <th>SEXO</th>
                                <th>DATA DE CADASTRO</th>
                                <th>SITUACAO</th>
                                <th></th>
                            </tr>
                            ";
                        while($info = mysqli_fetch_assoc($queryInfo)) {
                            if($info["situacao"] == true) {
                                $situacao = "Ativo";
                            }else {
                                $situacao = "Desativado";
                            }
                            echo"
                                <tr>
                                    <td id='idUsuario'>$info[id_usuario]</td>
                                    <td>$info[nome]</td>
                                    <td>$info[nascimento]</td>
                                    <td>$info[email]</td>
                                    <td>$info[celular]</td>
                                    <td><a href='redefinirSenha.php'>*********</a></td>
                                    <td>$info[sexo]</td>
                                    <td>$info[data_cadastro]</td>
                                    <td>$situacao</td>
                                    <td><input id='alterarMD' class='form-control' type='button' value='Alterar'/></td>
                                </tr>
                            ";
                        };
                    echo"</table>";
                ?>
                </div>

                <div id="formularioMA"></div>
                <div id="meusAnimais">
                    <?php
                    echo"<table class='table table-striped'>";
                        echo"
                            <tr>
                                <th>ID</th>
                                <th>NOME</th>
                                <th>RACA</th>
                                <th>TIPO</th>
                                <th>PORTE</th>
                                <th>SEXO</th>
                                <th>IDADE</th>
                                <th>CASTRACAO</th>
                                <th>DATA</th>
                                <th>CONDICAO</th>
                                <th>SITUACAO</th>
                                <th></th>
                                <th></th>
                            </tr>
                            ";
                        while($animal = mysqli_fetch_assoc($queryAnimais)) {
                            if($animal["situacao"] == true) {
                                $situacao = "Ativo";
                            }else {
                                $situacao = "Desativado";
                            }
                            echo"
                                <tr>
                                    <td>$animal[id_animal]</td>
                                    <td>$animal[nome_animal]</td>
                                    <td>$animal[descricao_raca_animal]</td>
                                    <td>$animal[descricao_tipo_animal]</td>
                                    <td>$animal[porte]</td>
                                    <td>$animal[sexo]</td>
                                    <td>$animal[idade]</td>
                                    <td>$animal[castracao]</td>
                                    <td>$animal[data_cadastro]</td>
                                    <td>$animal[condicao]</td>
                                    <td>$situacao</td>
                                    <td><input id='$animal[id_animal]' class='alterarMA form-control' type='button' value='Alterar'/></td>
                                    <td><input id='$animal[id_animal]' class='excluirMA form-control' type='button' value='Excluir'/></td>
                                </tr>
                            ";
                        };
                    echo"</table>";
                ?>
                </div>

                <div id="formularioP"></div>
                <div id="processos">
                    <?php
                    echo"<table class='table table-striped'>";
                        echo"
                            <tr>
                                <th>ID DO PROCESSO</th>
                                <th>NOME DO ANIMAL</th>
                                <th>DATA</th>
                                <th>NOME INTERESSADO</th>
                                <th>CONTATO DO INTERESSADO</th>
                                <th>TIPO DE PROCESSO</th>
                                <th>MENSAGEM</th>
                                <th></th>
                                <th></th>
                            </tr>
                            ";
                        while($processo = mysqli_fetch_assoc($queryProcessos)) {
                            echo"
                                <tr>
                                    <td>$processo[id_processo]</td>
                                    <td>$processo[nome_animal]</td>
                                    <td>$processo[data_inicio]</td>
                                    <td>$processo[nome_informante]</td>
                                    <td>$processo[contato_informante]</td>
                                    <td>$processo[tipo_processo]</td>
                                    <td>$processo[mensagem]</td>
                                    <td><input id='$processo[id_processo]' class='excluirP form-control' type='button' value='Excluir'/></td>
                                </tr>
                            ";
                        };
                    echo"</table>";
                ?>
                </div>

            </section>

        </main>

        <footer id="rodape">

            <?php include("php/rodape.php"); ?>
            <div id="teste">
            </div>

        </footer>

    </body>
    <script src="javascript/perfil/atualizarMeusDados.js"></script>
    <script src="javascript/perfil/alterarMeusAnimais.js"></script>
    <script src="javascript/perfil/excluirAnimal.js"></script>
    <script src="javascript/perfil/excluirProcesso.js"></script>

    </html>
