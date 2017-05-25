<?php

    include("banco.php");// INCLUSAO DO BANCO

    if (!isset($_SESSION)) //INICIO DE SESSAO PARA VERIFICAR AS CONDICOES DE LOGIN
            session_start();

    //DEFINICAO DE VARIAVEIS PARA FACILITAR O PROCESSO
    $idAnimal = $_POST['idAnimal'];    
    $nomeInformante = $_POST['nomeInformante'];
    $contatoInformante = $_POST['contatoInformante'];  
    $msmInformante = $_POST['mensagemInformante'];
    $tipoProcesso = $_POST['tipoProcesso'];

    //ABAIXO O CODIGO QUE SALVA A IMAGEM NO SERVIDOR E QUE ATRIBUI O ENDERECO NO BANCO DE DADOS

    //PRIMEIRO TESTAMOS SE FOI ENVIADO ALGUMA COISA
    if(isset($_POST['enviarMensagem']) && !empty($_FILES['imagemAnimalAvistado']['name'])){
        
        //DEFINIMOS O ENDERECO QUE SERA SALVO NO BANCO
        $arquivo = 'repimagens/' . "ID" . $idAnimal . "animal" . $_FILES['imagemAnimalAvistado']['name'] .".jpg";
        
        //DEFINIMOS O ENDERECO QUE SERA SALVO NO DISCO
        $endereco = '../repimagens/' . "ID" . $idAnimal . "animal" . $_FILES['imagemAnimalAvistado']['name'] .".jpg";    
        
        //UTILIZAMOS UM TESTE PARA DEFINIRMOS UM VALOR PADRAO CASO NAO SEJA ENVIADO NADA
        if(move_uploaded_file($_FILES['imagemAnimalAvistado']['tmp_name'], $endereco)){
            echo "Imagem salva com sucesso<br/>";
            echo "O arquivo foi salvo no endereco: ../".$endereco."<br/>";
            $imagemAnimal = $arquivo;
        }else{
            echo "Nao foi possivel salvar o arquivo";
        } 
        
    }else{
        $imagemAnimal = "imagem nao enviada";
    }    
    
    //AQUI CRIAMOS A QUERY QUE RETORNARA OS DADOS QUE QUEREMOS
    $coletaDados = ("SELECT a.nome_animal, a.id_usuario, b.nome, b.foto
    FROM animais a, usuarios b
    WHERE a.id_animal = $idAnimal and a.id_usuario = b.id_usuario 
    "); 
    
    //EXECUTAMOS A QUERY ATRINUINDO O REULTADO A VARIAVEL $queryDados
    $queryDados = mysqli_query($conexao, $coletaDados);    

    //INICIAMOS UM LOOP PARA ATRINUIR OS VALORES ENCONTRADOS A VARIAVEIS
    while($dados = mysqli_fetch_assoc($queryDados)){    

        $idDoador  = $dados['id_usuario'];
        $nomeDoador = $dados['nome'];
        $fotoDoador = $dados['foto'];
        $nomeAnimal = $dados['nome_animal'];
    
    }

    //TESTE PARA DEFINIR SE O USUARIO E OU NAO CADASTRADO
    if(isset($_SESSION['nomeUsuario'])) {
        $idUsuario = $_SESSION['usuario'];
    }else {
        $idUsuario = 1;
    }

    if(isset($_SESSION['usuario'])) {
        $nomeInformante = $_SESSION['nomeUsuario'];
    }else {
        $nomeInformante = "Informante";
    }

    //AQUI CRIAMOS UMA QUERY PARA ADICINAR UM REGISTRO DE PROCESSO NO BANCO
    $iniciaProcesso = ("INSERT INTO processos
    (id_processo, id_usuario_doador, id_usuario_adotante, id_animal, data_inicio, data_finalizacao, situacao, tipo_processo, contato_informante, foto_animal_informante, mensagem)
    VALUES
    (DEFAULT, '$idDoador', '$idUsuario', '$idAnimal', DEFAULT, DEFAULT, 1, '$tipoProcesso', '$contatoInformante', '$imagemAnimal', '$msmInformante')
    ");
      
    //EXECUTAMOS A QUERY COM UM TESTE PARA FACILITAR O RECONHECIMENTO DE ERROS
    if($executarQuery = mysqli_query($conexao, $iniciaProcesso)) {
        echo "inicio de processo registrado com sucesso</br></br>";
        header("Location: ../index.php");
    }else {
        echo "inicio de processo nao realizado</br></br>";
    }

    //FECHAMOS A CONEXAO COM O BANCO
    mysqli_close($conexao);
        
?>
