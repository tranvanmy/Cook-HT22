<header class="clearfix header-cont newyear">
    <div class="root-nav">
        <div class="container">
            <ul class="list-inline">
                <li class="active"><a href="index.html">{{ trans("sites.receipt_cook") }}</a>
                <li><a href="javascript:void(0)"><span class="fa-sign-in"></span> {{ trans("sites.login") }}</a>
                <li><a href="javascript:void(0)"><span class="fa fa-shopping-basket"></span> {{ trans("sites.cart")
                    }}</a>
            </ul>
        </div>
    </div>
    <div class="container" style="position:relative">
        <div class="row">
            <div class="header-top clearfix">
                <div class="logo header-top-1">
                    <div class="navbar-brand">
                        <a href="#"><img class="logo img-responsive"
                                         src="{{ asset('users/imgs/framgia.png') }}"></a>
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
                                <img src="{{ asset('users/imgs/background.jpg') }}" class="img-responsive"/></a>
                        <li>
                            <a href="#">
                                <span class="fa fa-mobile-phone"></span> <span
                                    class="sr-only">Ứng dụng nấu ăn ngon</span>
                            </a>
                        <li><a href="#" target="_blank" rel="nofollow"> <span class="fa fa-facebook-square"></span>
                            <span class="sr-only">Framgia Culinary Facebook Fage</span>
                        </a>
                        <li><a href="#" target="_blank" rel="nofollow"> <span
                                class="fa fa-instagram"></span> <span
                                class="sr-only">Framgia Culinary Instagram Fage</span> </a>
                        <li><a href="#" target="_blank" rel="nofollow"> <span
                                class="fa fa-youtube-square"></span> <span class="sr-only">Framgia Culinary TV Youtube Channel - Framgia Culinary</span>
                        </a>
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
                        <a class="btn btn-quickmenu" title="Submit Recipe" href="dang-nhapccbf.html">
                            <span class="fa fa-plus text-highlight"></span> <span class="sr-only">{{ trans("sites.add") }} {{ trans("sites.receipt") }}</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a href="#" id="myTabDrop1" class="dropdown-toggle btn btn-default" data-toggle="dropdown">
                            {{ trans("sites.login") }} <b class="caret"></b>
                        </a>
                        <div class="dropdown-menu login-widget" role="menu">
                            <form class="form-horizontal">
                                <div class="login-social">
                                    <div class="social-icon">
                                        <ul class="list-unstyled">
                                            <li class="fb wide"><a class="social-login" provider="1"
                                                                   href="javascript:void(0)"><span class="child"></span><span>{{ trans("sites.login") }} Facebook</span></a>
                                            </li>
                                            <li class="clearfix separator"></li>
                                        </ul>
                                    </div>
                                </div>

                                <fieldset>
                                    <legend>hoặc tài khoản của Framgia Culinary</legend>
                                    <div id="header-login-form">
                                        <div class="form-group">
                                            <input class="form-control" data-bind="value: email" type="text"
                                                   name="Email" placeholder="Username or Email"/>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control" data-bind="value: password" type="password"
                                                   name="Password" placeholder="Password"/>
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
                                                    <span>Remember me</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="dang-ky.html" class="text-underline">{{ trans("sites.register")
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

                </ul>
            </div>
        </div>
    </div>
</header>

