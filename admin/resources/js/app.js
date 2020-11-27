const { includes, clone } = require('lodash');

require('./bootstrap');
require('datatables.net');
require('datatables.net-responsive');
require('datatables.net-bs4');
require('jquery-mask-plugin');
require('./mask');
require('select2');
require('bootstrap-switch');
require('tempusdominus-bootstrap-4');
require('daterangepicker');
require('./fullcalendar.js');
require('./attendance.js');
import bsCustomFileInput from 'bs-custom-file-input';


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
        $(".cnpj").unmask();
    });

    $(".goback").click(function (e) {
        e.preventDefault;
        window.history.back();
    });


    if ($('.select2-medicaments').length > 0) {
        $('.select2-medicaments').select2({
            placeholder: "Selecione"
        });
    }

    $(".clone-medicaments").click(function (e) {
        $('.select2-medicaments').select2("destroy");
        $clone = $('.row.medicaments').first().clone(true);
        $clone.closest('.remove-medicament').removeClass('hide');
        $clone.find('.dosage').val('');
        $('#medicaments-selections').append($clone);
        $('.select2-medicaments').select2({placeholder: "Selecione"});
    });

    $(".remove-medicament").click(function (e){
        medicaments = $(this).closest('.medicaments');
        medicaments.closest('.select2-medicaments').select2('destroy');
        medicaments.remove();
    });

    bsCustomFileInput.init()

});
