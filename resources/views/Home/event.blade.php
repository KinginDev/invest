@extends('Home.layouts.app')

@section('content')

 <!--======= Breadcrumb Inner Page =======-->
    <section class="iq-bg iq-bg-fixed iq-over-black-80 jarallax iq-breadcrumb text-center iq-font-white" style="background-image: url('https://via.placeholder.com/1800x1200'); background-position: center center;">
        <div class="container">
            <div class="row">
            	<div class="col-lg-2"></div>
                <div class="col-lg-8 ">
                    <div class="heading-title">
                        <h3 class="title text-uppercase iq-font-white iq-tw-6">Event</h3>
                    </div>
                    <p>We Partner with some established bitcoin investors to organise and participate in Bitcoin conference around the world.</p>
                </div>
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home-1.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Event</li>
            </ol>
        </nav>
    </section>
    <!--======= Breadcrumb Inner Page =======-->
    <!-- Main Content -->
    <div class="main-content">
        <!-- Client -->
        <section class="iq-event overview-block-ptb">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="heading-title">
                            <h3 class="title iq-tw-5 iq-mb-20">Event Schedule</h3>
                            <p>These are the event schedule</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                                    <div class="col-lg-4 col-md-12"><img src="https://via.placeholder.com/700x700" class="img-fluid" alt="#" width="300"></div>
                                    <div class="col-lg-8 col-md-12">
                                        <h5 class="iq-tw-5 iq-mt-10">Bitcoin Conf.</h5>
                                        <div><span class="iq-tw-5 iq-font-black lead">Speaker:</span> Rinks Cooper</div>
                                        <ul class="list-inline iq-mt-20 iq-mb-10">
                                            <li><i class="fa fa-clock-o" aria-hidden="true"></i>16 July -23 :9.00 AM TO 10.00 AM</li>
                                            <li><i class="fa fa-map-marker" aria-hidden="true"></i>MSG Ground, Hall 1, USA</li>
                                        </ul>
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                                    </div>
                    
                </div>
            </div>
        </section>
        <!-- Client -->
        <!-- Main Content End -->
    </div>

@endsection