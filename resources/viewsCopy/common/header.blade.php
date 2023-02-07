<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{ route('admin.dashboard') }}" class="logo d-flex align-items-center">
        <img src="{{ asset('img/stock-logo.png') }}" alt="">
        <span class="d-none d-lg-block">SmartUniqueInt</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @if(Auth::user()->file !== null)
                <img src="{{ asset('storage/'.Auth::user()->file) }}" alt="Profile" class="rounded-circle">
            @else
                <img src="{{ asset('storage/userAvatar.jpg') }}" alt="Profile" class="rounded-circle">
            @endif
            <span class="d-none d-md-block dropdown-toggle ps-2 text-capitalize">{{ Auth::user() ? Auth::user()->name : '' }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            @if ($level = DB::table('user_level')->where('user_id',Auth::user()->id)->first())
                <li class="dropdown-header">
                <h6 class="text-capitalize">{{ Auth::user()->name }}</h6>
                <span>@php
                    $levelName = DB::table('levels')->where('id',$level->current_level_id)->first();
                    echo $levelName->name;
                @endphp</span>
                </li>
                <li>
                  <hr class="dropdown-divider">
                </li>
            @else
            <li class="dropdown-header">
              <h6 class="text-capitalize">{{ Auth::user()->name }}</h6>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
            @endif
            @if (Auth::user() && Auth::user()->type == 'Admin')
            <li class="dropdown-header">
                <a class="dropdown-item d-flex align-items-center" href="javascript:void(0);">
                  {{-- <i class="bi bi-person"></i> --}}
                  <span>Admin</span>
                </a>
              </li>
            @endif
            {{-- <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li> --}}

            <li>
              <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)" onclick="$('#logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header>
