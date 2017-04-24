<?php

    if(isset($_POST['confirmarEmail']) && isset($_POST['novaSenha'])) {

    /*A FUNCAO ABAIXO VERIFICA SE O EMAIL DIGITADO EXISTE NO BANCO E DEPENDENDO CRIA UMA NOVA SENHA*/
    
        $email = $_POST['confirmarEmail'];
        $novaSenha = $_POST['novaSenha'];
        
        /*$SQLBUSCA CARREGA UMA QUERY DIRECIONADA AO COMPO EMAIL*/
        /*$AQLQUERY CARREGA UMA FUNCAO QUE EXECUTA A BUSCA COM OS PARAMETROS SETADOS QUE SAO A VARIAVEL QUE REPRESENTA AS CONFIGURACOES DA CONEXAO E A VARIAVEL QUE CONTEM A QUERY*/
        /*$RESULTADO RECEBE OS DADOS RETORNADOS DA BUSCA EM FORMA DE ARRAY, COM O AUXILIO DA FUNCAO mysqli_fetch_assoc(), ESSA FUNCAO CRIA UM ARRAY ONDE O INDICE EH O NOME DA COLUNA NO BANCO*/
        
        function redefinirSenha($email, $novaSenha) {
            echo"</br>funcao redefinirSenha INICIADA";
            
            include("../banco.php"); /*INCLUSAO DO BANCO*/
            echo"</br>INCLUSAO DO BANCO CONCLUIDA";
            
            $sqlBusca = ("SELECT email FROM usuarios WHERE email = '$email'"); 
            echo"</br>COMPOSICAO DA QUERY OK";
            
            if($sqlquery = mysqli_query($conexao, $sqlBusca)) {
                echo"query realizada ";
            }else {
                echo"problema com a query";
            }

            $resultado = mysqli_fetch_assoc($sqlquery);

            /*GERAMOS A NOVA SENHA, ATUALIZAMOS NO BANCO E ENVIAMOS O LINK PARA O USUARIO*/

            if ($resultado['email'] == $email) { 
                echo"</br>INICIO DO IF";
                
                $senha = $novaSenha;
                echo"</br>SENHA $senha";

                $to = $resultado['email'];
                echo"</br>EMAIL $to";
                
                $subject = "Sua nova senha";
                echo"</br>ASSUNTO $subject";
                
                $headers = "From: dotpet@dotpet.com";
                echo"</br>HERADER $headers";
                
                if(mail($to, $subject, $senha, $headers)) {
                    echo"</br>MAIL EXECUTADO";
                    echo"email enviado com sucesso";
                }else {
                    echo"</br>MAIL NAO EXECUTADO";
                }
                    
                $sqlAtt = "UPDATE usuarios SET senha = '$senha' WHERE email = '$resultado[email]'";
                echo"</br>COMPOSICAO DA QUERY DE ATUALIZACAO OK";
                
                $sqlqueryAtt = mysqli_query($conexao, $sqlAtt);
                echo"</br>EXECUCAO DA QUERY DE ATUALIZACAO OK";
                  
        
            
            mysqli_close($conexao);
        }
    }
        //CHAMADA DA FUNCAO
        redefinirSenha($email, $novaSenha);

    }else {
        echo"Vah cagar safado !!!</br></br>";
        echo"<a href='../../entrar.php'><input type='button' value='Inicio'/></a>";
    }

?>
