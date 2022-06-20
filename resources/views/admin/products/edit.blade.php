@extends('layouts.admin')

@section('content')
            <div>
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
                            <div class="d-block mb-4 mb-md-0">
                                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                                            <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                                                    <li class="breadcrumb-item">
                                                            <a href="#">
                                                                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                                                            </path>
                                                                    </svg>
                                                            </a>
                                                    </li>
                                                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">Update item</li>
                                            </ol>
                                    </nav>
                                    <h2 class="h4">Update item</h2>
                            </div>
                    </div>
                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                                <div class="col-12 col-xl-8">
                                        <div class="card card-body shadow-sm mb-4">
                                                <h2 class="h5 mb-4">Item information</h2>

                                                        <div class="row">
                                                                <div class="col-md-6 mb-3">
                                                                        <div>
                                                                                <label for="name">Name</label>
                                                                                <input name="name" class="form-control  @error('name')
                                                                                is-invalid
                                                                                @enderror" id="name" type="text"
                                                                                        placeholder="Enter the item's name" required="" value="{{ $product->name }}">
                                                                        </div>
                                                                </div>

                                                                <div class="col-md-6 mb-3">
                                                                    <div>
                                                                            <label for="name">SKU</label>
                                                                            <input name="sku" class="form-control @error('sku')
                                                                            is-invalid
                                                                            @enderror" id="name" type="text"
                                                                                    placeholder="Enter the item's Sku" required="" value="{{ $product->sku }}">


                                                                    </div>
                                                                    @error('sku')

                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="category">Category</label>
                                                                <select name="category_id" class="form-select mb-0 @error('category_id')
                                                                is-invalid
                                                                @enderror" id="category_id"
                                                                        aria-label="category select example">
                                                                        <option selected="">Choose...</option>
                                                                        @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected': '' }}>{{ $category->name }}</option>
                                                                        @endforeach

                                                                </select>
                                                            </div>


                                                            <div class="col-md-6 mb-3">
                                                                <label for="category">Sub Category</label>
                                                                <select name="subcategory_id" class="form-select mb-0 " id="subcategory_id"
                                                                        aria-label="category select example">
                                                                        <option selected="" value="{{ null }}">Choose...</option>

                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                                <div class="col-md-12 mb-3">
                                                                        <div class="form-group">
                                                                                <label for="excerpt">Short Description</label>
                                                                                <textarea class="form-control" name="short_description" id="short_desc" type="text"
                                                                                style="height: 142px;">{{ $product->short_description }}</textarea>
                                                                        </div>
                                                                </div>
                                                        </div>



                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                    <div class="form-group">
                                                                            <label for="excerpt">Price</label>
                                                                            <input name="price" class="form-control @error('price')
                                                                            is-invalid
                                                                            @enderror" id="name" type="number"
                                                                                    placeholder="Enter the item's Price" required="" value="{{ $product->price }}">
                                                                    </div>
                                                            </div>

                                                            <div class="col-md-6 mb-3">
                                                                <div class="form-group">
                                                                        <label for="excerpt">Discount</label>
                                                                        <input name="discount" class="form-control " id="name" type="number"
                                                                                placeholder="Enter the item's name" required="" value="{{ $product->discount }}">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-md-12 mb-3">
                                                                    <div class="form-group">
                                                                            <label for="excerpt">Description</label>
                                                                            <textarea class="form-control" name="description" id="editor1" type="text" placeholder="Write Something here"
                                                                            >{{ $product->description }}</textarea>
                                                                    </div>
                                                            </div>
                                                    </div>


                                                        <div class="row">

                                                        </div>
                                                        <div class="mt-3">
                                                                <button type="submit" class="btn btn-gray-800 mt-2 animate-up-2">Save All</button>
                                                        </div>

                                        </div>
                                </div>
                                <div class="col-12 col-xl-4">
                                        <div class="row">
                                                <div class="col-12 mb-4">
                                                        <div class="card shadow border-0 p-0">

                                                            <div class="card-body pb-5">
                                                                <div class="row">
                                                                    <label for="excerpt">Select Thumbnail</label>
                                                                    <div class="input-group" data-toggle="aizuploader" data-type="image"
                                                                        data-multiple="false">
                                                                        <div class="input-group-prepend">
                                                                            <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                                        </div>
                                                                        <div class="form-control file-amount">Choose File</div>
                                                                        <input type="hidden" name="thumbnail" class="selected-files" value="{{ $product->thumbnail }}">
                                                                    </div>
                                                                    <div class="file-preview box sm">
                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                    <div class="card shadow border-0 p-0">

                                                        <div class="card-body pb-5">
                                                            <div class="row">
                                                                <label for="excerpt">Select Gallary</label>
                                                                <div class="input-group" data-toggle="aizuploader" data-type="image"
                                                                    data-multiple="true">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                                    </div>
                                                                    <div class="form-control file-amount">Choose File</div>
                                                                    <input type="hidden" name="gallary" class="selected-files" value="{{ $product->gallary }}">
                                                                </div>
                                                                <div class="file-preview box sm">
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12 mb-4">
                                                    <div class="card shadow border-0 p-0">

                                                        <div class="card-body pb-5">
                                                            <div class="row">
                                                                <label for="excerpt">Select Certificate</label>
                                                                <div class="input-group" data-toggle="aizuploader" data-type="image"
                                                                    data-multiple="true">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text bg-soft-secondary font-weight-medium">Browse</div>
                                                                    </div>
                                                                    <div class="form-control file-amount">Choose File</div>
                                                                    <input type="hidden" name="certificate" class="selected-files" value="{{ $product->certificate }}">
                                                                </div>
                                                                <div class="file-preview box sm">
                                                                </div>
                                                            </div>


                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                </div>
                        </div>
                    </form>

            </div>
@endsection

@push('scripts')
    <script>
         CKEDITOR.replace( 'short_desc' );
         CKEDITOR.replace( 'editor1' );

        var category = document.getElementById('category_id');

        category.addEventListener('change', function() {
            var category_id = this.value;

            if(category_id){
                axios.post('{{ route('get_subcategories') }}', {category_id:category_id})
                    .then(response => {
                        var subcategory = document.getElementById('subcategory_id');
                        subcategory.innerHTM = '<option selected="" value="null">Choose...</option>'
                        response.data.forEach((element) => {
                            subcategory.innerHTML = '<option value="'+ element.id +'">'+ element.name +'</option>'
                        });
                    })
            }
        })
    </script>
@endpush
