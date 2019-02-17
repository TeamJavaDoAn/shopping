<!DOCTYPE html>
<html>
<head>
  <title>Thanh toán - Shopping.com</title>
</head>
<body>
  <p>
    Khách hàng <b>{{ $cartPay->name }}</b> thân mến. <br>
    Đơn hàng <b>{{ $cartPay->rowId }} </b> đã được giao với địa chỉ như bên dưới. <br>
    Shopping.com hy vọng bạn sẽ cảm thấy hài lòng với các sản phẩm bạn đã chọn nhé.<br>
    <b>Chi tiết đơn hàng đã giao cho bạn như sau:</b>
    <ul>
    	<li>Thời gian đặt hàng ngày {{ \Carbon\Carbon::now() }} </li>
    	<li>Thời gian nhận hàng ngày {{ \Carbon\Carbon::tomorrow() }} </li>
    	<li>Địa chỉ nhận hàng <b>{{ $cartPay->message }}</b></li>
    </ul>
    Các sản phẩm trong đơn hàng:
    <div><img src="{{ $message->embed(public_path() . '/img/product01.png')}}" alt="image" style="width:224px"></div>
  </p>
</body>
</html>
