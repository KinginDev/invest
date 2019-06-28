<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{secure_asset('/img/logo/favicon.png')}}">
  <link rel="icon" type="image/png" href="{{secure_asset('/img/logo/favicon.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Cryptoinvestments Dashboard
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
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
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{secure_asset('/css/app.css')}}" rel="stylesheet" />
  <link href="{{secure_asset('/css/material-dashboard.css?v=2.1.0')}}" rel="stylesheet" />
  <link href="{{secure_asset('/demo/demo.css')}}" rel="stylesheet" />
</head>

<body>
    <div id="app">
         @yield('content')  
    </div>

  <!--   Core JS Files   -->
  <script src="{{secure_asset('js/app.js')}}" type="text/javascript"></script>
  <script src="{{secure_asset('/js/core/jquery.min.js')}}" type="text/javascript"></script>
  <script src="{{secure_asset('/js/core/popper.min.js')}}" type="text/javascript"></script>
  <script src="{{secure_asset('/js/core/bootstrap-material-design.min.js')}}" type="text/javascript"></script>
  <script src="{{secure_asset('/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="{{secure_asset('/js/plugins/chartist.min.js')}}"></script>
  <script src="{{secure_asset('/demo/demo.js')}}" type="text/javascript"></script>
  <!--  Notifications Plugin    -->
  <script src="{{secure_asset('/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{secure_asset('/js/material-dashboard.min.js?v=2.1.0')}}" type="text/javascript"></script>
  <script>
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  </script>
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
<!--End of Tawk.to Script--></body>

</html>