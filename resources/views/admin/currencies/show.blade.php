@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.currency.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.currencies.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.currency.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $currency->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.currency.fields.currency') }}
                                    </th>
                                    <td>
                                        {{ $currency->currency }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.currency.fields.currency_code') }}
                                    </th>
                                    <td>
                                        {{ $currency->currency_code }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.currencies.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#currency_suppliers" aria-controls="currency_suppliers" role="tab" data-toggle="tab">
                            {{ trans('cruds.supplier.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="currency_suppliers">
                        @includeIf('admin.currencies.relationships.currencySuppliers', ['suppliers' => $currency->currencySuppliers])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection