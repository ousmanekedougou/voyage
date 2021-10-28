<!DOCTYPE html>
<html lang="en">
<head>
  @include('admin.layouts.head')
  
</head>
<body data-sidebar="dark">
  <div id="layout-wrapper">
    @include('admin.layouts.header')

    @include('admin.layouts.sidebar')

         <div class="main-content">
          @section('main-content')

          @show
          @include('admin.layouts.footer')
          
         </div>
  </div>
        <!-- END layout-wrapper -->

      @include('admin.layouts.setting')



</body>
</html>