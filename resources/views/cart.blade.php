<!DOCTYPE html>
<html lang="en">
    @extends('layout.navbar')
    @section('title','cart')
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
                            <h1>Cart</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end breadcrumb section -->

        <!-- cart -->
        <div class="cart-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="cart-table-wrap">
                            <table class="cart-table">
                                <thead class="cart-table-head">
                                    <tr class="table-head-row">
                                        <th class="product-remove"></th>
                                        <th class="product-image">Product Image</th>
                                        <th class="product-name">Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        {{-- <th class="product-total">Total</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    <tbody>
                                        @foreach ($products as $item)
                                        <tr class="table-body-row">
                                            <td class="product-remove">
                                                <a href="{{ route('removeSession', $item->pid) }}"><i class="far fa-window-close"></i></a>
                                            </td>
                                            <td class="product-image"><img src="{{url($item->proimage)}}" alt=""></td>
                                            <td class="product-name">{{$item->name}}</td>
                                            <td class="product-price">${{$item->price}}</td>
                                            {{-- <td class="product-quantity"><input type="number" placeholder="1"></td> --}}
                                            <td class="product-total">{{$item->quantity}}</td>
                                        </tr>
                                        @endforeach
                            </table>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="total-section">
                            <table class="total-table">
                                <thead class="total-table-head">
                                    <tr class="table-total-row">
                                        <th>Total</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                        foreach ($products as $item) {
                                            $total += $item->price;
                                        }
                                    @endphp
                                    <tr class="total-data">
                                        <td><strong>Subtotal: </strong></td>
                                        <td>${{ $total }}</td>
                                    </tr>
                                    <tr class="total-data">
                                        <td><strong>Shipping: </strong></td>
                                        <td>$45</td>
                                    </tr>
                                    <tr class="total-data">
                                        <td><strong>Total: </strong></td>
                                        <td>${{ $total + 45 }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="cart-buttons">
                                <a href="/allcategory" class="boxed-btn">Update Cart</a>
                                <a href="/checkout" class="boxed-btn black">Check Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end cart -->
    </body>
    @endsection
</html>
