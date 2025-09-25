<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>
        <div id="sidebar-menu">
            <div class="logo-box">
                {{-- <a href="{{ url('/') }}" class="logo logo-light">
                    SI ALPHA

                </a> --}}
                {{-- <a href="{{ url('/') }}" class="logo logo-dark">
                    SI ALPHA
                </a> --}}
                <h1>SI ALPHA</h1>
            </div>

            <ul id="side-menu">
                <li class="menu-title">Menu</li>

                <li class="{{ request()->routeIs('admin.dashboard.*') ? 'menuitem-active' : '' }}">
                    <a class="tp-link {{ request()->routeIs('admin.dashboard.*') ? 'active' : '' }}"
                        href="{{ route('admin.dashboard.index') }}">
                        <i data-feather="home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.cemetery.*') ? 'menuitem-active' : '' }}">
                    <a class="tp-link {{ request()->routeIs('admin.cemetery.*') ? 'active' : '' }}"
                        href="{{ route('admin.cemetery.index') }}">
                        <i data-feather="map-pin"></i>
                        <span>TPU</span>
                    </a>
                </li>

                <li class="{{ request()->routeIs('admin.reservation.*') ? 'menuitem-active' : '' }}">
                    <a class="tp-link {{ request()->routeIs('admin.reservation.*') ? 'active' : '' }}"
                        href="{{ route('admin.reservation.index') }}">
                        <i data-feather="book"></i>
                        <span>Pemesanan</span>
                    </a>
                </li>
            </ul>



        </div>
    </div>
</div>
