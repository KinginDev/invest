@extends('Frontend.layouts.app')

@section('content')
<dashboard user="{{Auth::guard('web')->user()->id}}" name="{{Auth::guard('web')->user()->username}}"/>
@endsection