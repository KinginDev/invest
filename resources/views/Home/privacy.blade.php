@extends('Home.layouts.app')
@section('styles')
    <style>
        h2{
            margin: 20px;
        }
    </style>
@endsection
@section('content')
<!--======= Breadcrumb Inner Page =======-->
    <section class="iq-bg iq-bg-fixed iq-over-black-80 jarallax iq-breadcrumb text-center iq-font-white" style="background-image: url('{{secure_asset('/img/bg1.jpg')}}'); background-position: center center;">
        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-lg-8">
                    <div class="heading-title">
                        <h3 class="title text-uppercase iq-font-white iq-tw-6">Legal Information</h3>
                    </div>
                    <p>You can Send us a message here (and) or at any of our emails </p>
                </div>
            </div>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active test-center" aria-current="page">Legal Information </li>
            </ol>
        </nav>
    </section>
    <!--======= Breadcrumb Inner Page =======-->
    <div class="main-content">
        <!-- Contact Us -->
        <section class="contact-2">
            <div class="container">
                <div class="row iq-ptb-60">
                    <div class="col-lg-12 text-center">
                        <h3 class="iq-mtb-30">Legal  Information</h3>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                                      <h2>1. Confidentiality</h2>
                	<p>
                		This page contains information about our policy regarding the collection, use and disclosure of personal data that we receive from users ( https://coingrille.co ). We use your data to better understand the purpose of your use of our site, as well as to analyze visitor statistics.</p>

						<P>By using this site, you confirm your consent to the collection and use of data in accordance with the policy of the Site.
					</p>
                <h2>2. Journal</h2>
                <p class="walet_404_p2 text-justify">Like other sites, we collect information sent by your browser, every time you visit our site ("Journal"). This information may contain information such as your computer's IP address, browser type, browser version, the pages you visit on our site, the time and date of your visit, the time spent on the Site pages and other statistics.</p>
                <h2>3. Cookies</h2>
                <p class="walet_404_p2 text-justify">Cookies are files containing a small amount of information with a unique anonymous identifier. Cookies are sent to your browser by the site and stored on the hard disk in your computer. You can tell the browser not to accept cookies or notify you of their use and sending. However, in case of refusal from the use of cookies, the possibility of full use of our site may not be available.</p>
                <p>We use cookies for the following purposes:</p>
                <ul>
                	<li>To remember if you pressed the "OK" button in the cookie usage warning, and if you do not press this warning again.
                	</li>
                	<li>
Our analytics software (Yandex.Metrica) uses cookies to better understand how you interact with our site. You can read more about how Yandex.Metrica uses cookies here .</li>
                </ul>
                <p>
                	Yandex.Metrica

In order to obtain traffic statistics and better understand how you use our site, we use a third-party JavaScript plug-in provided by Yandex called "Yandex.Metrica". We do not have direct access to the information obtained in Yandex.Metrica, but Yandex provides us with a summary of this data through our products.

The information obtained with Yandex.Metrica is used by us to provide a summary of data to business partners interested in advertising on our website. The information provided to these business partners does not contain personal information (Yandex does not provide us with direct access to the data, and therefore we do not own such information).

At any time you can refuse to collect Yandex.Metrica data by downloading a special application for the browser from the company InformAction . The application does not affect your experience of using this website in any way. You can download the application here . We also respect the headings of your "Do Not Track" browser and do not track users with the active "Do Not Track" header.


                </p>
                <h2>4. Changes to the Privacy Policy</h2>
                <p class="walet_404_p2 text-justify">From time to time, we may change the provisions of this privacy policy. After changing the provisions of the privacy policy, you will receive notification of the update. We advise you from time to time to view this page for changes.

						</p>
						<small>Privacy Policy was changed: 13 Jan, 2018.</small>
                <h2>8. Feedback</h2>
                <p class="walet_404_p2 text-justify">If you have any questions regarding our privacy policy or how your information is collected and processed, please write to us at info@coingrille.co</p>
            </div>
        </section>
    </div>
                            </div>
                        </div>
            </div>
        </div>
    </div>
        </section>
        <!-- Contact Us -->
    </div>
    <!-- Main Content End -->
        <div class="clearfix"></div>
@endsection