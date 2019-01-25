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
               <!-- Error Messages -->
                @foreach (['danger', 'warning', 'success', 'info'] as $key)
                  @if(Session::has($key))
                    <p class="alert alert-{{ $key }}" style="text-align: center;">{{ Session::get($key) }}</p>
                  @endif
                @endforeach   
                <form role="form" action="{{route('cartHandelPay')}}" method="post">
                  @csrf
                <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Thanh toán</h3>
                    <div class="form-group">
                       <input type="text" class="form-control" id="name" name="name" placeholder="Xin vui lòng nhập họ tên" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Xin vui lòng nhập số điện thoại" required>
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <select name="city" class="form-control">
                          <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                          <option value="Tây Ninh">Tây Ninh</option>
                          <option value="Bình Dương">Bình Dương</option>
                          <option value="Đồng Nai">Đồng Nai</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" name="message" placeholder="Ghi chú" maxlength="140" rows="7"></textarea>                    
                    </div>
                <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Thanh toán</button>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>