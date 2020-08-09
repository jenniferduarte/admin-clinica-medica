<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ env('APP_NAME', 'SGCM') }} - @yield('page-name', '')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon.png">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link href="/css/app.css" rel="stylesheet">
    @yield('styles')
</head>

@yield('body')

<script src="/js/app.js"></script>

<script>
     $(".btn-delete").click(function() {
        excluir = confirm("Tem certeza que deseja excluir?");
        if (!excluir) {
            return false;
        }
    }); 

</script>

@if(Session::has('message'))
<script>
    var type = "{{ Session::get('alert-type', 'info') }}";
    toastr.options.progressBar = 'true';
    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;

        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;

        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;

        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }

</script>
@endif

@yield('javascript')

</body>

</html>
