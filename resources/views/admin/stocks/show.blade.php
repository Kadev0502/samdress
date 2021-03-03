@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.stock.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.stocks.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stock.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $stock->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stock.fields.preorder_code') }}
                                    </th>
                                    <td>
                                        {{ $stock->preorder_code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stock.fields.supplier') }}
                                    </th>
                                    <td>
                                        {{ $stock->supplier->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stock.fields.size') }}
                                    </th>
                                    <td>
                                        {{ $stock->size->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stock.fields.article') }}
                                    </th>
                                    <td>
                                        {{ $stock->article->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stock.fields.quantity') }}
                                    </th>
                                    <td>
                                        {{ $stock->quantity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stock.fields.total_price') }}
                                    </th>
                                    <td>
                                        {{ $stock->total_price }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stock.fields.created_at') }}
                                    </th>
                                    <td>
                                        {{ $stock->created_at }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.stock.fields.updated_at') }}
                                    </th>
                                    <td>
                                        {{ $stock->updated_at }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.stocks.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection