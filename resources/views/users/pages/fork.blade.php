@extends("welcome")

@section("content")
@section("style")
    {{ Html::style("users/css/detail.css") }}
@endsection

    <div class="recipe-container" id="recipe-body-container">

        <div class="recipe-breadcrumb container">
            <div class="breadcrumb-container article-breadcrumb">
                <ul class="breadcrumb nomargin">
                    <li><a href="javascript:void(0)" target="_self">{{ trans("sites.receipt") }}</a></li>
                    <li class="active">{{ $my_fork->name }}</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="recipe-header hrecipe h-recipe">
                <div class="recipe-header-info">
                    <div class="recipe-header-photo">
                        <img class="photo img-responsive u-photo"
                             src="{{ asset('upload/images/'.$my_fork->image) }}"/>
                    </div>
                    <div class="recipe-header-detail">
                        <div class="recipe-headline">
                            <div class="recipe-type">
                                        <span class="item">
                                            <span class="text cuisine-label">{{ trans("sites.ingredient") }}  </span>
                                            <span class="type">
                                                <a href="{{ route('ingredient',$ur_ingredients[0]->ingredient->id) }}" target="_blank"
                                                   class="tag dishes">{{ $ur_ingredients[0]->ingredient->name }} </a>
                                            </span>
                                        </span>
                                <span class="item">
                                        <span class="text cuisine-label">{{ trans("sites.category") }} </span>
                                        <span class="type">
                                            <a href="{{ route('foody',$ur_foodies->foody->id) }}" target="_blank" class="tag dishes">
                                                {{ $ur_foodies->foody->name }}
                                            </a>
                                        </span>
                                    </span>
                            </div>
                            <h1 class="p-name fn recipe-title">{{ trans("sites.doing") }} {{ $my_fork->name }}</h1>
                            <!-- sửa -->
                            @if(Auth::check() && $fork->user_id == Auth::user()->id)
                                <a href="{{ route('EditFork',[$fork->receipt_id, $fork->id]) }}" data-idEditFork="{{$fork->id}}"
                                   class="btn btn-default btn-xs editForkReceipt">
                                    {{ trans("sites.edit") }} {{ trans("sites.receipt") }}
                                </a>
                            @endif
                        <!--  -->
                        </div>
                        <div class="recipe-info">
                            <div class="summary p-summary">
                                {{ $my_fork->description }}
                            </div>
                            <div class="h-card recipe-author">
                                <div class="user-profile">
                                    <div class="user-info">
                                        <a href="{{ route('myProfile', $fork->user_id) }}" class="avt">
                                            <img class="u-photo"
                                                 src="{{ asset('upload/images/'.$fork->user->avatar) }}"
                                                 alt="{{ $fork->user->name }}">
                                        </a>
                                        <a href="{{ route('myProfile',$fork->user->id) }}" target="_self"
                                           class="author text-highlight url cooky-user-link p-name u-url"
                                           title="{{ $fork->user->name }}"> {{ $fork->user->name }}</a><br>
                                        <div class="user-stats">
                                            <span class="stats-item">
                                                <b class="text-black">{{ $countReceiptByAssign }}</b> 
                                                <span class="text-gray">{{ trans("sites.receipt") }}</span>
                                            </span>
                                            <span><span class="fa fa-dot">&bull;</span></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="info-main-receipt">
                                    <span>từ:</span>
                                    <a href="{{ route('detail',$my_fork->id) }}">
                                        {{ $my_fork->name }}
                                    </a>
                                    <a href="{{ route('myProfile',$my_fork->user->id) }}">
                                         ({{ $my_fork->user->name }})
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="recipe-header-stats">
                            <span class="duration dt-duration">
                                <span class="value-title" title="PT35M"> </span>
                            </span>

                        <ul class="list-inline nomargin nopadding">
                            <li>
                                <div>
                                    <span class="stats-text">{{ trans("sites.ingredient") }} </span>
                                    <span class="duration-block">
                                        <b class="stats-count">{{ count($ur_ingredients) }}</b>
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <span class="stats-text"> {{ trans("sites.perform") }}</span>
                                    <span class="duration">
                                            <span class="duration-block">
                                                <b class="stats-count">
                                                    <time title=" PT35M">
                                                        {{ $my_fork->time }}
                                                    </time>
                                                </b>{{ trans("sites.hour") }}
                                            </span>
                                            <span class="value-title" title=" PT35M"></span>
                                        </span>
                                </div>
                            </li>
                            <li>
                                <div class="duration">
                                    <span class="stats-text p-yield " value="4">{{ trans("sites.serving") }}</span>
                                    <span>
                                        <b class="stats-count">{{ $my_fork->ration }}</b> {{ trans("sites.people") }}
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <span class="stats-text">{{ trans("sites.complex") }}</span>
                                    <span>
                                        <b class="stats-count">
                                            @if($my_fork->complex == 1)
                                                {{ trans("sites.easy") }}
                                            @elseif($my_fork->complex == 2)
                                                {{ trans("sites.normal") }}
                                            @else {{ trans("sites.hard") }}
                                            @endif
                                        </b>
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="recipe-toolbox" id="recipe-basic-stats">
                        <ul class="recipe-toolbox-items">
                            <li class="tool-item">
                                @if(Auth::check())
                                    <a id="fork" data-receipt_id="{{ $my_fork->id }}" @if($my_fork->user_id != Auth::user()->id) data-assign_id="{{ Auth::user()->id }}" @endif href="javascript:void(0)">
                                        <i class="fa fa-code-fork"></i>
                                        <p id="totalFork">{{ $my_fork->userReceipts->count() }}</p>
                                    </a>
                                @else
                                    <a href="{{ route('login') }}">
                                        <i class="fa fa-code-fork"></i>
                                        <p id="totalLike">{{ $my_fork->userReceipts->count() }}</p>
                                    </a>
                                @endif
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="wide-box-white recipe-collection-widget" id="inline-collection-widgets"></div>
        </div>
    </div>
    <div class="container">
        <div class="recipe-navbar">
            <ul class="list-inline nav">
                <li class="active">
                    <a id="nav-detail-panel" href="#" target="_self">
                        <span class="fa fa-align-right"></span> {{ trans("sites.receipt") }}</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="recipe-body-container">
        <div class="container recipe-body">
            <div class="recipe-detail-left sm-wide">
                <div id="recipe-detail">
                    <div class="rcbox recipe-detail-box">
                        <div class="recipe-ingredient-wrapper sm-wide" id="ingredients-box">
                            <div class="recipe-box-heading">
                                <div class="col-md-8 col-sm-6 pull-left nopadding">
                                    <h2 class="title capit"> {{ trans("sites.ingredient") }} {{ trans("sites.make") }}
                                        {{ $my_fork->name }}
                                    </h2>
                                    <div class="desc">
                                        {{ trans("sites.for") }}
                                        <span class="text-highlight">
                                            <strong>{{ $my_fork->ration }}</strong>
                                        </span> {{trans("sites.serving")}}
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6">
                                    <div class="pull-right">
                                        <div class="serving-container">
                                            <span>
                                                <span class="fa fa-cutlery text-highlight"></span>
                                                {{ trans("sites.serving") }}
                                            </span>
                                            <span>
                                                <input type="number" min="1" id="chooseServing"
                                                       value="{{ $my_fork->ration }}"
                                                       class="form-control">
                                            </span>
                                            <span>
                                                <a href="javascript:void(0)">
                                                    <span class="fa fa-refresh text-gray" data-id="{{ $my_fork->id }}"
                                                          id="calRation"></span>
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="recipe-ingredient-box">
                                <div>
                                    <ul class="list-inline recipe-ingredient-list">
                                        @foreach($ur_ingredients as $item)
                                            <li class="recipe-ingredient">
                                                <ul class="list-inline">

                                                    <li><span class="fa fa-plus-circle text-blue"> </span></li>
                                                    <li class="ingredient">
                                                        <span class="name">{{ $item->ingredient->name }}</span>

                                                        <span class="amount">
                                                        <span class="ingredient-quality text-small text-gray">
                                                            {{ $item->quantity }}
                                                        </span>
                                                       
                                                        <span class="ingredient-unit text-gray text-small"> 
                                                            @foreach($units as $unit)
                                                                @if($item->ingredient->unit_id == $unit->id)
                                                                    {{ $unit->name }}
                                                                @endif
                                                            @endforeach
                                                        </span>
                                                    </span>
                                                    </li>

                                                </ul>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="recipe-direction-box">
                            <div class="headline">
                                <h2 class="capit">
                                    {{ trans("sites.doing") }} {{ $my_fork->name }}
                                </h2>
                                <div class="cooking-time">
                                    <span class="stats-item">
                                        <span class="stats-text">{{ trans("sites.perform") }}</span>
                                        <span class="duration-block">
                                            <b class="stats-count">{{ $my_fork->time }}</b>{{ trans("sites.hour") }}
                                        </span>
                                    </span>
                                </div>
                                <div class="view-mode-container">
                                    <div class="btn-group" role="group" aria-label="...">
                                        <div class="btn-group" role="group">
                                            <button type="button"
                                                    class="btn btn-default btn-viewmode full active"><span
                                                        class="fa fa-th-list"></span> {{ trans("sites.viewFull") }}
                                            </button>
                                        </div>
                                        <div class="btn-group" role="group">
                                            <button type="button"
                                                    class="btn btn-default btn-viewmode text-only"><span
                                                        class="fa fa-file-text-o"></span> {{ trans("sites.viewNoImage") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="recipe-content" id="recipe-step">
                                <div class="recipe-direction-box">
                                    <h2>{{ trans("sites.perform") }}</h2>
                                    <div class="panel-group description" id="accordionDirection">
                                        @foreach($ur_steps as $key => $item)
                                            <div class="panel panel-default" id="step-206870">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" href="#collapseDirection1"
                                                           target="_self">
                                                            {{ trans("sites.step") }} <span
                                                                    class="num">{{ ++$key }}</span>
                                                        </a>
                                                        <a href="javascript:void(0)" class="tick-active"><span
                                                                    class="fa fa-circle-o"></span></a>
                                                    </h4>
                                                </div>
                                                <div id="collapseDirection1" class="panel-collapse collapse in">
                                                    <div class="panel-body has-photo">

                                                        <div class="step-desc instructions">
                                                            {{ $item->content }}
                                                        </div>
                                                        <div class="step-photos">
                                                            <a class="cooky-photo one-photo" href="javascript:void(0)">
                                                                <img src="{{ asset('upload/images/'.$item->image) }}"
                                                                     alt=""/></a>
                                                        </div>
                                                        <div class="comment-widget-box step-comments-box">
                                                            <div environment="recipestep"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section("script")
    {{ Html::script("users/js/fork.js") }}
@endsection
