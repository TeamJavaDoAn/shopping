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
            <form role="form" action="{{route('handlingRegister')}}" method="post">
              @csrf
                <br style="clear:both">
                  <h3 style="margin-bottom: 25px; text-align: center;">Sign Up</h3>
                  <div class="form-group">
                    Your Name
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
                  </div>
                  <div class="form-group">
                      Your Email
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off" value="{{ old('email') }}" required>
                  </div>
                  <div class="form-group">
                      Phone
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" autocomplete="off" value="{{ old('phone') }}" required>
                  </div>
                  <div class="form-group">
                      Password
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" value="{{ old('password') }}" required>
                  </div>
                  <div class="form-group">
                      Confirm password
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" id="confirm" name="confirm_password" placeholder="Confirm password" autocomplete="off" value="{{ old('confirm_password') }}" required>
                  </div>
                <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Register</button>
            </form>
          </div>
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>