$.fn.reset = function () {
    $(this).each (function() { this.reset(); });
}

function decision(message, url){
    if(confirm(message)) location.href = url;
}
function confirmSubmit(form, message) { 
    var agree=confirm(message); 
    if (agree) {
        form.submit();
        return false; //de todas formas el link no se ejecutara
    } else {
        return false;
    } 
}

toastr.options = {
    closeButton: true,
    debug: false,
    newestOnTop: false,
    progressBar: false,
    positionClass: "toast-top-right",
    preventDuplicates: true,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut"
}

/* Initialize Boostrap Datatables Integration */
webApp.datatables();

var tablaData = $('#example-datatable').DataTable({
    "oLanguage": {
        "sLengthMenu": "Mostrar _MENU_ ",
        "sZeroRecords": "No existen datos para esta consulta",
        "sInfo": "Mostrando del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty": "Mostrando del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(De un maximo de _MAX_ registros)",
        "sSearch": "_INPUT_",
        "sEmptyTable": "No hay datos disponibles para esta tabla",
        "sLoadingRecords": "Por favor espere - Cargando...",  
        "sProcessing": "Actualmente ocupado",
        "sSortAscending": " - click/Volver a ordenar en orden Ascendente",
        "sSortDescending": " - click/Volver a ordenar en orden descendente",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Ultimo",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
    }
});

$('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Buscar');

$('.tooltip-error').click(function (e) {
    e.preventDefault();
    var message = "¿Está realmente seguro(a) de eliminar este registro?";
    var id = $(this).data('id');
    var form = $('#form-delete');
    var action = form.attr('action').replace('USER_ID', id);
    var rowss =  $(this).parents('tr').index();
    var count = parseInt(rowss) + parseInt(1);
    var rev = $(this).parents('tr').siblings('tr').length;
    if(confirm(message)) {
        $.post(action, form.serialize(), function(result) {
            if (result.success) {
                if(rev > 0){
                    tablaData.fnDeleteRow(count);
                }
                else if(rev == 0){
                    tablaData.fnDeleteRow(0);
                }
                toastr["success"](result.msg);
            } 
            else if (result.error) {
                toastr["error"](result.msg);
            }
        }, 'json');
    }
});

$('form#tutorForm').validate({
    errorClass: 'help-block', 
    errorElement: 'div',
    errorPlacement: function(error, e) {
        e.parents('.form-group > div').append(error);
    },
    highlight: function(e) {
        $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
        $(e).closest('.help-block').remove();
    },
    success: function(e) {
        // You can remove the .addClass('has-success') part if you don't want the inputs to get green after success!
        e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
        e.closest('.help-block').remove();
    },
    rules: {
        nombre: {
            required: true
        },
        apellido: {
            required: true
        },
        cedula: {
            required: true, 
            number:true
        },
        cargo: {
            required: true
        }
    },
    messages: {
        nombre: {
            required: 'Ingrese nombre'
        },
        apellido: {
            required: 'Ingrese apellido'
        },
        cedula: {
            required: 'Ingrese número de cédula', 
            number: 'Ingrese sólo números'
        },
        cargo: {
            required: 'Ingrese cargo'
        }
    },
    submitHandler: function () {
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#tutorForm")[0]);
        $.ajax({
            url:  $("form#tutorForm").attr('action'),
            type: $("form#tutorForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#tutorSubmit").addClass('disabled');
                $("button#cancelar").addClass('disabled');
            },
            success:function(response){
                var accion = '';
                var alertMessage = '';
                var count = 0;

                if(response.validations == false){
                    $.each(response.errors, function(index, value){
                        count++;
                        alertMessage+= count+". "+value+"<br>";
                    });
                    toastr["warning"](alertMessage);
                }
                else if(response.validations == true){
                    if($("button#tutorSubmit").attr('data') == 1)
                        accion = 'registrado';
                    else if($("button#tutorSubmit").attr('data') == 0)
                        accion = 'actualizado';
                    var alertMessage = 'Tutor '+accion+' satisfactoriamente';
                    toastr["success"](alertMessage);
                    if($("button#tutorSubmit").attr('data') == 1) {
                        $('form#tutorForm').reset();
                        $('.form-group').removeClass('has-success has-error');
                    }
                }             
                $("button#tutorSubmit").removeClass('disabled');
                $("button#cancelar").removeClass('disabled');
            }
        })
        return false;
    }
});

