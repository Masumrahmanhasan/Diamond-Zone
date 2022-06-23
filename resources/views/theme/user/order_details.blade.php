@extends('layouts.app')

@section('content')
    <div class="section_gaps"></div>


    <section id="user_dashboard">

        <div class="container">

            <div class="row">

                {{-- Tab Parts --}}
                @include('theme.user.sidebar')

                {{-- Tabs Details --}}

                <div class="col-lg-9">

                    <div class="aiz-user-panel">
                        <div class="aiz-titlebar mt-2 mb-4">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h1 class="h3">Order ID: {{ $order->order_code }}</h1>
                                </div>
                            </div>
                        </div>

                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="h6 mb-0">Order Summary</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <table class="table-borderless table">
                                            <tbody><tr>
                                                <td class="w-50 fw-600">Order Code::</td>
                                                <td>{{ $order->order_code }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 fw-600">Customer:</td>
                                                <td>{{ $order->user->name }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 fw-600">Email:</td>
                                                <td>{{ $order->user->email }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 fw-600">Shipping address:</td>
                                                <td>{{ $order->billing_address }}</td>
                                            </tr>
                                            </tbody></table>
                                    </div>
                                    <div class="col-lg-6">
                                        <table class="table-borderless table">
                                            <tbody><tr>
                                                <td class="w-50 fw-600">Order date:</td>
                                                <td>{{ $order->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 fw-600">Order status:</td>
                                                <td>{{ \App\Models\Order::STATUS[$order->status]['value'] }}</td>
                                            </tr>
                                            <tr>
                                                <td class="w-50 fw-600">Total order amount:</td>
                                                <td>৳ {{ $order->grand_total }}
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="w-50 fw-600">Payment method:</td>
                                                <td>Cash On Delivery</td>
                                            </tr>

                                            <tr>
                                                <td class="w-50 fw-600">Order Type:</td>
                                                <td>{{ ucfirst($order->order_type) }}</td>
                                            </tr>


                                            </tbody></table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="h6 mb-0">Order Details</h5>
                                    </div>
                                    <div class="card-body">
                                        <table class="aiz-table table footable footable-1 breakpoint-lg" style="">
                                            <thead>

                                                <tr class="footable-header">

                                                    <th class="footable-first-visible" style="display: table-cell;">#</th>
                                                    <th width="50%" style="display: table-cell;">Product</th>

                                                    <th style="display: table-cell;">Quantity</th>
                                                    <th style="display: table-cell;">Price</th>

                                            </thead>
                                            <tbody>


                                        @foreach($order->order_items as $item)
                                            <tr>
                                                <td class="footable-first-visible" style="display: table-cell;">1</td>
                                                <td style="display: table-cell;">
                                                    <a href="{{ route('product_details', $item->product_id) }}" target="_blank">{{ $item->product->name }}</a>
                                                </td>

                                                <td style="display: table-cell;">
                                                    {{ $order->quantity }}
                                                </td>
                                                <td style="display: table-cell;">
                                                    ৳ {{ $item->product->price }}
                                                </td>

                                            </tr>
                                        @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header">
                                        <b class="fs-15">Order Ammount</b>
                                    </div>
                                    <div class="card-body pb-0">
                                        <table class="table-borderless table">
                                            <tbody>
                                            <tr>
                                                <td class="w-50 fw-600">Subtotal</td>
                                                <td class="text-right">
                                                    <span class="strong-600">৳ {{ $order->grand_total }}</span>
                                                </td>
                                            </tr>


                                            <tr>
                                                <td class="w-50 fw-600">Total</td>
                                                <td class="text-right">
                                                    <strong><span>৳ {{ $order->grand_total }}</span></strong>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>

    <div class="section_height"></div>
@endsection
