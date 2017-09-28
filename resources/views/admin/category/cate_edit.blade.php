@extends("admin.master")

@section('controller', trans('sites.cate_ingre') )

@section("action", trans('sites.edit') )

@section("content")

<div class="form-input col-lg-7">
    {!! Form::open(['method'=>"POST",'files'=>true]) !!}
    <div class="form-group">
        {{ Form::label('',trans("sites.cate_ingre")) }}
        {{ Form::label('',trans("sites.parent")) }}
        {{ Form::select("a",[
        trans("sites.choose"),"Tin tức"],
        null,
        ["class"=>"form-control"])
        }}
    </div>
    <div class="form-group">
        {{ Form::label('',trans("sites.image")) }}
        {!! Form::file('image', ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {{ Form::label('',trans("sites.status")) }}
        {!! Form::radio('rdoStatus', '1', false, ['class' => '']) !!}
        {{ Form::label('',trans("sites.active")) }}
        {!! Form::radio('rdoStatus', '2', false, ['class' => '']) !!}
        {{ Form::label('',trans("sites.unactive")) }}
    </div>
    {{ Form::submit( trans("sites.add"),["class"=>"btn btn-default"] ) }}
    {{ Form::button( trans("sites.reset"),["class"=>"btn btn-default"] ) }}
    {!! Form::close() !!}
</div>
@endsection
