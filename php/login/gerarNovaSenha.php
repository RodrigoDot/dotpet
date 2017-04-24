<!DOCTYPE html>

<?php

    /*A FUNCAO ABAIXO VERIFICA SE O EMAIL DIGITADO EXISTE NO BANCO E DEPENDENDO CRIA UMA NOVA SENHA*/

    if (isset($_POST['nemail_conta']) && strlen($_POST['nemail_conta']) > 0){
    
        $email = $_POST['nemail_conta'];
        
        /*$SQLBUSCA CARREGA UMA QUERY DIRECIONADA AO COMPO EMAIL*/
        /*$AQLQUERY CARREGA UMA FUNCAO QUE EXECUTA A BUSCA COM OS PARAMETROS SETADOS QUE SAO A VARIAVEL QUE REPRESENTA AS CONFIGURACOES DA CONEXAO E A VARIAVEL QUE CONTEM A QUERY*/
        /*$RESULTADO RECEBE OS DADOS RETORNADOS DA BUSCA EM FORMA DE ARRAY, COM O AUXILIO DA FUNCAO mysqli_fetch_assoc(), ESSA FUNCAO CRIA UM ARRAY ONDE O INDICE EH O NOME DA COLUNA NO BANCO*/
        
        function gerarNovaSenha($email) {
            include("../banco.php"); /*INCLUSAO DO BANCO*/
            $sqlBusca = ("SELECT email FROM usuarios WHERE email = '$email'"); 
            
            if($sqlquery = mysqli_query($conexao, $sqlBusca)) {
                echo"query realizada ";
            }else {
                echo"problema com a query";
            }

            $resultado = mysqli_fetch_assoc($sqlquery);

            /*GERAMOS A NOVA SENHA, ATUALIZAMOS NO BANCO E ENVIAMOS O LINK PARA O USUARIO*/

            if ($resultado['email'] == $email){
                $senha = substr(sha1(time()), 0, 20);
                echo"</br>nova senha: $senha";
                $sqlAtt = "UPDATE usuarios SET senha = '$senha' WHERE email = '$resultado[email]'";
                if($sqlqueryAtt = mysqli_query($conexao, $sqlAtt)) {
                    echo"</br> senha atualizada";
                }
            }else{
                echo"</br>nao deu";
            }   
            mysqli_close($conexao);
        }
        
    gerarNovaSenha($email);
                       
    }
?>

