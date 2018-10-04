$(document).ready(function() {

	$('.ajax_nav').click(function(e) {
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

	$(document).on('click','.load_more',function(e){
		e.preventDefault();
		var form = $(e.target).closest('form');
		console.log(form);
		var count = $('#count_records').val() + 18;

		appendNew(count,form);
	});
	function appendNew(count,form)
	  {
	    $.ajax({
	      url: $(form).prop('action'),
	      type: 'post',
	      data: $(form).serialize(),
	      success : function(data) {
					$('#count_records').val(count);
					console.log(data);

	        $('#news').append(data);

	      },
	      error: function(data) {
	                console.log(data.responseText);
	            }
	    });
	  }
});
