@extends('layout.navbar')
@section('title','product_page')
@section('content')
<div class="product-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="section-title">	
					<h3><span class="orange-text">Our</span> Products</h3>
					<p>all products</p>
				</div>
			</div>
		</div>

		<div class="row">
			@foreach ($prods as $item)
			<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
				<div class="single-product-item">
					<div class="product-image">
						<a href="/single/{{$item->pid}}">
						<img  style=max-height:250px!important;min-height:250px!important 
						src="{{url($item->proimage)}}"alt=""></a>	
						<h3>{{$item->name}}</h3>
						<p>{{$item->description}}</p>
						<p class="product-price">${{$item->price}}</p>
						<a href="/set/{{$item->pid}}" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection
