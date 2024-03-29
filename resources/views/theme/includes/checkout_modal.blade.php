


    <div class="modal-body">

        <!-- Form Part -->

        <div class="form_part">

            <form action="{{ route('checkout.done') }}" method="POST">

                @csrf

                <input type="hidden" name="product_id[]" value={{ $product->id }}>
                <input type="hidden" name="quantity" value={{ $quantity }}>
                <input type="hidden" name="total" value={{ $subtotal }}>

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

                                <tr>
                                    <td>{{ $product->name }} {{ $product->sku }}  × {{ $quantity }}</td>
                                    <td>৳ {{ number_format($subtotal, 2) }}</td>
                                </tr>

                                {{-- <tr>
                                    <td>Diamond Nose Pin Cartilage 3Stone Stud  × 1 Discount: </td>
                                    <td>৳ 800.00</td>
                                </tr> --}}

                                <tr>
                                    <th>Subtotal</th>
                                    <th>৳ {{ number_format($subtotal, 2) }}</th>
                                </tr>

                                {{-- <tr>
                                    <th>Shipping</th>
                                    <th>Charge: ৳ 80.00</th>
                                </tr> --}}

                                <tr>
                                    <th>Total</th>
                                    <th>৳ {{ number_format($subtotal, 2) }}</th>
                                </tr>

                            </table>

                            <!-- Cash On delivary -->
                            <div class="cash_on_delivary">

                                <h4>Cash on delivery</h4>
                                <span>Pay with cash upon delivery.</span>

                                <p>Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our <a href="">privacy policy</a>.</p>

                                {{-- <div class="custome_input">
                                    <input type="checkbox" id="agree">
                                    <label for="agree"> I would like to receive order updates on SMS</label>
                                </div> --}}

                                <div class="submit">
                                    <button type="submit">Place Order</button>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </form>

        </div>


    </div>


