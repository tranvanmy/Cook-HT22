<div class="dining-recipes-box home-top-recipes home-top-box">
    <div class=headline>
        <h2>{{ trans("sites.receiptFromChef") }}</h2>
    </div>
    <div class="row recipes-list row10">
        <div class="top-recipes-user">
            @foreach($_6newReceipt as $item)
                <div class="today-recipe-user">
                    <div class="item-block recipe-block">
                        <div class="item-content">
                            <div class="featured-recipe-item">
                                <a href="{{ route('detail',$item->id) }}">
                                    <div class="recipe-photo">
                                        <div class="overlay-box"></div>
                                        <img alt="{{ $item->name }}"
                                             src="{{ asset('upload/images/'.$item->image) }}">
                                    </div>
                                </a>
                                <div class="item-info-box">
                                    <h3 class="title"><a href="{{ route('detail',$item->id) }}">{{ $item->name }}</a>
                                    </h3>
                                    <div class="desc">
                                        {{ $item->description }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item-header">
                            <div class="hprofile">
                                <div class="avt"><a href="{{ route('myProfile',$item->user->id) }}"><img
                                                src="{{ asset('upload/images/'.$item->user->avatar) }}"
                                                class="img-responsive"></a>
                                </div>
                                <div class="profile">
                                    <div class="postedby-text">{{ trans("sites.receipt") }} {{ trans("sites.createby") }}
                                        :
                                    </div>
                                    <a href="{{ route('myProfile',$item->user->id) }}"> {{ $item->user->name }} </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
