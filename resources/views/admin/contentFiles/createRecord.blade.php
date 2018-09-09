<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="square_of_form_category">
                <div class="squareplus_of_form_category">
                    <form id="form" method="POST" action="{{ route('admin.record.create') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="email">{{ __('Title') }}</label>
                            <input id="title" type="text" class="form-control" name="title" required autofocus>
                </div>
                            <div class="form-group">
                                <label for="email">{{ __('Pre-Title') }}</label>
                                <input id="pre_title" type="text" class="form-control" name="pre_title" required autofocus>
                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('Description') }}</label>
                                    <textarea id="editor" class="form-control" type="text" name="description">
                        </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="email">{{ __('Category') }}</label>

                                    <select id="category" type="text" class="form-control" name="category" required autofocus>

                          @foreach($categories as $category)
                          <option value="{{ $category->name }}">{{ $category->name }}</option>
                          @endforeach
                        </select>

                                </div>
                                <div class="from-group">
                                  <label for="checkbox">Visiable?</label>
                                  <br />
                                            <input id="checkbox" type="checkbox" name="checkbox" value="true" aria-label="textbox" />

                                </div>
                                        <div class="form-group">

                                            <button id="btn" type="submit" class="btn btn-primary float-right">
                            {{ __('add') }}
                        </button>

                                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" rel="javascript" type="text/javascript"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script src="{{ asset('js/nicEdit.js') }}" rel="javascript" type="text/javascript"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        height: 500,
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code help wordcount'
        ],
        toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });
</script>
<script>
    $(document).ready(function() {
        $('#btn').click(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $('#form').prop('action'),
                data: $('#form').serialize(),
                success: function(data) {
                    console.log('added');
                    new Noty({
                        type: 'success',
                        theme: 'relax',
                        text: 'Record has been added!',
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
                            text: 'That Record already exists!',
                            progressBar: false,
                            timeout: 3000,
                        }).show();
                    }
                }
            });
        });
    });
</script>
