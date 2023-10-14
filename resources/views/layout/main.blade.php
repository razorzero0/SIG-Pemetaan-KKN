<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('/layout/header')

<body>

    @yield('content')

    @include('/layout/script')
</body>

</html>
