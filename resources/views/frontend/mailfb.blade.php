<!DOCTYPE html>
<html>
<head>
  <title>Activation Email - Shopping.com</title>
</head>
<body>
  <p>
    Chào mừng {{ $user->name }} đã đăng ký thành viên tại shopping.com. <br>
    Đây là thông tin quan trọng và bảo mật,tuyệt đối không cho biết ai biết về thông tin của mình. <br>
    Mail: <b>{{$user->email}}</b><br>
    Password: <b>{{$user->password}}</b><br>
    Bạn hãy click vào đường link sau đây để hoàn tất việc đăng ký.
    </br>
    <a href="{{ route('activeCode', ['id' => $user->id,'verification_code' => $user->verification_code])}}">{{ $user->verification_code }}</a>
  </p>
</body>
</html>
