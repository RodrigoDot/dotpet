<!DOCTYPE html>

<?php
/* AQUI INICIA A FUNCAO QUE BUSCA OS DADOS NO BANCO E OS COMPARA PARA EFETUAR O LOGIN*/

    include("php/banco.php"); /*INCLUSAO DO BANCO*/

    /*A FUNCAO ABAIXO VERIFICA SE O EMAIL DIGITADO TEM O FORMATO VÁLIDO*/

    if (isset($_POST['nemail_usuario']) && strlen($_POST['nemail_usuario']) > 0){
        if (!isset($_SESSION))
            session_start();

        /*AQUI INICIA-SE AS SESSOES QUE SERVIRAO PARA ARMAZENAR OS DADOS  QUE SERAO COMPARADOS PARA O LOGIN*/

        $_SESSION['email'] = $_POST['nemail_usuario'];
        $_SESSION['senha'] = $_POST['nsenha_usuario'];

        /*$SQLBUSCA CARREGA UMA QUERY DIRECIONADA AO COMPO EMAIL*/
        /*$AQLQUERY CARREGA UMA FUNCAO QUE EXECUTA A BUSCA COM OS PARAMETROS SETADOS QUE SAO A VARIAVEL QUE REPRESENTA AS CONFIGURACOES DA CONEXAO E A VARIAVEL QUE CONTEM A QUERY*/
        /*$RESULTADO RECEBE OS DADOS RETORNADOS DA BUSCA EM FORMA DE ARRAY, COM O AUXILIO DA FUNCAO mysqli_fetch_assoc(), ESSA FUNCAO CRIA UM ARRAY ONDE O INDICE EH O NOME DA COLUNA NO BANCO*/

        $sqlBusca = ("SELECT id_usuario, nome, senha, email, foto FROM usuarios WHERE email = '$_SESSION[email]'");
        $sqlquery = mysqli_query($conexao, $sqlBusca);

        mysqli_close($conexao);

        $resultado = mysqli_fetch_assoc($sqlquery);

        /*ABAIXO COMPARAMOS A SENHA E O EMAIL COM OS RETORNADOS DO BANCO*/

        if ($resultado['senha'] == $_SESSION['senha'] && $resultado['email'] == $_SESSION['email']){
            $_SESSION['usuario'] = $resultado['id_usuario'];
            $_SESSION['nomeUsuario'] = $resultado['nome'];
            $_SESSION['fotoPerfil'] = $resultado['foto'];
            header("Location: index.php");
        }else{
            echo " <script>window.alert('Os dados inseridos estão incorretos. Por favor verifique e tente novamente !')</script> ";
            header("Location: entrar.php");
        }
    }
?>

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

            <form id="login" action="" method="post">

                <label class="labelLogin" for="email_usuario">E-mail</label>
                <input autofocus class="entrada" type="email" id="email_usuario" name="nemail_usuario" size="40" maxlength="50" placeholder="Ex.: dotpet@dotpet.com"/>
                    <br/>
                <label class="labelLogin" for="senha_usuario">Senha</label>
                <input class="entrada" type="password" id="senha_usuario" name="nsenha_usuario" size="40" maxlength="16" placeholder="Máx 16 caractéres"/>

                <input class="botao" value="Entrar" type="submit"/>

                <div class="cadastro">
                    <a class="esquerda" onclick="location.href='recuperarSenha.php'">Esqueceu sua senha?</a>
                    <a class="direita" onclick="location.href='cadastroSimples.php'">Cadastre-se!</a>
                </div>

            </form>

        </section>

        </main>

        <footer id="rodape">

            <?php include("php/rodape.php"); ?>

        </footer>

    </body>

</html>
