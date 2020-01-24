window.onload = function () {

    mostrarOcultarRol();
    comprobarNombre();
    comprobarApellido();
    comprobarApellido2();
    comprobarUsuario();
    comprobarTelefono();
    comprobarPassword();
    comprobarEmail();

    

    /*
        $("#crear").click(function (e) {
            var rol = $("#rol").val();
            var nombre = $("#nombre").val();
            var apellido = $("#apellido").val();
            var apellido2 = $("#apellido2").val();
            var email = $("#email").val();
            var password = $("#password").val();
            var password_confirm = $("#password-confirm").val();

            console.log(rol, nombre, apellido, apellido2, email, password, password_confirm);

            var validarUsu = validarUsuario(rol, nombre, apellido, apellido2, email, password, password_confirm);

            if (!validarUsu) {
                //alert("Hay campos vacíos o incorrectos. Por favor, revise los datos.");
            }

            if (rol == "tecnico") {

                var datosTecnico = recogerDatosTecnico(telefono, provincia, centro);
                var validarTec = validarTecnico(telefono);
                if (!validarTec) {
                    alert("El campo teléfono esta vacío o es erroneo.");
                }

            }
        });
    */

    /*
        function recogerDatosTecnico() {
            var telefono = $("#telefono").val();
            var provincia = $("#provincia").val();
            var centro = $("#centro").val();

            var tecnico = [telefono, provincia, centro];
            return tecnico;
        }
    */

    /*

        function validarUsuario(rol, nombre, apellido, apellido2, email, password, password_confirm) {
            console.log("validando datos de usuario");

            if (patron_texto.test(rol)) {
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
    */
    /*
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
    */
    /*
        function validarTexto(nombre) {
            return patron_texto.test(nombre);
        }
    */
    /*
        function validarTelefono(telefono) {
            return patron_telefono(telefono);
        }
    */

}
//Esta opcion muestra y oculta los apartados del formulario de los tecnicos
function mostrarOcultarRol(){
    $("#rol").on('change', function () {
        $("#rol option:selected").each(function () {
            if ($(this).val() == "TECNICO") {
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
        var nombre = $("#name").val();

        var regex = /^[a-zA-Z ]{2,30}$/;

        if (regex.test(nombre)) {
            console.log("Nombre correcto");
            $("#name").removeClass('is-invalid');
            $("#name").addClass('is-valid');
            $("#texto_name").addClass("d-none");
            $("#texto_name").removeClass("d-block");
        } else {
            console.log("Nombre incorrecto");
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
        var apellido = $("#apellido").val();

        var regex = /^[a-zA-Z ]{2,30}$/;

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
        var apellido2 = $("#apellido2").val();

        var regex = /^[a-zA-Z ]{2,30}$/;

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
//Comprueba que el usuario este comuesto por letras
function comprobarUsuario(){
    $("#usuario").focusout(function (event) {
        var usuario = $("#usuario").val();

        var regex = /^[a-zA-Z ]{2,30}$/;

        if (regex.test(usuario)) {
            $("#usuario").removeClass('is-invalid');
            $("#usuario").addClass('is-valid');
            $("#texto_usuario").addClass("d-none");
            $("#texto_usuario").removeClass("d-block");
        } else {
            $("#usuario").removeClass('is-valid');
            $("#usuario").addClass('is-invalid');
            $("#texto_usuario").addClass("d-block");
            $("#texto_usuario").removeClass("d-none");
        }
    });
}
//comprueba que el telefono sea español, empiece por 6-7-8-9 y que tenga los dígitos adecuados
function comprobarTelefono(){
    $("#telefono").focusout(function (event) {
        var telefono = $("#telefono").val();

        var regex = /^(\+34|0034|34)?[6|7|8|9][0-9]{8}$/;

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
        var pass = $("#password").val();
        var pass_con = $("#password-confirm").val();

        if (pass == pass_con && pass != "") {
            console.log("iGUALES");
            $("#password").removeClass('is-invalid');
            $("#password-confirm").removeClass('is-invalid');
            $("#password").addClass('is-valid');
            $("#password-confirm").addClass('is-valid');
            $("#texto_pass").addClass("d-none");
            $("#texto_pass").removeClass("d-block");


        } else {
            console.log("mAL");
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
        var email = $("#email").val();

        var regex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

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
