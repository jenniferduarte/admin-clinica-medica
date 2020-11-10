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
            console.log("error");
        }).always(function () {
            console.log("complete");
        });
    }


    // Mostrar tab ao abrir pela URL
    // $(document).ready(function () {
    //     if (location.hash) {
    //         $("a[href='" + location.hash + "']").tab("show");
    //     }
    //     $(document.body).on("click", "a[data-toggle='tab']", function (event) {
    //         location.hash = this.getAttribute("href");
    //     });
    // });
    // $(window).on("popstate", function () {
    //     var anchor = location.hash || $("a[data-toggle='tab']").first().attr("href");
    //     $("a[href='" + anchor + "']").tab("show");
    // });

});