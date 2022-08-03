$(function () {
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
    }); $('#contacto').on('hidden.bs.modal', function () {
        console.log("el modal se oculto");
        $('#contactobtn').prop('disabled', true);
        $('#contactobtn').removeClass('btn btn-danger');
        $('#contactobtn').addClass('btn btn-success');
    });
});
