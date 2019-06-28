@extends('Frontend.layouts.form')
	@section('styles')
	
	@endsection
@section('content')
	@if(Auth::guard('web')->check())
	 <!--   Big container   -->
	    <div class="container" style="">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container">
				<div class="card ">
					<div class="card-body">
						@if(Session::has('alert'))
						<div class="alert alert-warning" style="padding: 20px;">
							<p>'The Email has been successfully sent, Check The email to verify account</p>
						</div>
					
					@else
					</div>
					
					<div class="jumbroton text-center">
						<h3 class="text-header">Thank you for registering with us. We sent you an email to verify your account</h3>
							<p>If you did not recive any verification email please click on this link</p>
							<center>
								<a href="{{route('resend.email', Auth::guard('web')->user()->id)}}" class="btn btn-success" o onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Click</a>
								<form id="logout-form" action="{{ route('resend.email', Auth::guard('web')->id()) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

							</center>
					</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endif
@endsection