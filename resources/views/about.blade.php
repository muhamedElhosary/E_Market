<!DOCTYPE html>
<html lang="en">
    @extends('layout.navbar')
    @section('title','about_us')
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
                            <p>We sale fresh fruits</p>
                            <h1>About Us</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end breadcrumb section -->
    
        <!-- featured section -->
        <div class="feature-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="featured-text">
                            <h2 class="pb-3">Why <span class="orange-text">E_Market</span></h2>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 mb-4 mb-md-5">
                                    <div class="list-box d-flex">
                                        <div class="list-icon">
                                            <i class="fas fa-shipping-fast"></i>
                                        </div>
                                        <div class="content">
                                            <h3>Home Delivery</h3>
                                            <p>arrives to any where in egypt.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 mb-5 mb-md-5">
                                    <div class="list-box d-flex">
                                        <div class="list-icon">
                                            <i class="fas fa-money-bill-alt"></i>
                                        </div>
                                        <div class="content">
                                            <h3>Best Price</h3>
                                            <p>here you will buy with Wholesale price.</p>   
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="list-box d-flex">
                                        <div class="list-icon">
                                            <i class="fas fa-sync-alt"></i>
                                        </div>
                                        <div class="content">
                                            <h3>Quick Refund</h3>
                                            <p>we can help you to Refund any product.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end featured section -->
        <!-- team section -->
        <div class="mt-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="section-title">
                            <h3>Our <span class="orange-text">Team</span></h3>
                            <p>work together as a one hand to product best products for you.</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="single-team-item">
                            <div class="team-bg team-bg-1"></div>
                            <h4>hany <span>Farmer</span></h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="single-team-item">
                            <div class="team-bg team-bg-2"></div>
                            <h4>layla <span>Farmer</span></h4>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                        <div class="single-team-item">
                            <div class="team-bg team-bg-3"></div>
                            <h4>Simon Joe <span>Farmer</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end team section -->
    </body>
    @endsection