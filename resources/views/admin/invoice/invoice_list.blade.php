@extends("admin.master")

@section("controller", trans('sites.invoice') )

@section("action", trans('sites.list') )

@section("content")

@section("style")
    {{ Html::style("admin/css/invoice.css") }}
@endsection
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body">
                <p>{{ trans("sites.update") }} {{ trans("sites.status") }}</p>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <select name="sltStatus" id="sltStatus" class="form-control">
                    <option value="1">{{ trans("sites.active") }}</option>
                    <option value="0">{{ trans("sites.unactive") }}</option>
                </select>
                <br>
                <div id="titleCart">
                    <span>{{ trans("sites.cart") }}</span>
                    <span>{{ trans("sites.allReceiptBuy") }}</span>
                </div>
                <hr>
                <table id="cart" class="table table-hover table-condensed table-striped pull-center">
                    <thead>
                        <tr>
                            <th>{{ trans("sites.receipt") }}</th>
                            <th>{{ trans("sites.price") }}</th>
                            <th style="width:5%;">{{ trans("sites.qty") }}</th>
                            <th class="text-center">{{ trans("sites.subTotal") }}</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div id="total">
                    <table class="table table-striped table-bordered ">
                        <tbody>
                        <tr>
                            <td><span class="extra bold totalamout">Total :</span></td>
                            <td><span class="bold totalamout a">5</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-primary btn-ms" id="update">{{ trans("sites.update") }}</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans("sites.close") }}</button>
            </div>
        </div>

    </div>
</div>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr align="center">
            <th>STT</th>
            <th>{{ trans('sites.name') }}</th>
            <th>{{ trans('sites.address') }}</th>
            <th>{{ trans('sites.phone') }}</th>
            <th>{{ trans('sites.note') }}</th>
            <th>{{ trans('sites.total') }}</th>
            <th>{{ trans('sites.active') }}</th>
            <th>{{ trans('sites.detail') }}</th>
        </tr>
    </thead>
    <tbody>
    @foreach($order as $key => $item)
        <tr class="odd gradeX rows{{ $item->id }}" align="center">
            <td>{{ ++$key }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->address }}</td>
            <td>0{{ $item->phone }}</td>
            <td>{{ $item->note }}</td>
            <td>{{ $item->totalPrice }}</td>
            <td>
                @if($item->status == 0 )
                    <i class="fa fa-cog" aria-hidden="true" title="{{ trans('sites.unApproved') }}"></i>
                @elseif($item->status == 1)
                    <i class="fa fa-check" aria-hidden="true" title="{{ trans('sites.approved') }}"></i>
                @endif
            </td>
            <td class="center">
                <button data-id="{{ $item->id }}" data-total="{{ $item->totalPrice }}" type="button"
                        class="btn btn-info btn-xs editStatus"
                        data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-info-circle fa-fw"></i>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
@section("script")
    {{ Html::script("admin/js/invoice.js") }}
@endsection
