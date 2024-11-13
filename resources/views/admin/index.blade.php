<!DOCTYPE html>
<html>
  <head> 
    
    @include('admin.css')

  </head>
  <body>
    
        @include('admin.header')

        @include('admin.sidebar')

      <div class="page-content active">
        <div class="page-header">
          {{-- <div class="container-fluid"> --}}

            @yield('content')

          {{-- </div> --}}
      </div>
    </div>
    
    <!-- JavaScript files-->
    @include('admin.js')

  </body>
  
</html>