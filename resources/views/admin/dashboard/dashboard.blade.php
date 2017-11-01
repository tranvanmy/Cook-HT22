@extends("admin.master")

@section("controller","Dashboard")

@section("content")

@section("style")
    {!! Charts::styles() !!}
@endsection

</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $countEvaluate }}</div>
                        <div>{{ trans('sites.all_rate') }}</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('getListRate') }}">
                <div class="panel-footer">
                    <span class="pull-left">{{ trans('sites.view_detail') }}</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $countReceipt }}</div>
                        <div>{{ trans('sites.all_receipt') }}</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('getListReceipt') }}">
                <div class="panel-footer">
                    <span class="pull-left">{{ trans('sites.view_detail') }}</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $countInvoice }}</div>
                        <div>{{ trans('sites.new_order') }}</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('getListInvoice') }}">
                <div class="panel-footer">
                    <span class="pull-left">{{ trans('sites.view_detail') }}</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">{{ $countUser }}</div>
                        <div>{{ trans('sites.user') }}</div>
                    </div>
                </div>
            </div>
            <a href="{{ route('getListUser') }}">
                <div class="panel-footer">
                    <span class="pull-left">{{ trans('sites.view_detail') }}</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> {{ trans('sites.area_chart') }}
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            {{ trans('sites.actions') }}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#">{{ trans('sites.action') }}</a>
                            </li>
                            <li><a href="#">{{ trans('sites.another_action') }}</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">{{ trans('sites.separated_link') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div id="morris-area-chart">
                    {!! $chart1->html() !!}
                </div>
            </div>
            
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> {{ trans('sites.bar_chart') }}
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                            {{ trans('sites.actions') }}
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu pull-right" role="menu">
                            <li><a href="#">{{ trans('sites.action') }}</a>
                            </li>
                            <li><a href="#">{{ trans('sites.another_action') }}</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="#">{{ trans('sites.separated_link') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="row">
                    
                        <div id="morris-bar-chart">
                            {!! $chart3->html() !!}
                        </div>
                    <!-- /.col-lg-8 (nested) -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
    <!-- /.col-lg-8 -->
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i> {{ trans('sites.noti_panel') }}
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="list-group">
                    <a href="#" class="list-group-item">
                        <i class="fa fa-comment fa-fw"></i> {{ trans('sites.new_comment') }}
                        <span class="pull-right text-muted small">
                            @if($newEvaluate)
                            <em>{!!  \Carbon\Carbon::createFromTimestamp(strtotime($newEvaluate->created_at))->diffForHumans() !!}</em>
                            @endif
                    </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-envelope fa-fw"></i> {{ trans('sites.new_receipt') }}
                        <span class="pull-right text-muted small">
                            @if($newReceipt)
                            <em>{!!  \Carbon\Carbon::createFromTimestamp(strtotime($newReceipt->created_at))->diffForHumans() !!}</em>
                            @endif
                    </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-user fa-fw"></i> {{ trans('sites.new_user') }}
                        @if($newUser)
                        <span class="pull-right text-muted small"><em>{!!  \Carbon\Carbon::createFromTimestamp(strtotime($newUser->created_at))->diffForHumans() !!}</em>
                            @endif
                    </span>
                    </a>
                    <a href="#" class="list-group-item">
                        <i class="fa fa-shopping-cart fa-fw"></i> {{ trans('sites.new_order') }}
                        @if($newInvoice)
                        <span class="pull-right text-muted small"><em>{!!  \Carbon\Carbon::createFromTimestamp(strtotime($newInvoice->created_at))->diffForHumans() !!} </em>
                            @endif
                    </span>
                    </a>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> {{ trans('sites.donut_chart') }}
            </div>
            <div class="panel-body">
                <div id="morris-donut-chart">{!! $chart2->html() !!}</div>
                <a href="#" class="btn btn-default btn-block">{{ trans('sites.view_detail') }}</a>
            </div>
            <!-- /.panel-body -->
        </div>
    </div>
</div>
    <!-- /.col-lg-4 -->
    @endsection
    @section("script")
        {!! Charts::scripts() !!}
        {!! $chart1->script() !!}
        {!! $chart2->script() !!}
        {!! $chart3->script() !!}
@endsection
