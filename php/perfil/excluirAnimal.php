<?php

    if (!isset($_SESSION))
            session_start();

    include("../banco.php"); //INCLUSAO DO DOCUMENTO COM OS DADOS PARA A CONEXAO COM O BANCO

    $idAnimal = $_POST['idAnimal'];

    /*MONTAGEM DA QUERY EXCLUSAO DE PROCESSOS DO ANIMAL*/
    $exclusaoDeProcessosAnimal = "DELETE FROM processos
    WHERE $idAnimal = id_animal";
    
    if(mysqli_query($conexao, $exclusaoDeProcessosAnimal)) {
        echo"Todos os processos foram excluidos";
    }else {
        echo"Nao foi possivel excluir os processos";
    }

    /*MONTAGEM DA QUERY DE EXCLUSAO DO ANIMAL*/
    $atualizarAnimal = "DELETE FROM animais
    WHERE $idAnimal = id_animal";
    
    if(mysqli_query($conexao, $atualizarAnimal)) {
        echo"exclusao realizada com sucesso";
         header("Location: ../../perfil.php");
    }else {
        echo"
            <div class='formAlterar alert alert-danger'>
                Não é possivel excluir esse animal, pois existe algum processo ativo o qual ele faz parte !
                Para excluir esse animal, é necessário que ele não esteja incluído em nenhum processo
            </div>        
        ";
    }

    mysqli_close($conexao);

?>