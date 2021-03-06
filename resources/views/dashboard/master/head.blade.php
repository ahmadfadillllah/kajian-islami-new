<!DOCTYPE html>
<html class="loading dark-layout" lang="en" data-layout="dark-layout" data-textdirection="ltr">
    <!-- BEGIN: Head-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
        <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <title>Dashboard - Kajian Islami</title>
        <link rel="apple-touch-icon" href="{{ asset('vuexy') }}/app-assets/images/ico/logo.png">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('vuexy') }}/app-assets/images/ico/logo.png">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/vendors/css/vendors.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/vendors/css/charts/apexcharts.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/vendors/css/extensions/toastr.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/css/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/css/colors.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/css/components.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/css/themes/dark-layout.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/css/themes/bordered-layout.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/css/themes/semi-dark-layout.css">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/css/core/menu/menu-types/vertical-menu.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/css/plugins/charts/chart-apex.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/css/plugins/extensions/ext-component-toastr.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/app-assets/css/pages/app-invoice-list.css">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy') }}/assets/css/style.css">
        <!-- END: Custom CSS-->

        {{-- SweeAlert 2 --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        {{-- Leaflet JS --}}
        <link
            rel="stylesheet"
            href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
            integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
            crossorigin=""/>
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

        <script>
            window.BASE_URL = "{{ url('/') }}";
        </script>
    </head>
    <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
