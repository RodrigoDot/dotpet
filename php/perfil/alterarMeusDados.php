<?php

    include("../banco.php"); //INCLUSAO DO DOCUMENTO COM OS DADOS PARA A CONEXAO COM O BANCO
    
    if(!isset($_SESSION)) {
        session_start();
    }

    $insertN = $_POST['cadNome'];
    $insertE = $_POST['cadEmail'];
    $insertC = $_POST['cadCelular'];
    $insertNc = $_POST['cadNascimento'];
    $insertSX = $_POST['cadSexo'];

    /*ABAIXO TESTAMOS SE FOI ENVIADA UMA IMAGEM E CASO SEJA SETAMOS O NOME E O ENDERECO ONDE SERA SALVA*/
    /*DEPOIS ATRIBUIMOS O ENDERECO CONCATENADO A UMA VARIAVEL E SALVAMOS ESSE DADO NO BANCO*/

    if(isset($_POST['salvar']) && !empty($_FILES['cadFotoUsuario']['name'])){
        
        $arquivo = 'repimagens/'. $_POST['cadEmail'].".jpg";
        $endereco = '../../repimagens/'. $_POST['cadEmail'].".jpg";
        
        if(move_uploaded_file($_FILES['cadFotoUsuario']['tmp_name'], $endereco)){
            echo "Imagem salva com sucesso<br/>";
            echo "O arquivo foi salvo no endereco: ../".$endereco."<br/>";
            $insertF = $arquivo;
        }else{
            echo "Nao foi possivel salvar o arquivo";
        } 
        
    }else{
        $insertF = "repimagens/imagemDefault.png";
    }
    
    $alterDados = "UPDATE usuarios    
        SET  nome = '$insertN', nascimento = '$insertNc', email = '$insertE', celular = '$insertC', sexo = '$insertSX', situacao = 1, foto = '$insertF'
        WHERE id_usuario = $_SESSION[usuario]"; 

    if (mysqli_query($conexao, $alterDados)) {
        $atualizarDados = ("select nome, foto from usuarios where $_SESSION[usuario] = id_usuario");
        $queryAtualizar = (mysqli_query($conexao, $atualizarDados));
        while($dado = mysqli_fetch_assoc($queryAtualizar)) {
            $_SESSION['nomeUsuario'] = $dado['nome'];
            $_SESSION['fotoPerfil'] = $dado['foto']; 
        }
        header("Location: ../../perfil.php");
    }else {
        echo "Error: Não foi possível realizar a operação </br> Houve algum problema com os dados da solicitação(em MySQLI_QUERY)";
    }

    mysqli_close($conexao);

?> 

