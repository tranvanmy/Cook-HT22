<!DOCTYPE html>
<html lang='en-US'>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <meta charset="utf-8">
    <title>Framgia Culinary - {{ trans("sites.slogan") }}</title>
    <link rel="shortcut icon" href="{{ asset('users/imgs/framgia.png') }}">
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ Html::style('users/bundles/frameworkse6d1.css') }}
    {{ Html::style('users/bundles/core8273.css') }}
    {{ Html::style('users/bundles/home12f7.css') }}
    {{ Html::style('users/bundles/recipe8d28.css') }}
    {{ Html::style('bower_components/font-awesome/css/font-awesome.css') }}
    {{ Html::style('users/Content/home.css') }}
    {{ Html::style('bower_components/alertify-js/build/css/themes/default.css') }}
    {{ Html::style('bower_components/alertify-js/build/css/alertify.css') }}
    {{ Html::style('bower_components/bootstrap-sweetalert/dist/sweetalert.css') }}
    {{ Html::script('bower_components/bootstrap-sweetalert/dist/sweetalert.js') }}
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
    {{ Html::script('users/bundles/corea56c.js') }}
    {{ Html::script('bower_components/alertify-js/build/alertify.js') }}
    {{ Html::script('users/bundles/base98f1.js') }}
    {{ Html::script('users/js/follow.js') }}
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
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
