$(function() {

    function alterarMeusDados() {
        var $formulario = "<form class='formAlterar' action='php/perfil/alterarMeusDados.php' enctype='multipart/form-data' method='post'>"
            + "<label for='nome'>Nome:</label>"
            + "<input class='form-control' autofocus required type='text' id='nome' name='cadNome' size='40' maxlength='50' placeholder='Ex.: Ada Lovelace'/>"
            + "<label for='email'>E-mail:</label>"
            + "<input class='form-control' required type='email' id='email' name='cadEmail' size='40' maxlength='50' placeholder='Ex.: dotpet@dotpet.com' /> "
            + "<label for='celular'>Celular:</label>"
            + "<input class='form-control' required type='tel' id='celular' name='cadCelular' size='20' maxlength='11' placeholder='Ex.: 13999999999' >"
            + "<label for='nascimento'>Nascimento:</label>"
            + "<input class='form-control' required type='date' id='nascimento' name='cadNascimento' size='20' maxlength='10' placeholder='Ex.: 15082000' />"
            + "<label for='sexoUsuario'>Sexo:</label>"
            + "<select class='form-control' id='sexoUsuario' name='cadSexo'>"
                + "<optgroup>"
                    + "<option value='Masculino' selected>Masculino</option>"
                    + "<option value='Feminino'>Feminino</option>"
                    + "<option value='Indefinido'>Indefinido</option>"
                + "</optgroup>"
            + "</select>"
            + "<label>Add Foto</label>"
            + "<input class='file btn btn-info btn-block' type='file' id='fotoUsuario' name='cadFotoUsuario'/>"
            + "<button class='cancelar btn-danger' name='cancelar'>Cancelar</button>"
            + "<button class='salvar btn-primary' type='submit' name='salvar'>Salvar</button>"
        + "</form>";

        $("#formularioMD").append($formulario);
        $("#meusDados").css("display", "none");

    };

    $("#alterarMD").click(alterarMeusDados);

});

