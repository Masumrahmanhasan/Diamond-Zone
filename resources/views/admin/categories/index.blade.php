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
								</svg> New Category</a>

				</div>
		</div>


		<div class="card card-body shadow border-0 table-wrapper table-responsive">

				<table class="table user-table table-hover align-items-center">
						<thead>
								<tr>
										<th class="border-bottom">
												#SR
										</th>
										<th class="borde-r-bottom">Featured Image</th>
										<th class="border-bottom">Name</th>
										<th class="border-bottom">Slug</th>
										<th class="border-bottom">Created at</th>
										<th class="border-bottom">Action</th>
								</tr>
						</thead>

						<tbody>
                                @forelse ($categories as $key => $category)

								<tr>
										<td>
												{{ $key+1 }}
										</td>
										<td>
                                            <a href="#" class="d-flex align-items-center">
                                            <img src="{{ asset($category->featured_image) }}"
																class="rounded" alt="Avatar" style="max-width: 150px">

												</a></td>
										<td><span class="fw-normal">{{ $category->name }}</span></td>
										<td><span class="fw-normal d-flex align-items-center">{{ $category->slug }}</span></td>
										<td><span class="fw-normal text-success">{{ beautify_date($category->created_at) }}</span></td>
										<td>
                                            <a href="{{ route('categories.edit', $category->id) }}">
                                                <svg class="icon icon-xs text-dark ms-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" data-bs-toggle="tooltip" data-bs-original-title="Edit" aria-label="Edit">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                            </a>

                                            <a href="{{ route('categories.destroy', $category->id) }} }}" onclick="event.preventDefault();
                                                document.getElementById('delete-form-{{ $category->id }}').submit();">
                                                <svg class="icon icon-xs text-danger ms-1" title="" data-bs-toggle="tooltip" fill="currentColor"
                                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-bs-original-title="Delete" aria-label="Delete">
                                                        <path fill-rule="evenodd"
                                                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                                clip-rule="evenodd">
                                                        </path>
                                                </svg>
                                            </a>

                                            <form id="delete-form-{{ $category->id }}" action="{{ route('categories.destroy', $category->id) }} }}" method="POST" class="d-none">
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
		</div>
@endsection
