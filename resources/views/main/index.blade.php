@extends('admin.layouts.app_admin')
@section('left-bar')
@include('components.left-bar')
@endsection
@section('popular-articles')
<div class="pop-art">
    <!--<h5>Popular article</h5>-->
    <h5>Popular Aricle</h5>
</div>
<div class="row">
    <div class="col-md-7">
        <div class="record">
          <div class="image">
            @if(count($popular_article) > 0)
            <img src="{{ url("$popular_article->image")}}" alt="" class="image_popular">
            @else
            Empty
            @endisset
          </div>
        </div>
        <div class="popular_articles_devider"></div>
    </div>
    <div class="col-md-5 no-padding-left">
        <div class="record">
          @isset($popular_article)
            <div class="pre_title popular_article"><a href="{{route('record.show', array($popular_article->category,$popular_article->id))}}"><h5>{{ $popular_article->title }}</h5></a></div>
            <div class="content">{{$popular_article->pre_title}}</div>
            <div class="bottom-info-panel">
                  <p class="popular-record-category"><a href="{{route('caregory.show',array($popular_article->category,))}}">{{$popular_article->category}}</a></p>
                  <p class="popular-record-date">{{$popular_article->created_at}}</p>
            </div>
          @endisset
        </div>
    </div>
</div>
@endsection
@section('content')

<div class="container-fluid py-2 row-shadow-content">
    <div class="main-articles">
        <h5>Lastest news</h5>
    </div>
    <div id="news" class="row">
      @if(count($articles) > 0)
      @foreach($articles as $article)
        @if($popular_article->id != $article->id)
        <div id="n_post" class="col-md-12 col-lg-12 post hide">
            <div class="record">
              <div class="row">
              <div class="col-md-3">
              <div class="image">
                  <a href="{{route('record.show', array($article->category,$article->id))}}"><img src="{{ url("$article->image")}}" alt="" class="image_simple"></a>
              </div>
              </div>
              <div class="col-md-9">
                <div class="post-info d-none d-md-block">
                  <p class="record-category"><a href="{{route('caregory.show',array($article->category,))}}">{{$article->category}}</a></p>
                  <p class="record-time">{{$article->created_at}}</p>
                </div>
                <div class="pre_title"><br /><a href="{{route('record.show', array($article->category,$article->id))}}"><p>{{ $article->title }}</p></a></div>
                <div class="pre_description"><p>{{$article->pre_title}}</div>
                <div class="d-md-none">
                  <p class="record-time">{{$article->created_at}}</p>
                  <p class="record-category"><a href="{{route('caregory.show',array($article->category,))}}">{{$article->category}}</a></p>
                </div>
              </div>
              </row>
            </div>
        </div>
      </div>
        @endif
      @endforeach
      @else
      <p>Empty</p>
    @endif
    </div>
    <div class="l_more">
      <form method="post" action="{{route('news.get')}}">
        @csrf
        <input id="count_records" name="count" type="hidden" value="19">
      <button class="load_more" id="load_more">Load more</button>
      </form>
    </div>
</div>

@endsection
@section('footer')
@include('layouts.footer')
@endsection
