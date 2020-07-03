<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <!--/tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!--//tags -->
    <!--/css-->
    <link href="{{mix('/css/app.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('/template/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('/template/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!--//css-->
    <!--/jQuery & Bootstrap CDN-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <!--//jQuery & Bootstrap CDN-->
    @yield('custom_import')
</head>

<body>
<!-- /Header -->
@include('layouts.users.parts.header')
<!-- //Header -->

<!-- /Main-Contents -->
@yield('content')
<!-- //Main-Contents -->

<!-- /Footer -->
@include('layouts.users.parts.footer')
@yield('footer_script')
<!-- //Footer -->
</body>

</html>
