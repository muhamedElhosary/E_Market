<!DOCTYPE html>
<html lang="en">
    @extends('layout.navbar')
    @section('title','contact_us')
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
                            <p>Get 24/7 Support</p>
                            <h1>Contact us</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end breadcrumb section -->
    
        <!-- contact form -->
        <div class="contact-from-section mt-150 mb-150">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <div class="form-title">
                            <h2>Have you any question?</h2>
                            <p>if you have any question contact with us and we will call you soon.</p>
                        </div>
                         <div id="form_status"></div>
                        <div class="contact-form">
                            <form action={{route("contacts.store")}} method="post">
                                @csrf
                                <p>
                                    <input type="text" placeholder="Name" name="name" id="name">
                                    <input type="email" placeholder="Email" name="email" id="email">
                                </p>
                                <p>
                                    <input type="tel" placeholder="Phone" name="phone" id="phone">
                                    <input type="text" placeholder="Subject" name="subject" id="subject">
                                </p>
                                <p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea></p>
                                {{-- <input type="hidden" name="token" value="FsWga4&amp;@f6aw"> --}}
                                <p><input type="submit" value="Submit"></p>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-form-wrap">
                            <div class="contact-form-box">
                                <h4><i class="fas fa-map"></i> Shop Address</h4>
                                <p>34/8, 45 street <br> alexandria. <br> egypt</p>
                            </div>
                            <div class="contact-form-box">
                                <h4><i class="far fa-clock"></i> Shop Hours</h4>
                                <p>MON - FRIDAY: 8 to 9 PM <br> SAT - SUN: 10 to 8 PM </p>
                            </div>
                            <div class="contact-form-box">
                                <h4><i class="fas fa-address-book"></i> Contact</h4>
                                <p>Phone: +01153364850 <br> Email: support@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end contact form -->
    </body>
    @endsection