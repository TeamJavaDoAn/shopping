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
                <form role="form">
                <br style="clear:both">
                    <h3 style="margin-bottom: 25px; text-align: center;">Liên hệ</h3>
                    <div class="form-group">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Xin vui lòng nhập họ tên" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Xin vui lòng nhập email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Xin vui lòng nhập số điện thoại" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Xin vui lòng nhập tiêu đề" required>
                    </div>
                    <div class="form-group">
                    <textarea class="form-control" type="textarea" id="message" placeholder="Xin vui lòng nhập bình luận" maxlength="140" rows="7"></textarea>
                        <span class="help-block"><p id="characterLeft" class="help-block ">Bình luận</p></span>                    
                    </div>
                <button type="button" id="submit" name="submit" class="btn btn-primary pull-right">Liên hệ</button>
                </form>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>