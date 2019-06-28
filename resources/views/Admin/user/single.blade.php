@extends('Admin.layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-lg-2"></div>
			<div class="col-lg-8 ">
				@if(!empty($user->userData))
				<div class="card">
					<div class="card-header">Name: <strong>{{$user->userData->firstname. ' '.$user->userData->lastname}}</strong>
					</div>
					<div class="card-body">
						<ul class="list-group">
							<li class="list-group-item"><strong>SSN: </strong>{{$user->userData->ssn}}</li>
							<li class="list-group-item"><strong>Email: </strong>{{$user->email}}</li>
							<li class="list-group-item"><strong>Address: </strong>{{$user->userData->address.','.$user->userData->city.','.$user->userData->state.','.$user->userData->country.','.$user->userData->zipcode}}</li>
							<li class="list-group-item"><strong>DOB: </strong>{{$user->userData->dob}}</li>
							<li class="list-group-item"><strong>phone: </strong>{{$user->userData->phone}}</li>
							<li class="list-group-item"><strong>Date Joined: </strong>{{date('M j, Y h:ia',strtotime($user->user == null ? 'Null' : $user->created_at))}}</li>


						</ul>
					</div>
				</div>
				@else
				<div class="jumbotron text-center">
					<h3>The User Has not been activated yet!!</h3>
				</div>
				@endif
			</div>
		</div>
	</div>
@endsection