@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.currency.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.currencies.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('currency') ? 'has-error' : '' }}">
                            <label class="required" for="currency">{{ trans('cruds.currency.fields.currency') }}</label>
                            <input class="form-control" type="text" name="currency" id="currency" value="{{ old('currency', '') }}" required>
                            @if($errors->has('currency'))
                                <span class="help-block" role="alert">{{ $errors->first('currency') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.currency_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('currency_code') ? 'has-error' : '' }}">
                            <label class="required" for="currency_code">{{ trans('cruds.currency.fields.currency_code') }}</label>
                            <input class="form-control" type="text" name="currency_code" id="currency_code" value="{{ old('currency_code', '') }}" required>
                            @if($errors->has('currency_code'))
                                <span class="help-block" role="alert">{{ $errors->first('currency_code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.currency_code_helper') }}</span>
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