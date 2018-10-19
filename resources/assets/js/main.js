$(document).ready(function(){
    $("#arrow").click(function(){
        $("#panel_categories").slideToggle();
    });

    $(document).on('click','#arrow',function() {
        if ($('#arrow').hasClass('active')) {
            $('#arrow > .arrow').toggleClass('active');
        } else {
            $('#arrow > .arrow').toggleClass('active');
        }
    });

    var arr = document.getElementsByClassName('post');

    var i = 0;

    setShow();

    $(window).scroll(function()
    {
          setElementShow(i);
    });
    function setShow() {

        setElementShow();

    }

    function setElementShow()
    {
      for(var i = 0 ; i < arr.length; i++) {
        var w_height = window.innerHeight;
        w_height = w_height - 70;
        if($(arr[i]).offset().top - w_height < $(window).scrollTop()) {
          console.log('ok');
        if($(arr[i]).hasClass('show-i')) {

        } else {
          $(arr[i]).addClass('show-i');
          $(arr[i]).removeClass('hide');
        }
      }
      }

      if($(arr[i]).hasClass('show-i')) {

      } else {
        $(arr[i]).removeClass('hide');
        $(arr[i]).addClass('show-i');
      }
    }
});
