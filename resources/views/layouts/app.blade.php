<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield("title") | Framgia Culinary</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,300,600,400&amp;subset=latin'
          async rel='stylesheet' type='text/css'>
    <link href="{{ url('users/fonts/font-awesome-4.7.0/css/font-awesome.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('users/Content/main697b.css') }}" rel="stylesheet"/>
    <link href="{{ url('users/Content/loginCss07bb.css') }}" rel="stylesheet"/>
    <link href="{{ url('users/css/app.css') }}" rel="stylesheet"/>
    @yield("style")
</head>
<body>

<header class="clearfix header-cont newyear">
    <div class="container">
        <div class="row">
            <div class="header-top clearfix">
                <div class="logo header-top-1">
                    <div class="navbar-brand">
                        <a href="{{ url('/') }}">
                            <img class="logo img-responsive" src="{{ url('users/imgs/framgia.png') }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


<!--Start of Main section -->
@yield("content")
<!--End of Main section -->
<script src="{{ url('users/bundles/corea56c.js') }}"></script>
<script src="{{ url('users/bundles/base98f1.js') }}"></script>
<footer>
    <div class="clearf">
        <div class="container">
            <div class="nopadding">
                <div> &copy; 2017 Framgia Cook</div>
            </div>
        </div>
    </div>
    <div class="footer-overlay"></div>
</footer>
</div>
</body>
</html>
@yield("script")
