@extends('Frontend.layouts.form')


@section('content')

		<verified id="{{Auth::guard('web')->user()->id}}"/>
	
@endsection