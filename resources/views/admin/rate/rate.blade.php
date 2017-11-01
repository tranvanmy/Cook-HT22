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
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr align="center">
        <th>STT</th>
        <th>{{ trans("sites.avatar") }}</th>
        <th>{{ trans('sites.name') }}</th>
        <th>{{ trans('sites.rate') }}</th>
        <th>{{ trans("sites.name") }} {{ trans("sites.receipt") }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($rates as $key => $item)
        <tr class="odd gradeX rows{{ $item->id }}" align="center">
            <td>{{ ++$key }}</td>
            <td><img src="@if($item->user->password != ''){{ asset('upload/images/'.$item->user->avatar) }} @else {{ asset($item->user->avatar) }} @endif"/></td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->point }}</td>
            <td>{{ $item->receipt->name }} </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
@section("script")
    {{ Html::script("admin/js/user.js") }}
@endsection
