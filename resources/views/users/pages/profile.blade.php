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
                <img alt="{{ $user->name }}" @if($user->password!='') src="{{ asset('upload/images/'.$user->avatar) }}"
                     @else src="{{ $user->avatar }}" @endif >
            </div>
            <div class="card-info">
                <span class="card-title">{{ $user->name }} </span>
            </div>
        </div>
        <br>
        <div class="profile-left">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img @if($user->password!='') src="{{ asset('upload/images/'.$user->avatar) }}"
                         @else src="{{ $user->avatar }}" @endif class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        {{ $user->name }}
                        @if($user->rank == 1)
                            <div class="btn btn-xs btn-info">{{ trans("sites.newbie") }}</div>
                        @elseif($user->rank == 2)
                            <div class="btn btn-xs btn-primary">{{ trans("sites.professinal") }}</div>
                        @else <div class="btn btn-xs btn-success">{{ trans("sites.masterChef") }}</div>
                        @endif
                    </div>
                    
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                @if(Auth::check() && $user->id != Auth::user()->id)
                    <div class="profile-userbuttons">
                        <button type="button" data-idFollower="{{ Auth::user()->id }}"
                            data-idFollowing="{{ $user->id }}" class="btn btn-success btn-sm follow">
                            {{ ($follower['status'] == 1)  ? trans("sites.noCare") : trans("sites.care") }}
                        </button>
                    </div>
                @endif
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
                        <h3>{{ trans("sites.user_profile") }}</h3>
                        <div class="clearfix"></div>
                        <label>{{ trans("sites.email") }}</label>
                        <span> {{ $user->email }}</span><br>

                        @if(Auth::check() && $user->id == Auth::user()->id)
                            <label>{{ trans("sites.name") }}</label><input type="text" id="name" class="form-control"
                                                                           value="{{ $user->name }}"/>
                            <label>{{ trans("sites.phone") }}</label><input type="text" id="phone" class="form-control"
                                                                            value="{{ $user->phone }}"/>
                            <label>{{ trans("sites.address") }}</label><input type="text" id="address"
                                                                              class="form-control"
                                                                              value="{{ $user->address }}"/>
                            <label>Cập nhật avatar</label><input type="file" id="avatar" class="form-control"/>
                        @else
                            <label>{{ trans("sites.name") }}</label><input type="text" class="form-control"
                                                                           value="{{ $user->name }}" disabled/>
                            <label>{{ trans("sites.phone") }}</label><input type="text" class="form-control"
                                                                            value="{{ $user->phone }}" disabled/>
                            <label>{{ trans("sites.address") }}</label><input type="text" class="form-control"
                                                                              value="{{ $user->address }}" disabled/>
                        @endif
                        <label>{{ trans("sites.dateOfParticipation") }}</label>
                        <span> {{ date('d-m-Y', strtotime($user->created_at)) }}</span><br>
                        <br>
                        @if(Auth::check())
                            <button style="margin-left: 25em;" type="submit" id="updateInfo" data-id="{{ $user->id }}"
                                    name="btnUpdateUser" class="btn btn-default">Lưu thông tin
                            </button>
                        @endif
                    </div>
                    <div class="tab-pane fade in" id="tab2">
                      <div class="row">
                          <div class="tabs-left">
                            <ul class="nav nav-tabs">
                              <li class="active"><a href="#a" data-toggle="tab"><span class="fa fa-check">Đã duyệt</span></a></li>
                              <li><a href="#b" data-toggle="tab"><span class="fa fa-cog">Chưa duyệt</span></a></li>
                            </ul>
                            <div class="tab-content">
                              <div class="tab-pane active" id="a">
                                <h3>Các công thức đã duyệt</h3>
                                <ul class="list-group pull-left">
                                  <li class="list-group-item">
                                    <div class="row recipes-list row10">
                                        <div class="top-recipes-user">
                                            @foreach($user->receipts->where('status',1) as $key => $item)
                                                <div class="today-recipe-user">
                                                    <div class="item-block recipe-block">
                                                        <div class="item-content">
                                                            <div class="featured-recipe-item">
                                                                <div class="recipe-photo">
                                                                    <a href="{{ route('detail',$item->id) }}">
                                                                        <div class="overlay-box"></div>
                                                                        <img alt="Cà phê trứng ngon chuẩn"
                                                                             src="{{ asset('upload/images/'.$item->image) }}">
                                                                    </a>
                                                                </div>
                                                                <div class="item-info-box">
                                                                    <h3 class="title"><a
                                                                                href="{{ route('detail',$item->id) }}">{{ $item->name }}</a>
                                                                    </h3>
                                                                    <div class="desc">
                                                                        {{ $item->description }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if(++$key % 3 == 0)
                                                    <div class="clearfix"></div>
                                                    @endif
                                            @endforeach
                                        </div>
                                    </div>
                                  </li>

                                </ul>
                              </div>
                              <div class="tab-pane" id="b">
                                <h3>Các công thức chưa duyệt</h3>
                                <ul class="list-group pull-left">
                                  <li class="list-group-item">
                                    <div class="row recipes-list row10">
                                        <div class="top-recipes-user">
                                            @if(Auth::check() && $user->id == Auth::user()->id)
                                            @foreach($user->receipts->where('status',0) as $item)
                                                <div class="today-recipe-user">
                                                    <div class="item-block recipe-block">
                                                        <div class="item-content">
                                                            <div class="featured-recipe-item">
                                                                <div class="recipe-photo">
                                                                    <a href="{{ route('detail',$item->id) }}">
                                                                        <div class="overlay-box"></div>
                                                                        <img alt="Cà phê trứng ngon chuẩn"
                                                                             src="{{ asset('upload/images/'.$item->image) }}">
                                                                    </a>
                                                                </div>
                                                                <div class="item-info-box">
                                                                    <h3 class="title"><a
                                                                                href="{{ route('detail',$item->id) }}">{{ $item->name }}</a>
                                                                    </h3>
                                                                    <div class="desc">
                                                                        {{ $item->description }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @else
                                                <div class="today-recipe-user">
                                                    Bạn không thể xem phần này.
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                  </li>
                                </ul>
                              </div>
                            </div><!-- /tab-content -->
                          </div><!-- /tabbable -->
                      </div><!-- /row -->
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
                                            @foreach($user->followBys as $item)
                                                <div class="today-recipe-user">
                                                    <div class="item-block recipe-block">
                                                        <div class="item-content">
                                                            <div class="featured-recipe-item">
                                                                <div class="recipe-photo">
                                                                    <a href="{{ route('myProfile',$item->user->id) }}">
                                                                        <div class="overlay-box"></div>
                                                                        <img @if($item->user->password != '') src="{{ asset('upload/images/'.$item->user->avatar) }}
                                                                        @else src="{{ $item->user->avatar }}" @endif
                                                                        ">
                                                                    </a>
                                                                </div>
                                                                <div class="item-info-box">
                                                                    <h3 class="title"><a
                                                                                href="{{ route('myProfile',$item->user->id) }}">{{ $item->user->name }}</a>
                                                                    </h3>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div id="b">
                                    <div class="row recipes-list row10">
                                        <div class="top-recipes-user">
                                            @foreach($user->follows as $item)
                                                <div class="today-recipe-user">
                                                    <div class="item-block recipe-block">
                                                        <div class="item-content">
                                                            <div class="featured-recipe-item">
                                                                <div class="recipe-photo">
                                                                    <a href="{{ route('myProfile',$item->userFollow->id) }}">
                                                                        <div class="overlay-box"></div>
                                                                        <img @if($item->userFollow->password != '') src="{{ asset('upload/images/'.$item->userFollow->avatar) }}
                                                                        @else src="{{ $item->userFollow->avatar }}
                                                                        " @endif
                                                                        ">
                                                                    </a>
                                                                </div>
                                                                <div class="item-info-box">
                                                                    <h3 class="title"><a
                                                                                href="{{ route('myProfile',$item->userFollow->id) }}">{{ $item->userFollow->name }}</a>
                                                                    </h3>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade in" id="tab4">
                        <div class="row recipes-list row10">
                            <div class="top-recipes-user">
                                @foreach($user->likes as $item)
                                    <div class="today-recipe-user">
                                        <div class="item-block recipe-block">
                                            <div class="item-content">
                                                <div class="featured-recipe-item">
                                                    <div class="recipe-photo">
                                                        <a href="{{ route('detail',$item->receipt->id) }}">
                                                            <div class="overlay-box"></div>
                                                            <img alt="Cà phê trứng ngon chuẩn"
                                                                 src="{{ asset('upload/images/'.$item->receipt->image) }}">
                                                        </a>
                                                    </div>
                                                    <div class="item-info-box">
                                                        <h3 class="title"><a
                                                                    href="{{ route('detail',$item->receipt->id) }}">{{ $item->receipt->name }}</a>
                                                        </h3>
                                                        <div class="desc">{{ $item->receipt->description }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="item-header">
                                                <div class="hprofile">
                                                    <div class="avt"><a
                                                                href="{{ route('myProfile',$item->receipt->user_id) }}">
                                                            <img
                                                                    src="{{ asset('upload/images/'.$item->receipt->user->avatar) }}"
                                                                    class="img-responsive"> </a></div>
                                                    <div class="profile">
                                                        <div class="postedby-text">{{ trans("sites.receipt") }} {{ trans("sites.createby") }}
                                                            :
                                                        </div>
                                                        <a href="{{ route('myProfile',$item->receipt->user_id) }}"> {{ $item->receipt->user->name }} </a>
                                                    </div>
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
    <div class="clearfix"></div>
@endsection
@section("script")
    <script src="{{ asset('users/js/profile.js') }}"></script>
@endsection
            