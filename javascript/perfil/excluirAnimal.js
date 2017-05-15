$(function() {

    function excluirAnimal() {
        var $idAnimal = $(this).attr("id");
        var $formulario = "<form class='formAlterar alert alert-danger'' action='php/perfil/excluirAnimal.php' method='post'>"
            + "<h2>Tem certeza que deseja excluir esse Animal ?</h2>"
            + "<h2>A exclusão desse animal também encerrará todos os processos em que ele esteja incluído</h2>"
            + "<input type='button' class='cancelar btn-danger' name='cancelar'value='Cancelar'/>"
            + "<button class='salvar btn-primary' type='submit' name='salvar'>Salvar</button>"
            + "<input type='hidden' name='idAnimal' value='" + $idAnimal + "'/ >"
            + "</form>";

        $("#formularioMA").append($formulario);
        $("#meusAnimais").css("display", "none");
    }

    $(".excluirMA").click(excluirAnimal);

});
