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

                <div class="user_dashboard_details">

                    <div class="dashboard">
                        <h3>Your Orders</h3>
                    </div>

                    <div class="orders_list">

                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->order_code }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td><span class="badge {{ \App\Models\Order::STATUS[$order->status]['label'] }}">{{ \App\Models\Order::STATUS[$order->status]['value'] }}</span></td>
                                        <td>{{ number_format($order->grand_total, 2) }}</td>
                                        <td>
                                            <a href="{{ route('user.order_details', $order->id) }}" class="btn btn-info h-auto">view</a>
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

</section>

<div class="section_height"></div>
@endsection
