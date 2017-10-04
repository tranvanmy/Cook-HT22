@section("style")
    {{ Html::style("admin/css/blocks") }}
@endsection

@if ($errors->any())
    <div class="alert alert-warning login">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
