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
                            <li class="breadcrumb-item"><a href="javascript:;">Offers</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Items List</li>
                    </ol>
            </nav>
            <h2 class="h4">Combo Offer Management</h2>

    </div>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a href="{{ route('products.offer_create') }}"
                class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"><svg class="icon icon-xs me-2" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg> New Offer</a>

    </div>
</div>

<div class="card card-body shadow-sm table-wrapper table-responsive">
    <div class="table-settings mb-4">
            <div class="row justify-content-between align-items-center">
                    <div class="col-9 col-lg-8 d-md-flex">
                            <div class="input-group me-2 me-lg-3 fmxw-300">
                                    <span class="input-group-text">
                                        <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                    <path fill-rule="evenodd"
                                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                            clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                    <input type="text" class="form-control" placeholder="Search items">
                            </div>
                            <div class="col-3 d-flex">
                                    <select class="form-select fmxw-100 d-none d-md-inline" id="entries"
                                            aria-label="Entries per page">
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                    </select>
                            </div>
                    </div>
            </div>
    </div>
    <table class="table user-table table-hover align-items-center overflow-hidden">
            <thead>
                    <tr>

                            <th class="border-bottom">
                                    <a  class="text-default me-3">
                                            <span>#SR</span>

                                            <span>
                                                    <i class="fas fa-sort"></i>
                                            </span>
                                    </a>
                            </th>
                            <th class="border-bottom">
                                    <a  class="text-default me-3">
                                            <span>Name</span>

                                            <span>
                                                    <i class="fas fa-sort"></i>
                                            </span>
                                    </a>
                            </th>
                            <th class="border-bottom">
                                    <a  class="text-default me-3">
                                            <span>Products</span>

                                            <span>
                                                    <i class="fas fa-sort"></i>
                                            </span>
                                    </a>
                            </th>
                            <th class="border-bottom">
                                    <a  class="text-default me-3">
                                            <span>Grand Price</span>

                                            <span>
                                                    <i class="fas fa-sort"></i>
                                            </span>
                                    </a>
                            </th>
                            <th class="border-bottom">
                                    <a  class="text-default me-3">
                                            <span>Discounted Price</span>

                                            <span>
                                                    <i class="fas fa-sort"></i>
                                            </span>
                                    </a>
                            </th>

                            <th class="border-bottom">
                                <a  class="text-default me-3">
                                    <span>Discount amount</span>

                                    <span>
                                                        <i class="fas fa-sort"></i>
                                                </span>
                                </a>
                            </th>

                            <th class="border-bottom">
                                    <a class="text-default me-3">Action</a>
                            </th>

                    </tr>
            </thead>
            <tbody>
                @foreach($offers as $key => $offer)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $offer->name }}</td>
                        <td>
                            @php
                                $offer_product = \App\Models\Product::find($offer->products)->get();
                            @endphp

                            @dd($offer_product)
                        </td>
                        <td>{{ $offer->name }}</td>
                    </tr>
                @endforeach
            </tbody>

    </table>
    <div class="mt-3">
        <div>
        </div>
    </div>
</div>
@endsection
