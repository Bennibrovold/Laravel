@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center py-4">
        <div class="col-xs-3 col-sm-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card">
                <div class="card_header">
                  <h5 class="text-center">Register</h5>
                  @if(count( $errors ) > 0)
                    @foreach ($errors->all() as $error)
                       <div class="alert alert-danger login_error"><p>&bull; {{ $error }}</p></div>
                    @endforeach
                  @endif
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('Name') }}</label>

                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                        </div>

                        <div class="form-group">
                            <label for="email">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                              <div class="form-group">
                              <span>Already have accout? - </span><a href="">Log in</a>
                            </div>
                                <button type="submit" class="btn btn-success button_login">
                                    {{ __('Register') }}
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
