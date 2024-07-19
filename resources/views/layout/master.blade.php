<!DOCTYPE html>
<html lang="en">
@extends('layout.navbar')
@section('content')
        <!-- home page slider -->
        <div class="homepage-slider">
            <!-- single home slider -->
            <div class="single-homepage-slider homepage-bg-1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                            <div class="hero-text">
                                <div class="hero-text-tablecell">
                                    <p class="subtitle">Fresh & Organic</p>
                                    <h1>Delicious Foods</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single home slider -->
            <div class="single-homepage-slider homepage-bg-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1 text-center">
                            <div class="hero-text">
                                <div class="hero-text-tablecell">
                                    <p class="subtitle">Fresh Everyday</p>
                                    <h1>100% Organic Collection</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single home slider -->
            <div class="single-homepage-slider homepage-bg-3">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1 text-right">
                            <div class="hero-text">
                                <div class="hero-text-tablecell">
                                    <p class="subtitle">be like a model</p>
                                    <h1>The latest fashion trends</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
         <!-- end home page slider -->
         @yield('content2')
             
@endsection


