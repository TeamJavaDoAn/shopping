<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li {{\Request::route()->getName() == 'home' ? 'class=active' : ''}}><a href="{{route('home')}}">Home</a></li>
                <li {{\Request::route()->getName() == 'cate' ? 'class=active' : ''}}><a href="{{route('cate')}}">Categories</a></li>
                <li {{\Request::route()->getName() == 'laptop' ? 'class=active' : ''}}><a href="{{route('laptop')}}">Laptops</a></li>
                <li {{\Request::route()->getName() == 'smartphone' ? 'class=active' : ''}}><a href="{{route('smartphone')}}">Smartphones</a></li>
                <li {{\Request::route()->getName() == 'cameras' ? 'class=active' : ''}}><a href="{{route('cameras')}}">Cameras</a></li>
                <li {{\Request::route()->getName() == 'contact' ? 'class=active' : ''}}><a href="{{route('contact')}}">Contact</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->