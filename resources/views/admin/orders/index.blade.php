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
                    <li class="breadcrumb-item"><a href="javascript:;">Products</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Items List</li>
                </ol>
            </nav>
            <h2 class="h4">Orders Management</h2>
            <p class="mb-0">Your Orders management dashboard.</p>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('products.create') }}"
               class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"><svg class="icon icon-xs me-2" fill="none"
                                                                                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg> New item</a>

        </div>
    </div>

    <div class="card card-body shadow-sm table-wrapper table-responsive">
        <table class="table user-table table-hover align-items-center overflow-hidden" id="componentTable">
            <thead>
            <tr>

                <th class="border-bottom">
                    <a  class="text-default me-3">
                        <span>Order Code</span>


                    </a>
                </th>
                <th class="border-bottom">
                    <a  class="text-default me-3">
                        <span>User Name</span>

                    </a>
                </th>
                <th class="border-bottom">
                    <a  class="text-default me-3">
                        <span>Billing Info</span>

                    </a>
                </th>
                <th class="border-bottom">
                    <a  class="text-default me-3">
                        <span>Order Type</span>

                    </a>
                </th>

                <th class="border-bottom">
                    <a  class="text-default me-3">
                        <span>Order Amount</span>

                    </a>
                </th>
                <th class="border-bottom">
                    <a  class="text-default me-3">
                        <span>Payment Status</span>

                    </a>
                </th>

                <th class="border-bottom">
                    <a  class="text-default me-3">
                        <span>Order Status</span>

                    </a>
                </th>

                <th class="border-bottom">
                    <a  class="text-default me-3">
                        <span>Order Date</span>

                    </a>
                </th>

                <th class="border-bottom">
                    <a class="text-default me-3">Action</a>
                </th>

            </tr>
            </thead>


            <tbody>
            @foreach($orders as $key => $order)
                <tr>
                    <td>#{{ $order->order_code }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>
                        Name: {{ $order->billing_name }} <br/>
                        Address: {{ $order->billing_address }} <br/>
                        Phone: {{ $order->billing_phone }} <br/>
                        Email : {{ $order->billing_email }}
                    </td>
                    <td><span class="badge bg-info">{{ ucfirst($order->order_type) }}</span></td>
                    <td>৳ {{ $order->grand_total }}</td>
                    <td><span class="badge {{ \App\Models\Order::PAYMENTSTATUS[$order->payment_status]['label'] }}">{{ \App\Models\Order::PAYMENTSTATUS[$order->payment_status]['value'] }}</span></td>
                    <td><span class="badge {{ \App\Models\Order::STATUS[$order->status]['label'] }}">{{ \App\Models\Order::STATUS[$order->status]['value'] }}</span></td>
                    <td>{{ beautify_date($order->created_at) }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order->id) }}">
                            <svg class="icon icon-xs text-danger ms-1" title="" data-bs-toggle="tooltip" fill="currentColor"
                                 viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" data-bs-original-title="Delete" aria-label="Delete">
                                <path fill-rule="evenodd"
                                      d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                      clip-rule="evenodd">
                                </path>
                            </svg>

                            <svg class="icon icon-xs text-primary ms-1" xmlns="http://www.w3.org/2000/svg"  fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection


