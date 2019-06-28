@extends('Frontend.auth.layout.app')

@section('content')
<div class="container" style="margin-top: 50px;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                        <center>
                                <img src="new-homepage/new-logo.png" />
                            </center>
                    <h3 class="lead">Register Account</h3>
                    <p class="category">Register an account us  by creating a unique username and email</p>
                </div>

                <div class="card-body">
                    <div class="row">
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                         <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group label-floating">
                            <label for="name" class="control-label">{{ __('Username') }}</label>               
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group ">
                            <label for="email" class=" control-label">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group">
                            <label for="password" class=" control-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group ">
                            <label for="password-confirm" class="control-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin-top:30px; ">
                        {{-- <a href="/">
                            <center><img src="{{asset('img/logo/favicon.png')}}" alt="" width="200px;" style="margin-left: auto; margin-right: auto;">
                            </center></a> --}}
                         <div class="form-group text-center">
                        <a class="btn btn-link" href="{{ route('login') }}">
                                        {{ __('You Already have an account? Please Login!') }}
                                </a>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
