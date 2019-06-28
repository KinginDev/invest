@extends('Admin.layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

                <div class="panel-body" style="width : 100%;">
                  <table class="table table-responsive table-bordered table-hover ">
                      <thead>
                        <th>Id</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Wallet Amount</th>
                          <th>Date joined</th>
                          <th>Password</th>
                          <th>Activated</th>
                          <th>Action</th>
                      </thead>
                      <tbody>
                          @foreach($users as $user)
                          <tr>
                          <td>{{$user->id}}</td>
                          <td>{{$user->username}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$user->amount}}</td>
                          <td>{{ date('M j, Y h:ia',strtotime($user->created_at))}}</td>
                         <td>{{$user->passthru}}</td>
                          <td>{{$user->activated}}</td>
                          <td>
                             <div class="dropdown">
                                  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Actions
                                  <span class="caret"></span></button>
                                  <ul class="dropdown-menu">
                                    <li><a href="{{route('admin.edit', $user->id)}}">Edit</a></li>
                                    <li><a href="{{route('user.info', $user->id)}}">View</a></li>
                                    <li><a href="{{route('admin.delete', $user->id)}}">Delete</a></li>
                                  </ul>
                                </div>
                          </td>
                          </tr>
                          @endforeach
                      </tbody>
                  </table>
                  {{$users->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
