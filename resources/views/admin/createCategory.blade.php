@extends('admin.layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <div class="square_of_form_category">
                @if($errors->any())
                    <ul class="ul_errors_category list-unstyled">
                        @foreach(  $errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="squareplus_of_form_category">
                        <form method="POST" action="{{ route('admin.category.create') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                                <label for="name">{{ __('Name of category') }}</label>
                                <input type="text" class="form-control" name="name" required autofocus>



                </div>
                            <div class="form-group float-right">

                                <button type="submit" class="btn btn-primary form-group">
                            {{ __('add') }}
                        </button>

                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
</div>



@endsection
