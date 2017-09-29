@extends("welcome")

@section("content")
    
    <div class="cooky-featured-search">
        @include("users.includes.slider")
    </div>
    <div class="wide-box wide-box-white">
        <div class="container">
            @include("users.includes.box-top23")
            @include("users.includes.box-top13")
        </div>
    </div>
    <div class="wide-box">
        <div class="container">
            <div class="cross-banner-wide">
                <a href="#" target="_blank"><img src="{{ asset('users/imgs/cooky-location.jpg') }}"></a>
            </div>
        </div>
    </div>
    <div class="wide-box wide-box-white home-top-box">
        @include("users.includes.box-bottom")
    </div>
@endsection
