window.onload = function () {
    console.log('holi');
    let div_otros = $('#esp_otros');
    let div_interurbano = $('#div_interurbano');
    let div_urbano = $('#div_urbano');

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
            div_interurbano.removeClass('d-flex').addClass('d-none');
            div_urbano.removeClass('d-none').addClass('d-flex');
        } else {
            div_interurbano.removeClass('d-none').addClass('d-flex');
            div_urbano.removeClass('d-flex').addClass('d-none');
        }
    }
};
