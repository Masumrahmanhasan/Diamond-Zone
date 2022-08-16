@extends('layouts.admin')

@section('content')
    <div class="row mt-4">
        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-primary rounded me-4 me-sm-0">
                                <svg class="icon icon-md"
                                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                    </path>
                                </svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Categories</h2>
                                <h3 class="fw-extrabold mb-1">{{ $category }}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h5">Categories</h2>
                                <h3 class="fw-extrabold mb-1">{{ $category }}</h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-info rounded me-4 me-sm-0">
                                <svg class="icon icon-md" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                     width="24" height="24">
                                    <path fill="none" d="M0 0h24v24H0z"/>
                                    <path
                                        d="M8 4h13v2H8V4zm-5-.5h3v3H3v-3zm0 7h3v3H3v-3zm0 7h3v3H3v-3zM8 11h13v2H8v-2zm0 7h13v2H8v-2z"/>
                                </svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Products</h2>
                                <h3 class="fw-extrabold mb-1">{{ $product->count() }}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h5">Products</h2>
                                <h3 class="fw-extrabold mb-1">{{ $product->count() }}</h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4 mb-4">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <div class="row d-block d-xl-flex align-items-center">
                        <div
                            class="col-12 col-xl-5 text-xl-center mb-3 mb-xl-0 d-flex align-items-center justify-content-xl-center">
                            <div class="icon-shape icon-shape-secondary rounded me-4 me-sm-0">
                                <svg class="icon icon-md"
                                     fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                                          clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="d-sm-none">
                                <h2 class="h5">Orders</h2>
                                <h3 class="fw-extrabold mb-1">{{ $order }}</h3>
                            </div>
                        </div>
                        <div class="col-12 col-xl-7 px-xl-0">
                            <div class="d-none d-sm-block">
                                <h2 class="h5">Orders</h2>
                                <h3 class="fw-extrabold mb-1">{{ $order }}</h3>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-12">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col"><h2 class="fs-5 fw-bold mb-0">Recent Products</h2></div>

                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th class="border-bottom" scope="col">Name</th>
                                    <th class="border-bottom" scope="col">Category</th>
                                    <th class="border-bottom" scope="col">Thumbnail</th>
                                    <th class="border-bottom" scope="col">Price</th>
                                    <th class="border-bottom" scope="col">Created at</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product->take(5) as $item)
                                    <tr>
                                        <th class="text-gray-900" scope="row">{{ $item->name }}</th>
                                        <td class="fw-bolder text-gray-500">{{ $item->category->name }}</td>
                                        <td class="fw-bolder text-gray-500"><img src="{{ uploaded_asset($item->thumbnail) }}"
                                                                                 class="rounded" style="max-width: 150px;"></td>
                                        <td class="fw-bolder text-gray-500">
                                            {{ $item->price }}
                                        </td>
                                        <td class="fw-bolder text-gray-500">
                                            {{ beautify_date($item->created_at) }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
