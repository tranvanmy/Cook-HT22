<div class="wide-box wide-box-white top-members-wrapper">
    <div class="top-course-box">
        <div class="container">
            <div class="top-course-list">
                <div class="top-course-header">
                    <h3>{{ trans("sites.topCategory") }}</h3>
                </div>
                @foreach($_topFoody as $item)
                    <div class="top-course-item"><a href="{{ route('foody',$item->foody->id) }}" target="_blank" class="mon-khai-vi">
                            <span class="fa fa-cutlery text-gray"></span> 
                            <span> {{ $item->foody['name'] }} </span> 
                            <span class="text">
                                (<span class="count">{{ $item['count'] }} {{ trans("sites.receipt") }}</span>)
                            </span> </a></div>
                @endforeach
                <div class="top-course-item"><a href="{{ route('receiptAll') }}" target="_blank" class="other"> Xem thêm <span
                                class="text"> <span class="fa fa-angle-double-right"></span> </span> </a></div>
            </div>
            <div class="top-course-list">
                <div class="top-course-header">
                    <h3>{{ trans("sites.top_member") }}</h3>
                </div>
                @foreach($_top7 as $item)
                    <div class="top-course-item"><a href="{{ route('myProfile',$item->user->id) }}" target="_blank"
                                                    class="mon-khai-vi">
                            <span class="fa fa-user text-gray"></span> 
                            <span> {{ $item->user->name }} </span> 
                            <span class="text">(<span
                                        class="count">{{ count($item->user->follows) }} {{ trans("sites.care") }}</span>)</span> </a></div>
                @endforeach
                <div class="top-course-item"><a href="{{ route('topLove') }}" target="_blank" class="other"> Xem
                        thêm <span
                                class="text"> <span class="fa fa-angle-double-right"></span> </span> </a></div>
            </div>
            <div class="top-course-list">
                <div class="top-course-header">
                    <h3>{{ trans("sites.topEvaluateBigger") }}</h3>
                </div>
                @foreach($_top8 as $item)
                    <div class="top-course-item"><a href="{{ route('detail',$item->id) }}" target="_blank" class="mon-khai-vi">
                            <span class="fa fa-comments-o text-gray"></span> <span> {{ $item->name }} </span> <span
                                    class="text">(<span class="count">{{ $item->rate_point }}<i
                                            class="fa fa-star"></i> </span>)</span> </a></div>
                @endforeach
                <div class="top-course-item"><a href="{{ route('topEvaluate') }}" target="_blank" class="other"> Xem
                        thêm <span
                                class="text"> <span class="fa fa-angle-double-right"></span> </span> </a></div>
            </div>
            <div class="top-course-list">
                <div class="top-course-header">
                    <h3>{{ trans("sites.top_chef") }}</h3>
                </div>
                @foreach($_top8Chef as $item)
                    <div class="top-course-item"><a href="{{ route('myProfile',$item->user->id) }}" target="_blank"
                                                    class="mon-khai-vi">
                            <span class="fa fa-check text-gray"></span> <span> {{ $item->user->name }} </span> <span
                                    class="text">(<span
                                        class="count">{{ count($item->user->receipts) }} {{ trans("sites.receipt") }}</span>)</span> </a></div>
                @endforeach
                <div class="top-course-item"><a href="{{ route('topChef') }}" target="_blank" class="other"> Xem
                        thêm <span
                                class="text"> <span class="fa fa-angle-double-right"></span> </span> </a></div>
            </div>
        </div>
    </div>
</div>
