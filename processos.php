<!DOCTYPE html>

<?php

    include("php/banco.php");

    if (!isset($_SESSION))
            session_start();

    $idAnimal = $_POST['formulario'];

    $coletaDados = ("SELECT a.id_usuario, b.nome, b.foto
    FROM animais a, usuarios b
    WHERE a.id_usuario = b.id_usuario 
    "); 

    $queryDados = mysqli_query($conexao, $coletaDados);    

    while($dados = mysqli_fetch_assoc($queryDados)){    

            $idDoador  = $dados['id_usuario'];
            $Doador     = $dados['nome'];
            $fotoDoador = $dados['foto'];
        
    }

    $Adotante   = $_SESSION['nomeUsuario'];
    $idAdotante = $_SESSION['usuario'];
    
    $iniciaProcesso = ("INSERT INTO processos
    (id_usuario_doador, id_usuario_adotante, id_animal, data_inicio, data_finalizacao, situacao, comentario)
    VALUES
    ($idDoador, $idAdotante, 1, DEFAULT, DEFAULT, 1, 'comentario')
    ");
    
    $sqlIniciaProcesso = mysqli_query($conexao, $iniciaProcesso); 

    mysqli_close($conexao);

?>

<html lang="pt-br">
    
    <head>
        <title>Processos</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/estilo.css" />
        <link rel="stylesheet" href="css/estiloChat.css" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
    </head>
    
    <body>
        
        <header id="cabecalho"> 

            <img class="logo" src="imagens/LogoPet.png" height="auto" width="100%" onclick="location.href='index.php'"/>
            
            <?php include("php/checkUp.php"); ?>
                        
        </header> 
        
        <?php include("php/menuCompleto.php"); ?>  
        
        <section id="containerChat">

                <div id="adotante" class="quadros">
                    
                    <figure id="figAdotante">
                    <?php echo "<img id='fotoAdotante' src='$_SESSION[fotoPerfil]' width='100%' height='auto' alt='Foto'/> "; ?>
                    <figcaption><?php echo"$Adotante"; ?></figcaption>
                    </figure>
                                                      
                    <textarea>
                        
                    </textarea>  
                    
                </div>
                
                <div id="chat" class="quadros">
                    
                    ererthr5thgrt
                    
                </div>
            
                <div id="doador" class="quadros">
                    
                    <figure id="figDoador">
                    <img id="fotoDoador" src="repimagens/imagemDefault.png" width="100%" height="auto" alt="Foto"/>
                    <figcaption><?php echo $Doador; ?></figcaption>
                    </figure>                      
                                        
                </div>
            
        </section> 
                    
        </main>     
                
        <footer id="rodape">
            
            <?php include("php/rodape.php"); ?>
            
        </footer>    
        
    </body>   
        
</html>