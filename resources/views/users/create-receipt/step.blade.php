<div class="tab-pane" role="tabpanel" id="step3">
    <div class="receipt-form">
        <div class="col-md-5" id="informStep">
            <h3>3. {{ trans("sites.stepCook") }}</h3>
            <hr>

            <label>{{ trans("sites.description") }}</label>
            <textarea id="contentStep" name="contentStep" class="form-control"></textarea>
            <br>
            <label> {{ trans("sites.chooseAvatarForStep") }}</label>

            <label class="btn btn-default">
                <input class="form-control" id="imageStep" name="imageStep" type="file" hidden>
            </label>
            <br>
            <button type="button" id="addStep"><i class="fa fa-plus"></i></button>
        </div>
        <div class="col-md-7">
            <h3>{{ trans('sites.listStep') }}</h3>
            <hr>
            <div class="resultStep">
                @if(!empty($step))
                    @foreach($step as $key => $item)
                        <div class="col-md-6 step{{ $item->id }}">
                            <button type="button" class="btn btn-default editStep"
                                    data-idstep="{{ $item->id }}">{{ trans("sites.edit") }}</button>
                            <button type="button" class="btn btn-primary delStep"
                                    data-idstep="{{ $item->id }}">{{ trans("sites.delete") }}</button>
                            <br>
                            <label>{{ $item->step }}.</label>
                            <label>{{ trans("sites.content") }}:</label><label id="content">{{ $item->content }}</label><br>
                            <img src="{{ asset('upload/images/'.$item->image) }}"/>
                        </div>
                        @if(++$key % 2 == 0)
                            <div class="clearfix"></div>
                            <br>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="clearfix"></div>
        <ul class="list-inline pull-right">
            <li>
                <button type="button"
                        class="btn btn-default prev-step">{{ trans("sites.back") }}</button>
            </li>
            <li>
                <button type="button"
                        class="btn btn-primary btn-info-full next-step3">{{ trans("sites.next_step") }}
                </button>
            </li>
        </ul>
    </div>
</div>