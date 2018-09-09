@extends('admin.layouts.app_admin')
@section('left-bar')
@include('components.left-bar')
@endsection
@section('content')
    <div class="pop-art">
        <h5>Popular articles</h5>
    </div>
    <div class="row">
      @foreach($records as $record)
        <div class="col-md-6">
            <div class="record">
              <div class="pre_title"><a href="{{route('record.show', array($record->category,$record->id))}}"><h5>{{ $record->title }}</h5></a></div>
                <div class="image">
                    <img src="{{ asset('images/3.jpg') }}" alt="" class="img-fluid">
                    <div class="pre_title">{{$record->pre_title}}</div>
                </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
@endsection
