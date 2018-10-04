@foreach($articles as $article)
        <div class="col-md-12 col-lg-12 post hide">
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
@endforeach
@isset($data)

<script>
  $('.load_more').remove();
</script>

@else

@endisset
