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
    var count = parseInt(rowss) + 1;
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