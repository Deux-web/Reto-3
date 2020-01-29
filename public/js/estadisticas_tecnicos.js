window.onload = function () {
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawTitleSubtitle);

    axios.get('/incidencias/tecnicos').then(res => {
        drawTitleSubtitle(res.data);
    })

}

function drawTitleSubtitle(datos) {
    var arrayDatos= new Array();
    arrayDatos.push(['Tecnico', 'Nº incidencias']);
    $.each( datos, function(i, obj) {
        arrayDatos.push([obj.nombre,obj.incidencias]);
    });
    console.log(arrayDatos);
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
}
