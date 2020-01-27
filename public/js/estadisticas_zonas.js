google.charts.load("current", {packages:["corechart"]});
google.charts.setOnLoadCallback(donutZonas);
function donutZonas() {
    var araba = parseInt($("#inc_araba").text());
    var gipuzkoa = parseInt($("#inc_gipuzkoa").text());
    var bizkaia = parseInt($("#inc_bizkaia").text());
    var nafarroa = parseInt($("#inc_nafarroa").text());


    var data = google.visualization.arrayToDataTable([
        ['Provincia', 'Nº Inc.'],
        ['Alava',     araba],
        ['Vizcaya',      bizkaia],
        ['Gipuzcoa',  gipuzkoa],
        ['Navarra', nafarroa]
    ]);

    var options = {
        title: 'Nº Inc. por zonas',
        pieHole: 0.3,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
}
