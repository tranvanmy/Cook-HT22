@extends("admin.master")

@section("controller", trans('sites.ingredient') )

@section("action", trans('sites.list') )

@section("content")

@section("style")
    {{ Html::style("admin/css/ingredient.css") }}
@endsection

<button type="button" class="btn btn-primary btn-ms" data-toggle="modal"
        data-target="#addIngre">{{ trans("sites.add") }}
</button>
<br><br>
<div id="addIngre" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ trans("sites.add") }}  {{ trans("sites.ingredient") }}</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('postAddIngredient') }}" id="frm-ingre-add">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!} "/>
                    <label>Tên nguyên liệu</label>
                    <input type="text" class="form-control" id="name_ingre" value=""/>
                    <br>

                    <label>{{ trans("sites.choose") }} {{ trans("sites.category") }}</label>
                    <select id="sltCateIngre" name="sltCateIngre" class="form-control">
                        {{ cate_parent($categories) }}
                    </select>
                    <br>

                    <label>{{ trans("sites.choose") }} {{ trans("sites.avatar") }}</label><br>
                    <button type="button" id="ckfinder-popup" class="btn btn-primary"/>
                    Choose a file...</button>
                    <input id="ckfinder-input" type="text" style="width:50%" disabled/>
                    <br><br>

                    <label>{{ trans("sites.description") }}</label><br>
                    <textarea class="form-control" rows="3" id="descIngre"
                              name="descIngre"></textarea>
                    <script>CKEDITOR.replace('descIngre');</script>
                    <br>

                    <label>{{ trans("sites.status") }}</label>
                    <select id="sltStatus" name="sltStatus" class="form-control">
                        <option value="1">{{ trans("sites.active") }}</option>
                        <option value="0">{{ trans("sites.unactive") }}</option>
                    </select>
                    <br>

                    <button type="submit" name="addIngredient" id="addIngredient"
                            class="btn btn-default">{{ trans("sites.add") }}</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans("sites.close") }}</button>
            </div>
        </div>

    </div>
</div>


<div id="editIngre" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">{{ trans("sites.edit") }} {{ trans("sites.ingredient") }}</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('postEditIngredient') }}" id="frm-ingre-edit">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!} "/>
                    <input type="hidden" name="id" id="idIngre"/>
                    <label>Tên nguyên liệu</label>
                    <input type="text" class="form-control" id="name_ingre" name="name_ingre" value=""/>
                    <br>

                    <label>{{ trans("sites.choose") }} {{ trans("sites.category") }}</label>
                    <select id="sltCateIngre" name="sltCateIngre" class="form-control">
                        {{ cate_parent($categories) }}
                    </select>
                    <br>

                    <label>{{ trans("sites.choose") }} {{ trans("sites.avatar") }}</label><br>
                    <button type="button" id="ckfinder-popup2" class="btn btn-primary"/>
                    Choose a file...</button>
                    <input id="ckfinder-input2" name="ckfinder-input2" type="text" style="width:50%" disabled/>
                    <br><br>

                    <label>{{ trans("sites.description") }}</label><br>
                    <textarea class="form-control" rows="3" id="descIngre2"
                              name="descIngre2"></textarea>
                    <script>CKEDITOR.replace('descIngre2');</script>
                    <br>

                    <label>{{ trans("sites.status") }}</label>
                    <select id="sltStatus" name="sltStatus" class="form-control">
                        <option value="1">{{ trans("sites.active") }}</option>
                        <option value="0">{{ trans("sites.unactive") }}</option>
                    </select>
                    <br>

                    <button type="submit" name="editIngredient" id="editIngredient"
                            class="btn btn-default">{{ trans("sites.edit") }}</button>
                </form>
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
        <th>{{ trans('sites.description') }}</th>
        <th>{{ trans('sites.category') }}</th>
        <th>{{ trans('sites.active') }}</th>
        <th>{{ trans('sites.delete') }}</th>
        <th>{{ trans('sites.edit') }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($ingredients as $key => $item)
        <tr class="odd gradeX rows{{ $item->id }}" align="center">
            <td>{{ ++$key }}</td>
            <td><img src="{{ asset('upload/images/'.$item->image) }}"/></td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->category->name }}</td>
            <td>
                {{ $item->status == 1 ? trans("sites.active") : trans("sites.unactive") }}
            </td>
            <td class="center">
                <a href="{{ route('getDeleteIngredient',$item->id) }}">
                    <button id="delete" type="button" class="btn btn-warning btn-xs">
                        <i class="fa fa-trash-o  fa-fw"></i>
                    </button>
                </a>
            </td>
            <td class="center">
                <button type="button" data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                        data-categoryID="{{ $item->category_id }}" data-status="{{ $item->status }}"
                        data-image="{{ $item->image }}" data-desc="{{ $item->description }}"
                        class="btn btn-danger btn-xs btnEditIngre" data-toggle="modal" data-target="#editIngre">
                    <i class="fa fa-pencil fa-fw"></i>
                </button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection

@section("script")
    {{ Html::script("admin/js/popupCKfinder.js")}}
    {{ Html::script("admin/js/ingredient.js") }}
@endsection
