@extends('Admin.layouts.app')

@section('content')
<div class="container">
    <div class="row ">
      <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">Transactions</div>

                <div class="panel-body">
                  <table class="table table-responsive table-bordered table-hover">
                      <thead>
                        <th>User </th>
                          <th>Type</th>
                          <th>Status</th>
                          <th>Trxf</th>
                          <th>Amount</th>
                          <th>Date </th>
                          <th>Action</th>
                      </thead>
                      <tbody>
                          @foreach($transactions as $user)
                          <tr>
                            <td>{{$user->user == null ? 'Null' : $user->user->username}}</td>
                          <td>{{$user->user == null ? 'Null' : $user->trans_type}}</td>
                          <td>
                            @if($user->user == null)
                              Null
                            @else
                              @if($user->status ==1)  
                                <span class="badge badge-warning">Pending</span>
                              @elseif($user->status ==2 )
                              <span class="badge badge-success">Completed</span>
                              @elseif($user->status ==3)
                              <span class="badge badge-danger">Cancelled</span>
                              @endif
                            @endif
                          </td>
                          <td>{{$user->ref}}</td>
                          <td>{{$user->user == null ? 'Null' : $user->amount}}</td>
                          <td>{{ date('M j, Y h:ia',strtotime($user->user == null ? 'Null' : $user->created_at))}}</td>
                          <td>
                             <div class="dropdown">
                                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Actions
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu">
                                    <li><a href="{{route('transactions.edit', $user->id)}}">Edit</a></li>
                                    <li><a href="{{route('transaction.destroy', $user->id)}}">Delete</a></li>
                                  </ul>
                                </div>
                          </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
                  {{$transactions->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
