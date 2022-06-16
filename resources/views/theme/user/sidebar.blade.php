<div class="col-lg-3">

    <div class="user_dashboard_list">

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">

                {{-- Dashboard --}}
                <button class="nav-link @yield('dashboard')">
                    <a href="{{ route('user.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                </button>

                {{-- Orders --}}
                <button class="nav-link @yield('order')">
                    <a href="{{ route('user.orders') }}"><i class="fas fa-shopping-bag"></i> Orders</a>
                </button>

                {{-- My Address --}}
                {{-- <button class="nav-link @yield('address')">
                    <a href=""><i class="fas fa-map-marker-alt"></i> My Address</a>
                </button> --}}

                {{-- Account details --}}
                <button class="nav-link @yield('account')">
                    <a href=""><i class="fas fa-user"></i> Account details</a>
                </button>

                {{-- Logout --}}
                <button class="nav-link">
                    <a onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" href="{{ route('logout') }}"> <i class="fas fa-sign-out-alt"></i> Logout </a>
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </button>


            </div>
        </nav>


    </div>

</div>
