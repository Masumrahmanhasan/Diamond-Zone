@extends('layouts.admin')

@section('content')
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
				<div class="d-block mb-4 mb-md-0">

						<h2 class="h4">Sub Category List</h2>

				</div>
				<div class="btn-toolbar mb-2 mb-md-0"><a href="{{ route('subcategories.create') }}"
								class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                                <svg class="icon icon-xs me-2" fill="none"
										stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
								</svg> New Sub Category</a>

				</div>
		</div>


		<div class="card card-body shadow border-0 table-wrapper table-responsive">

				<table class="table user-table table-hover align-items-center">
						<thead>
								<tr>
										<th class="border-bottom">
												#SR
										</th>
                                        <th class="border-bottom">Main Category</th>
										<th class="border-bottom">Name</th>
										<th class="border-bottom">Slug</th>
										<th class="border-bottom">Created at</th>
										<th class="border-bottom">Action</th>
								</tr>
						</thead>

						<tbody>
                                @forelse ($subcategories as $key => $subcategory)

								<tr>
										<td>
												{{ $key+1 }}
										</td>
										<td>
                                            {{ $subcategory->category->name }}
                                        </td>
										<td><span class="fw-normal">{{ $subcategory->name }}</span></td>
										<td><span class="fw-normal d-flex align-items-center">{{ $subcategory->slug }}</span></td>
										<td><span class="fw-normal text-success">{{ beautify_date($subcategory->created_at) }}</span></td>
										<td>
                                            <a href="{{ route('subcategories.edit', $subcategory->id) }}">
                                                <svg class="icon icon-xs text-dark ms-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-bs-toggle="tooltip" data-bs-original-title="Edit" aria-label="Edit">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>

                                            <a href="{{ route('subcategories.destroy', $subcategory->id) }} }}" onclick="event.preventDefault();
                                                document.getElementById('delete-form').submit();">
                                                <svg class="icon icon-xs text-danger ms-1" title="" data-bs-toggle="tooltip" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-bs-original-title="Delete" aria-label="Delete">
                                                        <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                                clip-rule="evenodd">
                                                        </path>
                                                </svg>
                                            </a>

                                            <form id="delete-form" action="{{ route('subcategories.destroy', $subcategory->id) }} }}" method="POST" class="d-none">
                                                @csrf
                                                @method("DELETE")
                                            </form>

										</td>
								</tr>

                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No records found</td>
                                </tr>
                                @endforelse

						</tbody>
				</table>


				{{-- <div class="card-footer px-3 border-0 d-flex flex-column flex-lg-row align-items-center justify-content-between">
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
				</div> --}}
		</div>
@endsection
