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
        <th>{{ trans('sites.email') }}</th>
        <th>{{ trans('sites.phone') }}</th>
        <th>{{ trans('sites.rank') }}</th>
        <th>{{ trans('sites.active') }}</th>
        <th>{{ trans('sites.edit') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $key => $item)
        <tr class="odd gradeX rows{{ $item->id }}" align="center">
            <td>{{ ++$key }}</td>
            <td><img src="@if($item->password != ''){{ asset('upload/images/'.$item->avatar) }} @else {{ asset($item->avatar) }} @endif"/></td>
            <td><a href="{{ route('myProfile',$item->id) }}">{{ $item->name }}</a></td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->phone }}</td>
            <td>
                @if($item->rank == 1)
                    <div class="btn btn-xs btn-info">{{ trans("sites.newbie") }}</div>
                @elseif($item->rank == 2)
                    <div class="btn btn-xs btn-primary">{{ trans("sites.professinal") }}</div>
                @else <div class="btn btn-xs btn-success">{{ trans("sites.masterChef") }}</div>
                @endif
            </td>
            <td>
                @if($item->status == 0 )
                    <i class="fa fa-cog" aria-hidden="true" title="{{ trans('sites.unApproved') }}"></i>
                @elseif($item->status == 1)
                    <i class="fa fa-check" aria-hidden="true" title="{{ trans('sites.approved') }}"></i>
                @endif
            </td>
            <td class="center">
                <button data-id="{{ $item->id }}" type="button" class="btn btn-info btn-xs editStatus"
                        data-toggle="modal" data-target="#myModal">
                    <i class="fa fa-pencil fa-fw"></i>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endsection
@section("script")
    {{ Html::script("admin/js/user.js") }}
@endsection
