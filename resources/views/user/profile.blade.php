@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="card">
                <a class="text-center" href="{{ $user->id }}">{{ $user->name}}</a>

                <img src="{{ $user->img }}" alt="{{ $user->name }}" width="100%" height="100%">
            </div>
        </div>
    </div>
</div>
@endsection
