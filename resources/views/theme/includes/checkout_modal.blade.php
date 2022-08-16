


    <div class="modal-body">

        <!-- Form Part -->

        <div class="form_part">

            <form action="{{ route('checkout.done') }}" method="POST">

                @csrf
                @if(getType($product) == "array")
                    @foreach ($product as $key => $value)
                    <input type="hidden" name="product_id[]" value="{{ $key }}">
                    @endforeach
                @else
                <input type="hidden" name="product_id[]" value="{{ $product->id }}">
                @endif
                <input type="hidden" name="quantity" value={{ $quantity }}>
                <input type="hidden" name="total" value={{ $subtotal }}>
                <input type="hidden" name="offer" value={{ $offer }}>



                <div class="row">

                    <!-- Billing Part -->
                    <div class="col-lg-6">

                        <!-- Name -->
                        <div class="custom_input">
                            <h3>Billing details</h3>
                        </div>

                        <!-- Name -->
                        <div class="custom_input">
                            <label>Name <span>*</span></label>
                            <input type="text" name="name" placeholder="Enter Your Name">
                        </div>

                        <!-- Address -->
                        <div class="custom_input">
                            <label>Address <span>*</span></label>
                            <input type="text" name="address" placeholder="Address">
                        </div>

                        <!-- Phone Number -->
                        <div class="custom_input">
                            <label>Phone Number <span>*</span></label>
                            <input type="text" name="phone" placeholder="Phone Number">
                        </div>

                        <!-- Email -->
                        <div class="custom_input">
                            <label>Email (Optional)</label>
                            <input type="text" name="email" placeholder="Enter Your Email">
                        </div>

                    </div>

                    <!-- Your order -->
                    <div class="col-lg-6">

                        <div class="order_part">
                            <h3>Your order</h3>

                            <!-- table -->
                            <table class="table border">

                                <tr>
                                    <th>Product</th>
                                    <th>Subtotal</th>
                                </tr>

                                @if (getType($product) == 'array')
                                <tr>
                                    <td>

                                        @foreach ($product as $key => $value)

                                            <span>{{ $value['name'] }}</span><br>
                                        @endforeach
                                    </td>
                                    <td>৳ {{ number_format($subtotal, 2) }}</td>
                                </tr>
                                @else
                                <tr>
                                    <td>{{ $product->name }} {{ $product->sku }}  × {{ $quantity }}</td>
                                    <td>৳ {{ number_format($subtotal, 2) }}</td>
                                </tr>
                                @endif


                                {{-- <tr>
                                    <td>Diamond Nose Pin Cartilage 3Stone Stud  × 1 Discount: </td>
                                    <td>৳ 800.00</td>
                                </tr> --}}

                                <tr>
                                    <th>Subtotal</th>
                                    <th>৳ {{ number_format($subtotal, 2) }}</th>
                                </tr>

                                {{-- <tr>
                                    <th>Discount</th>
                                    <th>Charge: ৳ 80.00</th>
                                </tr> --}}

                                <tr>
                                    <th>Total</th>
                                    <th>৳ {{ number_format($subtotal, 2) }}</th>
                                </tr>

                            </table>

                            <!-- Cash On delivary -->
                            <div class="cash_on_delivary text-white">

                                <h4>Payment Method</h4>

                                <div class="checkbox">

                                    <div class="checkbox_item">
                                        <input type="radio" onclick="checkValue('cod')" class="payment_method" name="payment_type" value="cod" id="cod" checked="checked">
                                        <label for="cod">

                                            <span>Cash On Delivery</span>
                                        </label>
                                    </div>

                                    <div class="checkbox_item">
                                        <input type="radio" class="payment_method" onclick="checkValue('bkash')" name="payment_type" value="bkash" id="bkash">
                                        <label for="bkash">
                                            <span>Bkash</span>
                                        </label>
                                    </div>

                                    <div class="checkbox_item">
                                        <input type="radio" class="payment_method" onclick="checkValue('nagad')" name="payment_type" value="nagad" id="nagad">
                                        <label for="nagad">
                                            <span>Nagad</span>
                                        </label>
                                    </div>

                                </div>

                                <div class="input_file">

                                </div>

                                <p class="text-white">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="">privacy policy</a>.</p>

                                <div class="submit">
                                    <button type="submit" onclick="dataCheckout({{ $product }})">Place Order</button>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </form>

        </div>


    </div>
