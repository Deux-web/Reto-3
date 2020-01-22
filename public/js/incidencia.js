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
};
