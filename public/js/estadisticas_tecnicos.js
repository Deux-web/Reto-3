window.onload = function () {
    google.charts.load('current', {packages: ['corechart', 'bar']});
    google.charts.setOnLoadCallback(drawTitleSubtitle);

    var nombre_tecnicos = Array.from($(".nombre_tec"));
    nombre_tecnicos.forEach(value =>{
        console.log(value.textContent);
    });

    var n_inc = $("#n_inc");
    console.log(typeof(n_inc));


//console.log(nombre);

    function drawTitleSubtitle() {
        var data = google.visualization.arrayToDataTable([
            ['Tecnico', 'Nº incidencias'],
            ['Pepe', 817],
            ['Luis', 379],
            ['Marina', 269],
            ['Jon', 209],
            ['Ana', 152]
        ]);

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
}
