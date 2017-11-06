<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Admin - Framgia Culinary">
    <meta name="author" content="">
    <title>Admin - Framgia Culinary</title>
    {{ Html::style('bower_components/datatables-responsive/css/dataTables.responsive.css') }}
    {{ Html::style('bower_components/font-awesome/css/font-awesome.min.css') }}
    {{ Html::style('bower_components/bootstrap/dist/css/bootstrap.min.css') }}
    {{ Html::style('bower_components/metisMenu/dist/metisMenu.min.css') }}
    {{ Html::style('bower_components/sb-admin-2/css/sb-admin-2.css') }}
    {{ Html::style('bower_components/morrisjs/morris.css') }}
    {{ Html::style('bower_components/alertify-js/build/css/themes/default.css') }}
    {{ Html::style('bower_components/alertify-js/build/css/alertify.css') }}
    {{ Html::style('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}
    {{ Html::style('admin/css/style.css') }}
    {{ Html::style('bower_components/bootstrap-sweetalert/dist/sweetalert.css') }}
    {{ Html::script('bower_components/bootstrap-sweetalert/dist/sweetalert.js') }}
    {{ Html::script('bower_components/ckeditor/ckeditor.js') }}
    {{ Html::script('bower_components/ckfinder/ckfinder.js') }}
    {{ Html::script('admin/js/configCkfinder.js') }}
    {{ Html::script('bower_components/ckeditor/config.js') }}
    @yield("style")
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{!! route('home') !!}">Admin - {{ trans("sites.brand") }}</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{ route('myProfile',Auth::user()->id) }}"><i
                                    class="fa fa-user fa-fw"></i> {{ trans("sites.user_profile") }}</a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw"></i> {{ trans("sites.setting") }}</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{!! url('logout') !!}"><i class="fa fa-sign-out fa-fw"></i> {{ trans("sites.logout") }}
                        </a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{route('getListCate')}}">
                            <i class="fa fa-bar-chart-o fa-fw"></i> {{ trans("sites.cate_ingre") }}
                        </a>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{ route('getListIngredient') }}">
                            <i class="fa fa-bar-chart-o fa-fw"></i> 
                        {{ trans("sites.ingredient") }}
                    </a>
                        
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{ route('getListFoody') }}"><i class="fa fa-tags fa-fw"></i> 
                        {{ trans("sites.cate_foody") }}</a>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{ route('getListUser') }}"><i class="fa fa-users fa-fw"></i> 
                        {{ trans("sites.user") }}</a>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{ route('getListReceipt') }}"><i class="fa fa-users fa-fw"></i> 
                        {{ trans("sites.receipt") }}</a>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{ route('getListUnit') }}"><i class="fa fa-users fa-fw"></i> 
                        {{ trans("sites.unit") }}</a>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{ route('getListInvoice') }}"><i class="fa fa-users fa-fw"></i> {{ trans("sites.invoice") }}</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield("controller")
                        <small>@yield("action")</small>
                    </h1>
                </div>
                <div class="col-lg-12">
                    @if(Session::has('flash_message'))
                        <div class="alert alert-{!! Session::get('flash_level') !!}">
                            {!! Session::get('flash_message') !!}
                        </div>
                    @endif
                </div>
                <!-- /.col-lg-12 -->

            </div>
            <!-- /.row -->
            @yield("content")
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
{{ Html::script('bower_components/jquery/dist/jquery.min.js') }}
{{ Html::script('bower_components/alertify-js/build/alertify.js') }}
{{ Html::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
{{ Html::script('bower_components/metisMenu/dist/metisMenu.min.js') }}
{{ Html::script('bower_components/sb-admin-2/js/sb-admin-2.js') }}
{{ Html::script('bower_components/raphael/raphael.min.js') }}
{{ Html::script('bower_components/DataTables/media/js/jquery.dataTables.min.js') }}
{{ Html::script('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}
{{ Html::script('admin/js/main.js') }}
@yield("script")
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
</body>
</html>
