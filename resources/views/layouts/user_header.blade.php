@php
$profile = auth()->user()->userprofile;

@endphp

<body class="text-left">
  <div class="app-admin-wrap layout-sidebar-large">

    @auth('user')
    <div class="main-header">
      <div class="menu-toggle">
        <div></div>
        <div></div>
        <div></div>
      </div>

      <div style="margin: auto"></div>
      <div class="header-part-right">
        <!-- Full screen toggle -->
        <i class="i-Full-Screen header-icon d-none d-sm-inline-block" data-fullscreen></i>

        <!-- User avatar dropdown -->
        <div class="dropdown-header">

          <i class="i-Lock-User mr-1"></i>{{auth()->user()->name}}
        </div>
        <div class="dropdown">
          <div class="user col align-self-end">
            @if(!$profile)
            <img loading="lazy" src="{{asset('assets/admin/images/faces/5.jpg')}}" id="userDropdown" alt="img" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @else
            <img loading="lazy" src="{{ asset('assets/upload/profile/' . auth()->user()->userprofile->image) }}" id="userDropdown" alt="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            @endif
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

              <a class="dropdown-item" href="{{route('user-profile')}}">Profile</a>
              <a class="dropdown-item" href="{{route('userchangepassword')}}">Change Password</a>
              <a class="dropdown-item" href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout').submit();">Sign Out</a>
              <form id="logout" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- ============ Search UI Start ============= -->
    <!-- ============ Search UI End ============= -->
    @endauth