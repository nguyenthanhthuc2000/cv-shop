
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Web UI Kit &amp; Dashboard Template based on Bootstrap">
    <meta name="author" content="AdminKit">
    <meta name="keywords" content="adminkit, bootstrap, web ui kit, dashboard template, admin template">
    @routes()
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('_admin/img/icons/icon-48x48.png') }}" />
    <title>Admin {{ $setting->domain }}</title>
    <link href="{{ asset('_admin/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('_admin/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/css/sweetalert2.min.css') }}" rel="stylesheet">

</head>
