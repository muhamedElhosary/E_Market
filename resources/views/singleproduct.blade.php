<!DOCTYPE html>
<html lang="en">
    @extends('layout.navbar')
    @section('title','single_product')
    @section('content')
        	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>See more Details</p>
						<h1>Single Product</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<div class="row">
				@foreach ($prods as $item)
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="{{url($item->proimage)}}" alt="">
					</div>
				</div>
				<div class="col-md-7">
					<div class="single-product-content">
						<h3>{{$item->name}}</h3>
						<p class="single-product-pricing"><span>Per {{$item->quantity}}</span> ${{$item->price}}</p>
						<p>{{$item->description}}</p>
						<div class="single-product-form">
							{{-- <form action="index.html">
								<input type="number" placeholder="1">
							</form> --}}
							<a href="/set/{{$item->pid}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
							@foreach ($cates as $cat)
							@if($cat->catid==$item->categoryid)
							<p><strong>Categories: {{$cat->name}}</strong></p>
							@endif
							@endforeach
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<!-- end single product -->
    @endsection