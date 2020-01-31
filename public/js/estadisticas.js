window.onload = function () {
    verTodas();
    tipoResolucion();
    numIncidenciasPorTecnico();
    tiempoResolucion();
    zonasResolucion();
    calendarioIncidencias();
}

//estadistica Tecnico

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(numIncidenciasPorTecnico);

//estadistica tiempo resolucion

google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(tiempoResolucion);

//estadistica tipo resolucion

google.charts.load('current', {packages: ['corechart']});
google.charts.setOnLoadCallback(tipoResolucion);

//estadisticas provincia

google.charts.load("current", {packages: ["corechart"]});
google.charts.setOnLoadCallback(zonasResolucion);

//estadisticas calendario
google.charts.load("current", {packages: ["calendar"]});
google.charts.setOnLoadCallback(calendarioIncidencias);


/**
 * Funcion para estadistica de tecnico
 */
function numIncidenciasPorTecnico() {
    axios.get('/incidencias/tecnicos').then(res => {
        var arrayDatos = new Array();
        arrayDatos.push(['Tecnico', 'Nº incidencias']);
        $.each(res.data, function (i, obj) {
            arrayDatos.push([obj.nombre, obj.incidencias]);
        });
        var data = google.visualization.arrayToDataTable(
            arrayDatos
        );

        var materialOptions = {
            chart: {
                title: 'Incidencias resueltas por técnico'
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
 * Funcion para estadistica de media resolucion incidencias
 */
function tiempoResolucion() {
    axios.get('/incidencias/tiempos').then(res => {
        var arrayDatos = new Array();
        arrayDatos.push(['Técnico', 'Media de tiempo de resolución']);
        $.each(res.data, function (i, obj) {
            arrayDatos.push([obj.nombre, obj.tiempoResolucion]);
        });
        var data = google.visualization.arrayToDataTable(
            arrayDatos
        );

        var materialOptions = {
            chart: {
                title: 'Tiempo medio de incidencias por técnico en minutos'
            },
            hAxis: {
                title: 'Media de minutos por incidencia',
                minValue: 0,
            },
            vAxis: {
                title: 'Técnico'
            },
            bars: 'horizontal'
        };
        var materialChart = new google.charts.Bar(document.getElementById('media_div'));
        materialChart.draw(data, materialOptions);
    })
}

/**
 * Funcion para estadistica de tipo resolucion
 */
function tipoResolucion() {
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
        // Define the chart to be drawn.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Element');
        data.addColumn('number', 'Percentage');
        data.addRows([
            ['Taller', taller],
            ['In Situ', insitu]
        ]);
        // Set chart options
        var options = {
            title: 'Resolución',
            is3D: true,
        };
        // Instantiate and draw the chart.
        var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));
        chart.draw(data, options);
    })
}

/**
 * Funcion para estadistica de provincias
 */
function zonasResolucion() {
    axios.get('/incidencias/provincias').then(res => {
        var araba;
        var gipuzkoa;
        var bizkaia;
        var nafarroa;
        $.each(res.data, function (i, obj) {
            switch (obj.direccion) {
                case 'Araba':
                    araba = obj.numero_incidencias;
                    break;
                case 'Bizkaia':
                    gipuzkoa = obj.numero_incidencias;
                    break;
                case 'Gipuzkoa':
                    bizkaia = obj.numero_incidencias;
                    break;
                case 'Nafarroa':
                    nafarroa = obj.numero_incidencias;
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

/*
* Funcion para estadisticas calendario
* */
function calendarioIncidencias() {
    axios.get('/incidencias/calendario').then(res => {
        var arrayFechas = new Array();
        var year;
        var mes;
        var dia;
        var fecha;
        var dataTable = new google.visualization.DataTable();
        dataTable.addColumn({type: 'date', id: 'Date'});
        dataTable.addColumn({type: 'number', id: 'Won/Loss'});
        $.each(res.data, function (i, obj) {
            arrayFechas.push([obj.num_inc, obj.fecha_resolucion]);
            fecha = obj.fecha_resolucion.split("-");
            //alert(fecha);
            year = fecha[0];
            mes = fecha[1] - 1;
            dia = fecha[2];
            dataTable.addRows([
                [new Date(year, mes, dia), obj.num_inc],
            ]);
        });
        var chart = new google.visualization.Calendar(document.getElementById('calendar_basic'));
        var options = {
            title: 'Incidencias por día',
            height: 350,
            calendar: {
                monthLabel: {
                    fontName: 'Heebo',
                    fontSize: 8,
                    color: 'black'
                }, noDataPattern: {
                    backgroundColor: '#76a7fa',
                    color: '#a0c3ff'
                },
                monthOutlineColor: {
                    stroke: '#981b48',
                    strokeOpacity: 0.8,
                    strokeWidth: 2
                },
                unusedMonthOutlineColor: {
                    stroke: '#bc5679',
                    strokeOpacity: 0.8,
                    strokeWidth: 1
                },
                underMonthSpace: 16,
            }
        };
        chart.draw(dataTable, options);
    })
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

function verGraficos() {
    $("#grafico_tecnico").removeClass('d-none');
    $("#grafico_horas").removeClass('d-none');
    $("#grafico_zonas").removeClass('d-none');
    $("#grafico_fechas").removeClass('d-none');
    $("#grafico_resolucion").removeClass('d-none');

}
