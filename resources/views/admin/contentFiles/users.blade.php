<div class="row">
  <div class="col-md-3">
  <div class="form-group">
  <label for="nick">Nickname</label>
  <input class="form-control" type="text" name="nickname">
  </div>
  </div>
  <div class="col-md-6">2</div>
  <div class="col-md-3">3</div>
</div>
<div class="table-responsive table-hover">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nickname</th>
                <th scope="col">Edit buttons</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            @if($user->admin == 1) {
              {{$user->admin = 'Admin'}}
            }
          @endif
            <tr id="{{$user->id}}" class="tr_users">
                <th scope="row">{{$user->id}}</th>
                <th>{{$user->name}}[{{$user->is_admin}}]</th>
                <td>
                  <form id="form" action="{{route('admin.users.destroy', $user->id) }}" method="post">
                    {{ method_field('DELETE') }}
                  @csrf
                  <button class="btn-form float-right delete" data="{{$user->id}}" id="delete" type="submit"><i class="fa fa-ban fa-2x" aria-hidden="true"></i></button>
                  </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div id="test" class="test"></div>
<script>
$(document).ready(function() {
$('input[name=nickname]').change(function(){
  var value = $('input[name=nickname]').val();
  ajaxUsersGet(value);
  console.log(value);
});
$('.delete').click(function(e){
  e.preventDefault();
  var s = $(e.target).closest('form');
  var e = $(e.target).attr('data');
  console.log(s);
  ajaxUserDelete(s,e);
});
function ajaxUsersGet(value)
{
    $.ajax({
      url: 'http://localhost/l.loc/public/admin/users/' + value,
      type: 'GET',
      data: { value : value },
      success : function(data) {
        $('main').html(data);
        console.log('ok');
      },
      error: function(data) {
              console.log(data.responseText);
            }
    });
}
function ajaxUserDelete(s,e)
{
  var param = {
    '_method'  : 'delete',
    '_token'   : '{{ Session::token() }}'
  };
  $.ajax({
    url: $(s).prop('action'),
    type: 'post',
    data: param,
    success : function(data) {
      new Noty({
          type: 'success',
          theme: 'relax',
          text: 'User has been delted!',
          progressBar: false,
          timeout: 3000,
      }).show();
      $('#' + e).remove();
      console.log(data);
    },
    error: function(data) {
      new Noty({
          type: 'error',
          theme: 'relax',
          text: 'ERROR',
          progressBar: false,
          timeout: 3000,
      }).show();
      console.log(data.responseText);
          }

  });
}
});
</script>
