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
                {{ Form::open(array('route' => 'complete')) }}
                <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Liên hệ</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Xin vui lòng nhập họ tên" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Xin vui lòng nhập email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Xin vui lòng nhập số điện thoại" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="Xin vui lòng nhập tiêu đề" required>
                    </div>
                    <div class="form-group">
                    <textarea class="form-control" type="textarea" id="content" name="content" placeholder="Xin vui lòng nhập bình luận" maxlength="140" rows="7"></textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block ">Bình luận</p></span>                    
                    </div>
                <button type="submit" id="submit" name="submit" class="btn btn-primary pull-right">Liên hệ</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>