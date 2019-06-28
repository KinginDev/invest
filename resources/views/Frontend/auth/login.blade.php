@extends('Frontend.auth.layout.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="card-header">
                        <center>
                            <img src="new-homepage/new-logo.png" />
                        </center>
                        <h3 class="lead">Login to Account </h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        
                
                <div class="card-body ">
                    <form method="POST" class="" action="{{ route('login') }}" aria-label="{{ __('Login ') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="">{{ __('E-Mail Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" style="padding: 5px;" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" style="padding: 5px;" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                
                            </div>
                        </div>
                    </form>
                </div>
                    </div>
                
                <div class="col-md-6 hidden-xs-down" style="margin-left: auto; margin-right: auto; ">
                    {{-- <a href="/">
                        <center>
                            <img src="{{asset('img/logo/favicon.png')}}" alt="" width="150px;" style="margin-left: auto; margin-right: auto;">
                        </center>
                        </a> --}}
                     <div class="form-group">
                    <a class="btn btn-link" href="{{ route('register') }}" >
                                    {{ __('You don\'t have an account? Please Register!') }}
                    </a>
                </div>
                </div>
               
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
