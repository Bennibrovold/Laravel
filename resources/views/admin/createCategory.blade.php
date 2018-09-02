@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-create">
                <ul class="list-group">
                    <li class="list-group-item"><a href="">1</a></li>
                    <li class="list-group-item"><a href="">2</a></li>
                    <li class="list-group-item"><a href="">3</a></li>
                    <li class="list-group-item"><a href="">4</a></li>
                    <li class="list-group-item"><a href="">5</a></li>
                    <li class="list-group-item"><a href="">6</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <form method="POST" action="{{ route('admin.category.create') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Name of category') }}</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name" required autofocus>
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('add') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@foreach( $errors->all() as $error)
  {{ $error }}
@endforeach



@endsection
