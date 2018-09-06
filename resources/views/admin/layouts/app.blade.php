<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" rel="javascript" type="text/javascript"></script>
    <script src="{{asset('js/ajax.js')}}" rel="javascript" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
</head>

<body id="body">
    <div class="container-fluid">
        <div class="row">
            <div class="button_menu d-none d-xs-block ">123123</div>
            <div class="col-lg-2 col-md-12 sss no-padding d-none d-lg-block">
                <div class="sup-block_menu">
                    <div class="menu">
                        <div class="top-block_menu">
                            <div class="brand">
                                <p class="text-center">
                                    Hyppnotic
                                </p>
                            </div>
                        </div>
                        <div class="medium-block_menu">

                            <div class="title_menu my-1">
                                <span>
                            <p>MENU</p>
                          </span>

                            </div>
                            <div class="list">
                                <ul class="list-group list-group_menu">
                                    <li class="list-group-item li_menu"><i class="fa fa-tachometer" aria-hidden="true"></i> <a id="main" href="{{ Route('admin.index')}}">Main</a></li>
                                    <li class="list-group-item li_menu advance" data-slide="1"><i class="fa fa-plus" aria-hidden="true"></i> <a href="#">Create</a><i><div class="arrow i-1">
                                        <span></span>
                                        <span></span>
                                      </div></i>
                                        <ul id="advanced" class="list-group submenu-1 hidden">
                                            <li class="li_submenu"><a id="category" class="a_menu" href="{{route('admin.category.create')}}">Category</a></li>
                                            <li class="li_submenu"><a id="record" class="a_menu" href="{{route('admin.record.create')}}">Record</a></li>
                                        </ul>
                                    </li>
                                    <li class="list-group-item li_menu"><i class="fa fa-users" aria-hidden="true"></i> <a href="#">Users</a></li>
                                    <li class="list-group-item li_menu"><i class="fa fa-ticket" aria-hidden="true"></i> <a href="#">Tickets</a></li>
                                    <li class="list-group-item li_menu"><i class="fa fa-area-chart" aria-hidden="true"></i> <a href="#">Stats</a></li>
                                    <li class="list-group-item li_menu"><i class="fa fa-cog" aria-hidden="true"></i> <a href="#">Options</a></li>
                                    <li class="list-group-item li_menu"><i class="fa fa-address-book-o" aria-hidden="true"></i> <a href="#">Admins</a></li>
                                    <li class="list-group-item li_menu"><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="#">Support</a></li>
                                    <li class="list-group-item li_menu advance" data-slide="2">
                                        <i class="fa fa-user-circle" aria-hidden="true"></i> <a>{{ Auth::user()->name }}</a> <i><div class="arrow i-2">
                                          <span></span>
                                          <span></span>
                                        </div></i>
                                        <ul id="advanced" class="list-group submenu-2 hidden">
                                            <li class="li_submenu"><a class="" href="{{url('user/'.Auth::user()->id)}}">Profile</a></li>
                                            <li class="li_submenu"><a class="" href="{{url('user/'.Auth::user()->id)}}">Settings</a></li>
                                            <li class="li_submenu"><a class="" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="bottom-block_menu">
                        </div>
                    </div>
                </div>
            </div>
            <div id="btn_menu" class="button-sqare_menu d-lg-none">
                <i class="fa fa-bars fa-2x btn_mobile_admin_menu" aria-hidden="true"></i>
            </div>
            <div id="admin_menu" class="mobile_menu col-md-12 no-padding d-none d-lg-none">
                <div class="menu_mobile_sticky">
                    <div class="top-block_menu">
                        <div class="brand_mobile">
                            <p class="text-center">
                                Hyppnotic
                            </p>
                        </div>
                    </div>
                    <div class="medium-block_mobile_menu">
                        <div class="h_elements_mobile">
                            <h4>Menu</h4>
                        </div>
                        <li class=" li_mobile_menu"><i class="fa fa-tachometer" aria-hidden="true"></i> <a href="{{ Route('admin.index')}}">Main</a></li>
                        <li class="li_mobile_menu advance" data-slide="1"><i class="fa fa-plus" aria-hidden="true"></i> <a href="#">Create</a><i><div class="arrow i-1">
                    <span></span>
                    <span></span>
                  </div></i>
                            <ul id="advanced" class="list-group submenu-1 hidden">
                                <li class="li_mobile_submenu"><a id="category" class="a_menu" href="{{route('admin.category.create')}}">Category</a></li>
                                <li class="li_mobile_submenu"><a id="record" class="a_menu" href="{{route('admin.record.create')}}">Record</a></li>
                            </ul>
                        </li>
                        <li class=" li_mobile_menu"><i class="fa fa-tachometer" aria-hidden="true"></i> <a href="{{ Route('admin.index')}}">Main</a></li>
                        <li class=" li_mobile_menu"><i class="fa fa-tachometer" aria-hidden="true"></i> <a href="{{ Route('admin.index')}}">Main</a></li>
                        <li class=" li_mobile_menu"><i class="fa fa-tachometer" aria-hidden="true"></i> <a href="{{ Route('admin.index')}}">Main</a></li>
                        <li class=" li_mobile_menu"><i class="fa fa-tachometer" aria-hidden="true"></i> <a href="{{ Route('admin.index')}}">Main</a></li>
                        <li class=" li_mobile_menu"><i class="fa fa-tachometer" aria-hidden="true"></i> <a href="{{ Route('admin.index')}}">Main</a></li>
                        <li class=" li_mobile_menu"><i class="fa fa-tachometer" aria-hidden="true"></i> <a href="{{ Route('admin.index')}}">Main</a></li>
                        <li class=" li_mobile_menu"><i class="fa fa-tachometer" aria-hidden="true"></i> <a href="{{ Route('admin.index')}}">Main</a></li>
                        <li class=" li_mobile_menu"><i class="fa fa-tachometer" aria-hidden="true"></i> <a href="{{ Route('admin.index')}}">Main</a></li>
                    </div>
                    <div id="btn_close_admin_menu" class="btn_close_admin_menu d-none d-lg-none">
                        <i class="fa fa-times fa-3x" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div id="scrollToTop" class="scrollToTop d-none">
                <div class="scrolToTop_sup">
                    <i class="fa fa-arrow-up fa-2x text-center" aria-hidden="true"></i>
                </div>
            </div>
            <div id="pre-main" class="col-md-10">
                <main id="main" class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>

