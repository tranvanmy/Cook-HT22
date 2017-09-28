@extends("admin.master")

@section("controller", trans('sites.cate_ingre') )

@section("action", trans('sites.list') )

@section("content")

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
    <tr text-align="center">
        <th>ID</th>
        <th>{{ trans('sites.name') }}</th>
        <th>{{ trans('sites.cate_ingre') }} {{ trans('sites.parent') }}</th>
        <th>{{ trans('sites.active') }}</th>
        <th>{{ trans('sites.delete') }}</th>
        <th>{{ trans('sites.edit') }}</th>
    </tr>
    </thead>
    <tbody>
    <tr class="odd gradeX" align="center">
        <td>1</td>
        <td>Tin Tức</td>
        <td>None</td>
        <td>Hiện</td>
        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> {{ trans('sites.delete') }}</a></td>
        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">{{ trans('sites.edit') }}</a></td>
    </tr>
    <tr class="even gradeC" align="center">
        <td>2</td>
        <td>Bóng Đá</td>
        <td>Thể Thao</td>
        <td>Ẩn</td>
        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="#"> {{ trans('sites.delete') }}</a></td>
        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="#">{{ trans('sites.edit') }}</a></td>
    </tr>
    </tbody>
</table>
@endsection
