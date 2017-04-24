<!DOCTYPE html>

<html lang="pt-br">

    <head>
        <title>Cadastro de Usuários</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/estilo.css"/>
        <meta name="viewport" content="width=device-width,initial-scale=1"/>
    </head>

    <body>
        <header id="cabecalho">

            <img class="logo"  src="imagens/LogoPet.png" height="auto" width="100%" onclick="location.href='index.php'"/>

            <?php include("php/checkUp.php"); ?>

        </header>

        <?php include("php/menuCompleto.php"); ?>

        <section id="centro">

            <form id="usuario" action="entrar.php" method="post">

                    <label for="nome">Nome:</label>
                    <input autofocus required type="text" id="nome" name="nnome" size="50" maxlength="50" placeholder="Ex.: Ada Lovelace"/>
                        <br/>
                    <label for="email">E-mail:</label>
                    <input required type="email" id="email" name="nemail" size="50" maxlength="50" placeholder="Ex.: dotpet@dotpet.com" />
                        <br/>
                    <label for="senha">Senha:</label>
                    <input required type="password" id="senha" name="nsenha" size="20" maxlength="16" placeholder="Máx 16 caracteres" />
                        <br/>
                    <label for="cpf">CPF:</label>
                    <input type="text" id="cpf" name="ncpf" size="20" maxlength="11" placeholder="Ex.: 94545236541" >
                        <br/>
                    <label for="celular">Celular:</label>
                    <input type="tel" id="celular" name="ncelular" size="20" maxlength="13" placeholder="Ex.: 13999999999" >
                        <br/>
                    <label for="nascimento">Nascimento:</label>
                    <input type="date" id="nascimento" name="nnascimento" size="20" maxlength="10" placeholder="Ex.: 15082000" />
                        <br/>

                            <label for="masc">Masculino</label>
                            <input type="radio" name="sexo" id="masc" checked />
                                <br/>
                            <label for="fem">Feminino</label>
                            <input type="radio" name="sexo" id="fem"/>
                                <br/>
                            <label for="ind">Indefinido</label>
                            <input type="radio" name="sexo" id="ind"/>


                    <label for="logradouro">Logradouro:</label>
                    <input type="text" id="logradouro" name="nlogradouro" size="50" maxlength="100" placeholder="Ex.: Av. Dom Pedro I"/>
                    <label for="numero">Número:</label>
                    <input type="text" id="numero" name="nnumero" size="10" maxlength="10" placeholder="Ex.: 185"/>
                        <br/>
                    <label for="bairro">Bairro:</label>
                    <input type="text" id="bairro" name="nbairro" size="50" maxlength="50" placeholder="Ex.: Centro"/>
                        <br/>
                    <label for="cidade">Cidade:</label>
                    <select id="cidade" name="ncidade">
                        <option value="guaruja">Guarujá</option>
                        <option value="praia">Praia Grande</option>
                        <option value="santos" selected>Santos</option>
                        <option value="saovicente">São Vicente</option>
                    </select>
                        <br/>
                    <label for="estado">Estado:</label>
                    <select id="estado" name="nestado">
                        <option value="SP" selected>São Paulo</option>
                    </select>
                        <br/>
                    <label></label>
                    <inpu>
                    <label></label>
                    <inpu>


                <input value="Salvar" class="botao" id="salvar" type="submit"/>

            </form>

        </section>

        <footer id="rodape">

            <?php include("php/rodape.php"); ?>

        </footer>

    </body>

</html>
