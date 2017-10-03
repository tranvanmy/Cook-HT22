@extends("welcome")

@section("content")

    <link href="{{ asset('users/Content/profile.css') }}" rel="stylesheet"/>
    <div class="container">
        <div class="card hovercard">
            <div class="card-background">
                <img class="card-bkimg" alt=""
                     src="{{ asset('users/imgs/Strawberry-raspberry-blackberry-blueberry-berries_cropped.jpg') }}">
            </div>
            <div class="useravatar">
                <img alt="" src="http://lorempixel.com/100/100/people/9/">
            </div>
            <div class="card-info">
                <span class="card-title">Pamela Anderson</span>
            </div>
        </div>
        <br>
        <div class="profile-left">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img src="{{ asset('users/imgs/woman1.png') }}" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        Marcus Doe
                    </div>
                    <div class="profile-usertitle-job">
                        Developer
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-success btn-sm">{{ trans("sites.follow") }}</button>
                    <button type="button"
                            class="btn btn-danger btn-sm">{{ trans("sites.edit") }} {{ trans("sites.information") }}</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
            </div>
        </div>
        <div class="profile-right">
            <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                <div class="btn-group" role="group">
                    <button type="button" id="information" class="btn btn-primary"
                            href="#tab1" data-toggle="tab">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                        <div class="hidden-xs">{{ trans("sites.information") }}</div>
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" id="myReceipt" class="btn btn-default"
                            href="#tab2" data-toggle="tab">
                        <i class="fa fa-cutlery" aria-hidden="true"></i>
                        <div class="hidden-xs">{{ trans("sites.receipt") }}</div>
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" id="following" class="btn btn-default"
                            href="#tab3" data-toggle="tab">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <div class="hidden-xs">{{ trans("sites.follow") }}</div>
                    </button>
                </div>
                <div class="btn-group" role="group">
                    <button type="button" id="love" class="btn btn-default"
                            href="#tab4" data-toggle="tab">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                        <div class="hidden-xs">{{ trans("sites.love") }}</div>
                    </button>
                </div>
            </div>
            <div class="well">
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="tab1">
                        {!! Form::open(['method'=>"POST",'files'=>true]) !!}

                        {{ Form::label('',"Email") }}
                        {{ Form::label('',"mr.hip1102@yahoo.com") }}
                        <br>
                        {{ Form::label('','Họ tên') }}
                        {{ Form::text("name","Trần Thanh Sơn",['class'=>'form-control']) }}
                        <br>
                        {{ Form::label('','Số điện thoại') }}
                        {{ Form::text("phone","01232085432",['class'=>'form-control']) }}
                        <br>
                        {{ Form::label('','Địa chỉ') }}
                        {{ Form::text("address","Văn Khê Hà Đông",['class'=>'form-control']) }}
                        <br>
                        {{ Form::label('','Ngày tham gia') }}
                        {{ Form::label('',"25-10-1994") }}
                        {{ Form::submit( trans("sites.save_information"),["class"=>"btn btn-default"] ) }}

                        {!! Form::close() !!}
                    </div>
                    <div class="tab-pane fade in" id="tab2">
                        <div class="row recipes-list row10">
                            <div class="top-recipes-user">
                                <div class="today-recipe-user">
                                    <div class="item-block recipe-block">
                                        <div class="item-content">
                                            <div class="featured-recipe-item">
                                                <div class="recipe-photo">
                                                    <a href="#">
                                                        <div class="overlay-box"></div>
                                                        <img alt="Cà phê trứng ngon chuẩn"
                                                             src="{{ asset('users/imgs/coupon-contest.jpg') }}">
                                                    </a>
                                                </div>
                                                <div class="item-info-box">
                                                    <h3 class="title"><a href="#">Cà phê trứng ngon chuẩn</a></h3>
                                                    <div class="desc">Cà phê trứng là một món đồ uống từ lâu đã rất nổi
                                                        tiếng tại Việt Nam, không những cuốn hút người Việt mà người
                                                        nước ngoài khi sang Việt Nam cũng rất t...
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-header">
                                            <div class="hprofile">
                                                <div class="avt"><a href="#"> <img
                                                                src="{{ asset('users/imgs/coupon-contest.jpg') }}"
                                                                class="img-responsive"> </a></div>
                                                <div class="profile">
                                                    <div class="postedby-text">{{ trans("sites.receipt") }} {{ trans("sites.createby") }}
                                                        :
                                                    </div>
                                                    <a href="#"> Anh Nguyen </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="today-recipe-user">
                                    <div class="item-block recipe-block">
                                        <div class="item-content">
                                            <div class="featured-recipe-item">
                                                <div class="recipe-photo">
                                                    <a href="#">
                                                        <div class="overlay-box"></div>
                                                        <img alt="Cà phê trứng ngon chuẩn"
                                                             src="{{ asset('users/imgs/coupon-contest.jpg') }}">
                                                    </a>
                                                </div>
                                                <div class="item-info-box">
                                                    <h3 class="title"><a href="#">Cà phê trứng ngon chuẩn</a></h3>
                                                    <div class="desc">Cà phê trứng là một món đồ uống từ lâu đã rất nổi
                                                        tiếng tại Việt Nam, không những cuốn hút người Việt mà người
                                                        nước ngoài khi sang Việt Nam cũng rất t...
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-header">
                                            <div class="hprofile">
                                                <div class="avt"><a href="#"> <img
                                                                src="{{ asset('users/imgs/coupon-contest.jpg') }}"
                                                                class="img-responsive"> </a></div>
                                                <div class="profile">
                                                    <div class="postedby-text">{{ trans("sites.receipt") }} {{ trans("sites.createby") }}
                                                        :
                                                    </div>
                                                    <a href="#"> Anh Nguyen </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="today-recipe-user">
                                    <div class="item-block recipe-block">
                                        <div class="item-content">
                                            <div class="featured-recipe-item">
                                                <div class="recipe-photo">
                                                    <a href="#">
                                                        <div class="overlay-box"></div>
                                                        <img alt="Cà phê trứng ngon chuẩn"
                                                             src="{{ asset('users/imgs/coupon-contest.jpg') }}">
                                                    </a>
                                                </div>
                                                <div class="item-info-box">
                                                    <h3 class="title"><a href="#">Cà phê trứng ngon chuẩn</a></h3>
                                                    <div class="desc">Cà phê trứng là một món đồ uống từ lâu đã rất nổi
                                                        tiếng tại Việt Nam, không những cuốn hút người Việt mà người
                                                        nước ngoài khi sang Việt Nam cũng rất t...
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-header">
                                            <div class="hprofile">
                                                <div class="avt"><a href="#"> <img
                                                                src="{{ asset('users/imgs/coupon-contest.jpg') }}"
                                                                class="img-responsive"> </a></div>
                                                <div class="profile">
                                                    <div class="postedby-text">{{ trans("sites.receipt") }} {{ trans("sites.createby") }}
                                                        :
                                                    </div>
                                                    <a href="#"> Anh Nguyen </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="tab3">
                        <form id="form1" runat="server">
                            <div id="tabs">
                                <ul>
                                    <li>
                                        <a href="#a">{{ trans("sites.follow") }}</a>
                                    </li>
                                    <li>
                                        <a href="#b">Người {{ trans("sites.follow") }}</a>
                                    </li>
                                </ul>
                                <div id="a">
                                    <div class="row recipes-list row10">
                                        <div class="top-recipes-user">
                                            <div class="today-recipe-user">
                                                <div class="item-block recipe-block">
                                                    <div class="item-content">
                                                        <div class="featured-recipe-item">
                                                            <div class="recipe-photo">
                                                                <a href="#">
                                                                    <div class="overlay-box"></div>
                                                                    <img src="{{ asset('users/imgs/coupon-contest.jpg') }}">
                                                                </a>
                                                            </div>
                                                            <div class="item-info-box">
                                                                <h3 class="title"><a href="#">Trần Văn A</a></h3>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="today-recipe-user">
                                                <div class="item-block recipe-block">
                                                    <div class="item-content">
                                                        <div class="featured-recipe-item">
                                                            <div class="recipe-photo">
                                                                <a href="#">
                                                                    <div class="overlay-box"></div>
                                                                    <img src="{{ asset('users/imgs/coupon-contest.jpg') }}">
                                                                </a>
                                                            </div>
                                                            <div class="item-info-box">
                                                                <h3 class="title"><a href="#">Trần Văn A</a></h3>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="today-recipe-user">
                                                <div class="item-block recipe-block">
                                                    <div class="item-content">
                                                        <div class="featured-recipe-item">
                                                            <div class="recipe-photo">
                                                                <a href="#">
                                                                    <div class="overlay-box"></div>
                                                                    <img src="{{ asset('users/imgs/coupon-contest.jpg') }}">
                                                                </a>
                                                            </div>
                                                            <div class="item-info-box">
                                                                <h3 class="title"><a href="#">Trần Văn A</a></h3>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="b">
                                    <div class="row recipes-list row10">
                                        <div class="top-recipes-user">
                                            <div class="today-recipe-user">
                                                <div class="item-block recipe-block">
                                                    <div class="item-content">
                                                        <div class="featured-recipe-item">
                                                            <div class="recipe-photo">
                                                                <a href="#">
                                                                    <div class="overlay-box"></div>
                                                                    <img src="{{ asset('users/imgs/coupon-contest.jpg') }}">
                                                                </a>
                                                            </div>
                                                            <div class="item-info-box">
                                                                <h3 class="title"><a href="#">Trần Văn A</a></h3>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="today-recipe-user">
                                                <div class="item-block recipe-block">
                                                    <div class="item-content">
                                                        <div class="featured-recipe-item">
                                                            <div class="recipe-photo">
                                                                <a href="#">
                                                                    <div class="overlay-box"></div>
                                                                    <img src="{{ asset('users/imgs/coupon-contest.jpg') }}">
                                                                </a>
                                                            </div>
                                                            <div class="item-info-box">
                                                                <h3 class="title"><a href="#">Trần Văn A</a></h3>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="today-recipe-user">
                                                <div class="item-block recipe-block">
                                                    <div class="item-content">
                                                        <div class="featured-recipe-item">
                                                            <div class="recipe-photo">
                                                                <a href="#">
                                                                    <div class="overlay-box"></div>
                                                                    <img src="{{ asset('users/imgs/coupon-contest.jpg') }}">
                                                                </a>
                                                            </div>
                                                            <div class="item-info-box">
                                                                <h3 class="title"><a href="#">Trần Văn A</a></h3>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade in" id="tab4">
                        <div class="row recipes-list row10">
                            <div class="top-recipes-user">
                                <div class="today-recipe-user">
                                    <div class="item-block recipe-block">
                                        <div class="item-content">
                                            <div class="featured-recipe-item">
                                                <div class="recipe-photo">
                                                    <a href="#">
                                                        <div class="overlay-box"></div>
                                                        <img alt="Cà phê trứng ngon chuẩn"
                                                             src="{{ asset('users/imgs/coupon-contest.jpg') }}">
                                                    </a>
                                                </div>
                                                <div class="item-info-box">
                                                    <h3 class="title"><a href="#">Cà phê trứng ngon chuẩn</a></h3>
                                                    <div class="desc">Cà phê trứng là một món đồ uống từ lâu đã rất nổi
                                                        tiếng tại Việt Nam, không những cuốn hút người Việt mà người
                                                        nước ngoài khi sang Việt Nam cũng rất t...
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-header">
                                            <div class="hprofile">
                                                <div class="avt"><a href="#"> <img
                                                                src="{{ asset('users/imgs/coupon-contest.jpg') }}"
                                                                class="img-responsive"> </a></div>
                                                <div class="profile">
                                                    <div class="postedby-text">{{ trans("sites.receipt") }} {{ trans("sites.createby") }}
                                                        :
                                                    </div>
                                                    <a href="#"> Anh Nguyen </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="today-recipe-user">
                                    <div class="item-block recipe-block">
                                        <div class="item-content">
                                            <div class="featured-recipe-item">
                                                <div class="recipe-photo">
                                                    <a href="#">
                                                        <div class="overlay-box"></div>
                                                        <img alt="Cà phê trứng ngon chuẩn"
                                                             src="{{ asset('users/imgs/coupon-contest.jpg') }}">
                                                    </a>
                                                </div>
                                                <div class="item-info-box">
                                                    <h3 class="title"><a href="#">Cà phê trứng ngon chuẩn</a></h3>
                                                    <div class="desc">Cà phê trứng là một món đồ uống từ lâu đã rất nổi
                                                        tiếng tại Việt Nam, không những cuốn hút người Việt mà người
                                                        nước ngoài khi sang Việt Nam cũng rất t...
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-header">
                                            <div class="hprofile">
                                                <div class="avt"><a href="#"> <img
                                                                src="{{ asset('users/imgs/coupon-contest.jpg') }}"
                                                                class="img-responsive"> </a></div>
                                                <div class="profile">
                                                    <div class="postedby-text">{{ trans("sites.receipt") }} {{ trans("sites.createby") }}
                                                        :
                                                    </div>
                                                    <a href="#"> Anh Nguyen </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="today-recipe-user">
                                    <div class="item-block recipe-block">
                                        <div class="item-content">
                                            <div class="featured-recipe-item">
                                                <div class="recipe-photo">
                                                    <a href="#">
                                                        <div class="overlay-box"></div>
                                                        <img alt="Cà phê trứng ngon chuẩn"
                                                             src="{{ asset('users/imgs/coupon-contest.jpg') }}">
                                                    </a>
                                                </div>
                                                <div class="item-info-box">
                                                    <h3 class="title"><a href="#">Cà phê trứng ngon chuẩn</a></h3>
                                                    <div class="desc">Cà phê trứng là một món đồ uống từ lâu đã rất nổi
                                                        tiếng tại Việt Nam, không những cuốn hút người Việt mà người
                                                        nước ngoài khi sang Việt Nam cũng rất t...
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-header">
                                            <div class="hprofile">
                                                <div class="avt"><a href="#"> <img
                                                                src="{{ asset('users/imgs/coupon-contest.jpg') }}"
                                                                class="img-responsive"> </a></div>
                                                <div class="profile">
                                                    <div class="postedby-text">{{ trans("sites.receipt") }} {{ trans("sites.createby") }}
                                                        :
                                                    </div>
                                                    <a href="#"> Anh Nguyen </a>
                                                </div>
                                            </div>
                                        </div>
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
            