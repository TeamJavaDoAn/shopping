<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <body>
        @include('layouts.header')
        @include('layouts.nav')
        <div class="container">
            <div class="cart">Giỏ hàng</div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Xoá</th>
                    </tr>
                </thead>
                <tbody>
                    <p class="test"></p>
                    @foreach ($cartProducts as $cartProduct)
                        <tr>
                            <td>
                              <img src="{{ asset('/img/'. $cartProduct->image) }}" width="100" height="100">
                              {{ $cartProduct->name }}
                            </td>
                            <td>{{ $cartProduct->price }} đ</td>
                            <td>
                              <div class="btn-increment-decrement" onClick="decrement_quantity({{ $cartProduct->id }})">-</div>
                              <input class="input-quantity" onChange="changeValue()" id="input-quantity-{{ $cartProduct->id }}" value="{{ $cartProduct->qty }}">
                              <div class="btn-increment-decrement" onClick="increment_quantity({{ $cartProduct->id }})">+</div>
                            </td>
                            <td>{{ $cartProduct->subtotal() }} đ</td>
                            <td>
                              {!! Form::open(['url' => '/cart-delete', 'method' => 'POST']) !!}
                                <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p>
                                <input type="hidden" name="rowId" value="{{$cartProduct->rowId}}">
                              {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td><a href="{{route('home')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a></td>
                        <td></td>
                        <td></td>
                        <td><b>Tổng tiền: {{ \Cart::subtotal() }} đ</b></td>
                        <td><a href="{{route('cartPay')}}" class="btn btn-success btn-block"><i class="fa fa-angle-left"></i> Thanh toán</a></td>
                    </tr>
                </tfoot>
            </table>
        </div>
        @include('layouts.newsletter')
        @include('layouts.footer')
    </body>
</html>
