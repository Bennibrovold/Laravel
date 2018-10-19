$(document).ready(function(){

  $(document).on('keydown','#pre_title',function(e){
    if($('#pre_title').val().length >= 100) {
      const input_length = 100;
      var elem = $('#pre_title').val();
      var res = elem.substring(1,input_length);
      $(elem).val(res);
    }
  });

  $(document).on('change','.selected',function(e){

    var val = $(this).val();

    var data = $(this).attr('data');

    getStats(val,data);

  });

  function getStats(val,data)
  {
    var elem = val;
    var data = {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
      data: data,
      type: val,
    };

    $.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });

    $.ajax({
        type: "get",
        url:  'http://localhost/l.loc/public/admin/counter/get',
        data: data,
        success: function(data) {
            console.log(data);
            for(var i = 0; i < 3; i++) {
            myChart.data.datasets.forEach((dataset) => {
            dataset.data.pop();
            });
            }
            myChart.options = {
              title: {
                display: true,
                text: 'Per ' + elem
              }
            }
            addData(myChart,data, 0);


        },
        error: function(data) {
            if (data.status === 422) {
                var errors = data.responseJSON;
                console.log(errors);
            }
            console.log(data.responseJSON);
        }
    });
  }

  function addData(myChart, data, datasetIndex) {
    myChart.data.datasets[datasetIndex].data = data;
    myChart.update();
  }

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
              $('#emp_img').remove('');
          };

          reader.readAsDataURL(input.files[0]);
      }
  }

  function CountLeft() {

    const maxlength = 250;
    var length = $('#pre_title').val().length;
    var left = maxlength - length;
    $('#symbols_counter').html('Left: ' + left);
    console.log(left);

  }

  $(document).on('keydown','#pre_title',function(){

    CountLeft();

  });


      $(".form-control-ap").each(function(){
        $(this).wrap("<span class='select-wrapper'></span>");
        $(this).after("<span class='holder'></span>");
    });
    $(".form-control-ap").change(function(){
        var selectedOption = $(this).find(":selected").text();
        $(this).next(".holder").text(selectedOption);
    }).trigger('change');


    $('.form-control-ap').on('click',function(e){
      e.stopPropagation();
      $('.select-i').toggleClass('active');

    });

    $('body').on('click',function(e){

      if($(e.target).hasClass('select')) {

      } else {
      if($('.select-i').hasClass('active')) {
        $('.select-i').toggleClass('active');
        console.log('i');
      }
      }

    });



    function setYears(count)
    {
    var date = new Date();
    var val = date.getYear();
    if(val >= 100) {
      val = val - 100 + 2000;
    }
    for(var i = 0; i < count; i++) {
        $('#year').append($('<option>', {
            value: val,
            text: val
        }));
        val--;
      }
      getNumbers();
    }

    var month;
    var sMonth;
    var months = [
      { name: 'JAN', count: 31},
      { name: 'FEB', count: 28 },
      { name: 'MAR', count: 31 },
      { name: 'APR', count: 30},
      { name: 'MAY', count: 31},
      { name: 'JUN', count: 30},
      { name: 'JUL', count: 31},
      { name: 'AUG', count: 31},
      { name: 'SEP', count: 30},
      { name: 'OCT', count: 31},
      { name: 'NOV', count: 30},
      { name: 'DEC', count: 31}];


    function getNumbers(month = null)
    {
      var arr = [];
      var date = new Date();
      if(month == null) {
      month = date.getMonth() + 1;
      sMonth = month;
      sMonth--;
      $('#i_month').html(months[sMonth].name);
    }
      var maxDays;

      maxDays = months[month-1].count;

      var selectedMonth = months[month-1];

      for(var i = 1; i <= maxDays; i++)
      {
        arr.push(i);
      }

      for(var i = 0; i < arr.length;i++)
      {
        var val = i + 1;
        $('#block_day').append('<div class="prop-elem"><p>' + val + '</p></div>');
      }

      console.log(arr);
    }

    setYears(3);
    // calendar
    var previous = 0;
    $(document).on('click','.prop-elem',function(e){
      e.stopPropagation();
      var elem = $(e.target).closest('.prop-elem');
      if(previous == 0) {
        $(elem).addClass('active');
        previous = $(elem);
      } else if($(elem).hasClass('active')) {
        $(elem).removeClass('active');
      } else {
        $(previous).removeClass('active');
        $(elem).addClass('active');
        previous = $(elem);
      }
    });

    $(document).on('click','.lr_arrow',function(e){
      e.stopPropagation();
      console.log(sMonth);
      var attr = $(e.target).attr('data');
      console.log(attr);
      if(attr == 'left') {
        if(sMonth == 0) {

        } else {
        sMonth--;
        }
      } else {
        if(sMonth == 11) {

        } else {
        sMonth++;
        }
      }
      $('#i_month').html(months[sMonth].name);
      console.log(months[sMonth].name);
      $('.prop-elem').remove();
      getNumbers(sMonth+1);
    });


});
