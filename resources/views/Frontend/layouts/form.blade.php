<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('/img/favicon.ico')}}">

	<title>Cryptoinvestments Verification</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('/img/apple-icon.png')}}" />
	{{-- <link rel="icon" type="image/png" href="{{asset('/img/favicon.png')}}" /> --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="{{asset('/css/bootstrap.min.css')}}" rel="stylesheet" />
	<link href="{{asset('/css/material-bootstrap-wizard.css')}}" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="{{asset('/css/demo.css')}}" rel="stylesheet" />
	<style>
		.l-container{
			width: 100px;
			height: 50px;
			border: 1px soild transparent;
			padding: 20px;
			z-index: 300000;
			opacity: 1;
			
		}
		.cont{
				z-index: 300000 !important;
		}
		.l-container img{
			border-radius: 50% !important;
			opacity: 1;
			z-index: 300000 !important;
		}
		.l-container > .brand{
			font-weight: bolder;
			color: #f7f7f7f7;
			font-size: 15px;
			text-transform: uppercase;
			text-align: center;
		}
	</style>
</head>

<body>
<div class="image-container set-full-height" style="background-image: url('/img/bg2.jpg')">
	   <!--   Creative Tim Branding   -->
	 	<a href="/" class="container" style="margin: 10px;">
	 		<div class="" style="position: absolute; top: 0; left: 0;" >
	 			<img src="{{asset('img/logo/favicon.png')}}" alt="logo" width="100px;" style="margin: 20px;  margin-bottom: 0px;">
	 			
	 		</div>
	 		<div class="" style="position: absolute; top: 0; right: 0; font-size: 30px;" >
	 			<a href="{{route('user.logout')}}"   style="margin: 20px; color:#f9b707;"><i class="fa fa-sign-out"></i></a>
	 		</div>
	 	</a>
	         
	   <div class="clearfix"></div>

		

	  <div id="app">
	  	@yield('content')
	  </div>

	    <div class="footer">
	        <div class="container text-center">
	           
	        </div>
	    </div>
	</div>

</body>
	<!--   Core JS Files   -->
	 <script src="{{asset('js/app.js')}}" type="text/javascript"></script>
    <script src="{{asset('/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('/js/bootstrap.min.js')}}" type="text/javascript"></script>
	<script src="{{asset('/js/jquery.bootstrap.js')}}" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="{{asset('/js/material-bootstrap-wizard.js')}}"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="{{asset('/js/jquery.validate.min.js')}}"></script>
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
<!--End of Tawk.to Script-->
</html>
