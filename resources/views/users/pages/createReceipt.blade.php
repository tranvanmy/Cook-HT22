@extends("welcome")

@section("content")

    <link href="{{ asset('users/Content/tao-cong-thuc.css') }}" rel="stylesheet" type="text/css"/>
    <div class="container">
        <div class="row">
            <section>
                <div class="wizard" style="width:70%;">
                    <h1>{{ trans("sites.createReceiptShare") }}</h1>
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="{{ trans('sites.step1') }}">
                                <span class="round-tab">
                                    <i class="fa fa-cutlery"></i>
                                </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="{{ trans('sites.step2') }}">
                                <span class="round-tab">
                                    <i class="fa fa-birthday-cake"></i>
                                </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="{{ trans('sites.step3') }}">
                                <span class="round-tab">
                                    <i class="fa fa-list-alt"></i>
                                </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab"
                                   title="{{ trans('sites.complete') }}">
                            <span class="round-tab">
                                <i class="fa fa-file"></i>
                            </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form role="form" action="{{ route('addReceiptCate') }}" method="post" id="frm-receipt"
                          enctype="multipart/form-data">
                        <div class="tab-content">
                            <div class="control" style="text-align: center;margin:0.5em;">
                                <button type="button" class="btn btn-success btn-ms" id="create"
                                        data-id="{{ isset($receipt->id)?$receipt->id:'' }}">{{ trans("sites.createReceipt") }}
                                </button>
                                <button type="button" class="btn btn-danger btn-ms" id="cancel"
                                        data-id="{{ isset($receipt->id)?$receipt->id:'' }}">{{ trans("sites.cancel") }}
                                </button>
                            </div>
                            @include("users.create-receipt.receipt")
                            @include("users.create-receipt.ingredient")
                            @include("users.create-receipt.step")
                            @include("users.create-receipt.complete")
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
