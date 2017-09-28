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
    <link href="{{ asset('users/fonts/font-awesome-4.7.0/css/font-awesome.css') }}" rel="stylesheet"/>
    <link href="{{ asset('users/Content/home.css') }}" rel="stylesheet">
    <link rel="canonical" href="index.html">
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
<script src="{{ asset('users/myscript.js') }}"></script>
<script>$(function () {
    $('.top-today-recipes').slick({
        dots: true,
        infinite: true,
        arrows: false,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 5000,
        adaptiveHeight: true,
        cssEase: 'linear'
    });
});
</script>
</body>
</html>