</html>
<!--<script>
    if ($(document).height() < $('#menu').height()) {
        $('#menu').css('height', '100vh');
    } else {
        var height = $(document).height();
        $('#menu').css('height', height);
    }
</script>-->
<script>
    var list = document.querySelector('li');
    for (var i = 0; i < list.length; i++) {
        list[i].addEventListener('click', function() {
            $(this).toggleClass('test');
        }, false);
    }
</script>
<!-- <script>
  var previousElement = 0;
  $('#advance_menu').click(function(e){
    var id = $(this).data('slide');
    console.log(id);
    if($('#advanced').hasClass('hidden')) {
      $('#advanced').slideDown('fast',function(){
        $('#caret_menu').css({ transform: 'rotate(180deg)' }, { duration: 500 });
        $('#advanced').removeClass('hidden');
      });
    } else {
      $('#advanced').slideUp('fast',function(){
      $('#caret_menu').css({ transform: 'rotate(0deg)' }, { duration: 500 });
      $('#advanced').addClass('hidden');
      });
   }

  });
</script> -->
<script>
    var previousElement = 0;
    var id = 0;
    $('.advance').on('click', function(e) {

        id = $(this).data('slide');
        if ($(e.target).hasClass('a_menu')) {

        } else {
            if (previousElement == 0) {
                $('.submenu-' + id).slideToggle('fast');

                checkHidden();
                previousElement = id;
            } else if (previousElement == id) {
                $('.submenu-' + id).slideToggle('fast');

                checkHidden();
                previousElement = 0;
                return true;
            } else if ((previousElement !== id) || (previousElement !== null || (previousElement !== 0))) {
                $('.submenu-' + previousElement).slideUp('fast');

                checkHiddenPrevious();

                $('.submenu-' + id).slideDown('fast');

                checkHidden();

                previousElement = id;
                console.log(3);
                return true;
            }
        }

    });

    function checkHidden() {
        if ($('.submenu-' + id).hasClass('hidden')) {
            $('.submenu-' + id).removeClass('hidden');
            $('.i-' + id).toggleClass('active');
        } else {
            $('.submenu-' + id).addClass('hidden');
            $('.i-' + id).toggleClass('active');
        }
    }

    function checkHiddenPrevious() {

        $('.submenu-' + previousElement).addClass('hidden');
        $('.i-' + previousElement).toggleClass('active');

    }
    $(document).on('scroll', function() {
        if ($(document).scrollTop() > 100) {
            $('#scrollToTop').removeClass('d-none');
            $('#scrollToTop').addClass('hidden');
            $('#scrollToTop').fadeIn('slow');
        } else {
            $('#scrollToTop').fadeOut('slow', function() {
                $('#scrollToTop').addClass('d-none');
            });
        }
    });
    $('#scrollToTop').click(function() {
        $(document).scrollTop(0);
    });

    $(window).resize(function() {
        if ($(document).width() > 976) {
            if ($('#admin_menu').hasClass('mobile-admin-menu')) {
                $('#admin_menu').removeClass('mobile-admin-menu');
            }
            if (opened = 1) {} else {
                if ($('#btn_close_admin_menu').hasClass('d-none')) {} else {
                    $('#btn_close_admin_menu').addClass('d-none');
                }
            }
        }
    });
    var opened = 0;
    var previousScrollTop = 0;
    $('#btn_menu').click(function() {
        previousScrollTop = $(document).scrollTop();
        $('#btn_menu').addClass('d-none');
        $('#btn_close_admin_menu').removeClass('d-none');
        $('#btn_close_admin_menu').fadeIn('slow');
        $('#admin_menu').removeClass('d-none');

        $('#admin_menu').animate({
            left: 0,
        }, 500);
        $('#pre-main').css({
            "overflow": "hidden"
        });
        opened = 1;
        $('#pre-main').addClass('hidden');
        $(document).scrollTop(0);
    });

    $('#btn_close_admin_menu').click(function() {
        console.log('test');
        $('#btn_menu').removeClass('d-none');
        $('#btn_menu').addClass('hidden');
        $('#btn_menu').fadeIn('fast');
        $('#btn_close_admin_menu').addClass('d-none');
        $('#admin_menu').animate({
            left: -1000,
        }, 200, function() {
            $('#admin_menu').addClass('d-none');
        });
        $('#body').css({
            "overflow": "auto"
        });
        opened = 0;
        $('#pre-main').removeClass('hidden');
        $(document).scrollTop(previousScrollTop);
    });
</script>
