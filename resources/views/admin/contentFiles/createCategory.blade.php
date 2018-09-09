<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="square_of_form_category">
                <ul id="ul_error" class="ul_errors_category list-unstyled hidden">
                    <li id="error"></li>
                </ul>
                <div class="squareplus_of_form_category">
                    <form id="form" method="POST" action="{{ route('admin.category.create') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name">{{ __('Name of category') }}</label>
                            <input id="name" type="text" class="form-control" name="name" required autofocus>



                </div>
                            <div class="form-group float-right">

                                <button id="btn" type="submit" class="btn btn-primary form-group">Add</button>

                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#btn').click(function(e) {
            e.preventDefault();
            var $this = $('form#btn');
            var name = $('#name').val();
            $.ajax({
                type: "POST",
                url: $('#form').prop('action'),
                data: $('#form').serialize(),
                success: function(data) {
                    console.log('added');
                    new Noty({
                        type: 'success',
                        theme: 'relax',
                        text: 'Category has been added!',
                        progressBar: false,
                        timeout: 3000,
                    }).show();
                },
                error: function(data) {
                    if (data.status === 422) {
                        var errors = data.responseJSON;
                        new Noty({
                            type: 'error',
                            theme: 'relax',
                            text: 'That catagory already exists!',
                            progressBar: false,
                            timeout: 3000,
                        }).show();

                    }
                }
            });
        });
    });
</script>
