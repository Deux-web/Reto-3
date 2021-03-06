window.onload = function () {

    let rb_insitu = $('#rb_insitu');
    let rb_taller = $('#rb_taller');

    let res_taller = $('#res_taller');
    let res_insitu = $('#res_insitu');

    rb_insitu.on('change', function () {
        comprobarRadios();
    });

    rb_taller.on('change', function () {
        comprobarRadios();
    });


    cambioTamaño($(window).width());


    comprobarRadios();

    $(window).resize(function () {
        let ventana_ancho = $(window).width();
        cambioTamaño(ventana_ancho);
    });

    function cambioTamaño(ventana_ancho) {
        if (ventana_ancho > 765) {
            $('.colapsarDiv').css('height', 'auto');
            $('.colapsarDiv').css('display', 'block');
        } else {
            $('.colapsarDiv').css('height', '0px');
            $('.colapsarDiv').css('display', 'none');
        }
    }

    function comprobarRadios() {
        if (rb_insitu.is(':checked')) {
            res_taller.addClass('d-none').removeClass('d-block');
            res_insitu.addClass('d-block').removeClass('d-none');
            $('#textarea_res_insitu').prop('required', true);
            $('#textarea_res_taller').prop('required', false);
            $('#taller').prop('required', false);
        } else {
            res_taller.addClass('d-block').removeClass('d-none');
            res_insitu.addClass('d-none').removeClass('d-block');
            $('#textarea_res_insitu').prop('required', false);
            $('#textarea_res_taller').prop('required', true);
            $('#taller').prop('required', true);
        }
    }

    axios.get('/api/centros/' + $('#centro_id').text())
        .then(function (response) {
            $.each(response.data, function (index) {
                if (response.data[index].estado == 'Disponible') {
                    $('#tbodyTecnicos').append(
                        '<tr>' +
                        '<td>' + response.data[index].nombre + ' ' + response.data[index].apellido_p + ' ' + response.data[index].apellido_s + '</td>' +
                        '<td>' + response.data[index].estado + '</td>' +
                        '<td><input type="radio" name="tecnico_id" id="' + response.data[index].id + '" value="' + response.data[index].id + '"></td>' +
                        '</tr>'
                    )
                }
                if ($('#tbodyTecnicos').children().length == 0) {
                    $('<h5>No hay técnicos disponibles</h5>').insertBefore($('#tablaTecnicos'));
                    $('#tablaTecnicos').remove();
                }
            })
            $('#tablaTecnicos').after('<input type="submit" class="btn btn-primary w-50 " value="Asignar Tecnico">');
        });

    $('#botonDatosAfectados').on('click', function () {
        let divDatosAfectados = $('#datosAfectado').css('height');
        $('#botonDatosAfectados').css('transition', 'all 0.4s ease-in-out');
        if (divDatosAfectados == '0px') {
            $('#datosAfectado').css('height', 'auto');
            $('#datosAfectado').css('display', 'block');
            $('#datosAfectado').removeClass('colapsarDiv');
            $('#botonDatosAfectados').css('transform', 'rotate(-180deg)');
        } else {
            $('#datosAfectado').css('height', '0px');
            $('#datosAfectado').css('display', 'none');
            $('#datosAfectado').addClass('colapsarDiv');
            $('#botonDatosAfectados').css('transform', 'rotate(0deg)');
        }
    });

    $('#botonDatosIncidencia').on('click', function () {
        let divDatosAfectados = $('#datosIncidencia').css('height');
        $('#botonDatosIncidencia').css('transition', 'all 0.4s ease-in-out');
        if (divDatosAfectados == '0px') {
            $('#datosIncidencia').css('height', 'auto');
            $('#datosIncidencia').css('display', 'block');
            $('#datosIncidencia').removeClass('colapsarDiv');
            $('#botonDatosIncidencia').css('transform', 'rotate(-180deg)');
        } else {
            $('#datosIncidencia').css('height', '0px');
            $('#datosIncidencia').css('display', 'none');
            $('#datosIncidencia').addClass('colapsarDiv');
            $('#botonDatosIncidencia').css('transform', 'rotate(0deg)');
        }
    });

    $('#botonDatosResolucion').on('click', function () {
        let divDatosAfectados = $('.tipoResolucion').css('height');
        $('#botonDatosResolucion').css('transition', 'all 0.4s ease-in-out');
        if (divDatosAfectados == '0px') {
            $('.tipoResolucion').css('height', 'auto');
            $('.tipoResolucion').css('display', 'block');
            $('.tipoResolucion').removeClass('colapsarDiv');
            $('#botonDatosResolucion').css('transform', 'rotate(-180deg)');
        } else {
            $('.tipoResolucion').css('height', '0px');
            $('.tipoResolucion').css('display', 'none');
            $('.tipoResolucion').addClass('colapsarDiv');
            $('#botonDatosResolucion').css('transform', 'rotate(0deg)');
        }
    });

    $('#botonDatosComentarios').on('click', function () {
        let divDatosAfectados = $('#datosComentarios').css('height');
        $('#botonDatosComentarios').css('transition', 'all 0.4s ease-in-out');
        if (divDatosAfectados == '0px') {
            $('#datosComentarios').css('height', 'auto');
            $('#datosComentarios').css('display', 'block');
            $('#datosComentarios').removeClass('colapsarDiv');
            $('#botonDatosComentarios').css('transform', 'rotate(-180deg)');
        } else {
            $('#datosComentarios').css('height', '0px');
            $('#datosComentarios').css('display', 'none');
            $('#datosComentarios').addClass('colapsarDiv');
            $('#botonDatosComentarios').css('transform', 'rotate(0deg)');
        }
    });
};
