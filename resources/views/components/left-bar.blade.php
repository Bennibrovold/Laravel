<div class="col-md-3">
<ul class="navbar-nav ul_main">
  <h5 class="text-center">News categories</h5>
    @foreach($categories  as $category)
    <li class="nav-item li_main">{{$category->name}}</li>
    @endforeach
</ul>
</div>
