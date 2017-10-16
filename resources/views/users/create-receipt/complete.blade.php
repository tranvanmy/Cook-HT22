<div class="tab-pane" role="tabpanel" id="complete">
    <div class="receipt-form">
        <h2>{{ trans("sites.chooseCateCorres") }}</h2>
        <div class="clearfix"></div>
        @foreach($foodies as $key => $item)
            <div class="col-md-6">
                <h4>{{ ++$key }}. {{ $item["name"] }}</h4>
                <hr>
                <div class="form-group">
                    @foreach($item->childs as $key => $item2)
                        <div class="col-md-3">
                            <input type="checkbox" class="nameBox"
                                   name="nameBox[]" value="{{ $item2['id'] }}"
                                   @if(!empty($recFoody))
                                       @foreach ($recFoody as $value)
                                           @if($value->foody_id == $item2["id"])
                                                checked="checked"
                                           @endif
                                       @endforeach 
                                   @endif
                                   />
                            <span>{{ $item2['name'] }}</span>
                        </div>
                        @if(++$key % 4 == 0)
                            <div class="clearfix"></div>
                            <br>
                        @endif
                    @endforeach
                </div>
                <br>
            </div>
            @if($key == 2)
                <div class="clearfix"></div>
            @endif
        @endforeach
        <ul class="list-inline pull-right">
            <li>
                <button type="button" class="btn btn-default prev-step">{{ trans("sites.back") }}</button>
            </li>
            <li>
                <button type="button"
                        class="btn btn-primary next-step">{{ trans("sites.complete") }}
                </button>
            </li>
        </ul>
    </div>
</div>
