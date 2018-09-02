@extends('admin.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <form method="POST" action="{{ route('admin.record.create') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label text-md-right">{{ __('Title') }}</label>

                    <div class="col-md-10">
                        <input type="text" class="form-control" name="title" required autofocus>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label text-md-right">{{ __('Pre-Title') }}</label>

                    <div class="col-md-10">
                        <input type="text" class="form-control" name="pre_title" required autofocus>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label text-md-right">{{ __('Description') }}</label>

                    <div class="col-md-10">
                        <textarea id="editor" class="form-control" type="text" name="description">
                        </textarea>

                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label text-md-right">{{ __('Category') }}</label>

                    <div class="col-md-10">
                        <select type="text" class="form-control" name="category" required autofocus>
                          @foreach($categories as $category)
                          <option value="{{ $category->name }}">{{ $category->name }}</option>
                          @endforeach
                        </select
                    </div>
                </div>
                <div class="form-group row ">
                    <div class="col-sm-12 col-form-label text-md-right">
                        <button type="submit" class="btn btn-primary float-right">
                            {{ __('add') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" rel="javascript" type="text/javascript"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script src="{{ asset('js/nicEdit.js') }}" rel="javascript" type="text/javascript"></script>
<script>tinymce.init({
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
    '//www.tinymce.com/css/codepen.min.css']
});</script>

@endsection
