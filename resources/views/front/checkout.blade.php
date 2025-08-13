@extends('layouts.app')

@section('content')
<div class="container">
    @if (!empty($cart) && count($cart) > 0)
    <h1>Checkout</h1>
    <form action="{{ route('order.place') }}" method="POST">
        <div class="row mt-4">
            <div class="col-md-6 mb-3">
                <div id="checkout-register">
                    @csrf
                    <fieldset>
                        <legend>Your Personal Details</legend>
                        <div class="row">
                            <div class="col mb-3 required">
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="account" value="1" id="input-register" class="form-check-input" checked=""> <label for="input-register" class="form-check-label">Register Account</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="account" value="0" id="input-guest" class="form-check-input"> <label for="input-guest" class="form-check-label">Guest Checkout</label>
                                </div>
                            </div>
                            <div class="col mb-3 d-none">
                                <label class="form-label">Account Type</label>
                                <select name="customer_group_id" id="input-customer-group" class="form-select">
                                    <option value="1" selected="">Default</option>
                                </select>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col mb-3 required">
                                <label for="input-name" class="form-label">Name</label>
                                <input type="text" name="name" value="" placeholder="Name" id="input-name" class="form-control">
                                <div id="error-name" class="invalid-feedback"></div>
                            </div>
                            <div class="col mb-3 required">
                                <label for="input-email" class="form-label">E-Mail</label>
                                <input type="text" name="email" value="" placeholder="E-Mail" id="input-email" class="form-control">
                                <div id="error-email" class="invalid-feedback"></div>
                            </div>
                            <div class="col mb-3 required">
                                <label for="input-phone" class="form-label">Phone Number</label>
                                <input type="text" name="mobile_number" value="" placeholder="Phone Number" id="input-phone" class="form-control">
                                <div id="error-phone" class="invalid-feedback"></div>
                            </div>
                            <div class="col mb-3 required">
                                <label for="input-address" class="form-label">Address</label>
                                <input type="text" name="address" value="" placeholder="Address" id="input-address" class="form-control">
                                <div id="error-address" class="invalid-feedback"></div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row row-cols-1 row-cols-md-2">
                        <div id="password" class="col mb-3 required">
                            <fieldset>
                                <legend>Your Password</legend>
                                <div class="row">
                                    <div class="col mb-3 required">
                                        <label for="input-password" class="form-label">Password</label> <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
                                        <div id="error-password" class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col mb-3 required"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cart as $id => $product)
                        <tr>
                            <td><img loading="lazy" src="{{ asset('assets/upload/prod/' . $product['image']) }}" width="50"></td>
                            <td>{{ $product['name'] }}</td>
                            <td>{{ $product['quantity'] }}</td>
                            <td>{{ number_format($product['price'], 2) }} AED</td>
                            <td>{{ number_format($product['price'] * $product['quantity'], 2) }} AED</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4" class="text-end"><strong>Total</strong></td>
                            <td>{{ number_format(collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']), 2) }} AED</td>
                        </tr>
                    </tfoot>
                </table>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col"><a href="{{route('index')}}" class="btn btn-primary">Continue Shopping</a></div>
            <div class="col text-end">
                <button type="submit" class="btn btn-primary" style="background: green;">Place Order</button>
            </div>
        </div>
    </form>
    @else
    <div class="text-center">
        <h3>Your cart is empty</h3>
        <a href="{{ route('index') }}" class="btn btn-primary">Go to Shop</a>
    </div>
    @endif
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('input[name="account"]').change(function() {
            if ($('#input-guest').is(':checked')) {
                $('#password').hide(); // Hide password section
            } else {
                $('#password').show(); // Show password section
            }
        });

        // Ensure correct initial state on page load
        if ($('#input-guest').is(':checked')) {
            $('#password').hide();
        }

        // Form validation on Place Order button click
        $('form').submit(function(event) {
            let isValid = true;

            // Function to check if field is empty
            function validateField(fieldId, errorId, errorMessage) {
                if ($.trim($(fieldId).val()) === '') {
                    $(errorId).text(errorMessage).show();
                    $(fieldId).addClass('is-invalid');
                    isValid = false;
                } else {
                    $(errorId).hide();
                    $(fieldId).removeClass('is-invalid');
                }
            }

            // Validate required fields
            validateField('#input-name', '#error-name', 'Name is required.');
            validateField('#input-email', '#error-email', 'E-Mail is required.');
            validateField('#input-phone', '#error-phone', 'Phone Number is required.');
            validateField('#input-address', '#error-address', 'Address is required.');

            // If Register Account is selected, validate password
            if ($('#input-register').is(':checked')) {
                validateField('#input-password', '#error-password', 'Password is required.');
            }

            // Prevent form submission if validation fails
            if (!isValid) {
                event.preventDefault();
            }
        });

        // Remove error message when user types
        $('input').keyup(function() {
            $(this).removeClass('is-invalid');
            $(this).next('.invalid-feedback').hide();
        });
    });
</script>
@endsection