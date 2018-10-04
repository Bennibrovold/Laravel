@extends('admin.layouts.app_admin')
@section('left-bar')
@include('components.left-bar')
@endsection
@section('popular-articles')
@empty($popular_record)
Empty category
@else
{{$popular_record->title}}
@endempty
@endsection
@section('content')

  @empty($records)

  @else
  @foreach ($records as $record)
    @if($popular_record->title != $record->title)
      <div class="col-md-4 post">
          <div class="record">
            <div class="image">
                <img src="{{ asset('images/3.jpg') }}" alt="" class="img-fluid">

            </div>
              <div class="pre_title"><a href="{{route('record.show', array($record->category,$record->id))}}"><h5>{{ $record->title }}</h5></a></div>
          </div>
      </div>
    @endif
  @endforeach
  @endempty
@endsection
@section('footer')
@include('layouts.footer')
@endsection