$('form#pasanteForm').validate({
    errorClass: 'help-block', 
    errorElement: 'div',
    errorPlacement: function(error, e) {
        e.parents('.form-group > div').append(error);
    },
    highlight: function(e) {
        $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
        $(e).closest('.help-block').remove();
    },
    success: function(e) {
        // You can remove the .addClass('has-success') part if you don't want the inputs to get green after success!
        e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
        e.closest('.help-block').remove();
    },
    rules: {
        nombre: {
            required: true
        },
        apellido: {
            required: true
        },
        cedula: {
            required: true, 
            number:true
        },
        empresa: {
            required: true
        }, 
        tutor: {
            required: true
        },
        inicio: {
            required: true
        },
        culminacion: {
            required: true
        },
        especialidad: {
            required: true
        }
    },
    messages: {
        nombre: {
            required: 'Ingrese nombre'
        },
        apellido: {
            required: 'Ingrese apellido'
        },
        cedula: {
            required: 'Ingrese número de cédula', 
            number: 'Ingrese sólo números'
        },
        empresa: {
            required: 'Seleccione empresa'
        }, 
        tutor: {
            required: 'Seleccione tutor'
        },
        inicio: {
            required: 'Ingrese fecha de inicio'
        },
        culminacion: {
            required: 'Ingrese fecha de culminación'
        },
        especialidad: {
            required: 'Ingrese especialidad'
        }
    },
    submitHandler: function () {
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#pasanteForm")[0]);
        $.ajax({
            url:  $("form#pasanteForm").attr('action'),
            type: $("form#pasanteForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#pasanteSubmit").addClass('disabled');
                $("button#cancelar").addClass('disabled');
            },
            success:function(response){
                var accion = '';
                var alertMessage = '';
                var count = 0;

                if(response.validations == false){
                    $.each(response.errors, function(index, value){
                        count++;
                        alertMessage+= count+". "+value+"<br>";
                    });
                    toastr["warning"](alertMessage);
                }
                else if(response.validations == true){
                    if($("button#pasanteSubmit").attr('data') == 1)
                        accion = 'registrado';
                    else if($("button#pasanteSubmit").attr('data') == 0)
                        accion = 'actualizado';
                    var alertMessage = 'Pasante '+accion+' satisfactoriamente';
                    toastr["success"](alertMessage);
                    if($("button#pasanteSubmit").attr('data') == 1) {
                        $('form#pasanteForm').reset();
                        $("select#empresa").chosen("destroy");
                        $("select#tutor").chosen("destroy");
                        $('.form-group').removeClass('has-success has-error');
                    }
                }             
                $("button#pasanteSubmit").removeClass('disabled');
                $("button#cancelar").removeClass('disabled');
            }
        })
        return false;
    }
});

$('form#empresaForm').validate({
    errorClass: 'help-block', 
    errorElement: 'div',
    errorPlacement: function(error, e) {
        e.parents('.form-group > div').append(error);
    },
    highlight: function(e) {
        $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
        $(e).closest('.help-block').remove();
    },
    success: function(e) {
        // You can remove the .addClass('has-success') part if you don't want the inputs to get green after success!
        e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
        e.closest('.help-block').remove();
    },
    rules: {
        nombre: {
            required: true
        },
        direccion: {
            required: true
        },
        correo: {
            required: true, 
            email:true
        },
        telefono: {
            required: true
        }, 
        contacto: {
            required: true
        },
        descripcion: {
            required: true
        }
    },
    messages: {
        nombre: {
            required: 'Ingrese nombre'
        },
        direccion: {
            required: 'Ingrese dirección'
        },
        correo: {
            required: 'Ingrese número de cédula', 
            email: 'Ingrese un correo válido'
        },
        telefono: {
            required: 'Ingrese teléfono'
        }, 
        contacto: {
            required: 'Ingrese nombre de persona de contacto'
        },
        descripcion: {
            required: 'Ingrese breve descripción de la empresa'
        }
    },
    submitHandler: function () {
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#empresaForm")[0]);
        $.ajax({
            url:  $("form#empresaForm").attr('action'),
            type: $("form#empresaForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#empresaSubmit").addClass('disabled');
                $("button#cancelar").addClass('disabled');
            },
            success:function(response){
                var accion = '';
                var alertMessage = '';
                var count = 0;

                if(response.validations == false){
                    $.each(response.errors, function(index, value){
                        count++;
                        alertMessage+= count+". "+value+"<br>";
                    });
                    toastr["warning"](alertMessage);
                }
                else if(response.validations == true){
                    if($("button#empresaSubmit").attr('data') == 1)
                        accion = 'registrada';
                    else if($("button#empresaSubmit").attr('data') == 0)
                        accion = 'actualizada';
                    var alertMessage = 'Empresa '+accion+' satisfactoriamente';
                    toastr["success"](alertMessage);
                    if($("button#empresaSubmit").attr('data') == 1) {
                        $('form#empresaForm').reset();
                        $('.form-group').removeClass('has-success has-error');
                    }
                }             
                $("button#empresaSubmit").removeClass('disabled');
                $("button#cancelar").removeClass('disabled');
            }
        })
        return false;
    }
});

