<?php

    if (!isset($_SESSION))
            session_start();

    include("banco.php"); //INCLUSAO DO DOCUMENTO COM OS DADOS PARA A CONEXAO COM O BANCO

    $insertR = $_POST['cadRacaAnimal'];
    $insertSX = $_POST['cadSexoAnimal'];
    $insertN = $_POST['cadNomeAnimal'];
    $insertI = $_POST['cadIdadeAnimal'];
    $insertC = $_POST['cadCastracaoAnimal'];
    $insertT = $_POST['cadTipoAnimal'];
    $insertP = $_POST['cadPorteAnimal'];
    $insertD = $_POST['cadDescricaoAnimal'];
    $insertM = $_POST['cadCausaAnimal'];
    $insertIDU = $_SESSION['usuario'];

    /*ABAIXO TESTAMOS SE FOI ENVIADA UMA IMAGEM E CASO SEJA SETAMOS O NOME E O ENDERECO ONDE SERA SALVA*/
    /*DEPOIS ATRIBUIMOS O ENDERECO CONCATENADO A UMA VARIAVEL E SALVAMOS ESSE DADO NO BANCO*/

    if(isset($_POST['salvar']) && !empty($_FILES['cadFotoAnimal']['name'])){
        
        $arquivo = 'repimagens/'. "userID".$insertIDU."animal". $_POST['cadNomeAnimal'].".jpg";        //endereco que sera salvo no banco
        $endereco = '../repimagens/'. "userID".$insertIDU."animal". $_POST['cadNomeAnimal'].".jpg";    //endereco usado para salvar o arquivo no disco
        
        if(move_uploaded_file($_FILES['cadFotoAnimal']['tmp_name'], $endereco)){
            echo "Imagem salva com sucesso<br/>";
            echo "O arquivo foi salvo no endereco: ../".$endereco."<br/>";
            $insertF = $arquivo;
        }else{
            echo "Nao foi possivel salvar o arquivo";
        } 
        
    }else{
        $insertF = "imagem nao enviada";
    }

    /*MONTAGEM DA QUERY DE INSERCAO DO ANIMAL*/
    
    $insertAnimal = "INSERT INTO animais    
        (id_animal, id_usuario, id_raca, id_tipo, condicao, sexo, nome_animal, idade, castracao, porte, descricao, detalhes,  causa, data_cadastro, situacao, foto) 
        VALUES
        (DEFAULT, '$insertIDU', '$insertR', '$insertT', 'Doacao', '$insertSX', '$insertN', '$insertI', '$insertC', '$insertP', '$insertD','', '$insertM', DEFAULT,  1, '$insertF')
    "; 

    /*EXECUCAO DA QUERY DE INSERCAO DO ANIMAL*/

    if (mysqli_query($conexao, $insertAnimal)) {
        echo "Animal cadastrado com sucesso !";
        header("Location: ../perfil.php");
    } else {
        echo "Error: Não foi possível realizar a operação </br> Houve algum problema com os dados da solicitação(em MySQLI_QUERY)";
        
    }

    mysqli_close($conexao);

?>

