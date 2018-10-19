<div class="conatiner-fluid row-shadow">
        <div class="title-admin_menu">
            <h4>Admin panel by Sekki</h4>
        </div>
<div class="container-fluid">
<div class="row">
  <div class="col-xl-3 py-2">
    <div class="margin-square row-shadow">
    <select name="selected" class="selected form-control-ap" data="records">
      <option default="day" value="day">Day</option>
      <option value="week">Week</option>
      <option value="month">Month</option>
      <option value="year">Year</option>
    </select>
    <i><div class="arrow select-i">
        <span></span>
        <span></span>
      </div></i>
    <canvas id="myChart" width="200" height="200"></canvas>
    </div>
  </div>
  <div class="col-xl-6 py-2">
    <div class="margin-square row-shadow">
      <h4 class="h4-a">Visitors</h4>
      <div class="calendar" id="calendar">
        <select name="" id="year">

        </select>
        <div class="month_select">
          <div data="left" class="left-arrow lr_arrow"> < </div>
          <div data="right" class="right-arrow lr_arrow"> > </div>
          <div class="info-month"><p id="i_month"></p></div>

        </div>
        <div id="block_day" class="block-days">

        </div>
      </div>
      <canvas id="visitorsChart" width="200" height="200"></canvas>
    </div>
  </div>
  <div class="col-xl-3 py-2">
  <div class="margin-square row-shadow">
    <h4 class="h4-a">Top articles</h4>
    <div class="responsive-table">
      <table class="table table-hover">
        <thead class="">
          <tr>
            <th>Image</th>
            <th>Name</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($admins as $admin)

          <tr>
            <td><b>{{ $admin->id }}</b></td>
            <td>{{ $admin->name }}</td>
            <td><button class="btn btn-primary" data="{{ $admin->id }}">Edit</button></td>
          </tr>

          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
            <p class="text-center">
                Categories
            </p>
            <div class="table-responsive table-hover">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Count</th>
                            <th scope="col">Edit buttons</th>
                            <th>Confirm</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach  ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->count }}</td>
                            <td><a class="btn btn-danger" href="{{url('admin/category/'.$category->id.'/delete') }}">Удалить</a>
                                <a class="btn btn-danger" href="{{url('admin/category/'.$category->id.'/delete') }}">Редактировать</a></td>
                            <td><select class="form-control form-control-sm">
                            <option>Show</option>
                            <option>Hide</option>
                            </select></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
          </div>
          <div class="col-md-6"></div>
        </div>
      </div>
</div>
<script>
var data = [ @foreach($counter as $count)
  ["{{$count}}"],
@endforeach];
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Users", "Records", "Categories"],
        datasets: [{
            label: '# of Today',
            data: data,
            backgroundColor: [
                '#3490dc',
                '#e3342f',
                'green',
            ],
            borderColor: [
                '#fff',
                '#fff',
                '#fff',
            ],
            borderWidth: 2
        }]
    },
    options: {
      legend: {
      display: true,
      labels: {
          fontColor: 'grey'
        }
      },
      title: {
      display: true,
      text: 'Per day'
      },
    }
});

  var months = ['JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC'];
  var visitors = [];
  var visitorLabels = [];
  var day;
  var month;
  var length;


  function randomNumbers(min,max)
  {
    var val = Math.random() * (max - min) + min;
    return Math.round(val);
  }

  function setLabels(countDaysChart) {

    var visitorDateCur = new Date();
    var currentMonth = visitorDateCur.getMonth() + 1;
    var currentDay = visitorDateCur.getDate();
    var currentLength = visitorLabels.length;
    while(visitorLabels.length < countDaysChart)
    {
        length = currentDay - currentLength;
        if(length < 1) {
          length = day;
          currentMonth = month;
        }
        var val = generateDates(length,currentMonth);
        day = val.split('.')[0];
        month = val.split('.')[1];
        visitorLabels.push(val);
        currentDay--;

    }

    for(var i = 0; i < countDaysChart; i++)
    {
      visitors.push(randomNumbers(5,200));
    }


    visitorLabels.reverse();
  };

  function generateDates(currentDay,currentMonth)
  {
    console.log(currentDay);
    if(currentDay == 1) {
      var previousMonth = currentMonth - 1;
      if(previousMonth % 2 == 0) {
        pMaxDays = 31;
        currentDay = 31;
      } else {
        pMaxDays = 30;
        currentDay = 30;
      }
    } else {
      previousMonth = currentMonth;
      currentDay = currentDay;
    }
    return currentDay + '.' + previousMonth;
  };

  setLabels(7);

var visitorCtx = document.getElementById('visitorsChart').getContext('2d');
var visitorChart = new Chart(visitorCtx, {
  type: 'line',
  data: {
    labels: visitorLabels,
    datasets: [{
      label: '# of visitors',
      data: visitors,
      fill: false,
      lineTension: 0,
      backgroundColor: [
        'green'
      ],
      borderColor: [
        'green'
      ],
      borderWidth: 2
    }]
  },
  options: {
    legend: {
      display: true,
      labels: {
        fontColor: 'black'
      }
    },
    title: {
      display:true,
      text: 'Unique visits'
    },
    scales: {
    yAxes: [{
        stacked: true
    }]
}
  }
});

</script>
