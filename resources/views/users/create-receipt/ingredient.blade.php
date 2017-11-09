<div class="tab-pane" role="tabpanel" id="step2">
    <div class="receipt-form">
        <div class="col-md-4" id="informIngre">

            <h3>2. {{ trans("sites.submit") }} {{ trans("sites.ingredient") }}</h3>
            <hr>
            <label>{{ trans("sites.name") }} {{ trans("sites.ingredient") }} </label>

            @if(count($ingredients) > 0)
                <button type="button" id="showCartButton" class="btn btn-default btn-xs" style="border:none;">
                    <i class="fa fa-shopping-cart"></i>
                </button>
            @endif
            <input type="text" class="form-control" id="nameIngredient" name="nameIngredient" value=""/>
            
            <br>
            <div id="showCartResult">
                @foreach($ingredients as $key => $item)
                    <span class="item">{{ $item->name }}</span>
                    <br>
                @endforeach
            </div>
            <label>{{ trans("sites.qty") }}</label>
            <input type="number" class="form-control" id="qtyIngredient" name="qtyIngredient" value=""/>
            <br>
            <label>{{ trans("sites.unit") }}</label>
            <select class="form-control" id="unitIngredient" name="unitIngredient">
                @foreach($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                @endforeach
            </select>
            <br>
            <label>{{ trans("sites.note") }}</label>
            <input type="text" class="form-control" id="noteIngredient" name="noteIngredient" value=""/>
            <br>
            <button type="button" id="addIngredient"><i class="fa fa-plus"></i></button>
        </div>
        <div class="col-md-8 resultIngre">
            <h3>
                <i class="fa fa-list"></i> {{ trans("sites.list") }} {{ trans("sites.ingredient") }}
            </h3>
            <hr>
            @if(isset($ur_ingredients))
                @foreach($ur_ingredients as $key => $item)
                    <div class="col-md-4 ingre{{$item->ingredient->id}}{{$item->id}}">
                        <button type="button" class="btn btn-default editIngre"
                                data-idIngre="{{ $item->ingredient_id }}" data-idRecIngre="{{ $item->id }}"
                                data-idReceipt="{{ $item->userReceipt->id }}">{{ trans("sites.edit") }}</button>
                        <button type="button" class="btn btn-primary delIngre"
                                data-idIngre="{{ $item->ingredient->id }}"
                                data-idRecIngre="{{ $item->id }}">{{ trans("sites.delete") }}</button>
                        <br>
                        <label>{{ trans("sites.name") }}:</label><label
                                id="name">{{ $item->ingredient->name }}</label><br>
                        <label>{{ trans("sites.qty") }}:</label><label id="qty">{{ $item->quantity }}</label><br>
                        <label>{{ trans("sites.unit") }}:</label><label
                                id="unit">{{ $item->ingredient->unit_id }}</label><br>
                        <label>{{ trans("sites.note") }}:</label><label id="note">{{ $item->note }}</label>
                    </div>
                    @if(++$key % 3 == 0)
                        <div class="clearfix"></div>
                        <br>
                    @endif
                @endforeach
            @elseif(!empty($receipt->receiptIngredients))
                @foreach($receipt->receiptIngredients as $key => $item)
                    <div class="col-md-4 ingre{{$item->ingredient->id}}{{$item->id}}">
                        <button type="button" class="btn btn-default editIngre"
                                data-idIngre="{{ $item->ingredient_id }}" data-idRecIngre="{{ $item->id }}"
                                data-idReceipt="{{ $item->receipt_id }}">{{ trans("sites.edit") }}</button>
                        <button type="button" class="btn btn-primary delIngre"
                                data-idIngre="{{ $item->ingredient->id }}"
                                data-idRecIngre="{{ $item->id }}">{{ trans("sites.delete") }}</button>
                        <br>
                        <label>{{ trans("sites.name") }}:</label><label
                                id="name">{{ $item->ingredient->name }}</label><br>
                        <label>{{ trans("sites.qty") }}:</label><label id="qty">{{ $item->quantity }}</label><br>
                        <label>{{ trans("sites.unit") }}:</label>
                        <label id="unit">
                            @foreach($units as $unit)
                                @if($item->ingredient->unit_id == $unit->id)
                                    {{ $unit->name }}
                                @endif
                            @endforeach
                            </label><br>
                        <label>{{ trans("sites.note") }}:</label><label id="note">{{ $item->note }}</label>
                    </div>
                    @if(++$key % 3 == 0)
                        <div class="clearfix"></div>
                        <br>
                    @endif
                @endforeach
            @endif
            
        </div>
        <div class="clearfix"></div>
        <ul class="list-inline pull-right">
            <li>
                <button type="button"
                        class="btn btn-default prev-step">{{ trans("sites.back") }}</button>
            </li>
            <li>
                <button type="button"
                        class="btn btn-primary next-step2">{{ trans("sites.next_step") }}
                </button>
            </li>
        </ul>
    </div>
</div>