<!DOCTYPE>
<?php 
    if(!isset($_SESSION))
        session_start();
?>
<html>
    <head>
        <title>Chat</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="css/chatStyle.css" />
        <script src="lib/JQuery/jquery-3.1.1.min.js"></script>
        <script>
            function autoScroll() {
                var newScrollHeight = $("#chatbox").prop("scrollHeight");
                $("#chatbox").animate({ scrollTop: newScrollHeight }, 'fast');
            }
        </script>
    </head>

    <body onload="autoScroll();">
        <?php 
            include("view/loginForm.php");
        ?>
    </body>
    <script src="javascript/js.js"></script>
    <input id="<?php echo $_SESSION['usuario']; ?>" class="idUsuario" type="hidden" /> 
    <input id="<?php echo $_GET['destinatario']; ?>" class="destinatario" type="hidden" /> 
    <?php
        
        $path = "/xampp/htdocs/dotpet/chat/messenger/loghistory/";
    
        if(!file_exists($path . $_SESSION['usuario'])){
        mkdir($path . $_SESSION['usuario'], true);
        }else {
        }

        if(!file_exists($path . $_GET['destinatario'])) {
            mkdir($path . $_GET['destinatario'], true);
        }else {
        }    
    
    ?> 
</html>