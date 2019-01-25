<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
    @include('layouts.header')
    @include('layouts.nav')
    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                    <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h2 class="text-center">Quên mật khẩu?</h2>
                        <p>Bạn có thể yêu cầu cập nhật lại mật khẩu.</p>
                        <div class="panel-body">
                        <form id="register-form" role="form" autocomplete="off" class="form" method="post">
                            <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                <input id="email" name="email" placeholder="Xin vui lòng nhập email" class="form-control"  type="email">
                            </div>
                            </div>
                            <div class="form-group">
                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Khôi phục lại mật khẩu" type="submit">
                            </div>
                            <input type="hidden" class="hide" name="token" id="token" value=""> 
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
    @include('layouts.footer')
</body>
</html>