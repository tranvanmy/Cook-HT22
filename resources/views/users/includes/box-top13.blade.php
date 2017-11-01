<div class="top-ranking-members">
    <div class="headline">
        <h2>{{ trans("sites.top_member") }}</h2>
    </div>
    <div class="ranking-members-list">
        <div class="member-list topchef-list row10">
            @foreach($_top7 as $key => $item)
                <div class="member-item-wrapper">
                    <div class="member-item">
                        <span class="topnum topnum{{ ++$key }}">{{ $key }}</span>
                        <div class="member-profile nopadding">
                            <div class="avatar z-effect">
                                <img @if($item->user->password != "") src="{{ asset('upload/images/'.$item->user->avatar) }}"
                                     @else src="{{ $item->user->avatar }}" @endif
                                     class="img-responsive img-circle"/>
                            </div>
                            <div class="profile">
                                <a target="_blank" href="{{ route('myProfile',$item->user->id) }}"
                                   class="cooky-user-link name"
                                   data-userid="83594">{{ $item->user->name }}
                                   @if($item->user->rank == 1)
                                        <div class="btn btn-xs btn-info">{{ trans("sites.newbie") }}</div>
                                    @elseif($item->user->rank == 2)
                                        <div class="btn btn-xs btn-primary">{{ trans("sites.professinal") }}</div>
                                    @else <div class="btn btn-xs btn-success">{{ trans("sites.masterChef") }}</div>
                                    @endif
                                </a>
                                <span class="stats-text user-lvl newbee "></span>
                                <div class="stats">
                                            <span class="stats-item">
                                                <span class="stats-count">{{ count($item->user->receipts) }}</span>
                                                <span class="stats-text">{{ trans("sites.receipt") }}</span>
                                            </span>
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
        <a class="btn-more" href="{{ route('topLove') }}" target="_blank">{{ trans("sites.top_member") }} »</a>
    </div>
</div>
