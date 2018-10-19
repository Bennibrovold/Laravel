/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 30);
/******/ })
/************************************************************************/
/******/ ({

/***/ 30:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(31);


/***/ }),

/***/ 31:
/***/ (function(module, exports) {

$(document).ready(function () {

  $(document).on('keydown', '#pre_title', function (e) {
    if ($('#pre_title').val().length >= 100) {
      var input_length = 100;
      var elem = $('#pre_title').val();
      var res = elem.substring(1, input_length);
      $(elem).val(res);
    }
  });

  $(document).on('change', '.selected', function (e) {

    var val = $(this).val();

    var data = $(this).attr('data');

    getStats(val, data);
  });

  function getStats(val, data) {
    var elem = val;
    var data = {
      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content'),
      data: data,
      type: val
    };

    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') }
    });

    $.ajax({
      type: "get",
      url: 'http://localhost/l.loc/public/admin/counter/get',
      data: data,
      success: function success(data) {
        console.log(data);
        for (var i = 0; i < 3; i++) {
          myChart.data.datasets.forEach(function (dataset) {
            dataset.data.pop();
          });
        }
        myChart.options = {
          title: {
            display: true,
            text: 'Per ' + elem
          }
        };
        addData(myChart, data, 0);
      },
      error: function error(data) {
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

  $(document).on('change', '#image', function () {
    readURL(this);
    console.log('changed');
  });

  function readURL(input) {
    if (input.files && input.files[0]) {

      var reader = new FileReader();

      reader.onload = function (e) {
        $('#image-text').html('Change');
        $('#image-reader').removeClass('hidden');
        $('#image-reader').attr('src', e.target.result);
        $('#emp_img').remove('');
      };

      reader.readAsDataURL(input.files[0]);
    }
  }

  function CountLeft() {

    var maxlength = 250;
    var length = $('#pre_title').val().length;
    var left = maxlength - length;
    $('#symbols_counter').html('Left: ' + left);
    console.log(left);
  }

  $(document).on('keydown', '#pre_title', function () {

    CountLeft();
  });

  $(".form-control-ap").each(function () {
    $(this).wrap("<span class='select-wrapper'></span>");
    $(this).after("<span class='holder'></span>");
  });
  $(".form-control-ap").change(function () {
    var selectedOption = $(this).find(":selected").text();
    $(this).next(".holder").text(selectedOption);
  }).trigger('change');

  $('.form-control-ap').on('click', function (e) {
    e.stopPropagation();
    $('.select-i').toggleClass('active');
  });

  $('body').on('click', function (e) {

    if ($(e.target).hasClass('select')) {} else {
      if ($('.select-i').hasClass('active')) {
        $('.select-i').toggleClass('active');
        console.log('i');
      }
    }
  });

  function setYears(count) {
    var date = new Date();
    var val = date.getYear();
    if (val >= 100) {
      val = val - 100 + 2000;
    }
    for (var i = 0; i < count; i++) {
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
  var months = [{ name: 'JAN', count: 31 }, { name: 'FEB', count: 28 }, { name: 'MAR', count: 31 }, { name: 'APR', count: 30 }, { name: 'MAY', count: 31 }, { name: 'JUN', count: 30 }, { name: 'JUL', count: 31 }, { name: 'AUG', count: 31 }, { name: 'SEP', count: 30 }, { name: 'OCT', count: 31 }, { name: 'NOV', count: 30 }, { name: 'DEC', count: 31 }];

  function getNumbers() {
    var month = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : null;

    var arr = [];
    var date = new Date();
    if (month == null) {
      month = date.getMonth() + 1;
      sMonth = month;
      sMonth--;
      $('#i_month').html(months[sMonth].name);
    }
    var maxDays;

    maxDays = months[month - 1].count;

    var selectedMonth = months[month - 1];

    for (var i = 1; i <= maxDays; i++) {
      arr.push(i);
    }

    for (var i = 0; i < arr.length; i++) {
      var val = i + 1;
      $('#block_day').append('<div class="prop-elem"><p>' + val + '</p></div>');
    }

    console.log(arr);
  }

  setYears(3);
  // calendar
  var previous = 0;
  $(document).on('click', '.prop-elem', function (e) {
    e.stopPropagation();
    var elem = $(e.target).closest('.prop-elem');
    if (previous == 0) {
      $(elem).addClass('active');
      previous = $(elem);
    } else if ($(elem).hasClass('active')) {
      $(elem).removeClass('active');
    } else {
      $(previous).removeClass('active');
      $(elem).addClass('active');
      previous = $(elem);
    }
  });

  $(document).on('click', '.lr_arrow', function (e) {
    e.stopPropagation();
    console.log(sMonth);
    var attr = $(e.target).attr('data');
    console.log(attr);
    if (attr == 'left') {
      if (sMonth == 0) {} else {
        sMonth--;
      }
    } else {
      if (sMonth == 11) {} else {
        sMonth++;
      }
    }
    $('#i_month').html(months[sMonth].name);
    console.log(months[sMonth].name);
    $('.prop-elem').remove();
    getNumbers(sMonth + 1);
  });
});

/***/ })

/******/ });