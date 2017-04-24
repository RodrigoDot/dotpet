<html lang="pt-br">
    
    <head>
        <title>Busca</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        
        <link rel="stylesheet" type="text/css" href="css/estilo.css" />  
        <link rel="stylesheet" type="text/css" href="css/estiloExibir.css" />
        <link rel="stylesheet" href="css/estiloPopUp.css" />
        <link rel="stylesheet" type="text/css" href="css/estiloFormularioAside.css" />
        
        <script src="javascript/jquery-3.1.1.min.js"></script>
    </head>
    
    <body>
         <header id="cabecalho"> 

            <img class="logo"  src="imagens/LogoPet.png" height="auto" width="100%" onclick="location.href='index.php'"/>
             
            <?php include("php/checkUp.php"); ?>
            
        </header>  

        <?php include("php/menuCompleto.php"); ?>
        
        <main id="containerGeral"> 
            
        <?php
                
        header('Content-Type: text/html; charset=utf-8'); //FORCAR O CHARSET UTF8         

        include("php/banco.php"); //INCLUSAO DO DOCUMENTO COM OS DADOS PARA A CONEXAO COM O BANCO

        /*  NA SESSAO ABAIXO
            CRIAMOS UMA VARIAVEL PARA RECEBER CADA TIPO DE VALOR QUE EH ENVIADO PELO POST
            PARA GARANTIR TOTAL ABRANGENCIA NA BUSCA, UTILIZAMOS UMA SEQUENCIA LOGICA PARA TESTAR
            OS VALORES RECEBIDOS E DEFINIR SE ESSE VALOR SERIA NECESSARIO NO COMANDO DE BUSCA DO BANCO
            >> TODO VALOR RELEVANTE RECEBE O VALOR ORIGINAL ENVIADO PELO POST E TODO VALOR IRRELEVANTE 
            RECEBE UM SIMBOLO DE % QUE INDICA PRO BANCO QUE ESSE VALOR NAO EXISTE PORTANTO NAO EH VALIDO 
            QUANDO A BUSCA FOR EFETUADA*/

        if ($_POST['ntipo'] > 0){               //SE O VALOR RECEBIDO EM POST NAO FOR NUMERICO 
            $tipo = $_POST['ntipo'];        //$TIPO RECEBE O VALOR RECEBIDO PELO RESPECTIVO POST 
        }else{                              //SENAO
            $tipo = '%';                    //$TIPO RECEBE O SIMBOLO DE % QUE ATUA COMO UM 
        }                                   //CARACTERE CORINGA QUE NAO IRA INTERFERIR NAS BUSCAS

        if ($_POST['nraca']  > 0){
            $raca = $_POST['nraca'];    
        }else{
            $raca = '%';
        }

        if (!is_numeric($_POST['nporte'])){
            $porte = $_POST['nporte'];    
        }else{
            $porte = '%';
        }

        if (!is_numeric($_POST['ncastracao'])){
            $castracao = $_POST['ncastracao'];    
        }else{
            $castracao = '%';
        }

        if (!is_numeric($_POST['nsexo_animal'])){
            $sexo_animal = $_POST['nsexo_animal'];    
        }else{
            $sexo_animal = '%';
        }

        /*$SQLBUSCA CARREGA UMA QUERY DIRECIONADA AO CAMPO SELECIONADO*/

        $sqlBusca = ("SELECT c.descricao_tipo_animal, a.nome_animal, b.descricao_raca_animal, a.porte, a.sexo, a.idade, a.id_animal, a.foto
            FROM animais a
            INNER JOIN racas_animal b
            ON a.id_raca = b.id_raca
            INNER JOIN tipos_animal c
            ON a.id_tipo = c.id_tipo
            WHERE
            c.id_tipo like '$tipo' and
            b.id_raca like '$raca' and 
            a.porte like '$porte' and 
            a.castracao like '$castracao' and 
            a.sexo like '$sexo_animal' and
            a.condicao = 'Doacao'
        ");    
        

        /*$SQLQUERY CARREGA UMA FUNCAO QUE EXECUTA A BUSCA COM OS PARAMETROS SETADOS QUE SAO A VARIAVEL QUE REPRESENTA AS CONFIGURACOES DA CONEXAO E A VARIAVEL QUE CONTEM A QUERY*/

        $sqlquery = mysqli_query($conexao, $sqlBusca);

        mysqli_close($conexao); // AQUI FECHAMOS A CONEXAO COM O BANCO
            
    //AQUI FAZEMOS UM LACO ONDE A VARIAVEL $RESULTADO IRA RECEBER OS VALORES ENCONTRADOS PELA BUSCA
    //UTILIZANDO A FUNCAO MYSQLI_FETCH_ASSOC() TODOS OS DADOS RETORNADOS DA CONSULTA SAO ARMAZENADOS
    //NA VARAIAVEL $RESULTADO EM FORMA DE ARRAY ONDE OS INDICES SAO OS NOMES DOS CAMPOS NO BANCO
        
    ?>
    <aside>
        
        <section id='pesquisa'>
                <form id='buscaAside' class='busca' action='resultadoBusca.php' method='post'>
                    
                        <label class='labelAside' for='tipo'>Tipo de animal</label>
                        <select class='selectAside' id='tipo' name='ntipo'>
                            <option value='0' selected>Todos</option>
                            <option value='1'>Canino</option>
                            <option value='2'>Felino</option>                            
                        </select>
                   
                        <label class='labelAside' for='raca'>Raça</label>
                        <select class='selectAside' id='raca' name='nraca'>
                        <option value='0' selected>Todas</option>
                        <optgroup label='Canino'>
                            <option value='2'>Pastor Alemão</option>
                            <option value='3'>Beagle</option>
                            <option value='4'>Chow-Chow</option>
                            <option value='5'>Labrador</option>
                            <option value='6'>Pit-Bulls</option>
                            <option value='7'>Poodle</option>
                            <option value='8'>Husky</option>
                            <option value='9'>Bulldog</option>
                        </optgroup>
                        <optgroup label='Felino'>
                            <option value='10'>Himalaia</option>
                            <option value='11'>Cymric</option>
                            <option value='12'>Savannah</option>
                            <option value='13'>Munchkin</option>
                            <option value='14'>Ragamuffin</option>
                            <option value='15'>Persa</option>
                            <option value='16'>Siâmes</option>
                        </optgroup>
                    </select>
                          
                        <label class='labelAside' for='porte'>Porte</label>
                        <select class='selectAside' id='porte' name='nporte'>
                            <optgroup>
                                <option value='0' selected>Todos</option>
                                <option value='Pequeno'>Pequeno</option>
                                <option value='Medio'>Médio</option>
                                <option value='Grande'>Grande</option>
                            </optgroup>
                        </select>
                         
                        <label class='labelAside' for='castracao'>Castrado?</label>
                        <select class='selectAside' id='castracao' name='ncastracao'>
                            <optgroup>
                                <option value='0' selected>Todos</option>
                                <option value='Sim'>Sim</option>
                                <option value='Nao'>Não</option>
                            </optgroup>                        
                        </select>
                       
                        <label class='labelAside' for='sexo_animal'>Sexo</label>
                        <select class='selectAside' id='sexo_animal' name='nsexo_animal'>
                            <optgroup>
                                <option value='0' selected>Todos</option>
                                <option value='Macho'>Macho</option>
                                <option value='Femea'>Fêmea</option>
                            </optgroup>                        
                        </select> 
                        
                    <p><input value='Procurar' class='botao' id='buscar' type='submit'/></p>
                </form> 
                     
            </section>
    
    </aside> 
            
    <section id='corpo'>        
            
    <?php
        
        while($resultadoAnimal = mysqli_fetch_assoc($sqlquery)){
        
    //AQUI ATRIBUIMOS OS RESULTADOS A NOVAS VARIAVEIS    

            $idA    = $resultadoAnimal['id_animal'];
            if($resultadoAnimal['foto'] == 'imagem nao enviada'){
                $resultadoAnimal['foto'] = 'repimagens/imagemDefault.png';
            }

    //AQUI CRIAMOS UM FORMULARIO PARA CADA CADASTRO ENCONTRADO PELA BUSCA
    //SAO USADAS DUAS LABELS PARA CADA CAMPO DO CADASTRO
    //UMA DELAS EXIBE O TIPO DO DADO E A OUTRA EXIBE O VALOR ENCONTRADO NO BANCO 
            
            echo "<article class='card'>                   
                    <form id='$idA' method='post' action=''> 
                        <input type='hidden' name='formulario' value='$idA' />
                        <figure class='fotoNoticia'>
                                <img class='foto' src='$resultadoAnimal[foto]'  width='100%' height='auto' alt='Nao tem foto'/>       
                        </figure>
                        <div class='cardConteudo'>
                            <p><label class='esquerda'>Tipo: </label>
                            <label class='direita'>$resultadoAnimal[descricao_tipo_animal]</label></p>
                            <p><label class='esquerda'>Nome: </label>
                            <label class='direita'>$resultadoAnimal[nome_animal]</label></p>
                            <p><label class='esquerda'>Raça: </label>
                            <label class='direita'>$resultadoAnimal[descricao_raca_animal]</label></p>
                            <p><label class='esquerda'>Porte: </label>
                            <label class='direita'>$resultadoAnimal[porte]</label></p>
                            <p><label class='esquerda'>Sexo: </label>
                            <label class='direita'>$resultadoAnimal[sexo]</label></p>
                            <p><label class='esquerda'>Idade: </label>
                            <label class='direita'>$resultadoAnimal[idade]</label></p>
                            <p class='cardContato'>
                                <img src='imagens/facebook.png' width='15%' height='auto'/> 
                                <img src='imagens/square-twitter.png' width='15%' height='auto'/>
                                <img src='imagens/square-google-plus.png' width='15%' height='auto'/>
                            </p>
                        </div>
                            <input value='Gostou de mim?' class='enviarMensagem botao' type='button'/>  
                        </form>                
                        <div id='formularioEnvio' class='Adocao'>
                            <input class='closeFormEnvioMsm botao' type='button' value='Fechar' />
                        </div>                 
            </article>  
            ";  
            }    
        ?>
     
        </section>  
        
        </main>
                
        <footer id="rodape">
            
            <?php include("php/rodape.php"); ?>
            
        </footer>     
        
    </body>
    <script src="javascript/js.js"></script>
    
</html>
