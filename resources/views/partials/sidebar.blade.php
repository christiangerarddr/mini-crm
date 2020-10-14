<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{ asset('argon/img/brand/blue.png') }}" class="navbar-brand-img')}}"
                    alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link @if (\Request::is('dashboard')) active @endif "
                            href="{{ route('dashboard') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (\Request::is('company')) active @endif"
                            href="{{ route('company.index') }}">
                            <i class="ni ni-building text-orange"></i>
                            <span class="nav-link-text">Companies</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (\Request::is('employee')) active @endif"
                            href="{{ route('employee.index') }}">
                            <i class="ni ni-archive-2 text-primary"></i>
                            <span class="nav-link-text">Employees</span>
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Other Section</span>
                </h6>
                <ul class="navbar-nav">
					<li class="nav-item">
                        <a class="nav-link" href="profile.html">
                            <i class="ni ni-single-02 text-green"></i>
                            <span class="nav-link-text">Users</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (\Request::is('profile/*')) active @endif"
                            href="{{ route('profile', ['id' => auth::user()->id]) }}"
                            onclick="event.preventDefault(); document.getElementById('profile-form').submit();">
                            <i class="ni ni-single-02 text-yellow"></i>
                            <span class="nav-link-text">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (\Request::is('settings')) active @endif"
                            href="{{ route('settings') }}">
                            <i class="ni ni-settings-gear-65"></i>
                            <span class="nav-link-text">Settings</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
