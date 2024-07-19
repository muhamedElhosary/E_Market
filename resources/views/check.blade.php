<!DOCTYPE html>
    <html lang="en">
    @extends('layout.navbar')
    @section('title','checkout')
    @section('content')
    <body>
        <!--PreLoader-->
        <div class="loader" style="display: none;">
            <div class="loader-inner">
                <div class="circle"></div>
            </div>
        </div>
        <!--PreLoader Ends-->
        <!-- breadcrumb-section -->
        <div class="breadcrumb-section breadcrumb-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="breadcrumb-text">
                            <p>Fresh and Organic</p>
                            <h1>Check Out Product</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end breadcrumb section -->
    
        <!-- check out section -->
        <div class="checkout-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="checkout-accordion-wrap">
                            <div class="accordion" id="accordionExample">
                                <div class="card single-accordion">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Billing Address
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <form id="myForm" action="{{ route('/customer') }}" method="post">
                                                @csrf
                                                <p><input type="text" placeholder="Name" name='name' required></p>
                                                <p><input type="text" placeholder="Address" name='address' required></p>
                                                <p><input type="tel" placeholder="Phone" name='phone' required></p>
                                                <p><textarea name='message' id="bill" cols="30" rows="10" placeholder="Say Something"></textarea></p>
                                                @foreach($products as $product)
                                                <input type="hidden" name="product_ids[]" value="{{ $product->pid }}">
                                                @endforeach
                                                <a href="/" class="boxed-btn" onclick="document.getElementById('myForm').submit();return false;">Place Order</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
    
                    <div class="col-lg-4">
                        <div class="order-details-wrap">
                            <table class="order-details">
                                <thead>
                                    <tr>
                                        <th>Your order Details</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody class="order-details-body">
                                    @foreach($products as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>${{ $item->price }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tbody class="checkout-details">
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>${{ collect($products)->sum('price') }}</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping</td>
                                        <td>$45</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>${{ collect($products)->sum('price') + 45 }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end check out section -->
    </body>
    @endsection
    </html>
    