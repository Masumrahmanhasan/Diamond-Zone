@extends('layouts.admin')

@section('content')
<div class="row mt-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
            <div class="d-block mb-4 mb-md-0">

                    <h2 class="h4">Edit New Offer</h2>

            </div>

    </div>
        <div class="col-8 mb-4 mx-auto">
            <div class="card border-0 shadow components-section">
                    <div class="card-header">
                        Edit New Offer
                    </div>
                    <div class="card-body">

                            <form action="{{ route('products.offer_update', $offer->id) }}" method="POST">
                                @csrf


                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-from-label">Offer Title</label>
                                    <div class="col-md-8">
                                        <div class="form-group">

                                            <input type="text" class="form-control" name="name" value="{{ $offer->name }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-from-label">Products</label>
                                    <div class="col-md-8">
                                        <div class="form-group">



                                            @php
                                                $offer_products = json_decode($offer->products);
                                            @endphp

                                            <select name="products[]" multiple="multiple" id="products" class="form-control choices__input" onchange="getPrice(this)">


                                                @foreach($products as $key => $product)
                                                    <option value="{{ $product->id }}" {{ in_array($product->id, $offer_products) ? 'selected': '' }}>{{ $product->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-from-label">Grand Price</label>
                                    <div class="col-md-8">
                                        <div class="form-group">

                                            <input type="text" id="total_selected_product_price" class="form-control" name="grand_price" value="{{ $offer->grand_price }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-3">
                                    <label class="col-md-3 col-from-label">Discount</label>
                                    <div class="col-md-8">
                                        <div class="form-group">

                                            <input type="number" class="form-control" name="discount" value="{{ $offer->discount }}">
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

        const products = choices.getValue(true);

        axios.post('{{route('get_total')}}', { _token: '{{ csrf_token() }}', products: products}).then(response => {
            var show_total = document.getElementById('total_selected_product_price')

            show_total.value = response.data
        })
    }

</script>
@endpush
