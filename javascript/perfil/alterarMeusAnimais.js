$(function() {

    function alterarMeusAnimais() {
        var $idAnimal = $(this).attr("id");
        var $formulario = "<form class='formAlterar' action='php/perfil/alterarMeusAnimais.php' enctype='multipart/form-data' method='post'>"
            + "<label for='nome_animal'>Nome:</label>"
            + "<input class='form-control' autofocus id='nome_animal' name='cadNomeAnimal' size='38' maxlength='50' placeholder='Nome do Animal'/>"
            + "<label for='idade'>Idade Estimada:</label>"
            + "<input class='form-control' type='number' id='idade' class='idade' name='cadIdadeAnimal' min='0' max='20' step='1'/>"
            + "<label for='tipo'>Tipo de Animal</label>"
            + "<select class='form-control' id='tipo' name='cadTipoAnimal'>"
                + "<optgroup>"
                    + "<option value='1' selected>Canino</option>"
                    + "<option value='2'>Felino</option>"
                + "</optgroup>"
            + "</select>"
            + "<label for='raca'>Raça:</label>"
            + "<select class='form-control' id='raca' name='cadRacaAnimal'>"
                + "<optgroup>"
                + "<option value='1'selected>Não sei</option>"
                + "</optgroup>"
                + "<optgroup label='Canino'>"
                    + "<option value='2'>Pastor Alemão</option>"
                    + "<option value='3'>Beagle</option>"
                    + "<option value='4'>Chow-Chow</option>"
                    + "<option value='5'>Labrador</option>"
                    + "<option value='6'>Pit-Bulls</option>"
                    + "<option value='7'>Poodle</option>"
                    + "<option value='8'>Husky</option>"
                    + "<option value='9'>Bulldog</option>"
                + "</optgroup>"
                + "<optgroup label='Felino'>"
                    + "<option value='10'>Himalaia</option>"
                    + "<option value='11'>Cymric</option>"
                    + "<option value='12'>Savannah</option>"
                    + "<option value='13'>Munchkin</option>"
                    + "<option value='14'>Ragamuffin</option>"
                    + "<option value='15'>Persa</option>"
                    + "<option value='16'>Siâmes</option>"
                + "</optgroup>"
            + "</select>"
            + "<label for='porte'>Porte:</label>"
            + "<select class='form-control' id='porte' name='cadPorteAnimal'>"
                + "<optgroup>"
                    + "<option value='Desconhecido' selected>Não sei</option>"
                    + "<option value='Pequeno'>Pequeno</option>"
                    + "<option value='Medio'>Médio</option>"
                    + "<option value='Grande'>Grande</option>"
                + "</optgroup>"
            + "</select>"
            + "<label for='castracao'>Castrado?</label>"
            + "<select class='form-control' id='castracao' name='cadCastracaoAnimal'>"
                + "<optgroup>"
                    + "<option value='Desconhecido' selected>Não sei</option>"
                    + "<option value='Sim'>Sim</option>"
                    + "<option value='Nao'>Não</option>"
                + "</optgroup>"
            + "</select>"
             + "<label for='sexo_animal'>Sexo:</label>"
             + "<select class='form-control' id='sexo_animal' name='cadSexoAnimal'>"
                + "<optgroup>"
                    + "<option value='Desconhecido'>Não sei</option>"
                    + "<option value='Macho' selected>Macho</option>"
                    + "<option value='Femea'>Fêmea</option>"
                 + "</optgroup> "
             + "</select>"
            + "<label for='fotoAnimal'>Add Foto</label>"
            + "<input class='file btn btn-info btn-block' id='fotoAnimal' type='file' name='cadFotoAnimal' value='Escolher'/>"
            + "<label for='descricao'>Descrição</label>"
            + "<textarea class='form-control' id='descricao' name='cadDescricaoAnimal'></textarea>"
            + "<input type='button' class='cancelar btn-danger' name='cancelar'value='Cancelar'/>"
            + "<button class='salvar btn-primary' type='submit' name='salvar'>Salvar</button>"
            + "<input type='hidden' name='idAnimal' value='" + $idAnimal + "'/ >"
        + "</form>";

        $("#formularioMA").append($formulario);
        $("#meusAnimais").css("display", "none");

    };

    $(".alterarMA").click(alterarMeusAnimais);

});


/*





                <input name="salvar" value="Salvar" class="botao" id="salvar" type="submit"/>


*/