$('form#usuarioForm').validate({
    errorClass: 'help-block', 
    errorElement: 'div',
    errorPlacement: function(error, e) {
        e.parents('.form-group > div').append(error);
    },
    highlight: function(e) {
        $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
        $(e).closest('.help-block').remove();
    },
    success: function(e) {
        // You can remove the .addClass('has-success') part if you don't want the inputs to get green after success!
        e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
        e.closest('.help-block').remove();
    },
    rules: {
        name: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        username: {
            required: true
        },
        password: {
            required: true
        },
        password_confirmation: {
            required: true,
            equalTo: "#password"
        },
        rol: {
            required: true
        }
    },
    messages: {
        name: {
            required: 'Ingrese nombre y apellido'
        },
        username: {
            required: 'Ingrese un nombre de usuario'
        },
        email: {
            required: 'Ingrese un email',
            email: 'Ingrese un email válido'
        },
        password: {
            required: 'Ingrese una contraseña'
        },
        password_confirmation: {
            required: 'Repita la contraseña',
            equalTo: 'Las contraseñas deben de ser iguales'
        },
        rol: {
            required: 'Seleccione un rol'
        }
    },
    submitHandler: function () {
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#usuarioForm")[0]);
        $.ajax({
            url:  $("form#usuarioForm").attr('action'),
            type: $("form#usuarioForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#usuarioSubmit").addClass('disabled');
                $("button#cancelar").addClass('disabled');
            },
            success:function(response){
                var accion = '';
                var alertMessage = '';
                var count = 0;

                if(response.validations == false){
                    $.each(response.errors, function(index, value){
                        count++;
                        alertMessage+= count+". "+value+"<br>";
                    });
                    toastr["warning"](alertMessage);
                }
                else if(response.validations == true){
                    if($("button#usuarioSubmit").attr('data') == 1)
                        accion = 'registrado';
                    else if($("button#usuarioSubmit").attr('data') == 0)
                        accion = 'actualizado';
                    var alertMessage = 'Usuario '+accion+' satisfactoriamente';
                    toastr["success"](alertMessage);
                    if($("button#usuarioSubmit").attr('data') == 1) {
                        $('form#usuarioForm').reset();
                        $('.form-group').removeClass('has-success has-error');
                    }
                }             
                $("button#usuarioSubmit").removeClass('disabled');
                $("button#cancelar").removeClass('disabled');
            }
        })
        return false;
    }
});

$('form#usuarioEditForm').validate({
    errorClass: 'help-block', 
    errorElement: 'div',
    errorPlacement: function(error, e) {
        e.parents('.form-group > div').append(error);
    },
    highlight: function(e) {
        $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
        $(e).closest('.help-block').remove();
    },
    success: function(e) {
        // You can remove the .addClass('has-success') part if you don't want the inputs to get green after success!
        e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
        e.closest('.help-block').remove();
    },
    rules: {
        name: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        username: {
            required: true
        },
        rol: {
            required: true
        }
    },
    messages: {
        name: {
            required: 'Ingrese nombre y apellido'
        },
        username: {
            required: 'Ingrese un nombre de usuario'
        },
        email: {
            required: 'Ingrese un email',
            email: 'Ingrese un email válido'
        },
        rol: {
            required: 'Seleccione un rol'
        }
    },
    submitHandler: function () {
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#usuarioEditForm")[0]);
        $.ajax({
            url:  $("form#usuarioEditForm").attr('action'),
            type: $("form#usuarioEditForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#usuarioEditSubmit").addClass('disabled');
                $("button#cancelar").addClass('disabled');
            },
            success:function(response){
                var accion = '';
                var alertMessage = '';
                var count = 0;

                if(response.validations == false){
                    $.each(response.errors, function(index, value){
                        count++;
                        alertMessage+= count+". "+value+"<br>";
                    });
                    toastr["warning"](alertMessage);
                }
                else if(response.validations == true){
                    if($("button#usuarioEditSubmit").attr('data') == 1)
                        accion = 'registrado';
                    else if($("button#usuarioEditSubmit").attr('data') == 0)
                        accion = 'actualizado';
                    var alertMessage = 'Usuario '+accion+' satisfactoriamente';
                    toastr["success"](alertMessage);
                    if($("button#usuarioEditSubmit").attr('data') == 1) {
                        $('form#usuarioEditForm').reset();
                        $('.form-group').removeClass('has-success has-error');
                    }
                }             
                $("button#usuarioEditSubmit").removeClass('disabled');
                $("button#cancelar").removeClass('disabled');
            }
        })
        return false;
    }
});

