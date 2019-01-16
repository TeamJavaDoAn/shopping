<!DOCTYPE html>
<html lang="en">

  <head>

   @include('backend.partials.head')
  </head>

  <body id="page-top">

     @include('backend.partials.nav')

    <div id="wrapper">
      <!-- Sidebar -->

@include('backend.partials.sidebar')
      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->


          <!-- Page Content -->

          @yield('content')

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
         @include('backend.partials.footer')

  </body>

</html>
