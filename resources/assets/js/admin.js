$(document).ready(function(){

  $(document).on('keydown','#pre_title',function(e){
    var p_title = $(this).val();
    var length = p_title.length;
    var summ = 250-length;
    summ = summ * summ;
    summ = summ / summ;
    if($(this).val().length > 250) {
      p_title = p_title.substr(0,length - summ);
      $('#pre_title').val(p_title);
    }
  });

  $(document).on('change','#image',function() {
      readURL(this);
      console.log('changed');
  });

  function readURL(input) {
      if (input.files && input.files[0]) {

          var reader = new FileReader();

          reader.onload = function(e) {
              $('#image-text').html('Change');
              $('#image-reader').removeClass('hidden');
              $('#image-reader').attr('src', e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
      }
  }
});
