<?php

    if (!isset($_SESSION))
            session_start();

    include("banco.php"); //INCLUSAO DO DOCUMENTO COM OS DADOS PARA A CONEXAO COM O BANCO

    $insertR = $_POST['cadRacaAnimalPerdido'];
    $insertSX = $_POST['cadSexoAnimalPerdido'];
    $insertN = $_POST['cadNomeAnimalPerdido'];
    $insertI = $_POST['cadIdadeAnimalPerdido'];
    $insertT = $_POST['cadTipoAnimalPerdido'];
    $insertP = $_POST['cadPorteAnimalPerdido'];
    $insertD = $_POST['cadDescricaoAnimalPerdido'];
    $insertDT = $_POST['cadDetalhesPerdido']; 
    $insertIDU = $_SESSION['usuario'];

    if(isset($_POST['salvar']) && !empty($_FILES['cadFotoAnimalPerdido']['name'])){
        
        $arquivo = 'repimagens/'. "userID".$insertIDU."animal". $_POST['cadNomeAnimalPerdido'].".jpg";        //endereco que sera salvo no banco
        $endereco = '../repimagens/'. "userID".$insertIDU."animal". $_POST['cadNomeAnimalPerdido'].".jpg";    //endereco usado para salvar o arquivo no disco
        
        if(move_uploaded_file($_FILES['cadFotoAnimalPerdido']['tmp_name'], $endereco)){
            echo "Imagem salva com sucesso<br/>";
            echo "O arquivo foi salvo no endereco: ../".$endereco."<br/>";
            $insertF = $arquivo;
        }else{
            echo "Nao foi possivel salvar o arquivo";
        } 
        
    }else{
        $insertF = "imagem nao enviada";
    }

    $insertAnimalPerdido = "INSERT INTO animais    
        (id_animal, id_usuario, id_raca, id_tipo, condicao, sexo, nome_animal, idade, castracao, porte, descricao, detalhes, causa, data_cadastro, situacao, foto) 
        VALUES
        (DEFAULT, '$insertIDU', '$insertR', '$insertT', 'Perdido', '$insertSX', '$insertN', '$insertI', 'DEFAULT', '$insertP', '$insertD', '$insertDT', '', DEFAULT,  1, '$insertF')
    "; 

    if (mysqli_query($conexao, $insertAnimalPerdido)) {
        echo "Animal cadastrado com sucesso !";
        header("Location: ../perfil.php");
    } else {
        echo "Error: Não foi possível realizar a operação </br> Houve algum problema com os dados da solicitação(em MySQLI_QUERY)";
    }

    mysqli_close($conexao);

?>









