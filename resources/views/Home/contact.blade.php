@extends('Home.layouts.app')

@section('content')
<!--======= Breadcrumb Inner Page =======-->
    <section class="iq-bg iq-bg-fixed iq-over-black-80 jarallax iq-breadcrumb text-center iq-font-white" style="background-image: url('{{secure_asset('/img/bg1.jpg')}}'); background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-lg-8">
                    <div class="heading-title">
                        <h3 class="title text-uppercase iq-font-white iq-tw-6">Contact Us</h3>
                    </div>
                    <p>You can Send us a message here (and) or at any of our emails </p>
                </div>
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us </li>
            </ol>
        </nav>
    </section>
    <!--======= Breadcrumb Inner Page =======-->
    <div class="main-content">
        <!-- Contact Us -->
        <section class="contact-2">
            <div class="container">
                <div class="row iq-ptb-60">
                    <div class="col-lg-5">
                        <h3 class="iq-mtb-30">Contact Info</h3>
                        <div class="contact-box iq-mb-30">
                            
                        </div>
                        <di
                        </div>
                        <div class="contact-box iq-mb-30">
                            <div>
                                <i aria-hidden="true" class="ion-ios-email-outline iq-icon"></i><span class="iq-title text-uppercase iq-ml-15 iq-tw-6 iq-font-yellow">Mail</span>
                            </div>
                            <p><a href="mailto:@coingrille.com">contact@coingrille.com <span>(Mon-Fri 8:00am - 8:00pm)</a></span></p>
                            <div class="clearfix"></div>
                             <p><a href="mailto:@coingrille.com">support@coingrille.com <span>(Mon-Fri 8:00am - 8:00pm)</a></span></p>
                              <div class="clearfix"></div>
                             <p><a href="mailto:@coingrille.com">help@coingrille.com <span>(Mon-Fri 8:00am - 8:00pm)</a></span></p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <h3 class="iq-mtb-30">Contact Form</h3>
                        <div id="formmessage">Success/Error Message Goes Here</div>
                        <form class="form-horizontal" id="contactform" method="post" action="../php/contact-form.php">
                            <div class="contact-form">
                                <div class="section-field iq-mb-30">
                                    <input class="form-control" id="name" type="text" placeholder="Name*" name="name">
                                </div>
                                <div class="section-field iq-mb-30">
                                    <input class="form-control" id="email" type="text" placeholder="Email*" name="email">
                                </div>
                                <div class="section-field iq-mb-30">
                                    <input class="form-control" id="phone" type="text" placeholder="Phone*" name="phone">
                                </div>
                                <div class="section-field iq-mb-30">
                                    <textarea class="input-message" placeholder="Comment*" name="message"></textarea>
                                    <input type="hidden" name="action" value="sendEmail" />
                                    <button id="submit" name="submit" type="submit" value="Send" class="button pull-right iq-mt-40">Send Message</button>
                                </div>
                            </div>
                        </form>
                        <div id="ajaxloader" style="display:none"><img class="center-block mt-30 mb-30" src="images/ajax-loader.gif" alt=""></div>
                    </div>
                </div>
            </div>
            <div >
                <div class="row no-gutters">
                   
                </div>
            </div>
        </section>
        <!-- Contact Us -->
    </div>
    <!-- Main Content End -->
        <div class="clearfix"></div>
@endsection