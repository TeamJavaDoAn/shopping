<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body>
	@include('layouts.header')
	@include('layouts.nav')
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<div class="preview-pic tab-content">
							<div class="tab-pane active" id="pic-1"><img src="../img/{{$productDetail['image']}}" /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
							<li><a data-target="#pic-2" data-toggle="tab"><img src="../img/{{$productDetail['image']}}" /></a></li>
							<li><a data-target="#pic-2" data-toggle="tab"><img src="../img/{{$productDetail['image']}}" /></a></li>
							<li><a data-target="#pic-2" data-toggle="tab"><img src="../img/{{$productDetail['image']}}" /></a></li>
							<li><a data-target="#pic-2" data-toggle="tab"><img src="../img/{{$productDetail['image']}}" /></a></li>
							<li><a data-target="#pic-2" data-toggle="tab"><img src="../img/{{$productDetail['image']}}" /></a></li>
						</ul>
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">{{$productDetail['name']}}</h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 đánh giá</span>
						</div>
						<p class="product-description">{{$productDetail['description']}}</p>
						<h4 class="price">giá: <span>{{$productDetail['price']}} đ </span></h4>
						<p class="vote"><strong>10%</strong> giảm giá cho sản phẩm này! <strong>(ưu tiên cho 10 khách hàng đặt hàng sớm nhất!)</strong></p>
						<h5 class="sizes">kích thước:
							<span class="size" data-toggle="tooltip" title="small">s</span>
							<span class="size" data-toggle="tooltip" title="medium">m</span>
							<span class="size" data-toggle="tooltip" title="large">l</span>
							<span class="size" data-toggle="tooltip" title="xtra large">xl</span>
						</h5>
						<h5 class="colors">Màu sắc:
							<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color green"></span>
							<span class="color blue"></span>
						</h5>
						<div class="action">
							{{ Form::open(array('route' => array('cartAdd'))) }}
								<button class="add-to-cart btn btn-default" type="submit">Thêm vào giỏ hàng</button>
								<input type="hidden" name="cart-id" value="{{$productDetail['product_id']}}" />
								<input type="hidden" name="qty" value="{{$productDetail['quantity']}}" />
								<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
							{{ Form::close() }}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('layouts.newsletter')
	@include('layouts.footer')
</body>
</html>
