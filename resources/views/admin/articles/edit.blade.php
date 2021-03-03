@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.article.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.articles.update", [$article->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.article.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $article->name) }}">
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.article.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('link') ? 'has-error' : '' }}">
                            <label for="link">{{ trans('cruds.article.fields.link') }}</label>
                            <input class="form-control" type="text" name="link" id="link" value="{{ old('link', $article->link) }}">
                            @if($errors->has('link'))
                                <span class="help-block" role="alert">{{ $errors->first('link') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.article.fields.link_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('photo') ? 'has-error' : '' }}">
                            <label for="photo">{{ trans('cruds.article.fields.photo') }}</label>
                            <div class="needsclick dropzone" id="photo-dropzone">
                            </div>
                            @if($errors->has('photo'))
                                <span class="help-block" role="alert">{{ $errors->first('photo') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.article.fields.photo_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('unit_price') ? 'has-error' : '' }}">
                            <label for="unit_price">{{ trans('cruds.article.fields.unit_price') }}</label>
                            <input class="form-control" type="number" name="unit_price" id="unit_price" value="{{ old('unit_price', $article->unit_price) }}" step="0.01">
                            @if($errors->has('unit_price'))
                                <span class="help-block" role="alert">{{ $errors->first('unit_price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.article.fields.unit_price_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('color') ? 'has-error' : '' }}">
                            <label for="color_id">{{ trans('cruds.article.fields.color') }}</label>
                            <select class="form-control select2" name="color_id" id="color_id">
                                @foreach($colors as $id => $color)
                                    <option value="{{ $id }}" {{ (old('color_id') ? old('color_id') : $article->color->id ?? '') == $id ? 'selected' : '' }}>{{ $color }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('color'))
                                <span class="help-block" role="alert">{{ $errors->first('color') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.article.fields.color_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                            <label for="category_id">{{ trans('cruds.article.fields.category') }}</label>
                            <select class="form-control select2" name="category_id" id="category_id">
                                @foreach($categories as $id => $category)
                                    <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $article->category->id ?? '') == $id ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <span class="help-block" role="alert">{{ $errors->first('category') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.article.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sub_category') ? 'has-error' : '' }}">
                            <label for="sub_category_id">{{ trans('cruds.article.fields.sub_category') }}</label>
                            <select class="form-control select2" name="sub_category_id" id="sub_category_id">
                                @foreach($sub_categories as $id => $sub_category)
                                    <option value="{{ $id }}" {{ (old('sub_category_id') ? old('sub_category_id') : $article->sub_category->id ?? '') == $id ? 'selected' : '' }}>{{ $sub_category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sub_category'))
                                <span class="help-block" role="alert">{{ $errors->first('sub_category') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.article.fields.sub_category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    var uploadedPhotoMap = {}
Dropzone.options.photoDropzone = {
    url: '{{ route('admin.articles.storeMedia') }}',
    maxFilesize: 3, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 3,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
      uploadedPhotoMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotoMap[file.name]
      }
      $('form').find('input[name="photo[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($article) && $article->photo)
      var files = {!! json_encode($article->photo) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection