@extends("welcome")

@section("content")

    <link href="{{ asset('users/Content/tao-cong-thuc.css') }}" rel="stylesheet" type="text/css"/>
    <div class="container">
        <div class="row">
            <section>
                <div class="wizard">
                    <h1>{{ trans("sites.createReceiptShare") }}</h1>
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Bước 1">
                            <span class="round-tab">
                                <i class="fa fa-cutlery"></i>
                            </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Bước 2">
                            <span class="round-tab">
                                <i class="fa fa-birthday-cake"></i>
                            </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Bước 3">
                            <span class="round-tab">
                                <i class="fa fa-list-alt"></i>
                            </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab"
                                   title="Hoàn thành">
                            <span class="round-tab">
                                <i class="fa fa-file"></i>
                            </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form role="form">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <div class="receipt-form">
                                    <div class="col-md-6 left">
                                        <h3>1. {{ trans("sites.createReceipt") }}</h3>
                                        <hr>
                                        <label>{{ trans("sites.nameFood") }}</label>
                                        <input type="text" class="form-control" name="nameReceipt" value=""/>
                                        <br>

                                        <label>{{ trans("sites.timeCook") }}</label>
                                        <input type="text" class="form-control" name="timeReceipt" value=""/>
                                        <br>
                                        <label>{{ trans("sites.complex") }}</label>
                                        <select class="form-control">
                                            <option value="1">{{ trans("sites.easy") }}</option>
                                            <option value="2">{{ trans("sites.normal") }}</option>
                                            <option value="3">{{ trans("sites.hard") }}</option>
                                        </select>
                                        <br>
                                        <label>{{ trans("sites.description") }}</label>
                                        <textarea class="form-control"></textarea>
                                    </div>


                                    <div class="col-md-6 right">
                                        <h3><i class="fa fa-picture-o"></i> {{ trans("sites.avatar") }}</h3>
                                        <hr>
                                        <label class="btn btn-default">
                                            <input type="file" hidden>
                                        </label>
                                    </div>


                                    <div class="clearfix"></div>
                                    <ul class="list-inline pull-right">
                                        <li>
                                            <button type="button"
                                                    class="btn btn-primary next-step">{{ trans("sites.next_step") }}
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <div class="receipt-form">

                                    <div class="col-md-4">
                                        <h3>2. {{ trans("sites.submit") }} {{ trans("sites.ingredient") }}</h3>
                                        <hr>
                                        <label>{{ trans("sites.name") }} {{ trans("sites.ingredient") }} </label>
                                        <input type="text" class="form-control" name="nameIngredient" value=""/>
                                        <br>

                                        <label>{{ trans("sites.qty") }}</label>
                                        <input type="text" class="form-control" name="qtyIngredient" value=""/>
                                        <br>
                                        <label>{{ trans("sites.unit") }}</label>
                                        <select class="form-control" name="unitIngredient">
                                            <option value="0">{{ trans("sites.choose") }} {{ trans("sites.unit") }}</option>
                                            <option value="1">Gam</option>
                                            <option value="2">Con</option>
                                            <option value="3">Miếng</option>
                                        </select>
                                        <br>
                                        <label>{{ trans("sites.note") }}</label>
                                        <input type="text" class="form-control" name="noteIngredient" value=""/>
                                        <br>
                                        <button id="addIngredient"><i class="fa fa-plus"></i></button>
                                    </div>
                                    <div class="col-md-8">
                                        <h3>
                                            <i class="fa fa-list"></i> {{ trans("sites.list") }} {{ trans("sites.ingredient") }}
                                        </h3>
                                        <hr>
                                        <div class="resultIngredient"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul class="list-inline pull-right">
                                        <li>
                                            <button type="button" class="btn btn-default prev-step">Quay lại</button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                    class="btn btn-primary next-step">Bước tiếp theo
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step3">
                                <div class="receipt-form">
                                    <div class="col-md-5">
                                        <h3>3. {{ trans("sites.stepCook") }}</h3>
                                        <hr>
                                        <label>{{ trans("sites.description") }}</label>
                                        <textarea class="form-control"></textarea>
                                        <br>
                                        <label> {{ trans("sites.chooseAvatarForStep") }}</label>

                                        <label class="btn btn-default">
                                            <input type="file" hidden>
                                        </label>
                                        <br>
                                        <button id="addIngredient"><i class="fa fa-plus"></i></button>
                                    </div>
                                    <div class="col-md-7">
                                        <h3>{{ trans("sites.listStep") }}</h3>
                                        <hr>
                                        <div class="resultStep"></div>
                                    </div>

                                    <div class="clearfix"></div>
                                    <ul class="list-inline pull-right">
                                        <li>
                                            <button type="button"
                                                    class="btn btn-default prev-step">{{ trans("sites.back") }}</button>
                                        </li>
                                        <li>
                                            <button type="button"
                                                    class="btn btn-primary btn-info-full next-step">{{ trans("sites.next_step") }}
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="complete">
                                <div class="receipt-form">

                                    <h2>{{ trans("sites.chooseCateCorres") }}</h2>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <h4>4. Thể loại món ăn</h4>
                                        <hr>
                                        <p>You have successfully completed all steps.</p>
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>4. Thể loại món ăn</h4>
                                        <hr>
                                        <label>Category</label>
                                        <br>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="col-md-6">
                                        <h4>4. Thể loại món ăn</h4>
                                        <hr>
                                        <label>Category</label>
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <h4>4. Thể loại món ăn</h4>
                                        <hr>
                                        <label>Category</label>
                                        <br>
                                    </div>

                                    <div class="clearfix"></div>
                                    <ul class="list-inline pull-right">
                                        <li>
                                            <button type="submit"
                                                    class="btn btn-primary next-step">{{ trans("sites.createReceipt") }}
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
@endsection
@section("script")
    {{ Html::script("users/js/createReceipt.js") }}
@endsection
