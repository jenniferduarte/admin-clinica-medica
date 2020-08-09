require('./bootstrap');
require('datatables.net');
require('datatables.net-responsive');
require('datatables.net-bs4');
require('jquery-mask-plugin');
require('./mask');
require('./fileinput');
require('bootstrap-colorpicker');
require('ekko-lightbox');
require('select2');
require('bootstrap-switch'); 

$(document).ready(function () {

    // Files to be deleted
    $(function () {
        $ids = [];
        $('.btn-delete-file').on('click', function (e) {
            $(e.target).closest('.col-sm-2').fadeOut();
            $fileId = $(e.target).data('id');
            $ids.push($fileId);
            $('#file_deleted').val($ids);
        });
    })

    // Starts Select2
    if ($('.select2').length > 0) {
        $('.select2').select2();
    }   

    // Starts DataTable
    if ($('.datatable').length > 0) {
        $(function () {
            $('.datatable').DataTable({
                "paging": true
                , "lengthChange": false
                , "searching": true
                , "ordering": true
                , "info": true
                , "autoWidth": false
                , "responsive": true
                ,
            });
        });
    } 

    // Bootstrap Switch
    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

});