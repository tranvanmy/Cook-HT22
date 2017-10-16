<!--review form-->
@section("style")
    {{ Html::style("users/css/detail.css")}}
@endsection
<div class="inline-recipe-review-form simple-review-form micro-box">
    <h3 class="title">{{ trans("sites.evaluateThisReceipt") }}</h3>
    <div class="inline-recipe-review-form-ctrl form-box">
        <a class="exit" href="javascript:void(0)">{{ trans("sites.close") }}</a>
        <div class="user">
            @if(Auth::check())
                <img href="{{ route('myProfile',Auth::user()->id) }}" class="avt"
                     src="{{  asset('upload/images/'.Auth::user()->avatar) }}">
            @endif
        </div>
        <div class="form">
            <div class="rating-box">
                <span>{{ trans("sites.evaluateReceipt") }}</span>
                <div class="rating-widget">
                    <fieldset id='demo1' class="rating">
                        <input class="stars" type="radio" id="star5" name="rating" value="5"/>
                        <label class="full" for="star5" title="Awesome - 5 stars"></label>
                        <input class="stars" type="radio" id="star4" name="rating" value="4"/>
                        <label class="full" for="star4" title="Pretty good - 4 stars"></label>
                        <input class="stars" type="radio" id="star3" name="rating" value="3"/>
                        <label class="full" for="star3" title="Meh - 3 stars"></label>
                        <input class="stars" type="radio" id="star2" name="rating" value="2"/>
                        <label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input class="stars" type="radio" id="star1" name="rating" value="1"/>
                        <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                    </fieldset>
                    <div class="rating-value">
                        <a title="view rating's detail" href="javascript:void(0);">
                            <span id="resultRate">0.0</span> <span class="fa fa-star text-highlight"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content-box">
                <div class="form-row">
                    <textarea class="form-control" name="review-content" id="review-content"
                              placeholder="Nhập nội dung..."></textarea>
                </div>
            </div>
            <div class="acts">
                <div class="form-row">

                    <button class="btn btn-submit-review" id="submit-review" data-idReceipt="{{ $receipt->id }}"
                            @if(Auth::check()) data-idUser="{{ Auth::user()->id }}" @endif>
                        {{ trans("sites.submitComment") }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!--end inline review form-->
    @if(Auth::check())
        <div class="input-group simple-input fake-form">
            <span class="fa fa-pencil fa-ico"></span>
            <input type="text" placeholder="{{ trans('sites.content') }}" name="temp-review-content"
                   id="temp-review-content" class="form-control simple-form-control">
            <span class="input-group-btn">
            <button class="btn btn-danger" id="submitComment">
                {{ trans("sites.submitComment") }}
            </button>
        </span>
        </div>
    @else
        <div id="notifyLogin">
            <span>{{ trans("sites.youMust") }}</span>
            <a href="{{ route('login') }}">{{ trans("sites.login") }}</a>
            <span>{{ trans("sites.toEvaluate") }}</span><br>
            <span>{{ trans("sites.orHaventAcc") }}</span>
            <a href="{{ route('register') }}">{{ trans("sites.register") }}</a>
            <span>{{ trans("sites.toParticipation") }} {{ trans("sites.brand") }}</span>
        </div>
    @endif
    <div class="inline-recipe-review-form-ctrl"></div>