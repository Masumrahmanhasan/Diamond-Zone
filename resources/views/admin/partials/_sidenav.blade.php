<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
		<div class="sidebar-inner px-4 pt-3">
				<div class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
						<div class="d-flex align-items-center">
								<div class="d-block">
										<h2 class="h5 mb-3">Hi, Jane</h2>
										<a href="@@path/pages/examples/sign-in.html"
												class="btn btn-secondary btn-sm d-inline-flex align-items-center">
												<svg class="icon icon-xxs me-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
														xmlns="http://www.w3.org/2000/svg">
														<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
																d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
												</svg>
												Sign Out
										</a>
								</div>
						</div>
						<div class="collapse-close d-md-none">
								<a href="#sidebarMenu" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu"
										aria-expanded="true" aria-label="Toggle navigation">
										<svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
												<path fill-rule="evenodd"
														d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
														clip-rule="evenodd"></path>
										</svg>
								</a>
						</div>
				</div>
				<ul class="nav flex-column pt-3 pt-md-0">
						<li class="nav-item">
								<a href="javascript:;" class="nav-link d-flex align-items-center">
										<span class="sidebar-icon">
												<img src="{{ asset('frontend_asset/images/logo.jpg') }}" height="60" width="60" alt="Volt Logo">
										</span>
										<span class="mt-1 ms-1 sidebar-text">Diamond Zone</span>
								</a>
						</li>
						<li class="nav-item @if (request()->segment(2) === 'dashboard') active @endif">
								<a href="{{ route('admin.dashboard') }}" class="nav-link">
										<span class="sidebar-icon">
												<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
														<path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
														<path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
												</svg>
										</span>
										<span class="sidebar-text">Dashboard</span>
								</a>
						</li>


						<li class="nav-item">
								<span
										class="nav-link @if (request()->segment(2) !== 'categories' || request()->segment(2) !== 'subcategories' ) collapsed @endif d-flex justify-content-between align-items-center"
										data-bs-toggle="collapse" data-bs-target="#submenu-pages">
										<span>
												<span class="sidebar-icon">
														<svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
																<path fill-rule="evenodd"
																		d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
																		clip-rule="evenodd"></path>
																<path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
														</svg>
												</span>
												<span class="sidebar-text">Categories</span>
										</span>
										<span class="link-arrow">
												<svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
														<path fill-rule="evenodd"
																d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
																clip-rule="evenodd"></path>
												</svg>
										</span>
								</span>
								<div class="multi-level collapse @if (request()->segment(2) !== 'categories' && request()->segment(2) !== 'subcategories') collapsed @else show @endif" role="list" id="submenu-pages" aria-expanded="false">
										<ul class="flex-column nav">
												<li class="nav-item @if (request()->segment(2) == 'categories' ) active @endif">
														<a class="nav-link" href="{{ route('categories.index') }}">
																<span class="sidebar-text">Main Category</span>
														</a>
												</li>

												<li class="nav-item @if (request()->segment(2) == 'subcategories' ) active @endif">
														<a class="nav-link" href="{{ route('subcategories.index') }}">
																<span class="sidebar-text">Sub Category</span>
														</a>
												</li>

										</ul>
								</div>
						</li>


                        <li class="nav-item @if (request()->segment(2) === 'products') active @endif">
                            <a href="{{ route('products.index') }}" class="nav-link">
                                    <span class="sidebar-icon">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs me-2" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                                                <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
                                            </svg>
                                    </span>
                                    <span class="sidebar-text">Products</span>
                            </a>
                        </li>

												<li class="nav-item @if (request()->segment(2) === 'review') active @endif">
														<a href="{{ route('products.review-get') }}" class="nav-link">
																		<span class="sidebar-icon">

																						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs me-2" viewBox="0 0 20 20" fill="currentColor">
																								<path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
																								<path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
																						</svg>
																		</span>
																		<span class="sidebar-text">Products Review</span>
														</a>
												</li>

                        <li class="nav-item @if (request()->segment(2) === 'offers') active @endif">
                            <a href="{{ route('products.combo_offer') }}" class="nav-link">
                                    <span class="sidebar-icon">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-xs me-2" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M9 2a2 2 0 00-2 2v8a2 2 0 002 2h6a2 2 0 002-2V6.414A2 2 0 0016.414 5L14 2.586A2 2 0 0012.586 2H9z" />
                                                <path d="M3 8a2 2 0 012-2v10h8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
                                            </svg>
                                    </span>
                                    <span class="sidebar-text">Combo Offer</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <span
                                    class="nav-link @if (request()->segment(2) !== 'settings' || request()->segment(2) !== 'header' ) collapsed @endif d-flex justify-content-between align-items-center"
                                    data-bs-toggle="collapse" data-bs-target="#submenu-header">
                                    <span>
                                            <span class="sidebar-icon">
                                                <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                            d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                                            clip-rule="evenodd"></path>
                                                </svg>
                                            </span>
                                            <span class="sidebar-text">Website Setup</span>
                                    </span>
                                    <span class="link-arrow">
                                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                            clip-rule="evenodd"></path>
                                            </svg>
                                    </span>
                            </span>
                            <div class="multi-level collapse @if (request()->segment(2) !== 'settings' && request()->segment(2) !== 'header') collapsed @else show @endif" role="list" id="submenu-header" aria-expanded="false">
                                    <ul class="flex-column nav">
                                            <li class="nav-item @if (request()->segment(2) == 'settings' ) active @endif">
                                                    <a class="nav-link" href="{{ route('settings.header') }}">
                                                            <span class="sidebar-text">Header</span>
                                                    </a>
                                            </li>

                                            <li class="nav-item @if (request()->segment(2) == 'header' ) active @endif">
                                                    <a class="nav-link" href="#">
                                                            <span class="sidebar-text">Footer</span>
                                                    </a>
                                            </li>

                                            <li class="nav-item @if (request()->segment(2) == 'pages' ) active @endif">
                                                <a class="nav-link" href="{{ route('settings.pages') }}">
                                                        <span class="sidebar-text">Pages</span>
                                                </a>
                                        </li>

                                    </ul>
                            </div>
                        </li>


				</ul>
		</div>
</nav>
