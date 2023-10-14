<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>WEB GIS</title>

    {{-- CUSTOM STYLE --}}
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />

    {{-- LEAFLET --}}
    <link rel="stylesheet" type="text/css" href={{ URL::asset('lib/leaflet.css') }}>
    <link rel="stylesheet" type="text/css" href={{ URL::asset('lib/leaflet.draw.css') }}>
    <script type="text/javascript" src={{ URL::asset('lib/leaflet.js') }}></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/0.4.2/leaflet.draw.js"></script>

    {{-- TABBY --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/gh/cferdinandi/tabby/dist/css/tabby-ui.min.css">
    <script src="https://cdn.jsdelivr.net/gh/cferdinandi/tabby/dist/js/tabby.polyfills.min.js"></script>

    {{-- FONT --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href={{ URL::asset('guetella/assets/vendors/bootstrap/dist/css/bootstrap.min.css') }} rel="stylesheet">
    <!-- Font Awesome -->
    <link href={{ URL::asset('guetella/assets/vendors/font-awesome/css/font-awesome.min.css') }} rel="stylesheet">
    <!-- Datatables -->
    <link href={{ URL::asset('guetella/assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}
        rel="stylesheet">
    <link href={{ URL::asset('guetella/assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}
        rel="stylesheet">
    <link
        href={{ URL::asset('guetella/assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}
        rel="stylesheet">
    <link href={{ URL::asset('guetella/assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}
        rel="stylesheet">
    <link href={{ URL::asset('guetella/assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}
        rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href={{ URL::asset('guetella/assets/css/custom.min.css') }} rel="stylesheet">


</head>
