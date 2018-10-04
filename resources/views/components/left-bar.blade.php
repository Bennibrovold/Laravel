<!--<div class="col-md-3 d-none d-lg-block">
<ul class="navbar-nav ul_main">
  <h5 class="text-center">Most popular categories</h5>
  @if(count($categories) > 0)
    @foreach($categories  as $category)
    <li class="nav-item li_main"><p><a href="{{route('caregory.show',array($category->name,))}}">{{$category->name}}</a></p></li>
    @endforeach
  @else
  <p class="text-center">Empty</p>
@endif
</ul>
</div>-->
