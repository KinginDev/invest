@extends('Admin.layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-lg-12">
            <div class="card ">
                <div class="card-header">
                    Edit: <strong>{{$transaction->user->username}}'s</strong> Transaction
                    <div class="clearfix"></div>
                    Amount: <strong>${{$transaction->user->amount}}</strong>
                    <div class="clearfix"></div>
                    Transaction Type: <strong>${{$transaction->trans_type}}</strong>
                </div>
                <div class="card-body">
                <form action="{{route('transaction.update' ,$transaction->id)}}" method="post">
                    
                     @csrf
                        <div class="form-group">
                            <label for="" class="control-label">Name</label>
                            <select name="status" class="form-control">
                            	<option value="1" {{$transaction->status == 1 ? 'selected' : ''}}>Pending</option>
                            	<option value="2" {{$transaction->status == 2 ? 'selected' : ''}}>Completed</option>
                                <option value="3" {{$transaction->status == 3 ? 'selected' : ''}}>Cancelled</option>
                            </select>
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