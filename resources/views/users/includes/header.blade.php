<header class="clearfix header-cont newyear">
    <div class="root-nav">
        <div class="container" id="slider-head">
            <ul class="list-inline">
                <li class="active"><a href="{{ url("/") }}">{{ trans("sites.receipt_cook") }}</a>
                @if(!Auth::check())
                    <li><a href="{{ route('login') }}">
                            <span class="fa fa-sign-in"></span>
                            {{ trans("sites.login") }}
                        </a>
                @else
                    <li><a href="{{ route('logout') }}">
                            <span class="fa fa-sign-in"></span>
                            {{ trans("sites.logout") }}
                        </a>
                @endif

                <li><a href="javascript:void(0)"><span class="fa fa-shopping-basket"></span> {{ trans("sites.cart")
                    }}</a>
            </ul>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="header-top clearfix">
                <div class="logo header-top-1">
                    <div class="navbar-brand">
                        <a href="{{ url('/') }}">
                            <img class="logo img-responsive" src="{{ asset('users/imgs/framgia.png') }}">
                        </a>
                    </div>
                </div>
                <div class="header-top-2">
                    <div class="aligncenter-sm" id="cookySearchBox">
                        <div>
                            <form id="searchform" class="form-horizontal" method="get">
                                <div class="qsearch-box">
                                    <input type="text" id="searchimput" placeholder="tìm kiếm công thức">
                                    <button type="submit" class="fa fa-search ico-search"></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-top-3">
                    <ul class="top-list">
                        <li>
                            <a href="#" target="_blank">
                                <img src="{{ asset('users/imgs/background.jpg') }}" class="img-responsive"/>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="fa fa-mobile-phone"></span>
                                <span class="sr-only">{{ trans("sites.appMobile") }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="nofollow">
                                <span class="fa fa-facebook-square"></span>
                                <span class="sr-only">{{ trans("sites.fanpage") }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" target="_blank" rel="nofollow">
                                <span class="fa fa-instagram"></span>
                                <span class="sr-only">{{ trans("sites.instagram") }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar main-navbar clr-navbar">
        <div class="container">
            <div class="collapse navbar-collapse" id="bs-main-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.html"><span class="fa fa-home"></span></a>
                    <li><a href="#">{{ trans("sites.receipt") }}</a>
                    <li><a href="#">{{ trans("sites.top_chef") }}</a>
                </ul>
                <ul class="nomargin list-inline right-wrap navbar-right">
                    <li>
                        <a class="btn btn-quickmenu" title="{{ trans('sites.add') }} {{ trans('sites.receipt') }}"
                           @if(!Auth::check()) href="{{ route('login') }}" @else href="{{ url('abc') }}" @endif>
                            <span class="fa fa-plus text-highlight"></span>
                            <span class="sr-only">{{ trans("sites.add") }} {{ trans("sites.receipt") }}</span>
                        </a>
                    </li>
                    @if(!Auth::check())

                        <li class="dropdown">
                            <a href="#" id="myTabDrop1" class="dropdown-toggle btn btn-default" data-toggle="dropdown">
                                {{ trans("sites.login") }} <b class="caret"></b>
                            </a>
                            <div class="dropdown-menu login-widget" role="menu">
                                <form class="form-horizontal">
                                    <div class="login-social">
                                        <div class="social-icon">
                                            <ul class="list-unstyled">
                                                <li class="fb wide">
                                                    <a class="social-login"
                                                       href="{{ url('social/redirect') }}">
                                                        <span class="child"></span>
                                                        <span>{{ trans("sites.login") }} Facebook</span>
                                                    </a>
                                                </li>
                                                <li class="clearfix separator"></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <fieldset>
                                        <form method="post" action="#">
                                            <legend>{{ trans("sites.or") }} {{ trans("sites.loginWithFramgia") }}</legend>
                                            <input type="hidden" name="_token" value="{!! csrf_token() !!} "/>
                                            <div id="header-login-form">
                                                <div class="form-group">
                                                    <input class="form-control" type="text"
                                                           name="email" placeholder="Email"/>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="password"
                                                           name="password" placeholder="Password"/>
                                                </div>
                                                <div class="form-group">
                                                    <div class="pull-left">
                                                        <button type="submit"
                                                                class="btn btn-sm btn-danger">
                                                            <span>{{ trans("sites.login") }}</span></button>
                                                    </div>
                                                    <div class="pull-right">
                                                        <label>
                                                            <input type="checkbox" name="RememberMe" checked/>
                                                            <span>{{ trans("sites.remember") }}</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="form-group">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="{{ url('register') }}" class="text-underline">{{ trans("sites.register")
                                                    }}</a>
                                                </li>
                                                <li>
                                                    <a href="quen-mat-khau.html" class="text-underline">{{
                                                    trans("sites.forget_pass") }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" id="myTabDrop1" title="{{ trans('sites.notify') }}"
                               class="dropdown-toggle btn btn-quickmenu" data-toggle="dropdown">
                                <span class="fa fa-bell text-highlight"></span>
                                <span class="sr-only">{{ trans('sites.notify') }}</span>
                            </a>
                            <div class="dropdown-menu login-widget" role="menu">
                                {{ trans('sites.notify') }} {{ trans('sites.here') }}
                            </div>
                        </li>
                        <li class="dropdown">
                            <a href="#" id="myTabDrop1" class="dropdown-toggle" data-toggle="dropdown">
                                <img id="avatarUser" src="{{ Auth::user()->avatar }}"/> <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">HTML</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CSS</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>
                                <li role="presentation" class="divider"></li>
                                <li role="presentation"><a role="menuitem" tabindex="-1"
                                                           href="{{ url('logout') }}">{{ trans("sites.logout") }}</a>
                                </li>
                            </ul>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </div>
</header>
@section("script")
    {{ Html::script("users/js/slide.js") }}
@endsection
