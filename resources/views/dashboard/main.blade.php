<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('/layout/header')

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            @include('dashboard/layout/sidebar')
            @include('dashboard/layout/navbar')
            @yield('content')
            @include('dashboard/layout/footer')
        </div>
    </div>

    @include('layout/script')
</body>

</html>
