@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.currency.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.currencies.update", [$currency->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="currency">{{ trans('cruds.currency.fields.currency') }}</label>
                            <input class="form-control" type="text" name="currency" id="currency" value="{{ old('currency', $currency->currency) }}" required>
                            @if($errors->has('currency'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('currency') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.currency.fields.currency_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="currency_code">{{ trans('cruds.currency.fields.currency_code') }}</label>
                            <input class="form-control" type="text" name="currency_code" id="currency_code" value="{{ old('currency_code', $currency->currency_code) }}" required>
                            @if($errors->has('currency_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('currency_code') }}
                                </div>
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