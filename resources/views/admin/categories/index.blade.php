@extends('layouts.admin')

@section('content')
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
				<div class="d-block mb-4 mb-md-0">

						<h2 class="h4">Main Category List</h2>

				</div>
				<div class="btn-toolbar mb-2 mb-md-0"><a href="{{ route('categories.create') }}"
								class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                                <svg class="icon icon-xs me-2" fill="none"
										stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
								</svg> New User</a>

				</div>
		</div>


		<div class="card card-body shadow border-0 table-wrapper table-responsive">

				<table class="table user-table table-hover align-items-center">
						<thead>
								<tr>
										<th class="border-bottom">
												<div class="form-check dashboard-check">
                                                    <input class="form-check-input" type="checkbox" value=""
																id="userCheck55">
                                                    <label class="form-check-label" for="userCheck55"></label>
                                                </div>
										</th>
										<th class="border-bottom">Featured Image</th>
										<th class="border-bottom">Name</th>
										<th class="border-bottom">Slug</th>
										<th class="border-bottom">Created at</th>
										<th class="border-bottom">Action</th>
								</tr>
						</thead>
						<tbody>
								<tr>
										<td>
												<div class="form-check dashboard-check"><input class="form-check-input" type="checkbox" value=""
																id="userCheck1"> <label class="form-check-label" for="userCheck1"></label></div>
										</td>
										<td><a href="#" class="d-flex align-items-center"><img src="../assets/img/team/profile-picture-1.jpg"
																class="avatar rounded-circle me-3" alt="Avatar">
														<div class="d-block"><span class="fw-bold">Roy Fendley</span>
																<div class="small text-gray">info@example.com</div>
														</div>
												</a></td>
										<td><span class="fw-normal">10 Feb 2020</span></td>
										<td><span class="fw-normal d-flex align-items-center"><svg class="icon icon-xxs text-success me-1"
																fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
																<path fill-rule="evenodd"
																		d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
																		clip-rule="evenodd"></path>
														</svg> Email</span></td>
										<td><span class="fw-normal text-success">Active</span></td>
										<td>
												<div class="btn-group"><button
																class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 p-0" data-bs-toggle="dropdown"
																aria-haspopup="true" aria-expanded="false"><svg class="icon icon-xs" fill="currentColor"
																		viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
																		<path
																				d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z">
																		</path>
																</svg> <span class="visually-hidden">Toggle Dropdown</span></button>
														<div class="dropdown-menu dashboard-dropdown dropdown-menu-start mt-2 py-1" style=""><a
																		class="dropdown-item d-flex align-items-center" href="#"><svg class="dropdown-icon text-gray-400 me-2"
																				fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
																				<path fill-rule="evenodd"
																						d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z"
																						clip-rule="evenodd"></path>
																		</svg> Reset Pass </a><a class="dropdown-item d-flex align-items-center" href="#"><svg
																				class="dropdown-icon text-gray-400 me-2" fill="currentColor" viewBox="0 0 20 20"
																				xmlns="http://www.w3.org/2000/svg">
																				<path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
																				<path fill-rule="evenodd"
																						d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
																						clip-rule="evenodd"></path>
																		</svg> View Details </a><a class="dropdown-item d-flex align-items-center" href="#"><svg
																				class="dropdown-icon text-danger me-2" fill="currentColor" viewBox="0 0 20 20"
																				xmlns="http://www.w3.org/2000/svg">
																				<path d="M11 6a3 3 0 11-6 0 3 3 0 016 0zM14 17a6 6 0 00-12 0h12zM13 8a1 1 0 100 2h4a1 1 0 100-2h-4z">
																				</path>
																		</svg> Suspend</a></div>
												</div><svg class="icon icon-xs text-danger ms-1" title="" data-bs-toggle="tooltip" fill="currentColor"
														viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-bs-original-title="Delete" aria-label="Delete">
														<path fill-rule="evenodd"
																d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
																clip-rule="evenodd"></path>
												</svg>
										</td>
								</tr>

						</tbody>
				</table>


				<div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
						<nav aria-label="Page navigation example">
								<ul class="pagination mb-0">
										<li class="page-item"><a class="page-link" href="#">Previous</a></li>
										<li class="page-item"><a class="page-link" href="#">1</a></li>
										<li class="page-item active"><a class="page-link" href="#">2</a></li>
										<li class="page-item"><a class="page-link" href="#">3</a></li>
										<li class="page-item"><a class="page-link" href="#">4</a></li>
										<li class="page-item"><a class="page-link" href="#">5</a></li>
										<li class="page-item"><a class="page-link" href="#">Next</a></li>
								</ul>
						</nav>
						<div class="fw-normal small mt-4 mt-lg-0">Showing <b>5</b> out of <b>25</b> entries</div>
				</div>
		</div>
@endsection
