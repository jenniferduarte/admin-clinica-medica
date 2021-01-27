$(document).ready(function () {

    $(".update-attendance-status").click(function () {

        confirm = confirm("Tem certeza que deseja cancelar?");
        if (!confirm) {
            return false;
        }

        $attendance_id = $(this).data('attendance');
        $status_id = $(this).data('status');

        updateStatus($attendance_id, $status_id);
    });

    function updateStatus(attendance, status)
    {
        $('.overlay.d-none').removeClass('d-none');
        $.ajax({
            url: `/attendances/${attendance}/status/${status}`,
            type: 'PUT',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            data: {date: {}},
            processResults: function (response) { },
            cache: true
        }).done(function (data) {
            window.location.href;
            location.reload();
        }).fail(function () {
            alert("Ocorreu um erro. Por favor, tente novamente mais tarde.");
        }).always(function () {
            //
        });
    }

});
