$(function() {
        
    //Padrao Atual
    function onClickMensagemAnimalAvistado() {
        console.log("botao de envio funcionou");
        var $exibir = $(this).parent("form").attr("id"); //A FUNCAO ATTR RETORNA O VALOR DO ID DO ELEMENTO SELECIONADO
        var $tipoProcesso = $("#formularioEnvio").attr("class");
        var $destinatario = $(this).parents("article").attr("id");

        var $formulario = "<form class='formEnvioMsm' action='php/enviarMensagem.php?idAnimal='" + $destinatario + "' enctype='multipart/form-data' method='post'>"
            + "<label for='' class='labelFormEnvioMsm'>Nome</label>"
            + "<input name='nomeInformante' class='inputNomeFormEnvioMsm' type='text' maxlength='50' placeholder='Ex.: Rodrigo' required/>"
            + "<label for='' class='labelContatoFormEnvioMsm'>Contato</label>"
            + "<input name='contatoInformante' class='inputContatoFormEnvioMsm' type='text' maxlength='50' placeholder='Ex.: ' required/>"
            + "<input name='imagemAnimalAvistado' class='inputImagemFormEnvioMsm' type='file' placeholder='Imagem do animal' />"
            + "<label class='labelMsmFormEnvioMsm'>Mensagem</label>"
            + "<textarea name='mensagemInformante' class='textAreaMsmFormEnvioMsm'></textarea>"
            + "<input name='enviarMensagem' class='buttonMsmFormEnvioMsm botao' type='submit' value='Enviar Mensagem' />"
            + "<input id='idAnimal' name='idAnimal' type='hidden' value='" + $exibir + "' />"
            + "<input name='tipoProcesso' type='hidden' value='" + $tipoProcesso + "' />"
            + "</form>";

        $("#formularioEnvio").append($formulario);
        $("#formularioEnvio").css("display", "block");
    }

    function onClickOutPopUp() {
        $(".formEnvioMsm").remove();
        $("#formularioEnvio").css("display", "none");
    }


//CHAMADAS PARA AS FUNCOES
$(".enviarMensagem").click(onClickMensagemAnimalAvistado);
$(".closeFormEnvioMsm").click(onClickOutPopUp);

});


