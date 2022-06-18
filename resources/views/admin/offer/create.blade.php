@extends('layouts.admin')

@section('content')
<div class="row mt-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">

                    <h2 class="h4">Create New Offer</h2>

            </div>

    </div>
        <div class="col-8 mb-4 mx-auto">
            <div class="card border-0 shadow components-section">
                    <div class="card-header">
                        Create New Offer
                    </div>
                    <div class="card-body">

                            <form action="{{ route('profile.update_settings') }}" method="POST">
                                @csrf


                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-from-label">Offer Title</label>
                                    <div class="col-md-8">
                                        <div class="form-group">

                                            <input type="text" class="form-control" name="name" placeholder="offer title">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-from-label">Products</label>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <select name="products[]" multiple="multiple" id="products" class="form-control choices__input" onchange="getPrice(this)">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-from-label">Grand Price</label>
                                    <div class="col-md-8">
                                        <div class="form-group">

                                            <input type="text" id="total_selected_product_price" class="form-control" name="grand_price" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-from-label">Discount</label>
                                    <div class="col-md-8">
                                        <div class="form-group">

                                            <input type="number" class="form-control" name="grand_price" value="">
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </form>

                    </div>
            </div>
        </div>

</div>
@endsection
`

@push('scripts')

<script>
    const element = document.querySelector('.choices__input');
    const choices = new Choices(element);

    function getPrice(elem){
        console.log(choices)
    }

</script>
@endpush
