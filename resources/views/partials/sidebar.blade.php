<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="{{asset('argon/img/brand/blue.png')}}" class="navbar-brand-img')}}" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link @if (\Request::is('dashboard')) active @endif " href="{{route('dashboard')}}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if (\Request::is('company')) active @endif" href="{{route('company.index')}}">
                <i class="ni ni-building text-orange"></i>
                <span class="nav-link-text">Companies</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link @if (\Request::is('employee')) active @endif" href="{{route('employee.index')}}">
                <i class="ni ni-archive-2 text-primary"></i>
                <span class="nav-link-text">Employees</span>
              </a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="profile.html">
					<i class="ni ni-single-02 text-green"></i>
					<span class="nav-link-text">Users</span>
				</a>
			</li>
            <li class="nav-item">
				<a class="nav-link" href="profile.html">
					<i class="ni ni-single-02 text-yellow"></i>
					<span class="nav-link-text">Profile</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="profile.html">
				  <i class="ni ni-settings-gear-65"></i>
				  <span class="nav-link-text">Settings</span>
				</a>
			  </li>
          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Documentation</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/getting-started/overview.html" target="_blank">
                <i class="ni ni-spaceship"></i>
                <span class="nav-link-text">Getting started</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/foundation/colors.html" target="_blank">
                <i class="ni ni-palette"></i>
                <span class="nav-link-text">Foundation</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html" target="_blank">
                <i class="ni ni-ui-04"></i>
                <span class="nav-link-text">Components</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/plugins/charts.html" target="_blank">
                <i class="ni ni-chart-pie-35"></i>
                <span class="nav-link-text">Plugins</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active active-pro" href="upgrade.html">
                <i class="ni ni-send text-dark"></i>
                <span class="nav-link-text">Upgrade to PRO</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>