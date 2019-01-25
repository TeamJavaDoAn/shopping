<!DOCTYPE html>
<html lang="en">
	@include('layouts.head')
	<body>
		@include('layouts.header')
		@include('layouts.nav')
    
    <!-- Error Messages -->
    @foreach (['danger', 'warning', 'success', 'info'] as $key)
      @if(Session::has($key))
        <p class="alert alert-{{ $key }}" style="text-align: center;">{!! Session::get($key) !!}</p>
      @endif
    @endforeach
    <!-- End error -->
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop01.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Máy tính xách tay<br>Hot</h3>
								<a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop03.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Tai nghe<br>Hot</h3>
								<a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="./img/shop02.png" alt="">
							</div>
							<div class="shop-body">
								<h3>Máy ảnh<br>Hot</h3>
								<a href="#" class="cta-btn">Mua ngay <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Sản phẩm mới</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab1">Máy tính xách tay</a></li>
									<li><a data-toggle="tab" href="#tab1">Điện thoại</a></li>
									<li><a data-toggle="tab" href="#tab1">Máy ảnh</a></li>
									<li><a data-toggle="tab" href="#tab1">Tai nghe</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
                    @foreach ($products as $product)
  										<div class="product">
  											<div class="product-img">
                          <img src="./img/{{$product->image}}" alt="">
  												<div class="product-label">
  													<span class="sale">-30%</span>
  													<span class="new">Mới</span>
  												</div>
  											</div>
  											<div class="product-body">
  												<p class="product-category">Máy tính xách tay</p>
  												<h3 class="product-name"><a href="#">{{ $product->name }}</a></h3>
  												<h4 class="product-price">{{ $product->price }} đ <del class="product-old-price">{{ $product->sale }} đ</del></h4>
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
                            <input type="hidden" name="cart-id" value="{{$product->product_id}}" />
                            <input type="hidden" name="qty" value="{{$product->quantity}}" />
                          {!! Form::close() !!}
                        </div>
  										</div>
                    @endforeach
										<!-- /product -->
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Ngày</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Giờ</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Phút</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Giấy</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">Sự kiện nóng nhất trong tuần</h2>
							<p>Giảm 50% tất cả sản phẩm</p>
							<a class="primary-btn cta-btn" href="#">Mua ngay</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Bán chạy nhất</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Máy tính xách tay</a></li>
									<li><a data-toggle="tab" href="#tab2">Điện thoại</a></li>
									<li><a data-toggle="tab" href="#tab2">Máy ảnh</a></li>
									<li><a data-toggle="tab" href="#tab2">Tai nghe</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product06.png" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
													<span class="new">Mới</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Máy tính xách tay</p>
												<h3 class="product-name"><a href="#">Acer</a></h3>
												<h4 class="product-price">12980.000 đ <del class="product-old-price">12990.00O đ</del></h4>
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
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product07.png" alt="">
												<div class="product-label">
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Điện thoại</p>
												<h3 class="product-name"><a href="#">Iphone 7</a></h3>
												<h4 class="product-price">12.000.000 đ<del class="product-old-price">11.000.000 đ</del></h4>
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
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng </button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product08.png" alt="">
												<div class="product-label">
													<span class="sale">-30%</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category">Sam sung</p>
												<h3 class="product-name"><a href="#"></a>Sam sung Note 8</h3>
												<h4 class="product-price">14.000.000 đ <del class="product-old-price">13.000.000 đ </del></h4>
												<div class="product-rating">
												</div>
												<div class="product-btns">
                          <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Thêm vào danh sách mong muốn</span></button>
                          <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Thêm vào lúc so sánh</span></button>
                          <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem lướt qua</span></button>
                        </div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product09.png" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">Nokia</p>
												<h3 class="product-name"><a href="#">Nokia 1</a></h3>
												<h4 class="product-price">1280.00 đ <del class="product-old-price">1180.00 đ</del></h4>
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
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
											</div>
										</div>
										<!-- /product -->

										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img src="./img/product01.png" alt="">
											</div>
											<div class="product-body">
												<p class="product-category">BlackBerry</p>
												<h3 class="product-name"><a href="#">product name goes here</a></h3>
												<h4 class="product-price">1280.00 đ<del class="product-old-price">1090.00 đ</del></h4>
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
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
											</div>
										</div>
										<!-- /product -->
									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Sản phẩm bán chạy</h4>
							<div class="section-nav">
								<div id="slick-nav-3" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-3">
							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product07.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Laptop</p>
										<h3 class="product-name"><a href="#">Acer 4561</a></h3>
										<h4 class="product-price">1280.00 đ <del class="product-old-price">1100.00 đ</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product08.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Điện thoại</p>
										<h3 class="product-name"><a href="#">Iphone 8</a></h3>
										<h4 class="product-price">1400.00 đ<del class="product-old-price">1200.00 đ</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product09.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Tai nghe</p>
										<h3 class="product-name"><a href="#">Tai nghe sam sung J7</a></h3>
										<h4 class="product-price">1280.00 đ<del class="product-old-price">1290.00 đ</del></h4>
									</div>
								</div>
								<!-- product widget -->
							</div>

							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product01.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Máy tính bảng</p>
										<h3 class="product-name"><a href="#">Máy tính bảng Dell</a></h3>
										<h4 class="product-price">1280.00 đ<del class="product-old-price">1280.00 đ</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product02.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Máy tính xách tay</p>
										<h3 class="product-name"><a href="#">Dell 7</a></h3>
										<h4 class="product-price">1980.00 đ<del class="product-old-price">1890.00 đ</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
                  <div class="product-img">
                    <img src="./img/product03.png" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category">Máy tính xách tay </p>
                    <h3 class="product-name"><a href="#">Dell 8</a></h3>
                    <h4 class="product-price">1982.00 đ<del class="product-old-price">1890.00 đ</del></h4>
                  </div>
                </div>
								<!-- product widget -->
							</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Sản phẩm hot</h4>
							<div class="section-nav">
								<div id="slick-nav-4" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-4">
							<div>
								<!-- product widget -->
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
								<!-- /product widget -->

								<!-- product widget -->
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
								<!-- /product widget -->

								<!-- product widget -->
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
								<!-- product widget -->
							</div>

							<div>
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="./img/product07.png" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Laptop</p>
										<h3 class="product-name"><a href="#">Acer 10</a></h3>
										<h4 class="product-price">1980.00 đ<del class="product-old-price">1990.00 đ</del></h4>
									</div>
								</div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
                  <div class="product-img">
                    <img src="./img/product08.png" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category">Laptop</p>
                    <h3 class="product-name"><a href="#">Acer 8</a></h3>
                    <h4 class="product-price">1880.00 đ<del class="product-old-price">1890.00 đ</del></h4>
                  </div>
                </div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
                  <div class="product-img">
                    <img src="./img/product09.png" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category">Laptop</p>
                    <h3 class="product-name"><a href="#">Acer 9</a></h3>
                    <h4 class="product-price">1980.00 đ<del class="product-old-price">1990.00 đ</del></h4>
                  </div>
                </div>
								<!-- product widget -->
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Sản phẩm khuyến mãi</h4>
							<div class="section-nav">
								<div id="slick-nav-5" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-5">
							<div>
								<!-- product widget -->
								<div class="product-widget">
                  <div class="product-img">
                    <img src="./img/product07.png" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category">Laptop</p>
                    <h3 class="product-name"><a href="#">Acer 2</a></h3>
                    <h4 class="product-price">1780.00 đ<del class="product-old-price">1990.00 đ</del></h4>
                  </div>
                </div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
                  <div class="product-img">
                    <img src="./img/product08.png" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category">Iphone</p>
                    <h3 class="product-name"><a href="#">Iphone 6</a></h3>
                    <h4 class="product-price">6080.00 đ<del class="product-old-price">6790.00 đ</del></h4>
                  </div>
                </div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
                  <div class="product-img">
                    <img src="./img/product02.png" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category">Laptop</p>
                    <h3 class="product-name"><a href="#">Acer 4</a></h3>
                    <h4 class="product-price">1980.00 đ<del class="product-old-price">1990.00 đ</del></h4>
                  </div>
                </div>
								<!-- product widget -->
							</div>

							<div>
								<!-- product widget -->
								<div class="product-widget">
                  <div class="product-img">
                    <img src="./img/product07.png" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category">Điện Thoại</p>
                    <h3 class="product-name"><a href="#">Nokia 10</a></h3>
                    <h4 class="product-price">1980.00 đ<del class="product-old-price">1990.00 đ</del></h4>
                  </div>
                </div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
                  <div class="product-img">
                    <img src="./img/product05.png" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category">Laptop</p>
                    <h3 class="product-name"><a href="#">Acer 5</a></h3>
                    <h4 class="product-price">1280.00 đ<del class="product-old-price">1290.00 đ</del></h4>
                  </div>
                </div>
								<!-- /product widget -->

								<!-- product widget -->
								<div class="product-widget">
                  <div class="product-img">
                    <img src="./img/product09.png" alt="">
                  </div>
                  <div class="product-body">
                    <p class="product-category">Laptop</p>
                    <h3 class="product-name"><a href="#">Acer 8</a></h3>
                    <h4 class="product-price">1980.00 đ<del class="product-old-price">1990.00 đ</del></h4>
                  </div>
                </div>
								<!-- product widget -->
							</div>
						</div>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		@include('layouts.newsletter')
		@include('layouts.footer')
	</body>
</html>
