<!DOCTYPE html>
<html lang='en-US'>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <meta charset="utf-8">
    <title>Framgia Culinary - {{ trans("sites.slogan") }}</title>
    <link rel="shortcut icon" href="{{ asset('users/imgs/framgia.png') }}">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('users/bundles/frameworkse6d1.css') }}" rel="stylesheet">
    <link href="{{ asset('users/bundles/core8273.css') }}" rel="stylesheet">
    <link href="{{ asset('users/bundles/home12f7.css') }}" rel="stylesheet">
    <link href="{{ asset('users/bundles/recipe8d28.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.css') }}" rel="stylesheet"/>
    <link href="{{ asset('users/Content/home.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('bower_components/bootstrap-sweetalert/dist/sweetalert.css') }}"/>

    <script src="{{ asset('bower_components/bootstrap-sweetalert/dist/sweetalert.js') }}"></script>
    <link rel="canonical" href="index.html"/>
    @yield("style")
</head>
<body>
@include("users.includes.header")
<!-- Main -->
@yield("content")
<!-- End Main -->

@include("users.includes.footer")
{{--<script src="{{ asset('users/bundles/blogbf61.js') }}"></script>--}}
{{--<script src="{{ asset('users/bundles/member05d0.js') }}"></script>--}}
{{--<script src="{{ asset('users/bundles/commond494.js') }}"></script>--}}
<script src="{{ asset('users/bundles/corea56c.js') }}"></script>
<script src="{{ asset('users/bundles/base98f1.js') }}"></script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        });
    });
</script>
@yield("script")
</body>
</html>
