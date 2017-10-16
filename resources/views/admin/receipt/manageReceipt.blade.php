@extends("admin.master")

@section("controller", trans('sites.receipt') )

@section("action", trans('sites.list') )

@section("content")

@section("style")
    {{ Html::style("admin/css/ingredient.css") }}
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
                <button type="button" class="btn btn-primary btn-ms" id="update">{{ trans("sites.update") }}</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans("sites.close") }}</button>
            </div>
        </div>

    </div>
</div>
<!--  -->
<!-- Trigger the modal with a button -->

<!-- Trigger the modal with a button -->

<!-- Modal -->
<div id="iframe" class="modal fade" role="dialog" >
        <iframe src="" style="width:100%;height: 600px;"></iframe>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
</div>

<!-- Modal -->
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr align="center">
        <th>STT</th>
        <th>{{ trans("sites.avatar") }}</th>
        <th>{{ trans('sites.name') }}</th>
        <th>{{ trans('sites.category') }}</th>
        <th>{{ trans('sites.description') }}</th>
        <th>{{ trans('sites.active') }}</th>
        <th>{{ trans('sites.edit') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($receipt as $key => $item)
        <tr class="odd gradeX rows{{ $item->id }}" align="center">
            <td>{{ ++$key }}</td>
            <td><img src="{{ asset('upload/images/'.$item->image) }}"/></td>
            <td><a class="openpop" href="{{ route('detail',$item->id) }}" data-toggle="modal" data-target="#iframe">{{ $item->name }}</a></td>
            <td>
                @foreach($item->receiptFoodies as $item2)
                    <div class="btn btn-primary btn-xs">{{ $item2->foody->name }}</div>
                @endforeach
            </td>
            <td>{{ $item->description }}</td>
            <td>
                @if($item->status == 2)
                    <i class="fa fa-spinner" aria-hidden="true" title="{{ trans('sites.incomplete') }}"></i>
                @elseif($item->status == 0 )
                    <i class="fa fa-cog" aria-hidden="true" title="{{ trans('sites.unApproved') }}"></i>
                @elseif($item->status == 1)
                    <i class="fa fa-check" aria-hidden="true" title="{{ trans('sites.approved') }}"></i>
                @endif
            </td>
            <td class="center">
                @if($item->status != 2)
                    <button data-id="{{ $item->id }}" type="button" class="btn btn-info btn-xs editStatus"
                            data-toggle="modal" data-target="#myModal">
                        <i class="fa fa-pencil fa-fw"></i>
                    </button>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
@section("script")
    {{ Html::script("admin/js/receipt.js") }}
@endsection
