@extends('layouts.admin')

@section('content')
		<div class="row mt-4">

				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
						<div class="d-block mb-4 mb-md-0">

								<h2 class="h4">Create New Category</h2>

						</div>

				</div>
				<div class="col-6 mb-4 mx-auto">
						<div class="card border-0 shadow components-section">
								<div class="card-body">
										<div class="row mb-4">
                                            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf
												<div class="col-lg-12 col-sm-6">
														<div class="mb-4">
																<label for="email">Category Name</label>
                                                                <input type="text" name="name" class="form-control @error('name')
                                                                is-invalid
                                                                @enderror"
																		id="category_name">
                                                                @error('name')
                                                                    <small class="form-text invalid-feedback">{{ $message }}</small>
                                                                @enderror
														</div>

														<div class="mb-4">
																<label for="email">Category Slug</label>
																<input type="text" name="slug" class="form-control" id="category_slug"
																		readonly>

														</div>

														<div class="mb-4">
																<div class="card card-body border-dashed shadow mb-4 @error('featured_image') border-invalid @enderror">

																		<h2 class="h5 mb-4">Select Category Image</h2>
																		<div class="d-flex align-items-center">

																				<div class="me-3">
                                                                                <img class="rounded avatar-xl"
																								src="{{ asset('img/category_placeholder.png') }}" id="preview-image" alt="change avatar"></div>
																				<div class="file-field">

																						<div class="d-flex justify-content-xl-center ms-xl-3">
																								<div class="d-flex">
                                                                                                        <svg class="icon text-gray-500 me-2" fill="currentColor"
																												viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
																												<path fill-rule="evenodd"
																														d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
																														clip-rule="evenodd"></path>
																										</svg>
                                                                                                        <input type="file" name="featured_image" id="photo" >
																										<div class="d-md-block text-left">
																												<div class="fw-normal text-dark mb-1">Choose Image</div>
																												<div class="text-gray small">JPG, PNG, Or SVG. Max size of 800K</div>
																										</div>
																								</div>
																						</div>
																				</div>
																		</div>
																</div>

                                                                @error('featured_image')
                                                                    <small class="form-text text-danger">{{ $message }}</small>
                                                                @enderror
														</div>

														<div class="mt-3">
                                                            <button type="submit" class="btn btn-gray-800 mt-2 animate-up-2">Save All</button>
                                                        </div>
												</div>
                                            </form>

										</div>

								</div>
						</div>
				</div>
		</div>
@endsection

@push('scripts')
		<script>
		  var category_name = document.getElementById('category_name');
		  var category_slug = document.getElementById('category_slug');

		  category_name.addEventListener('keyup', function() {
		    category_slug.value = slugify(category_name.value)
		  })


		</script>
@endpush
