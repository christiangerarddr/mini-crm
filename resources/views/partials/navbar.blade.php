<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
	<div class="container-fluid">
		<div class="collapse navbar-collapse" id="navbarSupportedContent">

			<ul class="navbar-nav align-items-center  ml-auto ">
				<li class="nav-item dropdown">
					<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false">
						<div class="media align-items-center">
							<span class="avatar avatar-sm rounded-circle">
								<img alt="Image placeholder"
									src="{{ asset('argon/img/theme/team-1.jpg') }}">
							</span>
							<div class="media-body  ml-2  d-none d-lg-block">
								<span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
							</div>
						</div>
					</a>
					<div class="dropdown-menu  dropdown-menu-right ">
						<div class="dropdown-header noti-title">
							<h6 class="text-overflow m-0">Welcome!</h6>
						</div>
						<a class="dropdown-item"
							href="{{ route('profile', ['id' => auth::user()->id]) }}"
							onclick="event.preventDefault(); document.getElementById('profile-form').submit();">
							<i class="ni ni-single-02"></i>
							<span>My profile</span>
						</a>

						<form id="profile-form"
							action="{{ route('profile', ['id' => auth::user()->id]) }}"
							method="POST" style="display: none;">
							@csrf
						</form>

						<a href="{{ route('settings') }}" class="dropdown-item">
							<i class="ni ni-settings-gear-65"></i>
							<span>Settings</span>
						</a>

						<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
							<i class="ni ni-user-run"></i>
							<span>Logout</span>
						</a>

						<form id="logout-form" action="{{ route('logout') }}" method="POST"
							style="display: none;">
							@csrf
						</form>

					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>