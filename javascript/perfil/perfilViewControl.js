$(function() {

    ativateDados();

    function ativateDados() {
        formRemover();
        $("#meusDados").css("display", "block");
        $("#meusAnimais").css("display", "none");
        $("#processos").css("display", "none");
    }

    function ativateAnimais() {
        formRemover();
        $("#meusDados").css("display", "none");
        $("#meusAnimais").css("display", "block");
        $("#processos").css("display", "none");
    }

    function ativateProcessos() {
        formRemover();
        $("#meusDados").css("display", "none");
        $("#meusAnimais").css("display", "none");
        $("#processos").css("display", "block");
    }

    $(".perfilItemDados").click(ativateDados);
    $(".perfilItemAnimais").click(ativateAnimais);
    $(".perfilItemProcessos").click(ativateProcessos);

    function formRemover() {
        $(".formAlterar").remove();
    }

    $(document).on('click', '.cancelar', function(){
        var $view = $(this).parents("div").attr("id");

        console.log($view + "passo1");

        if($view == "formularioMD") {
            ativateDados();
        }
        if($view == "formularioMA") {
            ativateAnimais();
        }
        if($view == "formularioP") {
            ativateProcessos();
        }

        console.log("final da funcao");
    });

});
