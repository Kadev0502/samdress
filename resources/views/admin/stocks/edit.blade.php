@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.stock.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.stocks.update", [$stock->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('preorder_code') ? 'has-error' : '' }}">
                            <label for="preorder_code">{{ trans('cruds.stock.fields.preorder_code') }}</label>
                            <input class="form-control" type="text" name="preorder_code" id="preorder_code" value="{{ old('preorder_code', $stock->preorder_code) }}">
                            @if($errors->has('preorder_code'))
                                <span class="help-block" role="alert">{{ $errors->first('preorder_code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.stock.fields.preorder_code_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('supplier') ? 'has-error' : '' }}">
                            <label for="supplier_id">{{ trans('cruds.stock.fields.supplier') }}</label>
                            <select class="form-control select2" name="supplier_id" id="supplier_id">
                                @foreach($suppliers as $id => $supplier)
                                    <option value="{{ $id }}" {{ (old('supplier_id') ? old('supplier_id') : $stock->supplier->id ?? '') == $id ? 'selected' : '' }}>{{ $supplier }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('supplier'))
                                <span class="help-block" role="alert">{{ $errors->first('supplier') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.stock.fields.supplier_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('size') ? 'has-error' : '' }}">
                            <label for="size_id">{{ trans('cruds.stock.fields.size') }}</label>
                            <select class="form-control select2" name="size_id" id="size_id">
                                @foreach($sizes as $id => $size)
                                    <option value="{{ $id }}" {{ (old('size_id') ? old('size_id') : $stock->size->id ?? '') == $id ? 'selected' : '' }}>{{ $size }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('size'))
                                <span class="help-block" role="alert">{{ $errors->first('size') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.stock.fields.size_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('article') ? 'has-error' : '' }}">
                            <label for="article_id">{{ trans('cruds.stock.fields.article') }}</label>
                            <select class="form-control select2" name="article_id" id="article_id">
                                @foreach($articles as $id => $article)
                                    <option value="{{ $id }}" {{ (old('article_id') ? old('article_id') : $stock->article->id ?? '') == $id ? 'selected' : '' }}>{{ $article }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('article'))
                                <span class="help-block" role="alert">{{ $errors->first('article') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.stock.fields.article_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('quantity') ? 'has-error' : '' }}">
                            <label for="quantity">{{ trans('cruds.stock.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', $stock->quantity) }}" step="1">
                            @if($errors->has('quantity'))
                                <span class="help-block" role="alert">{{ $errors->first('quantity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.stock.fields.quantity_helper') }}</span>
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