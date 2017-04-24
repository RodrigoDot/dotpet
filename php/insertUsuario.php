<?php

    include("banco.php"); //INCLUSAO DO DOCUMENTO COM OS DADOS PARA A CONEXAO COM O BANCO

    $insertN = $_POST['cadNome'];
    $insertE = $_POST['cadEmail'];
    $insertS = $_POST['cadSenha'];
    $insertC = $_POST['cadCelular'];
    $insertNc = $_POST['cadNascimento'];
    $insertSX = $_POST['cadSexo'];

    /*ABAIXO TESTAMOS SE FOI ENVIADA UMA IMAGEM E CASO SEJA SETAMOS O NOME E O ENDERECO ONDE SERA SALVA*/
    /*DEPOIS ATRIBUIMOS O ENDERECO CONCATENADO A UMA VARIAVEL E SALVAMOS ESSE DADO NO BANCO*/

    if(isset($_POST['salvar']) && !empty($_FILES['cadFotoUsuario']['name'])){
        
        $arquivo = 'repimagens/'. $_POST['cadEmail'].".jpg";
        $endereco = '../repimagens/'. $_POST['cadEmail'].".jpg";
        
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
    
    $insert = "INSERT INTO usuarios    
        (id_usuario, nome, nascimento, email, celular, senha, sexo, data_cadastro, situacao, foto) 
        VALUES
        (DEFAULT, '$insertN', '$insertNc', '$insertE', '$insertC', '$insertS', '$insertSX', DEFAULT, 1, '$insertF') 
    "; 

    if (mysqli_query($conexao, $insert)) {
        echo "Cadastro efetuado com sucesso !";
        header("Location: ../entrar.php");
    } else {
        echo "Error: Não foi possível realizar a operação </br> Houve algum problema com os dados da solicitação(em MySQLI_QUERY)";
    }

    mysqli_close($conexao);

?>





