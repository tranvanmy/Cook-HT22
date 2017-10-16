@extends("welcome")

@section("content")

    <section class="page-container">
        <div>
            <div class="wide-box">
                <div class="container">

                    <div class="headline">
                        <h1>TOP <strong class="text-highlight">10</strong> {{ trans("sites.chefLove") }}</h1>
                    </div>
                    <div class="member-list top-followers row10">
                        @foreach($_top10 as $item)
                            <div class="member-item-wrapper">
                                <div class="member-item">
                                    <div class="member-profile nopadding">
                                        <div class="avatar z-effect">
                                            <a href="{{ route('detail',$item->user->id) }}">
                                            <img class="img-responsive img-circle"
                                                 @if($item->user->password != "") src="{{ asset('upload/images/'.$item->user->avatar) }}"
                                                 @else src="{{ $item->user->avatar }}" @endif>
                                             </a>
                                        </div>
                                        <div class="profile">
                                            <a class="cooky-user-link name" data-userid="62838" href="{{ route('detail',$item->user->id) }}"
                                               data-hasqtip="62838">{{ $item->user->name }}</a>
                                            <div class="stats">
                                            <span class="stats-item">
                                                <span class="stats-count">{{ count($item->user->follows) }}</span>
                                                <span class="stats-text">{{ trans("sites.care") }}</span>
                                            </span>
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
    </section>
@endsection
