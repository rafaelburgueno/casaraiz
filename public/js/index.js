//$(function () {
$(document).ready(function(){
    //console.log("el modal se esta mostrando");
    $("[data-toggle='tooltip']").tooltip();
    $("[data-toggle='popover']").popover();

    $('.carousel').carousel({
        interval: 2000
    });
    $('#contacto').on('show.bs.modal', function () {
        console.log("el modal se esta mostrando");

        $('#contactobtn').removeClass('btn btn-success');
        $('#contactobtn').addClass('btn btn-dark');
        $('#contacto').prop('disabled', true);
    });

    $('#contacto').on('shown.bs.modal', function () {
        console.log("el modal se mostro");
    });
    $('#contacto').on('hide.bs.modal', function () {
        console.log("el modal se oclta");
    }); 
    
    $('#contacto').on('hidden.bs.modal', function () {
        console.log("el modal se oculto");
        $('#contactobtn').prop('disabled', true);
        $('#contactobtn').removeClass('btn btn-danger');
        $('#contactobtn').addClass('btn btn-success');
    });
});




/* VELIDACION PARA LOS FORMULARIOS DE INSCRIPCION 'comunidad_raiz', 'talleres', 'agenda' y 'productos' */
function validateForm(id) {
            
    var nombre = document.getElementById("nombre"+id).value;
    var apellido = document.getElementById("apellido"+id).value;
    var correo = document.getElementById("correo"+id).value;
    var documento = document.getElementById("documento"+id).value;
    var telefono = document.getElementById("telefono"+id).value;
    //var medio_de_pago = document.getElementById("medio_de_pago"+id).value; //TODO: validar el medio de pago
    
    if (nombre == "" || apellido == "" || correo == "" || documento == ""  || telefono == "" ) 
    {
        alert("Debe rellenar todos los campos.");
        event.preventDefault();
      return false;
    } 
    else
    {
        console.log('validación exitosa!');
        return true;
    }
    
  }