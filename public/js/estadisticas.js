window.onload = function () {
    verTodas();
    drawChart();
    drawTitleSubtitle();
    donutZonas();
}

//estadistica Tecnico

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawTitleSubtitle);

//estadistica tipo resolucion

google.charts.load('current', {packages: ['corechart']});
google.charts.setOnLoadCallback(drawChart);

//estadisticas provincia

google.charts.load("current", {packages: ["corechart"]});
google.charts.setOnLoadCallback(donutZonas);

/**
 * Funcion para estadistica de tecnico
 */
function drawTitleSubtitle() {
    axios.get('/incidencias/tecnicos').then(res => {
        var arrayDatos= new Array();
        arrayDatos.push(['Tecnico', 'Nº incidencias']);
        $.each( res.data, function(i, obj) {
            arrayDatos.push([obj.nombre,obj.incidencias]);
        });
        var data = google.visualization.arrayToDataTable(
            arrayDatos
        );

        var materialOptions = {
            chart: {
                title: 'Incidencias resueltas por técnico',
                subtitle: 'Esta estadística se actualiza automáticamente'
            },
            hAxis: {
                title: 'Numero de incidencias',
                minValue: 0,
            },
            vAxis: {
                title: 'Técnico'
            },
            bars: 'vertical'
        };
        var materialChart = new google.charts.Bar(document.getElementById('chart_div'));
        materialChart.draw(data, materialOptions);
    })
}


/**
 * Funcion para estadistica de tipo resolucion
 */
function drawChart() {
    var taller;
    var insitu;
    axios.get('/incidencias/tipo_resolucion').then(res => {
        $.each(res.data, function (i, obj) {
            if (obj.tipo_resolucion == 'In situ') {
                insitu = obj.numero_incidencias;
            } else if (obj.tipo_resolucion == 'Taller') {
                taller = obj.numero_incidencias;
            }
        });
        var numero_incis = insitu + taller;
        var porcentaje_taller = (taller * 100) / numero_incis;
        var procentaje_insitu = parseInt(insitu * 100 / numero_incis);
        var resto_incis = parseInt((100 - (porcentaje_taller + procentaje_insitu)));

        // Define the chart to be drawn.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Element');
        data.addColumn('number', 'Percentage');


        data.addRows([
            ['Taller', porcentaje_taller],
            ['In-Situ', procentaje_insitu]
        ]);

        // Set chart options


        // Instantiate and draw the chart.
        var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));
        chart.draw(data, null);
    })
}

/**
 * Funcion para estadistica de provincias
 */
function donutZonas() {
    axios.get('/incidencias/provincias').then(res => {
        var araba;
        var gipuzkoa;
        var bizkaia;
        var nafarroa;
        $.each(res.data, function (i, obj) {
            switch (obj.direccion) {
                case 'Araba':
                    araba=obj.numero_incidencias;
                    break;
                case 'Bizkaia':
                    gipuzkoa=obj.numero_incidencias;
                    break;
                case 'Gipuzkoa':
                    bizkaia=obj.numero_incidencias;
                    break;
                case 'Nafarroa':
                    nafarroa=obj.numero_incidencias;
                    break;
            }
        });
        var data = google.visualization.arrayToDataTable([
            ['Provincia', 'Nº Inc.'],
            ['Alava', araba],
            ['Vizcaya', bizkaia],
            ['Gipuzcoa', gipuzkoa],
            ['Navarra', nafarroa]
        ]);

        var options = {
            title: 'Nº Inc. por zonas',
            pieHole: 0.3,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
    });

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
