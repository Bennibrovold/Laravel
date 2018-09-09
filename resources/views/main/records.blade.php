@extends('admin.layouts.app_admin')
@section('content')
<div class="container-fluid">
<div class="row">
  <div class="col-md-9 col_news">
    <div class="image_news">
      <div class="info_news">
        <p>{{$record->pre_title}}</p>
        <p>{{$record->title}}</p>
        <p>{{$record->created_at}}</p>
      </div>
    <img src="{{ asset('images/3.jpg') }}" alt="" class="img-thumbnail" />
    <div class="image_bright"></div>
  </div>
  </div>
</div>
</div>
@endsection
