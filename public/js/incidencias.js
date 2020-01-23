window.onload = function () {

    let th_cod = $('#th_cod');
    let th_afectado = $('#th_afectado');
    let th_contacto = $('#th_contacto');
    let th_tecnicoasignado = $('#th_tecnicoasignado');
    let th_tipo = $('#th_tipo');
    let th_lugar = $('#th_lugar');
    let th_estado = $('#th_estado');
    let th_fechacreacion = $('#th_fechacreacion');

    th_cod.on('click',function () {
       sortTable(0);
    });

    th_afectado.on('click',function () {
        sortTable(1);
    });

    th_contacto.on('click',function () {
        sortTable(2);
    });

    th_tecnicoasignado.on('click',function () {
        sortTable(3);
    });

    th_tipo.on('click',function () {
        sortTable(4);
    });

    th_lugar.on('click',function () {
        sortTable(5);
    });

    th_estado.on('click',function () {
        sortTable(6);
    });

    th_fechacreacion.on('click',function () {
        sortTable(7);
    });

    function sortTable(n) {
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
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir === "desc") {
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
};
