window.onload = function () {

    let th_cod = $('#th_cod');
    let th_afectado = $('#th_afectado');
    let th_contacto = $('#th_contacto');
    let th_tecnicoasignado = $('#th_tecnicoasignado');
    let th_tipo = $('#th_tipo');
    let th_lugar = $('#th_lugar');
    let th_estado = $('#th_estado');
    let th_fechacreacion = $('#th_fechacreacion');

    // let botones_operario = $('<a href="' + $("#ruta").val() + '" class="btn btn-primary" style="font-size: 125%;"> Nueva incidencia</a>');

    switch ($('#rol').val()) {
        case "OPERARIO":
            let botones_operario = $(
                '<a href="' + $("#ruta").val() + '" class="btn btn-primary col-md-5 col-12" style="font-size: 125%;">Nueva incidencia</a> '
            );
            $('#botones').append(botones_operario);
            break;
        case "TECNICO":
            let botones_tecnico = $(
                '<a href="' + $("#ruta").val() + '" class="btn btn-primary col-md-5 col-12" style="font-size: 125%;">Mis incidencias</a>'
            );
            $('#botones').append(botones_tecnico);
            break;
        case "COORDINADOR_GERENTE":
            let botones_coordinador = $(
                '<a href="' + $("#ruta").val() + '" class="btn btn-primary col-md-5 col-12 mr-1 mb-1 mb-md-0" style="font-size: 125%;">Estadísticas</a>' +
                '<a href="' + $("#ruta2").val() + '" class="btn btn-primary col-md-5 col-12" style="font-size: 125%;">Crear usuarios</a>'
            );
            $('#botones').append(botones_coordinador);
            break;
    }

    let columnas = [th_cod, th_afectado, th_contacto, th_tecnicoasignado, th_tipo, th_lugar, th_estado, th_fechacreacion];
    columnas.forEach(value => {
        value.css('user-select', 'none');
    });
    let nombres_columnas = ['Cod. Incidencia', 'Afectado', 'Contacto', 'Tecnico Asignado', 'Tipo', 'Lugar', 'Estado', 'Fecha de creacion'];

    th_cod.on('click', function (event) {
        sortTable(0, event);
    });

    th_afectado.on('click', function (event) {
        sortTable(1, event);
    });

    th_contacto.on('click', function (event) {
        sortTable(2, event);
    });

    th_tecnicoasignado.on('click', function (event) {
        sortTable(3, event);
    });

    th_tipo.on('click', function (event) {
        sortTable(4, event);
    });

    th_lugar.on('click', function (event) {
        sortTable(5, event);
    });

    th_estado.on('click', function (event) {
        sortTable(6, event);
    });

    th_fechacreacion.on('click', function (event) {
        sortTable(7, event);
    });

    function sortTable(n, event) {
        resetearNombres();
        let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = $('#tabla_incidencias');
        switching = true;
        dir = "asc";
        while (switching) {
            switching = false;
            rows = table.children('tbody').children('tr');
            for (i = 0; i < (rows.length - 1); i++) {
                shouldSwitch = false;
                x = rows[i].getElementsByTagName("td")[n];
                y = rows[i + 1].getElementsByTagName("td")[n];
                if (dir === "asc") {
                    let columna = $('#' + event.target.id);
                    columna.text(nombres_columnas[n] + ' ↑');
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir === "desc") {
                    let columna = $('#' + event.target.id);
                    columna.text(nombres_columnas[n] + ' ↓');
                    if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
            }
            if (shouldSwitch) {
                rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                switching = true;
                switchcount++;
            } else {
                if (switchcount === 0 && dir === "asc") {
                    dir = "desc";
                    switching = true;
                }
            }
        }
    }

    function resetearNombres() {
        columnas.forEach((value, index) => {
            value.text(nombres_columnas[index]);
        })
    }
};
