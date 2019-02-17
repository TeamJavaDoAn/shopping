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
            <!-- STORE -->
            <div id="store" class="col-md-12">
                <!-- store products -->
                <div class="row">
                    <!-- product -->
                    @foreach($product as $value)
                      <div class="col-md-3 col-xs-6">
                          <div class="product">
                              <div class="product-img">
                                  <img src="./img/{{ $value->image }}" alt="">
                                  <div class="product-label">
                                      <span class="sale">-30%</span>
                                      <span class="new">Mới</span>
                                  </div>
                              </div>
                              <div class="product-body">
                                  <p class="product-category">{{ $value->name }}</p>
                                  <h3 class="product-name"><a href="#"> {{ $value->name }} </a></h3>
                                  <h4 class="product-price">{{ $value->price }} đ <del class="product-old-price">1490.00 đ</del></h4>
                                  <div class="product-rating">
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
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
