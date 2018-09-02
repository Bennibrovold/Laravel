@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
              <ul class="list-group">
                @foreach($categories  as $category)

                    <li class="list-group-item"><a href="{{ url('category/'.$category->name) }}">{{ $category->name }}</a></li>

                @endforeach
              </ul>
            </div>
        </div>
        <div class="col-md-7">
            2
        </div>
        <div class="col-md-2">
            3
        </div>
    </div>
</div>

@endsection
