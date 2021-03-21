@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.supplier.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.suppliers.update", [$supplier->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.supplier.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $supplier->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.supplier.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                            <label for="website">{{ trans('cruds.supplier.fields.website') }}</label>
                            <input class="form-control" type="text" name="website" id="website" value="{{ old('website', $supplier->website) }}">
                            @if($errors->has('website'))
                                <span class="help-block" role="alert">{{ $errors->first('website') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.supplier.fields.website_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('currency') ? 'has-error' : '' }}">
                            <label for="currency_id">{{ trans('cruds.supplier.fields.currency') }}</label>
                            <select class="form-control select2" name="currency_id" id="currency_id">
                                @foreach($currencies as $id => $currency)
                                    <option value="{{ $id }}" {{ (old('currency_id') ? old('currency_id') : $supplier->currency->id ?? '') == $id ? 'selected' : '' }}>{{ $currency }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('currency'))
                                <span class="help-block" role="alert">{{ $errors->first('currency') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.supplier.fields.currency_helper') }}</span>
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