@extends("admin.master")

@section("controller", trans('sites.unit') )

@section("action", trans('sites.list') )

@section("content")

@section("style")
    {{ Html::style("admin/css/ingredient.css") }}
@endsection
<button type="button" class="btn btn-info btn-ms" data-toggle="modal"
        data-target="#myModal">{{ trans("sites.add") }}</button><br><br>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ trans("sites.add") }} {{ trans("sites.unit") }}</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
                <input type="text" class="form-control" id="nameUnit" value=""/><br>
                <button type="button" class="btn btn-info btn-ms" id="addUnit">{{ trans("sites.add") }}</button>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    {{ trans("sites.close") }}
                </button>
            </div>
        </div>

    </div>
</div>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr align="center">
        <th>STT</th>
        <th>{{ trans('sites.name') }}</th>
        <th>{{ trans('sites.delete') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($unit as $key => $item)
        <tr class="odd gradeX rows{{$item->id}}" align="center">
            <td style="width:10%;">{{ ++$key }}</td>
            <td>{{ $item->name }}</td>
            <td class="center" style="width:10%;">
                <a href="{{ route('getDeleteUnit',$item->id) }}">
                    <button id="delete" type="button" class="btn btn-warning btn-xs">
                        <i class="fa fa-trash-o  fa-fw"></i>
                    </button>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
@section("script")
    {{ Html::script("admin/js/unit.js") }}
@endsection
