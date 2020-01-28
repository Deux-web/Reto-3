window.onload = function () {
    verTodas();

}

function verTodas() {
    desmarcarTodo();
    $(".todas").addClass('active');
    verGraficos();
}

function verTecnicos() {
    desmarcarTodo();
    $(".tecnicos").addClass('active');
    verGraficoTecnico();
}

function verTiempos() {
    desmarcarTodo();
    $(".tiempos").addClass('active');
    verGraficoHoras();
}

function verFechas() {
    desmarcarTodo();
    $(".fechas").addClass('active');
    verGraficoFechas();
}

function verZonas() {
    desmarcarTodo();
    $(".zonas").addClass('active');
    verGraficoZonas();
}

function verResolucion() {
    desmarcarTodo();
    $(".resolucion").addClass('active');
    verGraficoResolucion();
}


function desmarcarTodo() {
    $(".todas").removeClass('active');
    $(".tecnicos").removeClass('active');
    $(".tiempos").removeClass('active');
    $(".fechas").removeClass('active');
    $(".zonas").removeClass('active');
    $(".resolucion").removeClass('active');
}

function ocultarGraficos() {
    $("#grafico_tecnico").addClass('d-none');
    $("#grafico_horas").addClass('d-none');
    $("#grafico_zonas").removeClass('d-flex');
    $("#grafico_zonas").removeClass('justify-content-center');
    $("#grafico_zonas").addClass('d-none');
    $("#grafico_fechas").addClass('d-none');
    $("#grafico_resolucion").addClass('d-none');
}

function verGraficoTecnico() {
    ocultarGraficos();
    $("#grafico_tecnico").removeClass('d-none');
}

function verGraficoHoras() {
    ocultarGraficos();
    $("#grafico_horas").removeClass('d-none');
}

function verGraficoZonas() {
    ocultarGraficos();
    $("#grafico_zonas").removeClass('d-none');
}

function verGraficoFechas() {
    ocultarGraficos();
    $("#grafico_fechas").removeClass('d-none');
}

function verGraficoResolucion() {
    ocultarGraficos();
    $("#grafico_resolucion").removeClass('d-none');
}
function verGraficos(){
    $("#grafico_tecnico").removeClass('d-none');
    $("#grafico_horas").removeClass('d-none');
    $("#grafico_zonas").removeClass('d-none');
    $("#grafico_fechas").removeClass('d-none');
    $("#grafico_resolucion").removeClass('d-none');

}
