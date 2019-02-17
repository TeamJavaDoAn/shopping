$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function menuTab(cat_id)
{
    $.ajax({
        type:'POST',
        url:'./',
        data:{id:cat_id},
        cache: false,
        success:function (data) {
            $("#tab1").hide();
            $("#loading").show();
            $('#loading').html("<img src='./img/loading.jpg' />");
            $("#tab_load_ajax1").hide();
            var obj = jQuery.parseJSON(data.success);
            var secure_token = $("input[name=_token]").val();
            setTimeout(function () {
                $("#tab_load_ajax1").show();
                var html = '';
                html +=  '<div class="products-slick" data-nav="#slick-nav-1">';
                    $.each(obj, function (key, item) {
                        html +=  '<div class="product" id="menuTab">';
                          html += '<a href="./detail/'+item['id']+'">';
                            html += '<div class="product-img">';
                                html += '<img src="./img/'+item['image']+'" alt="">';
                                html += '<div class="product-label">';
                                    html += '<span class="sale">-30%</span>';
                                    html += '<span class="new">NEW</span>';
                                html += '</div>';
                            html += '</div>';
                          html += '</a>';
                            html += '<div class="product-body">';
                                html += '<p class="product-category">Category</p>';
                                html += '<h3 class="product-name"><a href="#">'+item['name'];
                                    html += '</h3></a>';
                                html += '<h4 class="product-price">'+item['price'];
                                html += 'đ ';
                                html += '<del class="product-old-price">'+item['sale'];
                                html += 'đ';
                                    html += '</del></h4>';
                                html += '<div class="product-rating">';
                                    html += '<i class="fa fa-star"></i>';
                                    html += '<i class="fa fa-star"></i>';
                                    html += '<i class="fa fa-star"></i>';
                                    html += '<i class="fa fa-star"></i>';
                                    html += '<i class="fa fa-star"></i>';
                                html += '</div>';
                                html += '<div class="product-btns">';
                                    html += '<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Thêm vào danh sách mong muốn</span></button>';
                                    html += '<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Thêm vào lúc so sánh</span></button>';
                                    html += '<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem lướt qua</span></button>';
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="add-to-cart">';
                                html +='<form action="./cart-add" method="post" enctype="multipart/form-data">';
                                    html += '<input type="hidden" name="_token" value="'+secure_token+'">';
                                    html +='<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>';
                                    html +='<input type="hidden" name="cart-id" value="'+item['id']+'" />';
                                    html +='<input type="hidden" name="qty" value="'+item['quantity']+'" />';
                                html +='</form>';
                            html += '</div>';
                        html +=  '</div>';
                    });
                html +=  '</div>';

                $(".products-slick").html(html);
                $("#loading").hide();
            }, 1000);
        },
        error: function (jqXHR, exception) {
            console.log(exception);
        }
    });
}

function menuTab2(cat_id)
{
    $.ajax({
        type:'POST',
        url:'./',
        data:{id:cat_id},
        cache: false,
        success:function (data) {
            $("#tab2").hide();
            $("#loading2").show();
            $('#loading2').html("<img src='./img/loading.jpg' />");
            $("#tab_load_ajax2").hide();
            var obj = jQuery.parseJSON(data.success);
            setTimeout(function () {
                $("#tab_load_ajax2").show();
                var html = '';
                var secure_token = $("input[name=_token]").val();
                html +=  '<div class="products-slick" data-nav="#slick-nav-1">';
                    $.each(obj, function (key, item) {
                        html += '<div class="product" id="menuTab">';
                          html += '<a href="./detail/'+item['id']+'">';
                            html += '<div class="product-img">';
                                html += '<img src="./img/'+item['image']+'" alt="">';
                                html += '<div class="product-label">';
                                    html += '<span class="sale">-30%</span>';
                                    html += '<span class="new">NEW</span>';
                                html += '</div>';
                            html += '</div>';
                          html += '</a>';
                            html += '<div class="product-body">';
                                html += '<p class="product-category">Category</p>';
                                html += '<h3 class="product-name"><a href="#">'+item['name'];
                                    html += '</h3></a>';
                                html += '<h4 class="product-price">'+item['price'];
                                html += 'đ ';
                                html += '<del class="product-old-price">'+item['sale'];
                                html += 'đ';
                                    html += '</del></h4>';
                                html += '<div class="product-rating">';
                                    html += '<i class="fa fa-star"></i>';
                                    html += '<i class="fa fa-star"></i>';
                                    html += '<i class="fa fa-star"></i>';
                                    html += '<i class="fa fa-star"></i>';
                                    html += '<i class="fa fa-star"></i>';
                                html += '</div>';
                                html += '<div class="product-btns">';
                                    html += '<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">Thêm vào danh sách mong muốn</span></button>';
                                    html += '<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">Thêm vào lúc so sánh</span></button>';
                                    html += '<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Xem lướt qua</span></button>';
                                html += '</div>';
                            html += '</div>';
                            html += '<div class="add-to-cart">';
                                html +='<form action="/cart-add" method="post" enctype="multipart/form-data">';
                                    html += '<input type="hidden" name="_token" value="'+secure_token+'">';
                                    html +='<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>';
                                    html +='<input type="hidden" name="cart-id" value="'+item['id']+'" />';
                                    html +='<input type="hidden" name="qty" value="'+item['quantity']+'" />';
                                html +='</form>';
                            html += '</div>';
                        html +=  '</div>';
                    });
                html +=  '</div>';

                $(".products-slick2").html(html);
                $("#loading2").hide();
            }, 1000);
        },
        error: function (jqXHR, exception) {
            console.log(exception);
        }
    });
}
