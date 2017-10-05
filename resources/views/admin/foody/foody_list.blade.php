@extends("admin.master")

@section("controller", trans('sites.cate_foody') )

@section("action", trans('sites.list') )

@section("content")

    <button type="button" class="btn btn-primary btn-ms" data-toggle="modal"
            data-target="#addFoody">{{ trans("sites.add") }}
    </button><br><br>
    <div id="addFoody" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ trans("sites.add") }} {{ trans("sites.category") }}</h4>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('postAddFoody') }}" id="frm-foody-add">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!} "/>
                        <label>{{ trans("sites.name") }} {{ trans("sites.category") }}</label>
                        <input type="text" class="form-control" id="name_foody" value=""/>
                        <label>{{ trans("sites.chooseParent") }}</label>
                        <select id="sltFoody" name="sltFoody" class="form-control">
                            <option value="0">None</option>
                            {{ cate_parent($foody) }}
                        </select>
                        <br>
                        <label>{{ trans("sites.status") }}</label>
                        <select id="sltStatus" name="sltStatus" class="form-control">
                            <option value="1">{{ trans("sites.active") }}</option>
                            <option value="0">{{ trans("sites.unactive") }}</option>
                        </select><br>
                        <button type="submit" name="addFoody" id="addFoody"
                                class="btn btn-default">{{ trans("sites.add") }}</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans("sites.close") }}</button>
                </div>
            </div>

        </div>
    </div>
    <!--  -->
    <div id="editFoody" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{ trans("sites.edit") }} {{ trans("sites.category") }}</h4>
                </div>

                <div class="modal-body">
                    <form method="post" action="{{ route('postEditFoody') }}" id="frm-foody-edit">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!} "/>
                        <input type="hidden" name="id" id="idFoody" value=""/>
                        <label>{{ trans("sites.name") }} {{ trans("sites.category") }}</label>
                        <input type="text" class="form-control" name="name_foody" id="name_foody" value=""/>
                        <label>{{ trans("sites.chooseParent") }}</label>
                        <select id="sltFoody" name="sltFoody" class="form-control">
                            <option value="0">None</option>
                            {{ cate_parent($foody) }}
                        </select>
                        <br>
                        <label>{{ trans("sites.status") }}</label>
                        <select id="sltStatus" name="sltStatus" class="form-control">
                            <option value="1">{{ trans("sites.active") }}</option>
                            <option value="0">{{ trans("sites.unactive") }}</option>
                        </select><br>
                        <button type="submit" name="editFoody" id="editFoody"
                                class="btn btn-default">{{ trans("sites.edit") }}</button>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ trans("sites.close") }}</button>
                </div>
            </div>

        </div>
    </div>
    <!--  -->
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr>
            <th>STT</th>
            <th>{{ trans('sites.name') }}</th>
            <th>{{ trans('sites.cate_ingre') }} {{ trans('sites.parent') }}</th>
            <th>{{ trans('sites.active') }}</th>
            <th>{{ trans('sites.delete') }}</th>
            <th>{{ trans('sites.edit') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($foody as $key => $item)
            <tr class="odd gradeX rows{{ $item->id }}" align="center">
                <td>{{ ++$key }}</td>
                <td>{{ $item->name }}</td>
                <td>
                    {{ $item->parent_id == 0 ? trans("sites.none") : $parent_name }}
                </td>
                <td>
                    {{ $item->status == 1 ? trans("sites.active") : trans("sites.unactive") }}
                </td>
                <td class="center">
                    <a href="{{ route('getDeleteFoody',$item->id) }}">
                        <button id="delete" type="button" class="btn btn-warning btn-xs">
                            <i class="fa fa-trash-o  fa-fw"></i>
                        </button>
                    </a>
                </td>
                <td class="center">
                    <button data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                            data-parentID="{{ $item->parent_id }}" data-status="{{ $item->status }}" type="button"
                            class="btn btn-danger btn-xs btnEditFoody" data-toggle="modal" data-target="#editFoody"><i
                                class="fa fa-pencil fa-fw"></i> </i></button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
@section("script")
    {{ Html::script("admin/js/foody.js") }}
@endsection
