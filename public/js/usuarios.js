window.onload = function () {

    let tabla_usuarios = $('#tabla_usuarios');
    let tabla_tecnicos = $('#tabla_tecnicos');

    // Columnas user
    let th_cod_u = $('#th_cod_u');
    let th_nombre_u = $('#th_nombre_u');
    let th_apellidos_u = $('#th_apellidos_u');
    let th_email_u = $('#th_email_u');
    let th_rol_u = $('#th_rol_u');
    let th_habilitado_u = $('#th_habilitado_u');
    let th_cambiarHablitado_u = $('#th_cambiarHablitado_u');

    let columnas_user = [th_cod_u, th_nombre_u, th_apellidos_u, th_email_u, th_rol_u, th_habilitado_u,
        th_cambiarHablitado_u];
    let nombres_columnas_user = ['Cod. Usuario', 'Nombre', 'Apellidos', 'Email', 'Rol', 'Habilitado', 'Cambiar Habilitado'];
    columnas_user.forEach((value, index) => {
        value.css('user_select', 'none');
        value.on('click', function (event) {
            sortTable(index, event, tabla_usuarios, columnas_user, nombres_columnas_user);
        })
    });


    // Columnas técnicos
    let th_cod_t = $('#th_cod_t');
    let th_nombre_t = $('#th_nombre_t');
    let th_apellidos_t = $('#th_apellidos_t');
    let th_email_t = $('#th_email_t');
    let th_telefono_t = $('#th_telefono_t');
    let th_estado_t = $('#th_estado_t');
    let th_centro_t = $('#th_centro_t');
    let th_habilitado_t = $('#th_habilitado_t');
    let th_cambiarHablitado_t = $('#th_cambiarHablitado_t');

    let columnas_tecnicos = [th_cod_t, th_nombre_t, th_apellidos_t, th_email_t, th_telefono_t, th_estado_t, th_centro_t,
        th_habilitado_t, th_cambiarHablitado_t];
    let nombres_columnas_tecnicos = ['Cod. Usuario', 'Nombre', 'Apellidos', 'Email', 'Telefono', 'Estado', 'Habilitado', 'Centro', 'Cambiar Habilitado'];
    columnas_tecnicos.forEach((value, index) => {
        value.css('user_select', 'none');
        value.on('click', function (event) {
            sortTable(index, event, tabla_tecnicos, columnas_tecnicos, nombres_columnas_tecnicos);
        })
    });

    // Nombres de las columnas a su estado normal
    function resetearNombres(array, arraynombres) {
        array.forEach((value, index) => {
            value.text(arraynombres[index]);
        })
    }

    // Ordenar tablas
    function sortTable(n, event, tabla, array, array_nombres) {
        resetearNombres(array, array_nombres);
        let table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
        table = tabla;
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
                    columna.text(array_nombres[n] + ' ↑');
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                } else if (dir === "desc") {
                    let columna = $('#' + event.target.id);
                    columna.text(array_nombres[n] + ' ↓');
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
