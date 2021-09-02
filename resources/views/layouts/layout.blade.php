<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--=============== css  ===============-->
    {{-- <link type="text/css" rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}"> --}}

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-contextmenu/2.9.2/jquery.contextMenu.css"
        integrity="sha512-EF5k2tHv4ShZB7zESroCVlbLaZq2n8t1i8mr32tgX0cyoHc3GfxuP7IoT8w/pD+vyoq7ye//qkFEqQao7Ofrag=="
        crossorigin="anonymous" />


    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css')}}">

    <title>MINI CRM </title>

</head>
<body>
    <div class="container">
        <div class="bg-light clearfix"><input type="button" class="btn btn-primary float-right" value="logout" onclick="company.logout()"></div>

    @yield('content')



    </div>
    {{-- <script type="text/javascript" src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script> --}}
    <script type="text/javascript" src="{{ URL::asset('assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/employee/employee.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('assets/js/company/company.js') }}"></script>

</body>
</html>
