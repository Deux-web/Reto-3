window.onload = function () {
    comprobarMatricula();
    //-----------------------------
    let div_otros = $('#esp_otros');
    let div_interurbano = $('#div_interurbanoInputs');
    let div_urbano = $('#div_urbanoInputs');
    //-----------------------------
    let select_tipoaveria = $('#tipoaveria');
    let rb_urbano = $('#rb_urbano');
    let rb_interurbano = $('#rb_interurbano');
    //-----------------------------
    let select_tipovia = $('#tipovia');
    let inp_carretera = $('#carretera');
    let inp_km = $('#km');
    let inp_direccionsentido = $('#direccion_sentido');
    let campos_intu = [select_tipovia, inp_carretera, inp_direccionsentido];
    //-----------------------------
    let inp_localidad = $('#localidad');
    let inp_calle = $('#calle');
    let inp_portal = $('#portal');
    let campos_u = [inp_localidad, inp_calle, inp_portal];

    comprobarOtros();
    urbano_interurbano();

    function require_urbano() {
        campos_intu.forEach(value => {
            value.prop('required', false);
        });
        campos_u.forEach(value => {
            value.prop('required', true);
        });
    }

    function require_inturbano() {
        campos_u.forEach(value => {
            value.prop('required', false);
        });
        campos_intu.forEach(value => {
            value.prop('required', true);
        });
    }


    select_tipoaveria.on('change', function () {
        comprobarOtros()
    });
    rb_urbano.on('change', function () {
        urbano_interurbano()
    });
    rb_interurbano.on('change', function () {
        urbano_interurbano()
    });

    function comprobarOtros() {
        if (select_tipoaveria.val() === 'otros') {
            div_otros.addClass('d-block').removeClass('d-none');
        } else {
            div_otros.addClass('d-none').removeClass('d-block');
        }
    }

    function urbano_interurbano() {
        if (rb_urbano.is(':checked')) {
            div_interurbano.removeClass('d-block').addClass('d-none');
            div_urbano.removeClass('d-none').addClass('d-block');
            require_urbano();
        } else {
            div_interurbano.removeClass('d-none').addClass('d-block');
            div_urbano.removeClass('d-block').addClass('d-none');
            require_inturbano();
        }
    }

    $("#buscarConductor").click(function axaj() {

        axios.get('/coches/' + $("#matricula").val())
            .then(function (response) {
                $('#tablaConductores').parent().removeClass('invisible');
                $('#tablaConductores').children().remove();
                $.each(response.data, function (index) {
                    if (response.data[index].titular == 1) {
                        $('#tablaConductores').append(
                            '<tr>' +
                            '<td>' + response.data[index].dni + '</td>' +
                            '<td>' + response.data[index].nombre + '</td>' +
                            '<td>' + response.data[index].apellido_p + ' ' + response.data[index].apellido_s + '</td>' +
                            '<td>Si</td>' +
                            '<td>' + response.data[index].telefono + '</td>' +
                            '<td><input type="radio" name="conductor_id" value="' + response.data[index].id + '"></td>' +
                            '</tr>')
                    } else {
                        $('#tablaConductores').append(
                            '<tr>' +
                            '<td>' + response.data[index].dni + '</td>' +
                            '<td>' + response.data[index].nombre + '</td>' +
                            '<td>' + response.data[index].apellido_p + ' ' + response.data[index].apellido_s + '</td>' +
                            '<td>No</td>' +
                            '<td>' + response.data[index].telefono + '</td>' +
                            '<td><input type="radio" name="conductor_id" value="' + response.data[index].id + '"></td>' +
                            '</tr>')
                    }
                })
            })
            .catch(function (error) {
                console.log(error);
            });
    });
    $("#centro").on('change', function () {
        $("#centro option:selected").each(function () {
            axios.get('/centros/' + $(this).val())
                .then(function (response) {
                    console.log(response);
                    $('#tablaTecnicos').parent().removeClass('invisible');
                    $('#tablaTecnicos').children().remove();
                    $.each(response.data, function (index) {
                        if (response.data[index].estado == 'Ocupado' || response.data[index].estado == 'Fuera de trabajo') {
                            $('#tablaTecnicos').append(
                                '<tr>' +
                                '<td>' + response.data[index].nombre + ' ' + response.data[index].apellido_p + ' ' + response.data[index].apellido_s + '</td>' +
                                '<td>' + response.data[index].estado + '</td>' +
                                '<td><input type="radio" name="tecnico_id"  disabled id="' + response.data[index].id + '" value="' + response.data[index].id + '"></td>' +
                                '</tr>')
                        } else {
                            $('#tablaTecnicos').append(
                                '<tr>' +
                                '<td>' + response.data[index].nombre + ' ' + response.data[index].apellido_p + ' ' + response.data[index].apellido_s + '</td>' +
                                '<td>' + response.data[index].estado + '</td>' +
                                '<td><input type="radio" name="tecnico_id" id="' + response.data[index].id + '" value="' + response.data[index].id + '"></td>' +
                                '</tr>'
                            )
                        }
                    })
                })
                .catch(function (error) {
                    console.log(error);
                });
        });
    });
};


function comprobarMatricula() {
    //Matriculas nuevas 0000-xxx /^[0-9]{4}-[BCDFGHJKLMNPRSTVWXYZ ]{3}$/;
    //Matriculas FAKER xxx-111 /^[A-Z]{3}-[0-9]{3}$/;
    $("#matricula").keyup(function (event) {
        var matricula = $("#matricula").val().toUpperCase();

        var regexMatriculaFaker = /^[A-Z]{3}-[0-9]{3}$/;
        var regexMatriculaEsp = /^[0-9]{4}-[BCDFGHJKLMNPRSTVWXYZ ]{3}$/;
        var validacion_matricula = false;

        if (!validacion_matricula) {
            if (regexMatriculaFaker.test(matricula)) {
                validacion_matricula = true;
                $("#buscarConductor").removeClass('disabled');
            } else if (regexMatriculaEsp.test(matricula)) {
                validacion_matricula = true;
                $("#buscarConductor").removeClass('disabled');
            } else {
                validacion_matricula = false;
                $("#buscarConductor").addClass('disabled');
            }
        }
        if (validacion_matricula) {
            $("#matricula").removeClass('is-invalid');
            $("#matricula").addClass('is-valid');
        } else {
            $("#matricula").removeClass('is-valid');
            $("#matricula").addClass('is-invalid');
        }
    });
}
