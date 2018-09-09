$(document).ready(function() {

	$('#main').click(function(e) {
    e.preventDefault();
    ajaxGetContent($(this).attr('href'));
		history.pushState(null, document.title, $(this).attr('href'));
	});
	$('#users').click(function(e) {
		e.preventDefault();
		ajaxGetContent($(this).attr('href'));
		history.pushState(null, document.title, $(this).attr('href'));
	});
	$('#category').click(function(e) {
    e.preventDefault();
    ajaxGetContent($(this).attr('href'));
		history.pushState(null, document.title, $(this).attr('href'));
	});
  $('#record').click(function(e) {
    e.preventDefault();
    ajaxGetContent($(this).attr('href'));
		history.pushState(null, document.title, $(this).attr('href'));
	});
	$('#options').click(function(e) {
    e.preventDefault();
    ajaxGetContent($(this).attr('href'));
		history.pushState(null, document.title, $(this).attr('href'));
	});

function ajaxGetContent($url)
  {
    $.ajaxSetup({
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    });
    $.ajax({
      url: $url,
      type: 'GET',
      data: 'data',
      success : function(data) {
        $('main').html(data);
      },
      error: function(data) {
                console.log(data.responseText);
            }
    });
  }
});
