$(function(){

    onOffBotao();

    function onOffBotao() {
        var $email = $(".confirmaEmail").val();
        var $novaSenha = $(".novaSenha").val();
        var $confirmaSenha = $(".confirmaSenha").val();

        console.log("funcao On/Off do botao foi ativada");
        if(!$email) {
            $(".testar").prop("disabled", true);
            console.log("setado para disabilidatado");
        }else if(!$novaSenha || !$confirmaSenha ) {
            $(".testar").prop("disabled", true);
            console.log("setado para disabilidatado");
        }else {
            $(".testar").prop("disabled", false);
            console.log("setado para habilitado");
        }
        mensagem($email, $novaSenha, $confirmaSenha);
    }

    function mensagem(email, novaSenha, confirmaSenha) {
        console.log("Mensagem ativada");
        if(!email || !novaSenha || !confirmaSenha) {
            $(".mensagem").remove();
            $("#mensagem").append($("<label />").addClass("mensagem").addClass("alert").addClass("alert-danger").text("TODOS OS CAMPOS DEVEM ESTAR PREENCHIDOS"));
        }else if(novaSenha != confirmaSenha) {
            $(".mensagem").remove();
            $("#mensagem").append($("<label />").addClass("mensagem").addClass("alert").addClass("alert-danger").text("AS SENHAS DIGITADAS NAO CORRESPONDEM"));
        }else {
            $(".mensagem").remove();
        }
    }

    $(".confirmaEmail").focusout(onOffBotao);
    $(".novaSenha").focusout(onOffBotao);
    $(".confirmaSenha").focusout(onOffBotao);
    $(".mensagem").remove();
});
