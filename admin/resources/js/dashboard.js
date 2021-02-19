$(document).ready(function () {

    // TODO: mudar esse id, deixar mais de acordo com seu contexto
    if ($('#dashboard').length > 0) {
        $.ajax({
            url: `/dashboard`,
            type: 'GET',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: 'json',
            data: { date: {} },
            processResults: function (response) { },
            cache: true
        }).done(function (data) {
            $('#attendances').html(data.records);
            $('#canceled_attendances').html(data.canceled_attendances);
            $('#doctors').html(data.doctors);
            $('#patients').html(data.patients);
            $('.info-box-number .fa-spin').addClass('d-none');
        }).fail(function (e) {
            console.log(e);
        }).always(function () {
            //
        });
    }


    if ($('#topSpecialties').length > 0) {
        $.ajax({
            url: `/top-specialties`,
            type: 'GET',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: 'json',
            data: { date: {} },
            processResults: function (response) { },
            cache: true
        }).done(function (data) {
            drawDoughnut(data.top_specialties);
           // $('.info-box-number .fa-spin').addClass('d-none');
        }).fail(function (e) {
            console.log(e);
        }).always(function () {
            //
        });

        function drawDoughnut(top_specialties)
        {
            occurences = [];
            specialties = [];

            $.each(top_specialties, function(i,v){
                occurences.push(v.value_occurrence);
                specialties.push(v.name);
            });

            var ctx = document.getElementById('topSpecialties');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    datasets: [{
                        data: occurences,
                        backgroundColor: [
                            'rgba(60, 20, 120, 0.4)',
                            'rgba(0, 30, 0, 0.3)',
                            'rgba(0, 100, 0, 0.4)',
                            'rgba(30, 0,240, 0.5)',
                            'rgba(0, 10, 80, 0.6)',
                        ],
                    }],
                    labels: specialties
                },
            });
        }
    }

    // Doctors per attendances
    if ($('#doctorsAttendances').length > 0) {

        $.ajax({
            url: `/doctors-attendances`,
            type: 'GET',
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            dataType: 'json',
            data: { date: {} },
            processResults: function (response) { },
            cache: true
        }).done(function (data) {

            drawBar(data.doctors_attendances);
            // $('.info-box-number .fa-spin').addClass('d-none');
        }).fail(function (e) {
            console.log(e);
        }).always(function () {
            //
        });

        function drawBar(doctors_attendances)
        {
            doctors = [];
            attendances = [];

            $.each(doctors_attendances, function (i, v) {

                doctors.push(v.name);
                attendances.push(v.value_occurrence);
            });

            new Chart(document.getElementById("bar-chart"), {
                type: 'bar',
                data: {
                    labels: doctors,
                    datasets: [
                        {
                            label: "Atendimentos realizados",
                            backgroundColor: [
                                'rgba(60, 20, 120, 0.6)',
                                'rgba(0, 30, 0, 0.6)',
                                'rgba(0, 100, 0, 0.6)',
                                'rgba(30, 0,240, 0.6)',
                                'rgba(0, 10, 80, 0.6)',
                            ],
                            data: attendances
                        }
                    ]
                },
                options: {
                    legend: { display: false },
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }

                }
            });
        }
    }
});
