@extends('layouts.admin')

@section('content')
		<div class="row mt-4">

				<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
						<div class="d-block mb-4 mb-md-0">

								<h2 class="h4">Create New Sub Category</h2>

						</div>

				</div>
				<div class="col-6 mb-4">
						<div class="card border-0 shadow components-section">
								<div class="card-body">
										<div class="row mb-4">
												<form action="{{ route('subcategories.store') }}" method="POST" enctype="multipart/form-data">
														@csrf
														<div class="col-lg-12 col-sm-6">

																<div class="mb-4">
                                                                    <label class="my-1 me-2" for="country">Main Category</label>
                                                                        <select name="category_id"
																				class="form-select  @error('name') is-invalid @enderror" >
																				<option value="">Select main category</option>
                                                                                @foreach ($categories as $category)
																				    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                                                @endforeach

																		</select>

                                                                        @error('category_id')
																				<small class="form-text text-danger">{{ $message }}</small>
																		@enderror
                                                                </div>

																<div class="mb-4">
																		<label for="email">Sub Category Name</label>
																		<input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
																				id="subcategory_name">
																		@error('name')
																				<small class="form-text invalid-feedback">{{ $message }}</small>
																		@enderror
																</div>

																<div class="mb-4">
																		<label for="email">Category Slug</label>
																		<input type="text" name="slug" class="form-control" id="subcategory_slug" readonly>

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
		  var category_name = document.getElementById('subcategory_name');
		  var category_slug = document.getElementById('subcategory_slug');

		  category_name.addEventListener('keyup', function() {
		    category_slug.value = slugify(category_name.value)
		  })
		</script>
@endpush
