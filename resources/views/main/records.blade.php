@extends('admin.layouts.app_admin')
@section('content')
<div class="container">
<div class="row">
  <div class="col-md-12 col_news">
    <div class="image_news">
    <div class="image-background" style="background: url({{asset($record->image)}}) no-repeat center center;">

      <div class="info_news">
        <p><a class="default-link" href="{{route('caregory.show',array($record->category))}}">{{$record->category}}</a></p>
        <p>{{$record->created_at}}</p>
      </div>
      <div class="image_bright"></div>
    </div>
  </div>
  </div>
</div>
  <div class="headLine"><h2>{{$record->title}}</h2></div>
  <div class="news-content"><p>{!!$record->description!!}</p></div>
</div>
@endsection
@section('footer')
@include('layouts.footer')
@endsection
