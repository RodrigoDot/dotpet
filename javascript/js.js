$(function() {

    /*
    function onClickMensagemAnimalAvistado() {
        $("#formularioEnvio").css("display", "block")
        .append($("<button />").addClass("closeFormEnvioMsm").text("Close"));
        $("#formularioEnvio").append($("<form />").addClass("formEnvioMsm")
                .append($("<label />").addClass("labelFormEnvioMsm").text("Nome "))
                .append($("<input />").addClass("inputNomeFormEnvioMsm"))
                .append($("<label />").addClass("labelContatoFormEnvioMsm").text("Contato "))
                .append($("<input />").addClass("inputContatoFormEnvioMsm"))
                .append($("<input />").addClass("inputImagemFormEnvioMsm"))
                .append($("<label />").addClass("labelMsmFormEnvioMsm").text("Mensagem "))
                .append($("<textarea />").addClass("textAreaMsmFormEnvioMsm"))
                .append($("<button />").addClass("buttonMsmFormEnvioMsm").text("Enviar Mensagem"))
        );
    }
    */

    /*
    function onClickMensagemAnimalAvistado() {
        console.log("botao de envio funcionou");
        $(".identificaoFormulario").val($(this).parent(".idAnimal").val());
        $(".exibir").text($(".identificaoFormulario").val());
        $("#formularioEnvio").css("display", "block");
    }
    */

    //Padrao Atual
    function onClickMensagemAnimalAvistado() {

        console.log("botao de envio funcionou");
        var $exibir = $(this).parent("form").attr("id"); //A FUNCAO ATTR RETORNA O VALOR DO ID DO ELEMENTO SELECIONADO
        var $tipoProcesso = $("#formularioEnvio").attr("class");


        var $formulario = "<form class='formEnvioMsm' action='php/enviarMensagem.php' enctype='multipart/form-data' method='post'>"
            + "<label for='' class='labelFormEnvioMsm'>Nome</label>"
            + "<input name='nomeInformante' class='inputNomeFormEnvioMsm' type='text' maxlength='50' placeholder='Ex.: Rodrigo' />"
            + "<label for='' class='labelContatoFormEnvioMsm'>Contato</label>"
            + "<input name='contatoInformante' class='inputContatoFormEnvioMsm' type='text' maxlength='50' placeholder='Ex.: ' />"
            + "<input name='imagemAnimalAvistado' class='inputImagemFormEnvioMsm' type='file' placeholder='Imagem do animal' />"
            + "<label class='labelMsmFormEnvioMsm'>Mensagem</label>"
            + "<textarea name='mensagemInformante' class='textAreaMsmFormEnvioMsm'></textarea>"
            + "<input name='enviarMensagem' class='buttonMsmFormEnvioMsm botao' type='submit' value='Enviar Mensagem' />"
            + "<input name='idAnimal' type='hidden' value='" + $exibir + "' />"
            + "<input name='tipoProcesso' type='hidden' value='" + $tipoProcesso + "' />"
            + "</form>";

        $("#formularioEnvio").append($formulario);
        $("#formularioEnvio").css("display", "block");
    }

    function onClickOutPopUp() {
        $(".formEnvioMsm").remove();
        $("#formularioEnvio").css("display", "none");
    }

    /*FUNCAO DESNECESSARIA JAH QUE O JS ESTA CRIANDO O FORMULARIO DINAMICAMENTE
    function erase() {
        console.log("funcao erase funcionou");
        $(".inputNomeFormEnvioMsm").val("");
        $(".inputContatoFormEnvioMsm").val("");
        $(".inputImagemFormEnvioMsm").val("");
        $(".textAreaMsmFormEnvioMsm").val("");
    }
    */

//CHAMADAS PARA AS FUNCOES
$(".enviarMensagem").click(onClickMensagemAnimalAvistado);
$(".closeFormEnvioMsm").click(onClickOutPopUp);

});

/*

onClickMensagemAnimalAvistado
> cria uma janela para que o usuario insira suas informacoes

onClickOutPopUp
> apaga a janela criada para que quando o botao for clicado outra vez nao aparecam dois formularios

*/




