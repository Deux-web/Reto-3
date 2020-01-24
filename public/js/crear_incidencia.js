window.onload = function () {
    let div_otros = $('#esp_otros');
    let div_interurbano = $('#div_interurbanoInputs');
    let div_urbano = $('#div_urbanoInputs');

    let select_tipoaveria = $('#tipoaveria');
    let rb_urbano = $('#rb_urbano');
    let rb_interurbano = $('#rb_interurbano');

    comprobarOtros();
    urbano_interurbano();

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
        } else {
            div_interurbano.removeClass('d-none').addClass('d-block');
            div_urbano.removeClass('d-block').addClass('d-none');
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
