<!DOCTYPE html>
<html lang='en-US'>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <meta charset="utf-8">
    <title>Framgia Culinary - {{ trans("sites.slogan") }}</title>
    <link rel="shortcut icon" href="{{ asset('users/imgs/framgia.png') }}">
    <meta charset="UTF-8">
    <link href="{{ asset('users/bundles/frameworkse6d1.css') }}" rel="stylesheet">
    <link href="{{ asset('users/bundles/core8273.css') }}" rel="stylesheet">
    <link href="{{ asset('users/bundles/home12f7.css') }}" rel="stylesheet">
    <link href="{{ asset('bower_components/font-awesome/css/font-awesome.css') }}" rel="stylesheet"/>
    <link href="{{ asset('users/Content/home.css') }}" rel="stylesheet">
    <link rel="canonical" href="index.html">
    @yield("style")
</head>
<body>
@include("users.includes.header")
<!-- Main -->
@yield("content")
<!-- End Main -->

@include("users.includes.footer")

<script src="{{ asset('users/bundles/corea56c.js') }}"></script>
<script src="{{ asset('users/bundles/base98f1.js') }}"></script>
<script src="{{ asset('users/bundles/blogbf61.js') }}"></script>
<script src="{{ asset('users/bundles/member05d0.js') }}"></script>
<script src="{{ asset('users/bundles/commond494.js') }}"></script>
@yield("script")
</script>
</body>
</html>
