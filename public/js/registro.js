window.onload = function () {
    mostrarOcultarTecnico();
    /* ==================================== */
    /* PATRONES */
    /* ==================================== */

    //var patron_texto = new RegExp("/^([A-ZÁÉÍÓÚ]{1}[a-zñáéíóú]+[\\s]*)+$/");
    var patron_texto = new RegExp("^[a-z,A-Z]*$");
    var patron_telefono = new RegExp("/^(\\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}$/");

    $("#crear").click(function (e) {
        e.preventDefault();
        var tipo_usuario = $("#tipo_usuario").val();
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var apellido2 = $("#apellido2").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var password_confirm = $("#password-confirm").val();

        console.log(tipo_usuario, nombre, apellido, apellido2, email, password, password_confirm);

        var validarUsu = validarUsuario(tipo_usuario, nombre, apellido, apellido2, email, password, password_confirm);

        if (!validarUsu) {
            //alert("Hay campos vacíos o incorrectos. Por favor, revise los datos.");
        }

        if (tipo_usuario == "tecnico") {

            var datosTecnico = recogerDatosTecnico(telefono, provincia, centro);
            var validarTec = validarTecnico(telefono);
            if (!validarTec) {
                alert("El campo teléfono esta vacío o es erroneo.");
            }

        }
    });


    function recogerDatosTecnico() {
        var telefono = $("#telefono").val();
        var provincia = $("#provincia").val();
        var centro = $("#centro").val();

        var tecnico = [telefono, provincia, centro];
        return tecnico;
    }


    function validarUsuario(tipo_usuario, nombre, apellido, apellido2, email, password, password_confirm) {
        console.log("validando datos de usuario");

        if (patron_texto.test(tipo_usuario)) {
            if (patron_texto.test(nombre) && nombre.length > 3) {
                if (patron_texto.test(apellido) && apellido.length > 3) {
                    if (patron_texto.test(apellido2) && apellido2.length > 3) {
                        if (email !== '') {
                            if (password !== '') {
                                if (password_confirm !== '' && password_confirm === password) {
                                    return true;
                                } else {
                                    alert('Las contraseñas no coinciden')
                                }
                            } else {
                                alert('El campo de contraseña no puede quedar vacío')
                            }
                        } else {
                            alert('Email no válido')
                        }
                    } else {
                        alert('Apellido segundo no válido')
                    }
                } else {
                    alert('Apellido primero no válido')
                }
            } else {
                alert('Nombre no válido')
            }
        } else {
            alert('Tipo de usuario no válido');
        }
        return false;
    }

    function validarTecnico(telefono) {

        var tecnicoOk = true;

        if (telefono != "") {
            if (!validarTelefono(telefono)) {
                console.log("Telefono incorrecto");
                tecnicoOk = false;
            }

        }
        return tecnicoOk;
    }

    function validarTexto(nombre) {
        return patron_texto.test(nombre);
    }


    function validarTelefono(telefono) {
        return patron_telefono(telefono);
    }

    function mostrarOcultarTecnico() {

        var tipo_usuario = $("#tipo_usuario").val();

        if (tipo_usuario == "tecnico") {
            $(".tecnico").addClass('d-block', 'form-group', 'row').removeClass('d-none');
        } else {
            $(".tecnico").addClass('d-none').removeClass('d-block');
        }
    }

    mostrarOcultarTecnico();
    $('#tipo_usuario').on('change', function () {
        mostrarOcultarTecnico()
    });


}
