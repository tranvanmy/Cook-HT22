<div class="tab-pane active" role="tabpanel" id="step1">
    <div class="receipt-form">
        <div class="col-md-6 left">
            <h3>1. {{ trans("sites.createReceipt") }}</h3>
            <hr>
            <label>{{ trans("sites.nameFood") }}</label>
            <input type="text" class="form-control" id="nameReceipt" name="nameReceipt"
                   value="{{ isset($receipt->name)?$receipt->name:'' }}"/>
            <br>

            <label>{{ trans("sites.timeCook") }}</label>
            <input type="number" class="form-control" id="timeReceipt" name="timeReceipt"
                   value="{{ isset($receipt->time)?$receipt->time:'' }}"/>
            <br>
            <label>{{ trans("sites.ration") }}</label>
            <input type="number" class="form-control" id="rationReceipt"
                   name="rationReceipt" value="{{ isset($receipt->ration)?$receipt->ration:'' }}"/>
            <br>
            <label>{{ trans("sites.complex") }}</label>
            <select class="form-control" id="sltComplexReceipt" name="sltComplexReceipt">
                <option value="1" {{ (isset($receipt->complex) && $receipt->complex == 1)?"selected":'' }}>{{ trans("sites.easy") }}</option>
                <option value="2" {{ (isset($receipt->complex) && $receipt->complex == 2)?"selected":'' }}>{{ trans("sites.normal") }}</option>
                <option value="3" {{ (isset($receipt->complex) && $receipt->complex == 3)?"selected":'' }}>{{ trans("sites.hard") }}</option>
            </select>
            <br>
            <label>{{ trans("sites.description") }}</label>
            <textarea class="form-control" id="descReceipt"
                      name="descReceipt">{{ isset($receipt->description)?$receipt->description:'' }}</textarea>
        </div>


        <div class="col-md-6 right">
            <h3><i class="fa fa-picture-o"></i> {{ trans("sites.avatar") }}(*)</h3>
            <hr>
            <label class="btn btn-default">
                <input type="file" class="form-control" id="imageReceipt" name="imageReceipt">
            </label>
            <div class="clearfix"></div>
            <br>
            <div class="avatarReceipt">
                <img src="{{ isset($receipt->image)?asset('upload/images/'.$receipt->image):'' }}"/>
            </div>
        </div>


        <div class="clearfix"></div>
        <ul class="list-inline pull-right">
            <li>
                <button type="button"
                        class="btn btn-primary next-step1" data-id='{{ isset($receipt->id)?$receipt->id:'' }}'
                ">{{ trans("sites.next_step") }}
                </button>
            </li>
        </ul>
    </div>
</div>