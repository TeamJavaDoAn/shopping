<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li {{\Request::route()->getName() == 'home' ? 'class=active' : ''}}><a href="{{route('home')}}">Trang chủ</a></li>
                <li {{\Request::route()->getName() == 'cate' ? 'class=active' : ''}}><a href="{{route('cate')}}">Danh mục sản phẩm</a></li>
                <li {{\Request::route()->getName() == 'laptop' ? 'class=active' : ''}}><a href="{{route('laptop')}}">Máy tính xách tay</a></li>
                <li {{\Request::route()->getName() == 'smartphone' ? 'class=active' : ''}}><a href="{{route('smartphone')}}">Điện thoại</a></li>
                <li {{\Request::route()->getName() == 'cameras' ? 'class=active' : ''}}><a href="{{route('cameras')}}">Máy ảnh</a></li>
                <li {{\Request::route()->getName() == 'contact' ? 'class=active' : ''}}><a href="{{route('contact')}}">Liên hệ</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->