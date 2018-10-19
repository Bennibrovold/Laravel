<div class="container-fluid">
  <div class="title-admin_menu">
      <h4>Create Article/Category</h4>
  </div>
    <div class="row background-admin">
      <div class="col-md-3 col-lg-2 col-xl-3 d-lg-block">
      </div>
        <div class="col-md-12 col-lg-8 col-xl-6 no-padding">
            <div class="square_of_form_category">
                <ul id="ul_error" class="ul_errors_category list-unstyled hidden">
                    <li id="error"></li>
                </ul>
                <div class="squareplus_of_form_category">
                    <form id="form_category" method="POST" action="{{ route('admin.category.create') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">{{ __('Name of category') }}</label>
                            <input id="name" type="text" class="form-control" name="name" required autofocus>



            </div>
                            <div class="form-group float-right">

                                <button id="btn_category" type="submit" class="btn btn-primary form-group">Add</button>

                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-2 col-xl-3 d-lg-block">
        </div>
        <div class="col-md-12">
            <div class="square_of_form_category">
                <div class="squareplus_of_form_category">
                    <div class="conatiner">
                        <form id="form_record" enctype="multipart/form-data" method="POST" action="{{ route('admin.record.create') }}">
                            @csrf
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3 col-lg-2 col-xl-3 d-lg-block"></div>
                                    <div class="col-md-12 col-lg-8 col-xl-6 no-padding">
                                        <label for="">Preview Image</label>
                                        <div class="upload-image">
                                            <label for="image"><div class="background-layout"></div><img id="image-reader" class="input-image-form" src="" alt=""  /><div><h5 id="emp_img" class="text-center input-image-h5">Empty image</h5><p id="image-text" class="text-center">Select Image</p></div></label>
                                            <input id="image" type="file" class="preview-image" name="image" required>
                          </div>
                                        </div>
                                        <div class="col-md-3 col-lg-2 xol-xl-3 d-lg-block"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3 col-lg-2 col-xl-3 d-lg-block"></div>
                                        <div class="col-md-12 col-lg-8 col-xl-6 no-padding">
                                            <label for="email">{{ __('Title') }}</label>
                                            <input id="title" type="text" maxlength="100" class="form-control" name="title" required autofocus>
                          </div>
                                            <div class="col-md-3 col-lg-2 col-xl-3 d-lg-block"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3 col-lg-2 col-xl-3 d-lg-block"></div>
                                            <div class="col-md-12 col-lg-8 col-xl-6 no-padding">
                                                <label for="email">{{ __('Pre-Title') }}</label>

                                                <textarea id="pre_title" type="text" rows="7" class="form-control" name="pre_title" required autofocus fixed></textarea>
                                                <p id="symbols_counter" class="symbols-counter">Left: 250</p>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-3 d-lg-block"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3 col-lg-2 col-xl-3 d-lg-block"></div>
                                            <div class="col-md-12 col-lg-8 col-xl-6 no-padding">
                                                <label for="email">{{ __('Description') }}</label>
                                                <textarea id="editor" class="form-control" rows="100" type="text" name="description"></textarea>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-3 d-lg-block"></div>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                              <div class="row">
                                                <div class="col-md-3 col-lg-2 col-xl-3 d-lg-block"></div>
                                                <div class="col-md-12 col-lg-8 col-xl-6 no-padding">
                                                <label for="email">{{ __('Category') }}</label>

                                                <select id="category_select" type="text" class="form-control" name="category" required autofocus>

                          @foreach($categories as $category)
                          <option value="{{ $category->name }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                                              </div>
                                              <div class="col-md-3 col-lg-2 col-xl-3 d-lg-block"></div>
                                              </div>
                                            </div>
                                            <div class="from-group">
                                              <div class="row">
                                                <div class="col-md-3 col-lg-2 col-xl-3 d-lg-block"></div>
                                                <div class="col-md-12 col-lg-8 col-xl-6 no-padding">
                                                <label for="checkbox">Visiable?</label>
                                                <br />
                                                <input id="checkbox" type="checkbox" name="checkbox" value="true" aria-label="textbox" />
                                                </div>
                                                <div class="col-md-3 col-lg-2 col-xl-3 d-lg-block"></div>
                                              </div>

                                </div>
                                                <div class="form-group">
                                                  <div class="row">
                                                  <div class="col-md-3 col-lg-2 col-xl-3 d-lg-block"></div>
                                                  <div class="col-md-12 col-lg-8 col-xl-6 no-padding">
                                                    <button id="btn" type="submit" class="btn btn-primary float-right">{{ __('add') }}</button>
                                                  </div>
                                                  <div class="col-md-3 col-lg-2 col-xl-3 d-lg-block"></div>
                                                  </div>
                                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<script>
    var myEditor;

    ClassicEditor
        .create( document.querySelector( '#editor' ), {

        ckfinder: {
            uploadUrl: '{{ route('admin.image.upload') }}?_token=' + document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
      })
        .then( editor => {

          myEditor = editor;

        })
        .catch( error => {
            console.error( error );
        } );
</script>-->
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
            var token = $('input[name=_token]').val();
            console.log(token);
            var data = new FormData(document.querySelector('#form_record'));
            data.append('image', $('input[type=file]')[0].files[0]);
            data.append('title', $('input[id=title]').val());
            data.append('pre_title', $('textarea[id=pre_title]').val());
            data.append('editor', $('textarea[id=editor]').val());
            data.append('category_select', $('input[id=category_select]').val());
            data.append('checkbox', $('input[id=checkbox]').val());
            var editor = $('#editor').val();
            console.log(editor + 'editor');
            //  data.append( "_token", '{{ Session::token() }}' );
            data.append("_token", token);
            console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: $('#form_record').prop('action'),
                data: data,
                processData: false,
                contentType: false,
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
                    } else {
                        console.log(data.responseJSON);
                    }
                }
            });
        });
        $('#btn_category').click(function(e) {
            e.preventDefault();
            var name = $('#name').val();
            $.ajax({
                type: "POST",
                url: $('#form_category').prop('action'),
                data: $('#form_category').serialize(),
                success: function(data) {
                    new Noty({
                        type: 'success',
                        theme: 'relax',
                        text: 'Category has been added!',
                        progressBar: false,
                        timeout: 3000,
                    }).show();
                    addOption(data);
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
                    console.log(data.responseJSON);
                }
            });
        });

        function addOption(data) {
            $('#category_select').append($('<option>', {
                value: data,
                text: data,
            }));
            var test = $('option[value=' + data + ']');
            console.log('added' + data);
            console.log(data[0]);
        }
    });
</script>
