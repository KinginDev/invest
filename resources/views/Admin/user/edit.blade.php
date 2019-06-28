@extends('Admin.layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Edit {{$user->name}}</div>
                <div class="panel-content ">
                <form action="{{route('admin.update', $user->id)}}" method="post">
                    {{csrf_field()}}
                      <input type="hidden" name="_method" value="PUT">
                        <div class="form-group">
                            <label for="" class="control-label">Name</label>
                            <input type="text" class="form-control" value="{{$user->name}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Email</label>
                            <input type="text" class="form-control" value="{{$user->email}}" disabled>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">amount</label>
                            <input type="text" name="amount" class="form-control" value="{{$user->amount}}" >
                        </div>
                        <div class="form-control">
                            <button type="submit" class="btn btn-primary btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection