@extends('layouts.admin')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
    <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                    <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                            <li class="breadcrumb-item">
                                    <a href="Javascript:;">
                                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                                    </path>
                                            </svg>
                                    </a>
                        </li>
                            <li class="breadcrumb-item"><a href="javascript:;">Pages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Pages List</li>
                    </ol>
            </nav>
            <h2 class="h4">Pages Management</h2>
            <p class="mb-0">Your Page management dashboard template.</p>
        </div>

</div>

<div class="card">
	<form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="card-header">
			<h6 class="fw-600 mb-0">Page Content</h6>
		</div>
		<div class="card-body">
			<div class="input-group row mb-3">
				<label class="col-sm-2 col-from-label" for="name">Title <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<input type="text" class="form-control" placeholder="Title" name="title" required>
				</div>
			</div>
			<div class="input-group row mb-3">
				<label class="col-sm-2 col-from-label" for="name">Link <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<div class="input-group-text d-block d-md-flex">
						<div class="input-group-prepend "><span class="input-group-text flex-grow-1">{{ url('/') }}/</span></div>
						<input type="text" class="form-control w-100 w-md-auto" placeholder="Slug" name="slug" required>
					</div>
					<small class="form-text text-muted">Use character, number, hypen only</small>
				</div>
			</div>
			<div class="input-group row">
				<label class="col-sm-2 col-from-label" for="name">Add Content <span class="text-danger">*</span></label>
				<div class="col-sm-10">
					<textarea name="content" id="summernote" cols="30" rows="10"></textarea>
				</div>
			</div>

            <div class="text-end mt-3">
				<button type="submit" class="btn btn-primary">Save Page</button>
			</div>
		</div>




	</form>
</div>

@endsection

@push('scripts')
    <script>
        CKEDITOR.replace( 'summernote' );
    </script>
@endpush
