@extends('layouts.admin')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h1 class="h2 fs-16 mb-0">Order Details</h1>
        </div>
        <div class="card-body">
            <div class="row gutters-5">
                <div class="col text-md-left text-start">
                    <img width="110" src="{{ get_setting('header_logo') ?? asset('frontend_asset/images/logo.svg') }}" alt="">
                </div>


                <div class="col-md-3 ml-auto">
                    <label for="update_payment_status">Payment Status</label>
                        <select class="form-control"  onchange="update_payment_status({{ $order->id }}, this, 'payment')" tabindex="-98">
                            <option value="0">Unpaid
                            </option>
                            <option value="1" selected="">Paid
                            </option>
                        </select>
                </div>

                <div class="col-md-3 ml-auto">
                    <label for="update_delivery_status">Delivery Status</label>
                    <select class="form-control" name=""  onchange="update_payment_status({{ $order->id }}, this)" id="">
                        <option value="0">Pending</option>
                        <option value="1">Confirmed</option>
                        <option value="2">Reject</option>
                        <option value="3">Delivered</option>
                    </select>
                </div>

            </div>

            <div class="row mt-4">
                <div class="col text-md-left text-start">
                    <address>
                        <strong class="text-main">
                           {{ $order->user->name }}
                        </strong><br>
                        {{ $order->billing_email ?? $order->user->email }}<br>
                        {{ $order->billing_phone }}<br>
                        {{ $order->billing_address }}<br>

                    </address>
                </div>
                <div class="col-md-4 ml-auto">
                    <table>
                        <tbody>
                        <tr>
                            <td class="text-main text-bold">Order #</td>
                            <td class="text-info text-bold text-right"> {{ $order->order_code }}</td>
                        </tr>
                        <tr>
                            <td class="text-main text-bold">Order status</td>
                            <td class="text-right">
                                <span class="badge badge-inline {{ \App\Models\Order::STATUS[$order->status]['label'] }}">{{ \App\Models\Order::STATUS[$order->status]['value'] }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-main text-bold">Order date </td>
                            <td class="text-right">{{ beautify_date($order->created_at) }}</td>
                        </tr>
                        <tr>
                            <td class="text-main text-bold">
                                Total amount
                            </td>
                            <td class="text-right">
                                ৳ {{ $order->grand_total }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-main text-bold">Payment method : </td>
                            <td class="text-right">
                                {{ $order->payment_type =='cod' ? 'Cash on Delivery' : '' }}</td>
                        </tr>
                        <tr>
                            <td class="text-main text-bold">Order Type</td>
                            <td class="text-right">
                                <span class="badge badge-inline bg-primary">{{ ucfirst($order->order_type) }}</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <hr class="new-section-sm bord-no">
            <div class="row">
                <div class="col-lg-12 table-responsive">
                    <table class="table-bordered table " style="">
                        <thead>
                        <tr class="bg-trans-dark footable-header">

                            <th data-breakpoints="lg" class="min-col">#</th>
                            <th width="10%" style="display: table-cell;" class="footable-first-visible">Photo</th>
                            <th class="text-uppercase footable-last-visible" style="display: table-cell;">Description</th>
                            <th data-breakpoints="lg" class="min-col text-uppercase text-center" >
                                Qty
                            </th>
                            <th data-breakpoints="lg" class="min-col text-uppercase text-center">
                                Price</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->order_items as $key => $item)
                        <tr>
                            <td class="" >{{ $loop->iteration }}</td>
                            <td style="display: table-cell;" class="footable-first-visible">
                                <span class="footable-toggle fooicon fooicon-plus"></span>
                                <a href="" target="_blank">
                                    <img height="50" src="{{ uploaded_asset($item->product->thumbnail) }}">
                                </a>
                            </td>
                            <td style="display: table-cell;" class="footable-last-visible">
                                <strong>
                                    <a href="" target="_blank" class="text-muted">{{ $item->product->name }}</a>
                                </strong>
                            </td>
                            <td class="text-center" >{{ $order->quantity }}</td>
                            <td class="text-center">
                                ৳ {{ $item->product->price }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="clearfix float-end">
                <table class="table">
                    <tbody>
                    <tr>
                        <td>
                            <strong class="text-muted">Sub Total :</strong>
                        </td>
                        <td>
                            ৳ {{ $order->grand_total }}
                        </td>
                    </tr>



                    <tr>
                        <td>
                            <strong class="text-muted">Total :</strong>
                        </td>
                        <td class="text-muted h5">
                            ৳ {{ $order->grand_total }}
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="no-print text-right">
                    <a href="javascript:;" type="button" class="btn btn-icon btn-primary d-none"><i class="las la-print"></i></a>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function update_payment_status(order_id, value, type){

            $.post('{{ route('update_status') }}', { _token: '{{ csrf_token() }}', order_id: order_id, type:type, value:value.value})
                .then(response => {
                    console.log(response)
                })
        }
    </script>
@endpush

