<nav class="navbar navbar-top navbar-expand navbar-dashboard navbar-dark ps-0 pe-2 pb-0">
		<div class="container-fluid px-0">
				<div class="d-flex justify-content-between w-100" id="navbarSupportedContent">
						<div class="d-flex align-items-center">
								<!-- Search form -->
								<form class="navbar-search form-inline" id="navbar-search-main">
										<div class="input-group input-group-merge search-bar">
												<span class="input-group-text" id="topbar-addon">
														<svg class="icon icon-xs" x-description="Heroicon name: solid/search" xmlns="http://www.w3.org/2000/svg"
																viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
																<path fill-rule="evenodd"
																		d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
																		clip-rule="evenodd"></path>
														</svg>
												</span>
												<input type="text" class="form-control" id="topbarInputIconLeft" placeholder="Search" aria-label="Search"
														aria-describedby="topbar-addon">
										</div>
								</form>
								<!-- / Search form -->
						</div>
						<!-- Navbar links -->
						<ul class="navbar-nav align-items-center">
								<li class="nav-item dropdown">
										<a class="nav-link text-dark"
												href="{{ url('/') }}" role="button" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
										</a>

								</li>


								<li class="nav-item dropdown ms-lg-3">
										<a class="nav-link dropdown-toggle pt-1 px-0" href="#" role="button" data-bs-toggle="dropdown"
												aria-expanded="false">
												<div class="media d-flex align-items-center">
														<img class="avatar rounded-circle" alt="Image placeholder"
																src="{{ asset('img/team/profile-picture-3.jpg') }}">
														<div class="media-body ms-2 text-dark align-items-center d-none d-lg-block">
																<span class="mb-0 font-small fw-bold text-gray-900">{{ auth()->user()->name }}</span>
														</div>
												</div>
										</a>
										<div class="dropdown-menu dashboard-dropdown dropdown-menu-end mt-2 py-1">

												<a class="dropdown-item d-flex align-items-center" href="{{ route('profile.settings') }}">
														<svg class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
																xmlns="http://www.w3.org/2000/svg">
																<path fill-rule="evenodd"
																		d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
																		clip-rule="evenodd"></path>
														</svg>
														Settings
												</a>


												<a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
														class="dropdown-item d-flex align-items-center">
														<svg class="dropdown-icon text-danger me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
																xmlns="http://www.w3.org/2000/svg">
																<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																		d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
														</svg>
														Logout
												</a>




										</div>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												@csrf
										</form>
								</li>
						</ul>
				</div>
		</div>
</nav>
