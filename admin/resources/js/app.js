require('./bootstrap');
require('datatables.net');
require('datatables.net-responsive');
require('datatables.net-bs4');
require('jquery-mask-plugin');
require('./mask');
//require('./fileinput');
//require('bootstrap-colorpicker');
//require('ekko-lightbox');
require('select2');
require('bootstrap-switch'); 

$(document).ready(function () {

    // Inicializa o  Select2
    if ($('.select2').length > 0) {
        $('.select2').select2({
            placeholder: "Selecione"
        });
    }   

    // Inicializa o DataTable
    if ($('.datatable').length > 0) {
        $(function () {
            $('.datatable').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "order": [[ 0, "desc" ]]
            });
        });
    } 

    // Bootstrap Switch
    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

    // Limpa as máscaras antes do submit
    $("form").submit(function() {
        $(".date").unmask();
        $(".cpf").unmask();
        $(".phone_with_ddd").unmask();
    });

});