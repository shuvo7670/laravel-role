
<!DOCTYPE html>
<html lang="en">
@include('backend.layouts.partials._head')
<body class="bg-dark">
<!-- Start wrapper-->
<div id="wrapper">
 @include('backend.layouts.partials._side_navbar')
 
 @include('backend.layouts.partials._top_navbar')
 <div class="clearfix"></div>
     
   <div class="content-wrapper">
     <div class="container-fluid">
      @if ($errors->any())
		    <div class="alert alert-danger">
	            @foreach ($errors->all() as $error)
	                <p>{{ $loop->iteration }} - {{ $error }}</p>
	            @endforeach
		    </div>
	    @endif
        @include('backend.layouts.partials._flash')
         @yield('content')
     </div>
     <!-- End container-fluid-->
     
     </div><!--End content-wrapper-->
    <!--Start Back To Top Button-->
     <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
     <!--End Back To Top Button-->
        @include('backend.layouts.partials._footer')
   </div><!--End wrapper-->
    @yield('modals')
    @include('backend.layouts.partials._script')
    @yield('custom_script')
    @yield('custom_script_files')

</body>

</html>
