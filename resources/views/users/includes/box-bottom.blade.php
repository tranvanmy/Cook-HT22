<div class="container">
    <div class="headline">
        <h2>{{ trans("sites.topEvaluateBigger") }}</h2>
    </div>
    <div class="result-list recipe-list row10">
                        @foreach($_top8 as $item)
                            <div class="result-recipe-wrapper">
                                <div class="result-recipe-item">
                                    <div class="item-inner">
                                        <div class="item-photo">
                                            <a rel="alternate" href="{{ route('detail',$item->id) }}" target="_blank">
                                                <img class="photo img-responsive"
                                                     src="{{ asset('upload/images/'.$item->image) }}"
                                                     alt="{{ $item->name }}"/>
                                            </a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-header">
                                                <div class="title">
                                                    <h3>
                                                        <a rel="alternate" href="{{ route('detail',$item->id) }}"
                                                           title="{{ $item->name }}"
                                                           target="_blank">{{ $item->name }}</a>
                                                    </h3>
                                                </div>
                                                <div class="item-stats">
                                                    <div class="stats">
                                                        <ul class="list-inline nomargin">
                                                            <li class="stats-item">
                                                                <span class="fa fa-clock-o stats-ico"></span>
                                                                <span class="stats-count">{{ $item->time }}</span><span
                                                                        class="stats-text">{{ trans("sites.hour") }}</span>
                                                            </li>
                                                            <li class="stats-item"><span
                                                                        class="fa fa-bolt stats-ico"></span> <span
                                                                        class="stats-text stats-count">
                                                            @if($item->complex == 1)
                                                                        {{ trans("sites.easy")}}
                                                                    @elseif($item->complex == 2)
                                                                        {{ trans("sites.normal") }}
                                                                    @else
                                                                        {{ trans("sites.hard") }}
                                                                    @endif
                                                        </span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="ingredients">
                                                    @foreach($item->receiptIngredients as $value)
                                                        <span> {{ $value->ingredient->name }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="item-footer">
                                                <div class="recipe-by">
                                                    <a href="../thanh-vien/belun.html" target="_blank">
                                                        <img class="circle"
                                                             src="{{ asset('upload/images/'.$item->user->avatar) }}"/>
                                                        {{ $item->user->name }}
                                                    </a>
                                                </div>
                                                <div class="recipe-acts">
                                                    <div class="btn-group">
                                                        <a href="javascript:void(0)" class="btn btn-danger">
                                                            <span class="fa fa-star text-orange"></span>
                                                            <span>{{ $item->rate_point }} </span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
    <a href="{{ route('topEvaluate') }}" class="view-more-btn"><span class="fa fa-hand-o-right text-highlight"></span> {{ trans("sites.see_more")
        }}</a>
</div>
