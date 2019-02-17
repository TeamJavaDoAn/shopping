
@include('layouts.head')
@include('layouts.header')
@include('layouts.nav')
<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb-tree">
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Tất cả danh mục sản phẩm</a></li>
                    <li><a href="#">Phụ kiện</a></li>
                    <li class="active">Headphones (227,490 kết quả)</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- ASIDE -->
            <div id="aside" class="col-md-3">
                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Danh mục</h3>
                    <div class="checkbox-filter">
                        @foreach($category as $value)
                            <div class="input-checkbox">
                                <input type="checkbox" id="category-1">
                                <label for="category-1">
                                    <span></span>
                                        {{ $value->cat_name }}
                                    <small>(120)</small>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Giá</h3>
                    <div class="price-filter">
                        <div id="price-slider"></div>
                        <div class="input-number price-min">
                            <input id="price-min" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                        <span>-</span>
                        <div class="input-number price-max">
                            <input id="price-max" type="number">
                            <span class="qty-up">+</span>
                            <span class="qty-down">-</span>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Nhãn hiệu</h3>
                    <div class="checkbox-filter">
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-1">
                            <label for="brand-1">
                                <span></span>
                                SAMSUNG
                                <small>(578)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-2">
                            <label for="brand-2">
                                <span></span>
                                LG
                                <small>(125)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-3">
                            <label for="brand-3">
                                <span></span>
                                SONY
                                <small>(755)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-4">
                            <label for="brand-4">
                                <span></span>
                                SAMSUNG
                                <small>(578)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-5">
                            <label for="brand-5">
                                <span></span>
                                LG
                                <small>(125)</small>
                            </label>
                        </div>
                        <div class="input-checkbox">
                            <input type="checkbox" id="brand-6">
                            <label for="brand-6">
                                <span></span>
                                SONY
                                <small>(755)</small>
                            </label>
                        </div>
                    </div>
                </div>
                <!-- /aside Widget -->

                <!-- aside Widget -->
                <div class="aside">
                    <h3 class="aside-title">Sản phẩm hot</h3>
                    <div class="product-widget">
                      <div class="product-img">
                        <img src="./img/product04.png" alt="">
                      </div>
                      <div class="product-body">
                        <p class="product-category">Điện thoại</p>
                        <h3 class="product-name"><a href="#">Iphone 9</a></h3>
                        <h4 class="product-price">1980.00 đ<del class="product-old-price">1890.00 đ</del></h4>
                      </div>
                    </div>

                    <div class="product-widget">
                      <div class="product-img">
                        <img src="./img/product05.png" alt="">
                      </div>
                      <div class="product-body">
                        <p class="product-category">Điện thoại</p>
                        <h3 class="product-name"><a href="#">Iphone X</a></h3>
                         <h4 class="product-price">2280.00 đ<del class="product-old-price">2190.00 đ</del></h4>
                      </div>
                    </div>

                    <div class="product-widget">
                      <div class="product-img">
                        <img src="./img/product06.png" alt="">
                      </div>
                      <div class="product-body">
                        <p class="product-category">Tai nghe</p>
                        <h3 class="product-name"><a href="#">tai nghe bluetooth</a></h3>
                        <h4 class="product-price">980.00 đ<del class="product-old-price">990.00 đ</del></h4>
                      </div>
                    </div>
                </div>
                <!-- /aside Widget -->
            </div>
            <!-- /ASIDE -->

            <!-- STORE -->
            <div id="store" class="col-md-9">
                <!-- store top filter -->
                <div class="store-filter clearfix">
                    <div class="store-sort">
                        <label>
                            Sort By:
                            <select class="input-select">
                                <option value="0">Popular</option>
                                <option value="1">Position</option>
                            </select>
                        </label>

                        <label>
                            Show:
                            <select class="input-select">
                                <option value="0">20</option>
                                <option value="1">50</option>
                            </select>
                        </label>
                    </div>
                    <ul class="store-grid">
                        <li class="active"><i class="fa fa-th"></i></li>
                        <li><a href="#"><i class="fa fa-th-list"></i></a></li>
                    </ul>
                </div>
                <!-- /store top filter -->

                <!-- store products -->
                <div class="row">
                    @foreach($product as $value)
                        <!-- product -->
                        <div class="col-md-4 col-xs-6">
                            <div class="product">
                              <a href="{{ route('productDetail', ['id' => $value->product_id]) }}">
                                <div class="product-img">
                                  <img src="./img/{{ $value->image }}" alt="">
                                  <div class="product-label">
                                    <span class="new">NEW</span>
                                  </div>
                                </div>
                              </a>
                              <div class="product-body">
                                <p class="product-category">{{$value->name}}</p>
                                <h3 class="product-name"><a href="#">{{$value->name}}</a></h3>
                                <h4 class="product-price">{{$value->price}} đ <del class="product-old-price">11.000.000 đ</del></h4>
                                <div class="product-rating">
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star"></i>
                                  <i class="fa fa-star-o"></i>
                                </div>
                                <div class="product-btns">
                                  <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Thêm vào danh sách mong muốn</span></button>
                                  <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Thêm vào lúc so sánh</span></button>
                                  <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem lướt qua</span></button>
                                </div>
                              </div>
                              <div class="add-to-cart">
                                  {!! Form::open(['url' => '/cart-add', 'method' => 'POST']) !!}
                                      <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                      <input type="hidden" name="cart-id" value="{{$value->product_id}}" />
                                      <input type="hidden" name="qty" value="{{$value->quantity}}" />
                                  {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <!-- /product -->
                        <div class="clearfix visible-sm visible-xs"></div>
                    @endforeach
                </div>
                <!-- /store products -->

                <!-- store bottom filter -->
                <div class="store-filter clearfix">
                    <span class="store-qty">Hiện 20-100 sản phẩm</span>
                    <div id="paging-product">
                      @if(!empty($product))
                          {{ $product->links() }}
                      @endif
                    </div>
                </div>
                <!-- /store bottom filter -->
            </div>
            <!-- /STORE -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
@include('layouts.newsletter')
@include('layouts.footer')
