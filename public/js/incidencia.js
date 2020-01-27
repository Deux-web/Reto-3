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

    comprobarRadios();

    function comprobarRadios() {
        if (rb_insitu.is(':checked')) {
            res_taller.addClass('d-none').removeClass('d-block');
            res_insitu.addClass('d-block').removeClass('d-none');
        } else {
            res_taller.addClass('d-block').removeClass('d-none');
            res_insitu.addClass('d-none').removeClass('d-block');
        }
    }
    axios.get('/centros/'+$('#centro_id').text())
        .then(function (response) {
            console.log(response.data);
            $.each(response.data, function (index) {
                if (response.data[index].estado == 'Disponible') {
                    $('#tbodyTecnicos').append(
                        '<tr>' +
                        '<td>' + response.data[index].nombre + ' ' + response.data[index].apellido_p + ' ' + response.data[index].apellido_s + '</td>' +
                        '<td>' + response.data[index].estado + '</td>' +
                        '<td><input type="radio" name="tecnico_id" id="' + response.data[index].id + '" value="' + response.data[index].id + '"></td>' +
                        '</tr>'
                    )
                } else {
                    $('<h5>No hay técnicos disponibles</h5>').insertBefore($('#tablaTecnicos'));
                    $('#tablaTecnicos').remove();

                }
            })
        });
};
