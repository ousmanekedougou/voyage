<!DOCTYPE html>
<html lang="en">
<head>
  @include('user.layouts.head')
  @section('headSection')
  @show
</head>
<body data-bs-spy="scroll" data-bs-target="#topnav-menu" data-bs-offset="60">
  @include('user.layouts.header')

  @section('main-content')

  

  @show

  @include('user.layouts.footer')
  @section('footerSection')
  @show
  
  @include('user.layouts.setting')

  


</body>
</html>