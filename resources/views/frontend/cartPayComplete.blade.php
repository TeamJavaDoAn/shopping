<!DOCTYPE html>
<html>
<head>
  <title>Thanh toán - Shopping.com</title>
</head>
<body>
  <div class="container">
    <p>
      Khách hàng <b>{{ $cartPay->name }}</b> thân mến. <br>
      Đơn hàng <b></b> đã được giao với địa chỉ như bên dưới. <br>
      Shopping.com hy vọng bạn sẽ cảm thấy hài lòng với các sản phẩm bạn đã chọn nhé.<br>
      <b>Chi tiết đơn hàng đã giao cho bạn như sau:</b>
    </p>     
    <table class="table">
      <thead>
        <tr>
          <th>Mã đơn hàng</th>
          <th>Hình ảnh</th>
          <th>Sản phẩm</th>
          <th>Giá</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $value)
          @foreach ($value as $tmp)
            <tr>
              <td style="color: red"><b>{{ $tmp->rowId }}</b></td>
              <td><img src="{{ $message->embed(public_path().'/img/'.$tmp->image) }}" alt="image" style="width:150px"></td>
              <td><b>{{ $tmp->name }}</b></td>
              <td style="color: red">{{ $tmp->price }} đ</td>
            </tr>
          @endforeach
        @endforeach
      </tbody>
    </table>
    <ul>
      <li>Thời gian đặt hàng ngày {{ \Carbon\Carbon::now() }} </li>
      <li>Thời gian nhận hàng ngày {{ \Carbon\Carbon::tomorrow() }} </li>
      <li>Địa chỉ nhận hàng <b>{{ $cartPay->message }}</b></li>
      <li style="color:red"><b>Tổng tiền: {{ \Cart::subtotal() }} đ</b></li>
    </ul>
  </div>
</body>
</html>
