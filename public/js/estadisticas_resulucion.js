window.onload = function () {
    drawChart();
}


google.charts.load('current', {packages: ['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var taller = parseInt($("#taller").text());
    var insitu = parseInt($("#insitu").text());
    var numero_incis = parseInt($("#total_incidencias").text());


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
}