$("form#loginForm").validate({
    errorClass: 'help-block', 
    errorElement: 'div',
    errorPlacement: function(error, e) {
        e.parents('.form-group > div').append(error);
    },
    highlight: function(e) {
        $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
        $(e).closest('.help-block').remove();
    },
    success: function(e) {
        // You can remove the .addClass('has-success') part if you don't want the inputs to get green after success!
        e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
        e.closest('.help-block').remove();
    },
    rules: {
        username: {
            required: true
        },
        password: {
            required: true,
            minlength: 6
        }
    },
    messages: {
        username: {
            required: "Ingrese nombre de usuario"
        },
        password: {
            required: "Ingrese contraseña",
            minlength: "Debe ingresar al menos 6 caracteres"
        }
    },
    submitHandler: function () {
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#loginForm")[0]);
        $.ajax({
            url:  $("form#loginForm").attr('action'),
            type: $("form#loginForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#loginButton").addClass('disabled');
            },
            success:function(response){
                var alertMessage = 'Usuario o contraseña incorrectos';
                if(response.message == "error"){
                    toastr["error"](alertMessage);
                    $('button#loginButton').removeClass('disabled');
                } else{
                    window.location = 'http://'+window.location.host+"/orcopa";
                }
            }
        })
        return false;
    }
});

$('form#emailForm').validate({
    errorClass: 'help-block', 
    errorElement: 'div',
    errorPlacement: function(error, e) {
        e.parents('.form-group > div').append(error);
    },
    highlight: function(e) {
        $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
        $(e).closest('.help-block').remove();
    },
    success: function(e) {
        // You can remove the .addClass('has-success') part if you don't want the inputs to get green after success!
        e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
        e.closest('.help-block').remove();
    },
    rules: {
        email: {
            required: true,
            email: true
        }
    },
    messages: {
        email: {
            required: 'Ingrese un email',
            email: 'Ingrese un email válido'
        }
    }
});

$('form#changePasswordForm').validate({
    errorClass: 'help-block', 
    errorElement: 'div',
    errorPlacement: function(error, e) {
        e.parents('.form-group > div').append(error);
    },
    highlight: function(e) {
        $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
        $(e).closest('.help-block').remove();
    },
    success: function(e) {
        // You can remove the .addClass('has-success') part if you don't want the inputs to get green after success!
        e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
        e.closest('.help-block').remove();
    },
    rules: {
        email: {
            required: true,
            email: true
        },
        password: {
            required: true
        },
        password_confirmation: {
            required: true,
            equalTo: "#password"
        }
    },
    messages: {
        email: {
            required: 'Ingrese un email',
            email: 'Ingrese un email válido'
        },
        password: {
            required: 'Ingrese nueva contraseña'
        },
        password_confirmation: {
            required: 'Repita la nueva contraseña',
            equalTo: 'Las contraseñas deben de ser iguales'
        }
    }
});

$('form#passwordForm').validate({
    errorClass: 'help-block', 
    errorElement: 'div',
    errorPlacement: function(error, e) {
        e.parents('.form-group > div').append(error);
    },
    highlight: function(e) {
        $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
        $(e).closest('.help-block').remove();
    },
    success: function(e) {
        // You can remove the .addClass('has-success') part if you don't want the inputs to get green after success!
        e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
        e.closest('.help-block').remove();
    },
    rules: {
        password_actual: {
            required: true
        },
        password: {
            required: true,
            minlength: 6
        },
        password_confirmation: {
            required: true,
            equalTo: "#password"
        }
    },
    messages: {
        password_actual: {
            required: 'Ingrese su contraseña actual'
        },
        password: {
            required: "Ingrese su nueva contraseña",
            minlength: jQuery.validator.format("Debe ingresar al menos {0} caracteres")
        },
        password_confirmation: {
            required: 'Repita la nueva contraseña',
            equalTo: 'Las contraseñas deben de ser iguales'
        }
    },
    submitHandler: function (form) {
        var token = $("input[name=_token]").val();
        var formData = new FormData($("form#passwordForm")[0]);
        $.ajax({
            url:  $("form#passwordForm").attr('action'),
            type: $("form#passwordForm").attr('method'),
            headers: {'X-CSRF-TOKEN' : token},
            data: formData,
            processData: false,
            contentType: false,
            beforeSend:function(){
                $("button#passwordSubmit").addClass('disabled');
                $("button#cancelar").addClass('disabled');
            },
            success:function(response){
                var accion = '';
                var alertMessage = '';
                var count = 0;

                if(response.message == "error"){
                    toastr["error"]('La contraseña acutal ingresada es incorrecta.');
                }
                else if(response.message == "correcto"){
                    action = 'actualizada';
                    alertMessage = 'Contraseña '+action+' satisfactoriamente';
                    toastr["success"](alertMessage);
                    $('form#passwordForm').reset();
                    $(document).find('.validation-valid-label').remove();
                }
                $("button#passwordSubmit").removeClass('disabled');
                $("button#cancelar").removeClass('disabled');
            }
        })
        return false;
    },
    invalidHandler: function (form) {
    }
});