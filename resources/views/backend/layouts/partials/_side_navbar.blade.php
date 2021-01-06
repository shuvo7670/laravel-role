  <!--Start sidebar-wrapper-->
  <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true" class="border-right border-secondary-light shadow-none color-sidebar bg-dark">
     <div class="brand-logo">
      <a href="index.html">
       <img src="{{asset('backend/assets/images/logo-icon.png')}}" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">{{Auth::user()->name}}</h5>
     </a>
	 </div>
	 <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>
      <li>
        <a href="{{route('backend.showDashboard')}}" class="waves-effect">
          <i class="icon-home"></i> <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="javaScript:void();" class="waves-effect">
          <i class="icon-folder-alt"></i> <span>Role & Permission</span>
          <i class="fa fa-angle-left float-right"></i>
        </a>
        <ul class="sidebar-submenu">
              <li><a href="{{route('backend.rolePermission')}}"><i class="fa fa-circle-o"></i> Role</a></li>
              <li><a href="{{route('backend.assignPermission')}}"><i class="fa fa-circle-o"></i> Assign Permission</a></li>
        </ul>
       </li>
    </ul>
	 
   </div>
   <!--End sidebar-wrapper-->