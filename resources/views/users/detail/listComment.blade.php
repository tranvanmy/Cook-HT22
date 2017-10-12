<div class="recipe-reviews" id="reviewlist">
    <div class="review-item recipe-review-item">
        <div class="body">
            <div class="user-info">
                <div class="avt">
                    <a href="#" target="_self">
                        <img class="photo"
                             src="{{ asset('upload/images/'.$rate->user->avatar) }}"
                             alt="{{ $rate->user->name }}">
                    </a>
                </div>
                <div class="profile">
                    <a href="/thanh-vien/nguyendiep29071990" target="_self"
                       class="name cooky-user-link">
                        <span> {{ $rate->user->name }}</span></a>
                    <div class="clearfix"></div>
                    <span class="user-stats">
                            <span class="stats-item">
                                <span class="stats-count">4</span>
                                <span class="stats-text"> {{ trans("sites.receipt") }}</span>
                            </span>
                            <span class="stats-item">
                                <span class="stats-count">1</span>
                                <span class="stats-text"> {{ trans("sites.care") }}</span>
                            </span>
                        </span>
                </div>
            </div>
            <div class="title text-ellipsis">
                <a href="#"
                   target="_self"><span class="text-bold">{{ $receipt->name }}</span></a>
            </div>
            <div class="content">
                <div class="review-content trusted-html-with-emotion">
                    {{ $rate->content }}
                </div>
            </div>

            <div class="photos-container">
            </div>

            <div class="rating">
                <span class="rating-value">{{ $rate->point }}.0</span>
                <div class="clearfix"></div>
                <span class="date-time rated-date" title="16/08/2016 12:52:14">
                        {!!  \Carbon\Carbon::createFromTimestamp(strtotime($item->created_at))->diffForHumans() !!}
                    </span>
            </div>
            @if(Auth::check())
                <div class="reply-review">
                    <a class="replyForm" data-id="{{ $rate->id }}" href="javascript:void(0)">
                        <i class="fa fa-comment-o"></i>{{ trans("sites.reply") }}
                    </a>
                </div>
            @else
                <div class="reply-review">
                    <a class="replyForm" href="{{ route('login') }}">
                        {{ trans("sites.login") }}
                    </a>
                    <span>{{ trans("sites.toComment") }}</span>
                </div>
        @endif
        <!-- reply content -->
            <div id="reply-all">
                @foreach($rate->comments as $item2)
                    <div class="comments" id="comment">
                        <div class="cooky-comment-item-new">
                            <div class="comment-item">
                                <div class="comment-profile-img">
                                    <a class="user-avt" href="#" target="_self">
                                        <img alt="Sơn Híp" src="{{ asset('upload/images/'.$item2->user->avatar) }}"></a>
                                </div>
                                <div class="comment-content">
                                    <div class="comment-head">
                                        <a class="cooky-user-link" href="#">
                                            {{ $item2->user->name }}
                                        </a>
                                        <div class="date-time">
                                            <span>{!!  \Carbon\Carbon::createFromTimestamp(strtotime($item2->created_at))->diffForHumans() !!}</span>
                                        </div>
                                    </div>
                                    <div class="comment-text to-trusted-html-with-emoticon">
                                        {{ $item2->content }}
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
            <!-- end reply content -->
                <div class="clearfix"></div>
                <!-- form reply -->
                <div class="review-comment-container{{ $rate->id }}" style="display:none;">
                    <div class="comment-profile-img">
                        <a href="javascript:void(0);">
                            @if(Auth::check())
                                <img class="img-responsive img-rounded"
                                     src=" {{ asset('upload/images/'.Auth::user()->avatar) }}">
                            @endif
                        </a>
                    </div>
                    <div class="comment-content">
                            <textarea id="recipereviewcommentbox"
                                      class="form-control auto-height reply-content{{ $rate->id }}"
                                      placeholder="Trả lời bình luận"></textarea>
                        <div class="full">
                            <div class="text-right buttuonAction">
                                <button class="btn btn-default btn-sm reset" data-rateid="{{ $rate->id }}">Huỷ
                                </button>
                                <button class="btn btn-primary btn-sm reply"
                                        data-userID="{{ $receipt->user->id }}"
                                        data-rateid="{{ $rate->id }}"
                                " data-receiptID="{{ $rate->receipt_id }}">Trả lời</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end form reply -->
        </div>
    </div>
</div>