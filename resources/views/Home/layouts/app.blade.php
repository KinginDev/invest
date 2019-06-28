<!doctype html>
<html lang="en">

<head>
    <title>Cloud Bitcoin Mining Marketplace for Bitcoin Miners | Cryptoinvestments</title>
    <meta name="msvalidate.01" content="26C25281FEF1535049040B36F99FCF43">
    <meta name="description" content="The best ever cloudmining marketplace for Bitcoin miners. Everyone is fit to join BTC Miners, contribute in Bitcoin mining and earn exponentially.">
    <meta property="og:image" content="{{secure_asset('/img/logo/favicon.png')}}">
    <meta name="keywords" content="how to mine for bitcoins, bitcoin, bitcoin mining, bitcoin mining farm, bitcoin mining company, cloud bitcoin mining, Cryptocurrency mining, top 10 bitcoin cloud mining company, cloud bitcoin mining, best cryptocurrency company, best cryptocurrency mining company, bitcoin mining in usa, bitcoin mining pool, bitcoin mining 2018, bitcoin to cash , crypto investment, crypto minning, crypto cloud minning , cryptocurrency minning ">
    <meta name="author" content="lgauthor">
     <meta name="google-site-verification" content="w3lKP4Cxy7mktZy63xXKJGq801Rv3VQmSEGydZw0kRM" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="theme-color" content="#333333">
    {{-- <link rel="icon" sizes="192x192" href="{{secure_asset('/img/logo/favicon.png')}}"> --}}
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{secure_asset('img/logo/favicon.png')}}" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=PT+Sans&amp;Ubuntu:400,500,700" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{secure_asset('css/bootstrap.min.css')}}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" type="text/css" href="{{secure_asset('css/magnific-popup/magnific-popup.css')}}" />
    <!-- owl-carousel CSS -->
    <link rel="stylesheet" type="text/css" href="{{secure_asset('css/owl-carousel/owl.carousel.css')}}" />
    <!-- Animate CSS -->
    <link rel="stylesheet" type="text/css" href="{{secure_asset('css/animate.css')}}" />
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{secure_asset('css/font-awesome.css')}}" />
    <!-- Ionicons CSS -->
    <link rel="stylesheet" type="text/css" href="{{secure_asset('css/ionicons.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" type="text/css" href="{{secure_asset('css/flaticon.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" type="text/css" href="{{secure_asset('css/shop.css')}}">
    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="{{secure_asset('revslider/css/settings.css')}}">
    <!-- style CSS -->
    <link rel="stylesheet" type="text/css" href="{{secure_asset('/css/styley.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="{{secure_asset('css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{secure_asset('css/custom.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css">
        <style type="text/css">
            .footer-last{
                width: 100%;
                margin: 10px;
                position: absolute;
                top:0;
                left: 0;
                color: #fff;
            }
            .footer-last > li{
                display: none;
                padding: 0px 10px;
            }
        </style>
    @yield('scripts')
</head>

<body>
    <!-- loading -->
    <div id="loading">
        <div id="loading-center">
            <img src="{{secure_asset('images/loader.gif')}}" alt="loder">
        </div>
    </div>
    <!-- loading End -->
    <!-- Header -->
    <header class="transparent">
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="topbar-left">
                            <ul class="list-inline">
                                <li class="list-inline-item"></li>
                                <li class="list-inline-item"><i class="fa fa-envelope-o"> </i> support@Cryptoinvestments.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="topbar-right text-right">
                            <ul class="list-inline">
                                @guest
                                <li class="list-inline-item">
                                    <ul class="list-inline iq-left">
                                        <li class="list-inline-item"><a href="{{route('login')}}" ><i class="fa fa-lock"></i>Login</a></li>
                                        <li class="list-inline-item"><a href="{{route('register')}}" ><i class="fa fa-user"></i>Register</a></li>
                                    </ul>
                                </li>
                                @endguest
                                @auth('web')
                                <li class="list-inline-item">
                                    <ul class="list-inline iq-left">
                                        <li class="list-inline-item"><a href="{{route('user.dashboard')}}"><i class="fa fa-lock"></i>{{Auth::guard('web')->user()->username}}</a></li>
                                       <li class="list-inline-item"><a href="/auth/logout"><i class="fa fa-sign-out"></i>Logout</a></li>
                                        </li>
                                    </ul>
                                </li>
                                @endauth
                                <li class="list-inline-item"><a href="#"><i class="fa fa-comments-o"></i>Free Consulting</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="iq-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="logo">
                            <a href="home-1.html">{{--<img class="img-fluid" src="{{secure_asset('/img/logo1.png')}}" alt="logo">--}}<span style="font-weight:1000"> COIN</span><span style="color:#f9b707; font-weight:1000">GRILLE</span></a>
                        </div>
                        <nav> <a id="resp-menu" class="responsive-menu" href="#"><i class="fa fa-reorder"></i> Menu</a>
                            <ul class="menu text-right">
                                <li><a class="{{active('home')}}" href="/">HOME</a>
                                    
                                </li>
                                <li><a class="{{active('active')}}"  href="#plans">Plans</a>
                                </li>
                                {{-- <li><a class="{{active('active')}}" href="/about">About</a> --}}
                                   
                               {{--  </li> --}}
                                <li><a class="{{active('contact')}}" href="/contact">Contact</a>
                                    
                                </li>
                                <li><a class="{{active('event')}}" href="/events">Events</a>
                                    
                                </li>
                                <li><a class="{{active('faq')}}" href="/faq">FAQ's</a>
                                    
                                </li>
                                <li>
                                    @auth('web')
                                        @if(Auth::guard('web')->user()->image == null || '')
                                        <img src="/img/default-avatar.png" alt="" style=" border-radius:50%; margin-top: 15px;" width="30px" height="30px">
                                        @else
                                         <img src="/img/profile/{{Auth::guard('web')->user()->image }}" alt="" style=" border-radius:50%; margin-top: 15px;" width="30px" height="30px">
                                        @endif
                                        @endauth
                                </li>
                                @auth('web')
                                <li><a href="/dashboard">Dashboard</a>
                                @endauth
                                </li>
                               
                                    
                                </li>
                                <li>
                                    
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
  @yield('content')
    <footer class="iq-footer">
    
        <div class="footer-bottom iq-ptb-20 ">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="iq-copyright iq-mt-10 iq-font-white">Copyright <span id="copyright"> <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script></span> <a href="#">Cryptoinvestments</a> All Rights Reserved </div>
                    </div>
                    <div class="col-sm-6">
                        <ul class="pull-left footer-last">
                            <li><a href="/legal-information">Legal Terms</a></li>
                            <li><a href="/privacy-policy">Privacy Policy</a></li>
                            <li><a href="/faq">FAQ's</a></li>
                            <li><a href="/contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--=================================
Footer -->
  
    <!-- back-to-top -->
    <div id="back-to-top">
        <a class="top" id="top" href="#top"> <i class="ion-ios-upload-outline"></i> </a>
    </div>
    <!-- back-to-top End -->
    <!-- jquery-min JavaScript -->
    <script src="{{secure_asset('js/jquery-min.js')}} "></script>
    <!-- popper JavaScript -->
    <script src="{{secure_asset('js/popper.min.js')}} "></script>
    <!-- Bootstrap JavaScript -->
    <script src="{{secure_asset('js/bootstrap.min.js ')}}"></script>
    <!-- Bitcoin widget JavaScript -->
    <script src="{{secure_asset('js/widget.js ')}}"></script>
    <!-- All-plugins JavaScript -->
    <script src="{{secure_asset('js/all-plugins.js ')}}"></script>
    <!-- particles JavaScript -->
    <script src="{{secure_asset('js/particles.js ')}}"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="{{secure_asset('revslider/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{secure_asset('revslider/js/jquery.themepunch.revolution.min.js')}}"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="{{secure_asset('revslider/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{secure_asset('revslider/js/extensions/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{secure_asset('revslider/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{secure_asset('revslider/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{secure_asset('revslider/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{secure_asset('revslider/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{secure_asset('revslider/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{secure_asset('revslider/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{secure_asset('revslider/js/extensions/revolution.extension.video.min.js')}}"></script>
    <!-- Custom JavaScript -->
    <script src="{{secure_asset('js/custom.js')}} "></script>

    <script>
    var revapi2,
        tpj = jQuery;
    tpj(document).ready(function() {
        if (tpj("#rev_slider_2_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_2_1");
        } else {
            revapi2 = tpj("#rev_slider_2_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "//localhost/revslider-standalone/revslider/public/secure_assets/js/",
                sliderLayout: "fullwidth",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    mouseScrollReverse: "default",
                    onHoverStop: "off",
                    arrows: {
                        style: "persephone",
                        enable: true,
                        hide_onmobile: false,
                        hide_onleave: false,
                        tmp: '',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 20,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 20,
                            v_offset: 0
                        }
                    }
                },
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: 1170,
                gridheight: 790,
                lazyType: "none",
                parallax: {
                    type: "mouse",
                    origo: "enterpoint",
                    speed: 400,
                    speedbg: 0,
                    speedls: 0,
                    levels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 47, 48, 49, 50, 51, 55],
                },
                shadow: 0,
                spinner: "spinner0",
                stopLoop: "off",
                stopAfterLoops: -1,
                stopAtSlide: -1,
                shuffle: "off",
                autoHeight: "off",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false,
                }
            });
        }
    }); /*ready*/
    </script>

    <script>var isIE = /MSIE 9/i.test(navigator.userAgent) || /rv:11.0/i.test(navigator.userAgent) || /MSIE 10/i.test(navigator.userAgent) || /Edge\/\d+/.test(navigator.userAgent);
$('.jarallax').jarallax({
    enableTransform: !isIE
});</script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5b302084eba8cd3125e32100/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>

</html>