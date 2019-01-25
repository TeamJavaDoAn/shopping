<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
@include('layouts.header')
@include('layouts.nav')
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3">
          <div class="form-area">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- Error Messages -->
            @foreach (['danger', 'warning', 'success', 'info'] as $key)
              @if(Session::has($key))
                <p class="alert alert-{{ $key }}" style="text-align: center;">{{ Session::get($key) }}</p>
              @endif
            @endforeach
            <form role="form" action="{{route('handlingRegister')}}" method="post">
              @csrf
                <br style="clear:both">
                  <h3 style="margin-bottom: 25px; text-align: center;">Đăng ký</h3>
                  <div class="form-group">
                    Họ tên
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Xin vui lòng nhập họ tên" value="{{ old('name') }}" required>
                  </div>
                  <div class="form-group">
                     Email
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Xin vui lòng nhập email" autocomplete="off" value="{{ old('email') }}" required>
                  </div>
                  <div class="form-group">
                     Số điện thoại
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Xin vui lòng nhập phone" autocomplete="off" value="{{ old('phone') }}" required>
                  </div>
                  <div class="form-group">
                     Mật khẩu
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Xin vui lòng nhập mật khẩu" autocomplete="off" value="{{ old('password') }}" required>
                  </div>
                  <div class="form-group">
                      Nhập lại mật khẩu
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="confirm" name="confirm_password" placeholder="Xin vui lòng nhập lại mật khẩu" autocomplete="off" value="{{ old('confirm_password') }}" required>
                  </div>
                <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Đăng ký</button>
            </form>
          </div>
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>