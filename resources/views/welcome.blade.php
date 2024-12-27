<!DOCTYPE html>
<html lang="en">
    @extends('layout.master')
    @section('content2')
    <body>
    
        <div class="product-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">	
                            <h3><span class="orange-text">website</span> Categories</h3>
                            <p>Shop on our website</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($cats as $item)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="/product/{{$item->catid}}"><img src="{{url($item->image)}}"
                                    style=max-height:250px!important;min-height:250px!important alt=""></a>
                            </div>
                            <h3>{{$item->name}}</h3>
                            <p>{{$item->description}}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endsection