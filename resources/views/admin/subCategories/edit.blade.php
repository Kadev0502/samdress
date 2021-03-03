@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.subCategory.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.sub-categories.update", [$subCategory->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.subCategory.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $subCategory->name) }}">
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.subCategory.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('category') ? 'has-error' : '' }}">
                            <label for="category_id">{{ trans('cruds.subCategory.fields.category') }}</label>
                            <select class="form-control select2" name="category_id" id="category_id">
                                @foreach($categories as $id => $category)
                                    <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $subCategory->category->id ?? '') == $id ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <span class="help-block" role="alert">{{ $errors->first('category') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.subCategory.fields.category_helper') }}</span>
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