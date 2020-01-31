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
    let nombres_columnas_tecnicos = ['Cod. Usuario', 'Nombre', 'Apellidos', 'Email', 'Telefono', 'Estado', 'Centro', 'Habilitado', 'Cambiar Habilitado'];
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

    //------------------------------------
    //------------------------------------
    //------------------------------------
    //------------------------------------
    //------------------------------------
    // Registro

    mostrarOcultarRol();
    comprobarNombre();
    comprobarApellido();
    comprobarApellido2();
    comprobarTelefono();
    comprobarPassword();
    comprobarEmail();

    //Esta opcion muestra y oculta los apartados del formulario de los tecnicos
    function mostrarOcultarRol(){
        $("#rol").on('change', function () {
            $("#rol option:selected").each(function () {
                if ($(this).val() === "TECNICO") {
                    $(".tecnico").addClass('d-block', 'form-group', 'row').removeClass('d-none');
                    $("#rol").removeClass('is-invalid');
                    $("#rol").addClass('is-valid');
                } else {
                    $(".tecnico").addClass('d-none').removeClass('d-block');
                    $("#rol").addClass('is-valid');
                }
            })
        })
    }
//Comprueba que el nombre este compuesto por letras
    function comprobarNombre(){
        $("#name").focusout(function (event) {
            let nombre = $("#name").val();

            let regex = /^[a-zA-Z ]{2,30}$/;

            if (regex.test(nombre)) {
                $("#name").removeClass('is-invalid');
                $("#name").addClass('is-valid');
                $("#texto_name").addClass("d-none");
                $("#texto_name").removeClass("d-block");
            } else {
                $("#name").removeClass('is-valid');
                $("#name").addClass('is-invalid');
                $("#texto_name").addClass("d-block");
                $("#texto_name").removeClass("d-none");
            }

        });
    }
//Comprueba que el apellido este comuesto por letras
    function comprobarApellido(){
        $("#apellido").focusout(function (event) {
            let apellido = $("#apellido").val();

            let regex = /^[a-zA-Z ]{2,30}$/;

            if (regex.test(apellido)) {
                $("#apellido").removeClass('is-invalid');
                $("#apellido").addClass('is-valid');
                $("#texto_apellido_p").addClass("d-none");
                $("#texto_apellido_p").removeClass("d-block");
            } else {
                $("#apellido").removeClass('is-valid');
                $("#apellido").addClass('is-invalid');
                $("#texto_apellido_p").addClass("d-block");
                $("#texto_apellido_p").removeClass("d-none");
            }
        });
    }
//Comprueba que el apellido este comuesto por letras
    function comprobarApellido2(){
        $("#apellido2").focusout(function (event) {
            let apellido2 = $("#apellido2").val();

            let regex = /^[a-zA-Z ]{2,30}$/;

            if (regex.test(apellido2)) {
                $("#apellido2").removeClass('is-invalid');
                $("#apellido2").addClass('is-valid');
                $("#texto_apellido_s").addClass("d-none");
                $("#texto_apellido_s").removeClass("d-block");
            } else {
                $("#apellido2").removeClass('is-valid');
                $("#apellido2").addClass('is-invalid');
                $("#texto_apellido_s").addClass("d-block");
                $("#texto_apellido_s").removeClass("d-none");
            }
        });
    }
//comprueba que el telefono sea español, empiece por 6-7-8-9 y que tenga los dígitos adecuados
    function comprobarTelefono(){
        $("#telefono").focusout(function (event) {
            let telefono = $("#telefono").val();

            let regex = /^(\+34|0034|34)?[6|7|8|9][0-9]{8}$/;

            if (regex.test(telefono)) {
                $("#telefono").removeClass('is-invalid');
                $("#telefono").addClass('is-valid');
            } else {
                $("#telefono").removeClass('is-valid');
                $("#telefono").addClass('is-invalid');
            }
        });
    }
//Comprueba que las contraseñas coincidan y que no esten vacias
    function comprobarPassword(){
        $("#password-confirm").focusout(function (event) {
            let pass = $("#password").val();
            let pass_con = $("#password-confirm").val();

            if (pass === pass_con && pass != "") {
                $("#password").removeClass('is-invalid');
                $("#password-confirm").removeClass('is-invalid');
                $("#password").addClass('is-valid');
                $("#password-confirm").addClass('is-valid');
                $("#texto_pass").addClass("d-none");
                $("#texto_pass").removeClass("d-block");


            } else {
                $("#password").removeClass('is-valid');
                $("#password-confirm").removeClass('is-valid');
                $("#password").addClass('is-invalid');
                $("#password-confirm").addClass('is-invalid');
                $("#texto_pass").addClass("d-block");
                $("#texto_pass").removeClass("d-none");
            }

        })
    }
//Comprueba que el email sea correcto
    function comprobarEmail(){

        $("#email").focusout(function (event) {
            let email = $("#email").val();

            let regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

            if (regex.test(email) && email != "") {
                $("#email").removeClass('is-invalid');
                $("#email").addClass('is-valid');
                $("#texto_email").addClass("d-none");
                $("#texto_email").removeClass("d-block");
            } else {
                $("#email").removeClass('is-valid');
                $("#email").addClass('is-invalid');
                $("#texto_email").addClass("d-block");
                $("#texto_email").removeClass("d-none");
            }
        });
    }
};
