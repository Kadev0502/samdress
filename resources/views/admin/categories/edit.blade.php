@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.category.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.categories.update", [$category->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.category.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $category->name) }}">
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.category.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sub_categories') ? 'has-error' : '' }}">
                            <label for="sub_categories">{{ trans('cruds.category.fields.sub_category') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="sub_categories[]" id="sub_categories" multiple>
                                @foreach($sub_categories as $id => $sub_category)
                                    <option value="{{ $id }}" {{ (in_array($id, old('sub_categories', [])) || $category->sub_categories->contains($id)) ? 'selected' : '' }}>{{ $sub_category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('sub_categories'))
                                <span class="help-block" role="alert">{{ $errors->first('sub_categories') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.category.fields.sub_category_helper') }}</span>
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