@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center py-4">
        <div class="col-xs-3 col-sm-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card">
                <div class="card_header">
                  <h5 class="text-center">Log in</h5>
                  @if(count( $errors ) > 0)
                    @foreach ($errors->all() as $error)
                       <div class="alert alert-danger login_error"><p>&bull; {{ $error }}</p></div>
                    @endforeach
                  @endif
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>                                <a class="btn btn-link password_forgot" href="{{ route('password.request') }}">
                                                                {{ __('Forgot Your Password?') }}
                                                            </a>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        </div>

                        <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-lg btn-success button_login">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
