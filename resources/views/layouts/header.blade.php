<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> manhsangtn@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> Đại Học Mở TP.HCM</a></li>
            </ul>
            <ul class="header-links pull-right">
              @if(!Request::session()->has('username'))
                <li><a href="{{ route('register') }}"><i class="fa fa-dollar"></i> Đăng ký</a></li>
                <li><a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-user-o"></i> Đăng nhập</a></li>
              @else
                <li><a href="">{{ Request::session()->get('username') }}</a></li>
                <li><a href="{{ route('logout') }}"><i class="fa fa-user-o"></i>Logout</a></li>
              @endif
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="#" class="logo">
                            <img src="./img/hinh.jpg" alt="" style="width: 170px; height: 70px">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">Danh mục</option>
                                <option value="1">Laptop</option>
                                <option value="2">Table</option>
                                <option value="3">Phone</option>
                            </select>
                            <input class="input" placeholder="Tìm kiếm">
                            <button class="search-btn">Tìm kiếm</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                          <div>
                              <a href="#">
                                  <i class="fa fa-heart-o"></i>
                                  <span>yêu thích</span>
                                  <div class="qty">1</div>
                              </a>
                          </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Giỏ hàng</span>
                                <div class="qty">1</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="./img/product01.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                        <input type="hidden" id="item1_price" value="$95">
                                    </div>

                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="./img/product02.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div>
                                </div>
                                <div class="cart-summary">
                                    <small>3 Item(s) selected</small>
                                    <h5>SUBTOTAL: $2940.00</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="#">View Cart</a>
                                    <a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
<!-- popup login form -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="loginmodal-container">
      <h1>Đăng nhập</h1><br>
      <form action="{{route('login')}}" method="post">
        @csrf
        <b>Họ và tên</b>
        <input type="text" name="username" placeholder="Xin vui lòng họ và tên" required>
        <b>Mật khẩu</b>
        <input type="password" name="password" placeholder="Xin vui lòng nhập mật khẩu" required>
        <input type="submit" name="login" class="login loginmodal-submit" value="Đăng nhập">
      </form>
      <div class="login-help">
          <a href="{{route('register')}}">Đăng ký</a> - <a href="{{route('forgotPassword')}}">Quên mật khẩu</a>
      </div>
    </div>
  </div>
</div>
<!-- /popup login form