@extends("welcome")

@section("content")
@section("style")
    {{ Html::style("users/css/cart.css") }}
@endsection

<div id="popup1" class="overlay">
    <div class="popup">
        <h2>Xác nhận đơn hàng</h2>
        <a class="close" href="#">&times;</a>
        <div class="content">
            <label>{{ trans("sites.name") }}</label>
            <input type="text" class="form-control" @if(Auth::check()) value="{{ Auth::user()->name }}" @else value=""
                   @endif id="nameCheckOut"/>
            <label>{{ trans("sites.address") }}</label>
            <input type="text" class="form-control" @if(Auth::check()) value="{{ Auth::user()->address }}"
                   @else value="" @endif id="addressCheckOut"/>
            <label>{{ trans("sites.phone") }}</label>
            <input type="text" class="form-control" @if(Auth::check()) value="{{ Auth::user()->phone }}" @else value=""
                   @endif id="phoneCheckOut"/>
            <label>{{ trans("sites.note") }}</label>
            <input type="text" class="form-control" value="" id="noteCheckOut"/>
            <button type="button" id="submitCheckOut" data-idUser="{{Auth::user()->id}}" data-totalPrice="{{$total}}"
                    class="btn btn-success btn-ms">{{ trans("sites.submit") }}</button>
        </div>
    </div>
</div>
<!--  -->
@if(count($carts) > 0)
    <div class="container cartWrapper" style="background: white;">
        <div id="titleCart">
            <span>{{ trans("sites.cart") }}</span>
            <span>  Tất cả sản phẩm được chọn mua</span>
        </div>
        <hr>
        <table id="cart" class="table table-hover table-condensed table-striped pull-center">
            <thead>
                <tr>
                    <th>{{ trans("sites.receipt") }}</th>
                    <th>{{ trans("sites.price") }}</th>
                    <th>{{ trans("sites.qty") }}</th>
                    <th class="text-center">{{ trans("sites.subTotal") }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach($carts as $cart)
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-3 hidden-xs"><img src="{{ asset('upload/images/'.$cart->options->img) }}"
                                                                 alt="..." class="img-responsive"/></div>
                            <div class="col-sm-9">
                                <h4 class="nomargin">{{ $cart->name }}</h4>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">{{ $cart->price }}</td>
                    <td data-th="Quantity">
                        <input type="number" class="form-control text-center qty" value="{{ $cart->qty }}">
                    </td>
                    <td data-th="Subtotal" class="text-center">{{ $cart->qty*$cart->price }}</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-info btn-sm update" rowId="{{ $cart->rowId }}"><i
                                    class="fa fa-refresh"></i></button>
                        <a href="{{ route('cartDelete',['id'=>$cart->rowId]) }}">
                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div id="total">
            <table class="table table-striped table-bordered ">
                <tbody>
                    <tr>
                        <td><span class="extra bold totalamout">{{ trans("sites.total") }} :</span></td>
                        <td><span class="bold totalamout">${{ $total }}</span></td>
                    </tr>
                </tbody>
            </table>
            <tr>
                <td>
                    <a href="{{ url('/') }}" class="btn btn-warning">
                        <i class="fa fa-angle-left"></i> {{ trans("sites.continueShopping") }}
                    </a>
                </td>
                <td>
                    <a href="#popup1" class="btn btn-success popupCheckout">
                        {{ trans("sites.checkout") }} <i class="fa fa-angle-right"></i>
                    </a>
                </td>
            </tr>
        </div>
    </div>
@else
    <div class="container cartWrapper" style="background: white;margin-top:1em;">
        <div id="titleCart">
            <span>{{ trans("sites.noneReceipt") }}</span>
        </div>
        <hr>
    </div>
@endif
@endsection
@section("script")
    {{ Html::script("users/js/cart.js") }}
@endsection
