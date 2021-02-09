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
require('./dashboard.js');
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
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Portuguese-Brasil.json"
                },
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
        $(".cep");
        $(this).find('button[type=submit]').prop('disabled', true);
    });

    $(".goback").click(function (e) {
        e.preventDefault;
        window.history.back();
    });

    $(".btn-print").click(function (e) {
        e.preventDefault;
        window.print();
    });


    if ($('.select2-medicaments').length > 0) {
        $('.select2-medicaments').select2({
            placeholder: "Selecione"
        });
    }


    bsCustomFileInput.init()

});
