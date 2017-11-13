@extends("welcome")

@section("content")
@section("style")
    {{ Html::style("users/css/detail.css") }}
@endsection
@if(Auth::check())
    @if($receipt->status == 0 && $receipt->user_id == Auth::user()->id )
        <p id="notifyWait">{{ trans("sites.notifyWait") }}</p>
    @endif
@endif
@if($receipt->status == 1 || (Auth::check()) && $receipt->user_id == Auth::user()->id || Auth::user()->role == 1)
    <div class="recipe-container" id="recipe-body-container">

        <div class="recipe-breadcrumb container">
            <div class="breadcrumb-container article-breadcrumb">
                <ul class="breadcrumb nomargin">
                    <li><a href="javascript:void(0)" target="_self">{{ trans("sites.receipt") }}</a></li>
                    <li class="active">{{ $receipt->name }}</li>
                </ul>
            </div>
        </div>
        <div class="container">
            <div class="recipe-header hrecipe h-recipe">
                <div class="recipe-header-info">
                    <div class="recipe-header-photo">
                        <img class="photo img-responsive u-photo"
                             src="{{ asset('upload/images/'.$receipt->image) }}"/>
                    </div>
                    <div class="recipe-header-detail">
                        <div class="recipe-headline">
                            <div class="recipe-type">
                                        <span class="item">
                                            <span class="text cuisine-label">{{ trans("sites.ingredient") }}  </span>
                                            <span class="type">
                                                <a href="{{ route('ingredient',$recIngre[0]->ingredient->id) }}" target="_blank"
                                                   class="tag dishes">{{ $recIngre[0]->ingredient->name }} </a>
                                            </span>
                                        </span>
                                <span class="item">
                                        <span class="text cuisine-label">{{ trans("sites.category") }} </span>
                                        <span class="type">
                                            <a href="{{ route('foody',$recFoody->foody->id) }}" target="_blank" class="tag dishes">
                                                {{ $recFoody->foody->name }}
                                            </a>
                                        </span>
                                    </span>
                            </div>
                            <h1 class="p-name fn recipe-title">{{ trans("sites.doing") }} {{ $receipt->name }}</h1>
                            <!-- sửa -->
                            @if(Auth::check() && $receipt->user_id == Auth::user()->id)
                                <a href="{{ route('EditReceipt',$receipt->id) }}" data-idEditReceipt="{{$receipt->id}}"
                                   class="btn btn-default btn-xs editReceipt">
                                    {{ trans("sites.edit") }} {{ trans("sites.receipt") }}
                                </a>
                            @endif
                        <!--  -->
                            <div class="recipe-rating">
                                <div class="rating-count">
                                    <span href="javascript:void(0)" target="_self">
                                        <span class="count-num">{{ trans("sites.have") }}
                                            <span class="innings">{{ count($rates) }}</span>
                                            {{ trans("sites.innings") }}
                                        </span>
                                        {{ trans("sites.evaluate") }}
                                        (<a href="javascript:void(0);">
                                            <span id="resultRate">{{ $receipt->rate_point }}</span> <span
                                                    class="fa fa-star text-highlight"></span>
                                        </a>)
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="recipe-info">
                            <div class="summary p-summary">
                                {{ $receipt->description }}
                            </div>
                            <div class="h-card recipe-author">
                                <div class="user-profile">
                                    <div class="user-info">
                                        <a href="{{ route('myProfile', $receipt->user->id) }}" class="avt">
                                            <img class="u-photo"
                                                 src="{{ asset('upload/images/'.$receipt->user->avatar) }}"
                                                 alt="{{ $receipt->user->name }}">
                                        </a>
                                        <a href="{{ route('myProfile',$receipt->user->id) }}" target="_self"
                                           class="author text-highlight url cooky-user-link p-name u-url"
                                           title="{{ $receipt->user->name }}"> {{ $receipt->user->name }}</a><br>
                                        <div class="user-stats">
                                            <span class="stats-item">
                                                <b class="text-black">{{ $countReceipt }}</b> 
                                                <span class="text-gray">{{ trans("sites.receipt") }}</span>
                                            </span>
                                            <span><span class="fa fa-dot">&bull;</span></span>
                                            <span class="stats-item">
                                                    <a href="#">
                                                        <b class="text-black">{{ $following }}</b> 
                                                        <span class="text-gray">{{ trans("sites.care") }}</span>
                                                    </a>
                                            </span>
                                        </div>
                                        @if(Auth::check() && $receipt->user_id != Auth::user()->id)
                                            <div id="form-follow">
                                                <button title="{{ trans('sites.care') }}" class="btn-follow follow"
                                                        data-idReceipt="{{ $receipt->id }}"
                                                        data-idFollowing="{{ $receipt->user->id }}"
                                                        data-idFollower="{{ Auth::user()->id }}">
                                                    <a href="javascript:void(0)">
                                                        @if($follower)
                                                            @if($follower->status == 1)
                                                                <span id="nocare">{{ trans("sites.noCare") }}</span>
                                                            @endif
                                                        @else
                                                            <span id="care">{{ trans("sites.care") }}</span>
                                                        @endif
                                                    </a>
                                                </button>
                                            </div>
                                        @else
                                            <a href="{{ route('myProfile', $receipt->user->id) }}">
                                                <button class="btn-follow">
                                                        <span>{{ trans("sites.profile") }}</span>
                                                </button>
                                            </a>
                                        @endif
                                    </div>
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
                                        <b class="stats-count">{{ count($receipt->receiptIngredients) }}</b>
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
                                                        {{ $receipt->time }}
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
                                        <b class="stats-count">{{ $receipt->ration }}</b> {{ trans("sites.people") }}
                                    </span>
                                </div>
                            </li>
                            <li>
                                <div>
                                    <span class="stats-text">{{ trans("sites.complex") }}</span>
                                    <span>
                                        <b class="stats-count">
                                            @if($receipt->complex == 1)
                                                {{ trans("sites.easy") }}
                                            @elseif($receipt->complex == 2)
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
                                    <a id="like" href="javascript:void(0)" data-idReceipt="{{ $receipt->id }}"
                                       data-idUser="{{ Auth::user()->id }}" title="{{ trans('sites.like') }}">
                                        @if(isset($likeByUser))
                                            @if($likeByUser->status == 1)
                                                <i class="fa fa-heart"></i>
                                            @endif
                                        @else
                                            <i class="fa fa-heart-o"></i>
                                        @endif
                                        <p id="totalLike1">{{ $countLike }}</p>
                                    </a>
                                @else
                                    <a href="{{ route('login') }}">
                                        <i class="fa fa-heart-o"></i>
                                        <p id="totalLike">{{ $countLike }}</p>
                                    </a>
                                @endif
                            </li>
                            <li class="tool-item">
                                @if(Auth::check())
                                    <a id="fork" data-receipt_id="{{ $receipt->id }}" @if($receipt->user_id != Auth::user()->id) data-assign_id="{{ Auth::user()->id }}" @endif href="javascript:void(0)">
                                        <i class="fa fa-code-fork"></i>
                                        <p id="totalFork">{{ $receipt->userReceipts->count() }}</p>
                                    </a>
                                @else
                                    <a href="{{ route('login') }}">
                                        <i class="fa fa-code-fork"></i>
                                        <p id="totalLike">{{ $receipt->userReceipts->count() }}</p>
                                    </a>
                                @endif
                            </li>
                            <li class="tool-item">
                                @if(Auth::check())
                                    <a id="clone" data-receipt_id="{{ $receipt->id }}" @if($receipt->user_id != Auth::user()->id) data-user_id="{{ Auth::user()->id }}" @endif href="javascript:void(0)">
                                        <i class="fa fa-clone"></i>
                                        <p id="totalFork">Clone</p>
                                    </a>
                                @else
                                    <a href="{{ route('login') }}">
                                        <i class="fa fa-clone"></i>
                                        <p id="totalLike">clone</p>
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
                                        {{ $receipt->name }}
                                    </h2>
                                    <div class="desc">
                                        {{ trans("sites.for") }}
                                        <span class="text-highlight">
                                            <strong>{{ $receipt->ration }}</strong>
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
                                                       value="{{ $receipt->ration }}"
                                                       class="form-control">
                                            </span>
                                            <span>
                                                <a href="javascript:void(0)">
                                                    <span class="fa fa-refresh text-gray" data-id="{{ $receipt->id }}"
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
                                        @foreach($recIngre as $item)
                                            <li class="recipe-ingredient">
                                                <ul class="list-inline">
                                                        <li id="button">
                                                            <span style="cursor: pointer;" class="fa fa-plus-circle text-blue add-to-cart"
                                                             data-idIngredient ="{{ $item->ingredient_id }}"
                                                             data-idReceipt = "{{ $item->receipt->id }}">
                                                            </span>
                                                         </li>
                                                    <li class="ingredient">
                                                        <span class="name">{{ $item->ingredient->name }}</span>

                                                        <span class="amount">
                                                        <span class="ingredient-quality text-small text-gray">
                                                            {{ $item->quantity }}
                                                        </span>
                                                        <input type="hidden" class="average"
                                                               value="{{ ($item->quantity/$item->receipt->ration) }}"/>
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
                                    {{ trans("sites.doing") }} {{ $receipt->name }}
                                </h2>
                                <div class="cooking-time">
                                    <span class="stats-item">
                                        <span class="stats-text">{{ trans("sites.perform") }}</span>
                                        <span class="duration-block">
                                            <b class="stats-count">{{ $receipt->time }}</b>{{ trans("sites.hour") }}
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
                                        @foreach($recStep as $key => $item)
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
                    @include("users.detail.review")
                </div>
                <div class="rcbox recipe-box recipe-review-container clearfix">
                    <div class="headline">
                        <h3 class="title">{{ count($rates) }} {{ trans("sites.evaluateFromUser") }}</h3>
                        <span class="desc">{{ trans("sites.shareTips") }}</span>
                    </div>
                    <div class="rating-all">
                        @foreach($rates as $rate)
                            @include("users.detail.listComment")
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="recipe-detail-right sm-wide" id="recipe-detail-right">
            <div class="right-content scrollable-container inner" data-padding="40">
                <div class='widget HTML' id='floatDiv'>
                    <div class="tool-box">
                        <a href="{{ route('receipt') }}" target="_self" title="Tạo công thức"
                           class="btn-submit-recipe text-center">
                            <span class="fa fa-plus-circle"></span>{{ trans("sites.createReceipt") }}
                        </a>
                    </div>
                    <div class="shopping-list-box box-content">

                        <div class="tab">
                            <button class="tablinks"
                                    onclick="openCity(event, 'togetherIngre')">{{ trans("sites.topEvaluateBigger") }}
                            </button>
                            <button class="tablinks"
                                    onclick="openCity(event, 'togetherMenu')">{{ trans("sites.top_member") }}</button>
                        </div>

                        <div id="togetherIngre" class="tabcontent">
                            @foreach($_top5Receipt as $item)
                                <a class="thumb" href="#">
                                    <img src="{{ asset('upload/images/'.$item->image) }}"/>
                                </a>
                                <a class="title" href="#">
                                    <span>{{ $item->name }}</span>
                                </a>
                                <br>
                                <span class="innings">{{ count($item->likes) }}</span>
                                <span class="like"> {{trans("sites.like")}}</span>
                                <span class="innings">{{ count($item->rates) }}</span>
                                <span class="comment"> {{trans("sites.comment")}}</span>
                                <br>
                                <span class="btn btn-success btn-ms rating">{{ $item->rate_point }}</span>
                                <div class="clearfix"></div>
                                <br>
                            @endforeach

                        </div>

                        <div id="togetherMenu" class="tabcontent">
                            @foreach($_top5Member as $item)
                                <a class="thumb" href="#">
                                    <img src="@if($item->user->password != '') {{ asset('upload/images/'.$item->user->avatar) }} @else {{ asset($item->user->avatar) }} @endif "/>
                                </a>
                                <a class="title" href="#">
                                    <span>{{ $item->user->name }}</span>
                                </a>
                                <br>
                                <span class="innings">{{ count($item->user->follows) }}</span>
                                <span class="comment"> {{trans("sites.care")}}</span>
                                <br>
                                <div class="clearfix"></div>
                                <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
    <p id="notifyWait">{{ trans("sites.errorReceipt") }}</p>
@endif
@endsection
@section("script")

    {{ Html::script("users/js/clone.js") }}
    {{ Html::script("users/js/fork.js") }}
    {{ Html::script("users/js/like.js") }}
    {{ Html::script("users/js/follow.js") }}
    {{ Html::script("users/js/detail.js") }}
@endsection
