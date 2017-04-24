$(function () {
    function excluirProcesso() {
        var $idProcesso = $(this).attr("id");
        var $formulario = "<form class='formAlterar alert alert-danger'' action='php/perfil/excluirProcesso.php' method='post'>" +
            "<h2>Tem certeza que deseja excluir esse processo ?</h2>" +
            "<input type='button' class='cancelar btn-danger' name='cancelar'value='Cancelar'/>" +
            "<button class='salvar btn-primary' type='submit' name='salvar'>Salvar</button>" +
            "<input type='hidden' name='idProcesso' value='" + $idProcesso + "'/ >" +
            "</form>";
        $("#formularioP").append($formulario);
        $("#processos").css("display", "none");
    }
    $(".excluirP").click(excluirProcesso);
});
